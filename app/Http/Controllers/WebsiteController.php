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
use App\Models\Enquiry;
use App\Models\OrderDetail;
use App\Models\OrderPayment;
use App\Models\ShippingAddress;
use App\Models\EnquiryMessages;
use App\Models\EnquiryAttachments;
use App\Models\Rating;


class WebsiteController extends Controller
{

    public function __construct() {}

    public function home(Request $request)
    {
        $data['pageTitle'] = 'Dashboard';

        return view('website.home')->with($data);
    }

    public function siteSearch(Request $request)
    {
        // Sanitize the input
        $searchQuery = filter_var($request->input('searchQuery'), FILTER_SANITIZE_STRING);
        if ($searchQuery == '') {
            return response()->json(['status' => 400, 'message' => 'Search query is required.']);
        }
        // Perform search with partial matching using LIKE
        $products = Product::where('status', 1)
            ->where('product_name', 'LIKE', '%' . $searchQuery . '%')
            ->with(['productImages', 'category', 'productSpecifications', 'brand', 'productFeatures'])
            ->get();

        // Return response
        return response()->json(['status' => 200, 'products' => $products]);
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
        $products = Product::where('status', 1)
            ->with(['productImages', 'category', 'ratings' => function ($query) {
                $query->where('status', 1); // Only fetch ratings with status 1
            }])
            ->get();

        if ($products->isNotEmpty()) {
            return response()->json([
                'status' => 200,
                'message' => 'Products fetched successfully',
                'data' => $products
            ]);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'No products found'
            ]);
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
        // Check if category is set and get the corresponding category details
        if (isset($category)) {
            $productCategory = str_replace('-', ' ', $category);
            $categoryDetail = Category::where('category_name', $productCategory)->first();

            // If category is not found, return a 404
            if (!$categoryDetail) {
                return abort(404);
            }
        } else {
            return abort(404);
        }

        // Check if SKU is set and fetch the product details
        if (isset($sku)) {
            $product = Product::where('status', 1)
                ->where('sku', $sku)
                ->with([
                    'productImages',
                    'category',
                    'productSpecifications',
                    'brand',
                    'productFeatures',
                    'ratings' => function ($query) {
                        $query->where('status', 1) // Only include ratings with status 1
                            ->with(['user' => function ($query) {
                                $query->where('status', 1); // Only include user details with status 1
                            }]);
                    },
                ])
                ->first();


            // If product is not found, return a 404
            if (!$product) {
                return abort(404);
            }
        } else {
            return abort(404);
        }



        // Fetch related specifications and features
        $specifications = ProductSpecification::where('product_id', $product->id)->get();
        $features = ProductFeature::where('product_id', $product->id)->get();

        // Fetch related products within the same category
        $relatedProducts = Product::where('category_id', $categoryDetail->id)
            ->where('status', 1)
            ->with([
                'productImages',
                'category',
                'productSpecifications',
                'brand',
                'productFeatures',
                'ratings' => function ($query) {
                    $query->where('status', 1); // Only include ratings with status 1
                }
            ])
            ->get();


        // Return the product detail view with the fetched data
        // dd($product);
        return view('website.product_detail', [
            'product' => $product,
            'specifications' => $specifications,
            'features' => $features,
            'relatedProducts' => $relatedProducts
        ]);
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

        // Quantity check starts here
        $cart = null;
        // Check if the user is authenticated or the request contains a cart_id
        if (Auth::check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->where('status', 0)->first();
        } elseif ($request->has('cart_id') && $request->cart_id !== null) {
            $cart = Cart::where('id', $request->cart_id)->where('status', 0)->first();
        }

        // Calculate the total quantity of the product in the cart (existing + new quantity)
        $totalCartQuantity = $quantity; // Start with the new quantity
        if ($cart) {
            $cartDetail = CartDetail::where('cart_id', $cart->id)
                ->where('product_id', $product_id)
                ->first();

            if ($cartDetail) {
                $totalCartQuantity += $cartDetail->quantity; // Add existing cart quantity
            }
        }

