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



    public function continueCheckout(Request $request)
    {
        try {
            // Extract request parameters
            $shippingAddress = $request->shipping_address;
            $orderComments = $request->order_comments;
            $userId = $request->user_id;
            // return response()->json([
            //     'user_id' => $userId,
            //     'auth_user_id' => auth()->user()->id,
            // ]);

            // Check if the authenticated user is the same as the provided user ID
            if (!$request->user_id) {
                return response()->json([
                    'message' => 'Unauthorized: Invalid user',
                    'status' => 401
                ], 401);
            }

            // Ensure shipping address and user ID are provided
            if (!$shippingAddress || !$userId) {
                return response()->json([
                    'message' => 'Bad request: Missing required parameters',
                    'status' => 400
                ], 400);
            }

            // Fetch the active shipping address
            $shippingAddressActive = ShippingAddress::find($shippingAddress);
            if (!$shippingAddressActive) {
                return response()->json([
                    'message' => 'Shipping address not found',
                    'status' => 404
                ], 404);
            }

            // Fetch user's cart
            $cart = Cart::where('user_id', auth()->user()->id)
                ->where('status', 0)
                ->first();

            if (!$cart) {
                return response()->json([
                    'message' => 'Cart not found',
                    'status' => 404
                ], 404);
            }

            // Create a new order
            $order = new Order();
            $order->user_id = $userId;
            $order->date = now();
            $order->status = 0;
            $order->save();

            // Fetch cart details and create corresponding order details
            $cartDetails = CartDetail::where('cart_id', $cart->id)->get();
            if ($cartDetails->isEmpty()) {
                return response()->json([
                    'message' => 'No items found in the cart',
                    'status' => 400
                ], 400);
            }

            foreach ($cartDetails as $item) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $item->product_id;
                $orderDetail->quantity = $item->quantity;
                $orderDetail->price = $item->price;
                $orderDetail->total_amount = $item->total_amount;
                $orderDetail->discounted_price = $item->discounted_price;
                $orderDetail->save();
            }

            // Create a new order shipping address
            $orderShippingAddress = new OrderShippingAddress();
            $orderShippingAddress->order_id = $order->id;
            $orderShippingAddress->shipping_address_id = $shippingAddressActive->id;
            $orderShippingAddress->name = $shippingAddressActive->name;
            $orderShippingAddress->email = $shippingAddressActive->email;
            $orderShippingAddress->phone_number = $shippingAddressActive->phone_number;
            $orderShippingAddress->address = $shippingAddressActive->address;
            $orderShippingAddress->country_id = $shippingAddressActive->country_id;
            $orderShippingAddress->city_id = $shippingAddressActive->city_id;
            $orderShippingAddress->state_id = $shippingAddressActive->state_id;
            $orderShippingAddress->save();

            // Create order payment
            $orderPayment = new OrderPayment();
            $orderPayment->order_id = $order->id;
            $orderPayment->user_id = auth()->user()->id;
            $orderPayment->status = 0;  // Payment pending
            $orderPayment->save();

            // Return success response
            return response()->json([
                'message' => 'Order successfully created',
                'status' => 200,
                'order_id' => $order->id
            ], 200);
        } catch (\Exception $e) {
            // Handle exceptions and return error response
            return response()->json([
                'message' => 'An error occurred: ' . $e->getMessage(),
                'status' => 500
            ], 500);
        }
    }
}
