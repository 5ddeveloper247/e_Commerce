<?php

namespace App\Http\Controllers;

use App\Models\OrderShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\SiteSetting;
use App\Models\SiteSettingsFiles;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Category;
use App\Models\ProductSpecification;
use App\Models\ProductFeature;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartDetail;
use App\Models\OrderStatus;
use App\Models\OrderTracking;
use App\Models\Brand;
use App\Models\Wishlist;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use App\Models\ShippingAddress;


class WebsiteController extends Controller
{

    public function __construct() {}

    public function home(Request $request)
    {
        $data['pageTitle'] = 'Dashboard';

        return view('website.home')->with($data);
    }

    public function account(Request $request)
    {
        $data['pageTitle'] = 'Account';
        $user = Auth::user(); // Get the current logged-in user
        return view('website.account', ['user' => $user, 'data' => $data]);
    }


    //product listing ajax
    public function productsListing(Request $request)
    {
        $products = Product::where('status', 1)->with(['productImages', 'category'])->get();
        if ($products) {
            return response()->json(['status' => 200, 'message' => 'Products fetched successfully', 'data' => $products]);
        } else {
            return response()->json(['status' => 404, 'message' => 'No products found']);
        }
    }

    public function testimonialsListing(Request $request)
    {
        $testimonials = Testimonial::where('status', 1)->get();
        if ($testimonials) {
            return response()->json(['status' => 200, 'message' => 'Testimonials fetched successfully', 'data' => $testimonials]);
        } else {
            return response()->json(['status' => 404, 'message' => 'No testimonials found', 'data' => $testimonials]);
        }
    }