        // Check if the total quantity exceeds the available stock
        if ($totalCartQuantity > $product->onhand_qty) {
            return response()->json([
                'status' => 400,
                'message' => 'We apologize for the inconvenience. The requested product quantity is currently out of stock.'

            ]);
        }

        // Handle cases where available stock is low or out of stock
        if ($product->onhand_qty <= 0) {
            return response()->json([
                'status' => 400,
                'message' => 'We apologize for the inconvenience. The requested product quantity is currently out of stock.'
            ]);
        }

        // Price and discount logic
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
        } elseif ($request->has('cart_id') && $request->cart_id !== null) {
            $cart = Cart::where('id', $request->cart_id)->where('status', 0)->first();
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
        // Check if the user is authenticated
        if (Auth::check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->where('status', 0)->first();
            $wishlist = WishList::where('user_id', auth()->user()->id)->count();
        } else {
            if ($request->has('cart_id') && $request->cart_id !== null) {
                $cart = Cart::where('id', $request->cart_id)->where('status', 0)->first();
            } else {
                return response()->json(['status' => 404, 'message' => 'Cart not found']);
            }

            // Set wishlist count to 0 for guest users
            $wishlist = 0;
        }

        // Check if the cart exists
        if ($cart) {
            // Fetch cart details with product relationships
            $cartDetails = CartDetail::where('cart_id', $cart->id)
                ->with(['product' => function ($query) {
                    $query->with(['productImages', 'category']);
                }])->get();

            // Return cart details and wishlist count
            return response()->json([
                'status' => 200,
                'data' => $cartDetails,
                'cart_id' => $cart->id,
                'wishlist' => $wishlist,
            ]);
        }

        // If cart doesn't exist, return an error response
        return response()->json(['status' => 404, 'message' => 'Cart Detail not found']);
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
                ->with([
                    'user',
                    'orderDetails',
                    'orderDetails.product.productImages',
                    'shippingAddress',
                    'orderPayment',
                    'status',
                    'orderDetails.product.ratings'
                ])
                ->orderBy('created_at', 'desc') // Sort by created_at in descending order
                ->first();


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
                ->orderBy('created_at', 'desc') // Order by latest created orders
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
        $product = Product::with(['productImages', 'category', 'brand', 'ratings'])->find($productId);
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
        $categories = $filterData->categories ?? null;
        $brands = $filterData->brands ?? null;
        $min_price = $filterData->min_price ?? null;
        $max_price = $filterData->max_price ?? null;

        // Initialize the query with the Product model and its relations, ensuring status = 1
        $products = Product::with(['productImages', 'category', 'brand'])
            // Always enforce active status
            ->where('status', 1)
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
            // Only return products that are in stock
            ->where('onhand_qty', '>', 0)
            ->get();

        // Return the filtered products, or all active products if no filters applied
        return response()->json([
            'data' => $products,
            'status' => 200,
        ]);
    }




    public function getFilterData(Request $request)
    {
        $filters = [
            'categories' => Category::where('status', 1)->get(),
            'brands' => Brand::where('status', 1)->get(),
        ];
        return response()->json($filters);
    }



    public function inquiriesIndex(Request $request)
    {
        if ($request->has('inquiryid')) {
            $inquiry = Enquiry::where('id', $request->inquiryid)
                ->where('user_id', Auth::user()->id)
                ->with(['enquiryMessage.enquiryAttachments', 'user', 'enquiryMessage.source', 'enquiryMessage.sourceFrom'])
                ->first();  // Retrieve the first matching record
            return response()->json([
                'inquiry' => $inquiry,
                'status' => 200,
                'id' => $request->inquiryId
            ]);
        }

        $inquiries = Enquiry::with(['enquiryMessage.enquiryAttachments', 'user', 'enquiryMessage.source', 'enquiryMessage.sourceFrom'])
            ->where('user_id', Auth::user()->id)
            ->get();
        return response()->json([
            'inquiries' => $inquiries,
            'status' => 200,
        ]);
    }


    public function inquiriesCreate(Request $request)
    {
        // Validate the incoming request
        $files = $request->file('files'); // Retrieve the files
        $request->validate([
            'enquiry_title' => 'required|string|max:255',
            'enquiry_fullName' => 'required|string|max:255',
            'enquiry_email' => 'required|email|max:255',
            'enquiry_phoneNumber' => 'required|numeric',
            'enquiry_description' => 'required|string|max:1000',
        ]);

        // Create a new enquiry
        $enquiry = Enquiry::create([
            'user_id' => Auth::id(), // Authenticated user ID
            'title' => $request->enquiry_title,
            'name' => $request->enquiry_fullName,
            'email' => $request->enquiry_email,
            'phone' => $request->enquiry_phoneNumber,
            'description' => $request->enquiry_description,
            'status' => 1, // Status set to 1 (pending or active)
        ]);

        // Create an enquiry message
        $enquiryMessage = EnquiryMessages::create([
            'enquiry_id' => $enquiry->id,
            'message' => $request->enquiry_description,
            'source_id' => Auth::user()->id,
            'source_from' => Auth::user()->id,
        ]);

        // Handle file uploads if files are provided
        if ($files && is_array($files)) {
            foreach ($files as $file) {
                // Move the file to the public/enquiry directory
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('enquiry'), $fileName);
                $path = 'enquiry/' . $fileName; // File path to be stored in the database

                // Save the file information in EnquiryAttachments table
                EnquiryAttachments::create([
                    'enquirymessage_id' => $enquiryMessage->id,
                    'filepath' => $path,
                    'filetype' => $file->getClientMimeType(), // Get the MIME type of the file
                ]);
            }
        }

        // Check if enquiry was successfully created
        if ($enquiry) {
            return response()->json([
                'status' => 200,
                'message' => 'Enquiry created successfully',
                'enquiry' => $enquiry,
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Failed to create enquiry',
            ]);
        }
    }




    public function enquiryMessageCreate(Request $request)
    {
        $files = $request->file('files'); // Retrieve the files
        // Create the enquiry message
        $enquiryMessage = EnquiryMessages::create([
            'enquiry_id' => $request->inquiryid,
            'message' => $request->inquirymessage,
            'source_id' => Auth::user()->id,
            'source_from' => Auth::user()->id,
        ]);

        // Check if files are provided and process each file
        if ($files) {
            // If it's not an array, convert it to an array for consistency
            $files = is_array($files) ? $files : [$files];

            foreach ($files as $file) {
                // Move the file to the public/enquiry directory
                $fileName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('enquiry'), $fileName);
                $path = 'enquiry/' . $fileName; // File path to be stored in the database

                // Save the file information in EnquiryAttachments table
                EnquiryAttachments::create([
                    'enquirymessage_id' => $enquiryMessage->id,
                    'filepath' => $path,
                    'filetype' => $file->getClientMimeType(), // Get the MIME type of the file
                ]);
            }
        }

        // Return success response
        if ($enquiryMessage) {
            return response()->json([
                'status' => 200,
                'message' => 'Message sent successfully',
                'enquiryMessage' => $enquiryMessage,
            ]);
        }

        // Return error response if the message creation failed
        return response()->json([
            'status' => 400,
            'message' => 'Failed to send message',
        ]);
    }






    //for testing purpose for admin inquiries
    public function demoIndex(Request $request)
    {
        $pageTitle = 'Demo Page';
        return view('admin.demo', compact('pageTitle'));
    }


    public function reviewStore(Request $request)
    {
        $product_id = $request->input('product_id');
        $review_text = $request->input('review');
        $rating = $request->input('rating');

        if ($product_id && $review_text && $rating) {
            $review = Rating::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'product_id' => $product_id,
                ],
                [
                    'rating' => $rating,
                    'review' => $review_text,
                ]
            );

            return response()->json([
                'status' => 200,
                'message' => 'Review saved successfully',
            ]);
        }

        return response()->json([
            'status' => 400,
            'message' => 'Oops! Something went wrong, some important data might be missing.',
        ]);
    }
}
