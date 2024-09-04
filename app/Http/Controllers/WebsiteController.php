<?php

namespace App\Http\Controllers;

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
            ->with('productImages')
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
}