    public function accountUpdate(Request $request)
    {
        // Validate request inputs
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
            'phoneNumber' => 'nullable|string|min:7|max:15',
            'emailAddress' => 'required|email|max:255',
            'currentPassword' => 'nullable|string|min:8', // Current password is optional, must be at least 8 characters
            'password' => 'nullable|string|min:8', // Password is optional, must be at least 8 characters
            'confirmPassword' => 'nullable|same:password' // Confirm password must match the password field if provided
        ]);

        // Retrieve the current authenticated user
        $user = Auth::user(); // Directly get the authenticated user

        // Verify the current password if provided
        if ($request->filled('currentPassword')) {
            if (!Hash::check($request->currentPassword, $user->password)) {
                return response()->json([
                    'status' => 400,
                    'message' => 'The current password is incorrect.',
                    'validationErrors' => [
                        'field' => 'currentPassword',
                        'error' => 'The current password is incorrect.'
                    ]
                ], 400);
            }

            // Check if the new password and confirm password match
            if ($request->filled('password') && $request->password !== $request->confirmPassword) {
                return response()->json([
                    'status' => 400,
                    'message' => 'The new password and confirm password do not match.'
                ], 400);
            }

            // Update the password if the new password is provided
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password); // Encrypt and set the new password
            }
        }

        // Update the user's other information
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->company_name = $request->company;
        $user->phone = $request->phoneNumber;
        $user->email = $request->emailAddress;
        // Save the updated user details to the database
        $user->save();

        return response()->json([
            'status' => 200,
            'message' => 'Account updated successfully'
        ]);
    }


    public function authUser(Request $request)
    {
        $user = Auth::user();
        if ($user) {
            return response()->json(['status' => 200, 'data' => $user, 'auth' => "authorized"]);
        } else {
            return response()->json(['status' => 401, 'data' => $user, 'auth' => "Unauthorized"]);
        }
    }


    public function newProducts(Request $request)
    {
        $newProducts = Product::where('status', 1)
            ->with(['productImages', 'category'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        if ($newProducts->isNotEmpty()) {
            return response()->json(['status' => 200, 'data' => $newProducts]);
        }

        return response()->json(['status' => 404, 'data' => []]);
    }


    public function productDetail(Request $request, $category, $sku)
    {
        if (isset($category)) {
            $productCategory = str_replace('-', ' ', $category);
            $categoryDetail = Category::where('category_name', $productCategory)->first();
            if (!$category) {
                return abort(404);
            }
        } else {
            return abort(404);
        }

        if (isset($sku) && isset($categoryDetail)) {
            $productSku = $sku;
            $productDetail = Product::where('status', 1)->first();
            if (!$productDetail) {
                return abort(404);
            }
            if ($productDetail->category_id !== $categoryDetail->id) {
                return abort(404);
            }
        } else {
            return abort(404);
        }
        $product = Product::where('status', 1)
            ->where('category_id', $categoryDetail->id)
            ->where('sku', $sku)
            ->with(['productImages', 'category', 'productSpecifications', 'brand', 'productFeatures'])
            ->first();

        if ($product) {
            $specifications = ProductSpecification::where('product_id', $product->id)->get();
            $features = ProductFeature::where('product_id', $product->id)->get();
            $relatedProducts = Product::where('category_id', $categoryDetail->id)
                ->with(['productImages', 'category', 'productSpecifications', 'brand', 'productFeatures'])->get();
            return view('website.product_detail', ['product' => $product, 'specifications' => $specifications, 'features' => $features, 'relatedProducts' => $relatedProducts]);
        }

        return abort(404);
    }


    public function cartAdd(Request $request)
    {
        $product_id = $request->product_id;
        $quantity = $request->quantity;

        if (!isset($product_id) || !isset($quantity)) {
            return response()->json(['status' => 400, 'message' => 'Invalid request']);
        }

        $product = Product::find($product_id);

        if (!$product) {
            return response()->json(['status' => 404, 'message' => 'Product not found']);
        }

        // Determine the price and discounted price
        $price = $product->price;
        $dis_price = $product->price;

        if ($product->is_offered == '1' && $product->offered_percentage > 0) {
            $dis_price = $product->price - ($product->price * ($product->offered_percentage / 100));
        } elseif ($product->discount_price != null && $product->discount_price > 0) {
            $dis_price = $product->discount_price;
        }

        // Check if the user is authenticated and fetch the cart accordingly
        if (Auth::check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->where('status', 0)->first();
        } else {
            if ($request->has('cart_id') && $request->cart_id !== null) {
                $cart = Cart::where('id', $request->cart_id)->where('status', 0)->first();
            } else {
                $cart = [];
            }
        }
        // If the cart exists, update or add the product to the cart details
        if ($cart && $cart !== "") {
            $cartDetail = CartDetail::where('cart_id', $cart->id)
                ->where('product_id', $product_id)
                ->first();

            if ($cartDetail) {
                // Update existing cart detail
                $cartDetail->quantity += $quantity;
            } else {
                // Create a new cart detail
                $cartDetail = new CartDetail();
                $cartDetail->cart_id = $cart->id;
                $cartDetail->product_id = $product_id;
                $cartDetail->quantity = $quantity;
            }

            // Set price and total amount
            $cartDetail->price = $price;
            $cartDetail->discounted_price = $dis_price;
            $cartDetail->total_amount = $dis_price * $cartDetail->quantity;
            $cartDetail->save();
        } else {
            // Create a new cart and cart detail if no cart exists
            $cart = new Cart();
            $cart->user_id = auth()->user()->id ?? null;
            $cart->status = 0;
            $cart->save();

            $cartDetail = new CartDetail();
            $cartDetail->cart_id = $cart->id;
            $cartDetail->product_id = $product_id;
            $cartDetail->quantity = $quantity;
            $cartDetail->price = $price;
            $cartDetail->discounted_price = $dis_price;
            $cartDetail->total_amount = $dis_price * $quantity;
            $cartDetail->save();
        }

        return response()->json([
            'status' => 200,
            'message' => 'Product added to cart successfully',
            'cart' => $cart->id // Load cart details with associated product for response
        ]);
    }

    public function cartView(Request $request)
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->where('status', 0)->first();
        } else {
            if ($request->has('cart_id') && $request->cart_id !== null) {
                $cart = Cart::where('id', $request->cart_id)->where('status', 0)->first();
            } else {
                return response()->json(['status' => 404, 'message' => 'Cart not found']);
            }
        }

        if ($cart && $cart !== "") {
            $cartDetails = CartDetail::where('cart_id', $cart->id)
                ->with(['product' => function ($query) {
                    $query->with(['productImages', 'category']);
                }])->get();
            return response()->json([
                'status' => 200,
                'data' => $cartDetails,
                'cart_id' => $cart->id // Return the cart id for further operations
            ]);
            if ($cartDetails->isNotEmpty()) {
                return response()->json(['status' => 200, 'data' => $cartDetails]);
            }
        } else {

            return response()->json(['status' => 404, 'message' => 'Cart Detail not found']);
        }
    }


    public function cartDelete(Request $request)
    {

        $cartid = $request->cart_id;
        $cartdetailid = $request->item_id;
        $product_id = $request->product_id;

        if ($cartdetailid) {
            $cartDetail = CartDetail::where('id', $cartdetailid)->first();
            if ($cartDetail && $cartDetail->cart_id == $cartid) {
                $cartDetail->delete();
                return response()->json([
                    'cart_id' => $cartid,
                    'message' => 'Item deleted successfully',
                    'status' => 200
                ]);
            } else {
                return response()->json([
                    'message' => 'Invalid cart or item',
                    'status' => 404
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Invalid item',
                'status' => 404
            ]);
        }
    }

    public function tempSession(Request $request)
    {
        // Retrieve URL and cartId from the request
        $url = $request->url;
        $cartId = $request->cartId;

        // Store the data in the session with the key 'tempCheckout'
        session(['tempCheckout' => [
            'url' => $url,
            'cartId' => $cartId
        ]]);
        // Optionally, return a response confirming the session storage
        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Session data stored successfully',
            'data' => session('tempCheckout')  // Return the stored session data
        ]);
    }

    public function orderListing(Request $request)
    {
        if ($request->has("order_id")) {
            // Fetch the single order with the specified order_id
            $order = Order::where('id', $request->order_id)
                ->with(['user', 'orderDetails.product.productImages', 'shippingAddress', 'orderPayment', 'status']) // Load relationships
                ->first(); // Get the first record (which will be only one since order_id is unique)
            $orderTrackings = OrderTracking::where('order_id', $order->id)->with(['order', 'status'])->get();
            $wishList = Wishlist::where('user_id', Auth::user()->id)->with(['product.productImages', 'user'])->get();

            if (!$order) {
                return response()->json([
                    'message' => 'Order not found',
                    'status' => 404,
                    'order' => $order,
                    'orderTrackings' => $orderTrackings,
                    'wishList' => $wishList,
                ]);
            }
            // Return response for single order
            return response()->json([
                'order' => $order,
                'status' => 200,
                'orderTrackings' => $orderTrackings,
                'wishList' => $wishList,
            ]);
        } else {
            // Fetch all orders for the logged-in user with status = 1
            $orders = Order::where('user_id', Auth::user()->id)
                ->with(['user', 'orderDetails.product.productImages', 'shippingAddress', 'orderPayment', 'status']) // Load relationships
                ->get();

            $wishList = Wishlist::where('user_id', Auth::user()->id)
                ->with(['product.productImages', 'product.category', 'user'])
                ->get();
            // Return response for multiple orders
            return response()->json([
                'orders' => $orders,
                'status' => 200,
                'count' => $orders->count(),
                'wishList' => $wishList,
            ]);
        }
    }


    public function orderRefund(Request $request)
    {
        // Validate the request input
        $request->validate([
            'status' => 'required|string',
            'orderId' => 'required|integer',
        ]);

        // Find the order status based on the provided status name
        $orderStatus = OrderStatus::where('name', 'LIKE', $request->status)->first();

        // Check if the order status was found
        if ($orderStatus) {
            // Find the order by orderId
            $order = Order::find($request->orderId);

            // Check if the order was found
            if ($order) {
                // Update the order status and save
                $order->status = $orderStatus->id;
                $order->save();

                // Create an entry in the OrderTracking table
                $orderTracking = OrderTracking::create([
                    'order_id' => $order->id,
                    'status_id' => $orderStatus->id,
                    'source' => Auth::user()->role,  // Source could be user/admin
                    'source_id' => Auth::user()->id, // Authenticated user ID
                ]);

                return response()->json([
                    'order' => $order,  // Return the updated order
                    'orderTracking' => $orderTracking,  // Return the tracking info if needed
                    'status' => 200,
                    'message' => 'Status updated successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Order not found',
                ], 404);
            }
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'Order status not found',
            ], 404);
        }
    }



    public function wishListAdd(Request $request)
    {
        // Validate the request input
        $request->validate([
            'productId' => 'required|integer',
        ]);

        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the product is already in the wishlist
            $wishList = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->productId)->first();

            // If the product is not in the wishlist, add it
            if (!$wishList) {
                $wishList = new Wishlist();
                $wishList->user_id = Auth::user()->id;
                $wishList->product_id = $request->productId;
                $wishList->save();
            }
            return response()->json([
                'status' => 200,
                'message' => 'Product added to wishlist successfully',
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'User not authenticated',
            ], 400);
        }
    }

    public function wishListRemove(Request $request)
    {
        // Validate the request input
        $request->validate([
            'product_id' => 'required|integer',
        ]);

        // Check if the user is authenticated
        if (Auth::check()) {
            // Find the wishlist entry by productId
            $wishList = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $request->product_id)->first();

            // If the wishlist entry exists, delete it
            if ($wishList) {
                $wishList->delete();
                return response()->json([
                    'status' => 200,
                    'message' => 'Product removed from wishlist successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Product not found in wishlist',
                ], 404);
            }
        } else {
            return response()->json([
                'status' => 400,
            ]);
        }
    }

    public function productListingDetail(Request $request)
    {
        $productId = $request->productId;
        $product = Product::with(['productImages', 'category', 'brand'])->find($productId);
        return response()->json([
            'product' => $product,
            'status' => 200,
        ]);
    }


    public function productFilter(Request $request)
    {
        // Validate the request parameters to ensure the filters are valid
        $validated = $request->validate([
            'categories' => 'nullable|array',
            'brands' => 'nullable|array',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'sort_by'   => 'nullable|string|in:price_asc,price_desc,newest,oldest'
        ]);

        $filterData = json_decode($request->filter);
        $categories = $filterData->categories;
        $brands = $filterData->brands;
        $min_price = $filterData->min_price;
        $max_price = $filterData->max_price;

        // Initialize the query with the Product model and its relations
        $products = Product::with(['productImages', 'category', 'brand'])
            // Filter by categories if provided
            ->when($categories, function ($query, $categories) {
                return $query->whereIn('category_id', $categories);
            })
            // Filter by brands if provided
            ->when($brands, function ($query, $brands) {
                return $query->whereIn('brand_id', $brands);
            })
            // Filter by minimum price if provided
            ->when($min_price, function ($query, $min_price) {
                return $query->where('price', '>=', $min_price);
            })
            // Filter by maximum price if provided
            ->when($max_price, function ($query, $max_price) {
                return $query->where('price', '<=', $max_price);
            })

            ->where('onhand_qty', '>', 0)->get();
        // Return the filtered products, for example as a JSON response
        return response()->json([
            'data' => $products,
           'status' => 200,
        ]);
    }



    public function getFilterData(Request $request)
    {
        $filters = [
            'categories' => Category::all(),
            'brands' => Brand::all(),
        ];
        return response()->json($filters);
    }
}
