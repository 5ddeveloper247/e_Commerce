<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function productIndex(Request $request)
    {
        $pageTitle = "Products";
        return view('admin.products', compact('pageTitle'));
    }

    public function storeProductAjax(Request $request)
    {
        // Check if product_id is present and not null or empty for update operation
        if ($request->has('product_id') && !empty($request->input('product_id'))) {
            // Update existing product
            $product = Product::findOrFail($request->input('product_id'));

            // Validation rules for update
            $request->validate([
                'product_id' => 'required|integer|exists:products,id', // Ensure product_id is valid
                'sku' => 'required|string|max:255|unique:products,sku,' . $product->id, // Exclude the current product from unique check
                'category_id' => 'required|integer|exists:categories,id', // Ensure category_id exists in categories table
                'brand_id' => 'required|integer|exists:brands,id', // Ensure brand_id exists in brands table
                'product_name' => 'required|string|max:255',
                'model_name' => 'nullable|string|max:255',
                'price' => 'required|numeric|min:0',
                'discount_price' => 'nullable|numeric|min:0',
                'weight' => 'nullable|numeric|min:0',
                'onhand_qty' => 'nullable|integer|min:0',
                'description' => 'nullable|string',
                'status' => 'required|in:on,off', // Ensure status is either 'on' or 'off'
            ]);

            // Update the existing product with validated data
            $product->update([
                'sku' => $request->input('sku'),
                'category_id' => $request->input('category_id'),
                'brand_id' => $request->input('brand_id'),
                'product_name' => $request->input('product_name'),
                'model_name' => $request->input('model_name'),
                'price' => $request->input('price'),
                'discount_price' => $request->input('discount_price'),
                'weight' => $request->input('weight'),
                'onhand_qty' => $request->input('onhand_qty'),
                'description' => $request->input('description'),
                'status' => $request->input('status') === 'on' ? 1 : 0, // Store 1 if status is 'on', 0 otherwise
            ]);

            return response()->json(['message' => 'Product updated successfully', 'status' => 200]);
        } else {
            // Create a new product

            // Validation rules for create
            $request->validate([
                'sku' => 'required|string|max:255|unique:products,sku', // Include unique check on all records
                'category_id' => 'required|integer|exists:categories,id', // Ensure category_id exists in categories table
                'brand_id' => 'required|integer|exists:brands,id', // Ensure brand_id exists in brands table
                'product_name' => 'required|string|max:255',
                'model_name' => 'nullable|string|max:255',
                'price' => 'required|numeric|min:0',
                'discount_price' => 'nullable|numeric|min:0',
                'weight' => 'nullable|numeric|min:0',
                'onhand_qty' => 'nullable|integer|min:0',
                'description' => 'nullable|string',
                'status' => 'required|in:on,off', // Ensure status is either 'on' or 'off'
            ]);

            // Create the new product with validated data
            $product = Product::create([
                'sku' => $request->input('sku'),
                'category_id' => $request->input('category_id'),
                'brand_id' => $request->input('brand_id'),
                'product_name' => $request->input('product_name'),
                'model_name' => $request->input('model_name'),
                'price' => $request->input('price'),
                'discount_price' => $request->input('discount_price'),
                'weight' => $request->input('weight'),
                'onhand_qty' => $request->input('onhand_qty'),
                'description' => $request->input('description'),
                'status' => $request->input('status') === 'on' ? 1 : 0, // Store 1 if status is 'on', 0 otherwise
                'created_by' => auth()->id(), // Assuming you are using authentication
            ]);
            return response()->json(['message' => 'Product stored successfully', 'status' => 200]);
        }
    }



    public function deleteProductAjax(Request $request)
    {
        $id = $request->id;
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json(['message' => 'Product deleted successfully', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Product not found', 'status' => 404]);
        }
    }





    public function fetchBrandAjax(Request $request)
    {
        // Fetch all brands from database
        // Return brand data in JSON format
        $brands = Brand::where('status', 1)->get();

        if ($brands) {
            return response()->json([
                'message' => "Brands fetched successfully",
                'status' => 200,
                'data' => $brands
            ]);
        } else {
            return response()->json(['message' => "No brands found", 'status' => 404]);
        }
    }
    public function fetchCategoryAjax(Request $request)
    {
        // Fetch all brands from database
        // Return brand data in JSON format
        $category = Category::where('status', 1)->get();
        if ($category) {
            return response()->json([
                'message' => "Categories fetched successfully",
                'status' => 200,
                'data' => $category
            ]);
        } else {
            return response()->json(['message' => "No categories found", 'status' => 404]);
        }
    }


    public function fetchCategoryByIdAjax(Request $request)
    {
        // Fetch all brands from database
        // Return brand data in JSON format

        $category = Category::where('id', $request->id)->first();
        if ($category) {
            return response()->json([
                'message' => "Categories fetched successfully",
                'status' => 200,
                'category' => $category
            ]);
        } else {
            return response()->json(['message' => "No categories found", 'status' => 404]);
        }
    }
    public function fetchBrandByIdAjax(Request $request)
    {
        // Fetch all brands from database
        // Return brand data in JSON format

        $brand = Brand::where('id', $request->id)->first();
        if ($brand) {
            return response()->json([
                'message' => "brand fetched successfully",
                'status' => 200,
                'brand' => $brand
            ]);
        } else {
            return response()->json(['message' => "No brand found", 'status' => 404]);
        }
    }



    public function ProductAjax(Request $request)
    {
        $products = Product::all();
        $activeProducts = $products->where('status', 1)->count();
        $inactiveProducts = $products->where('status', 0)->count();
        return response()->json(
            [
                'products' => $products,
                'message' => 'Products fetched successfully',
                'status' => 200,
                'total' => $products->count(),
                'acitveProducts' => $activeProducts,
                'inacitveProducts' => $inactiveProducts,
            ]
        );
    }


    public function updateProductStatusAjax(Request $request)
    {
        $id = $request->id;

        // Find the user by ID
        $user = Product::find($id);

        if ($user) {
            // Toggle the status: if 1, set to 0; if 0, set to 1
            $currentStatus = $user->status;
            $user->status = $currentStatus == 1 ? 0 : 1;

            // Save the updated user status
            $user->save();

            // Return success response
            return response()->json(['message' => 'Status updated successfully', 'status' => 200]);
        } else {
            // Return error response if user not found
            return response()->json(['message' => 'User not found', 'status' => 404]);
        }
    }


    public function markAsDiscounted(Request $request)
    {
        $id = $request->discounted_id;
        $discount_value = $request->discounted_value;
        $request->validate([
            'discounted_id' => 'required|integer', // Ensure 'discounted_id' is required and must be an integer
            'discounted_value' => 'required|numeric|between:1,100', // Ensure 'discounted_value' is required, numeric, and between 1 and 99
        ]);
        // Find the user by ID
        $product = Product::find($id);
        if ($product) {
            // Toggle the status: if 1, set to 0; if 0, set to 1
            $product->discount_price = $request->discounted_value;
            // Save the updated user status
            $product->save();

            // Return success response
            return response()->json(['message' => 'Discount updated successfully', 'status' => 200]);
        } else {
            // Return error response if user not found
            return response()->json(['message' => 'Product not found', 'status' => 404]);
        }
    }


    public function markAsFeatured(Request $request)
    {
        // Validate the request
        $request->validate([
            'featured_id' => 'required|integer', // Ensure 'featured_id' is required and must be an integer
        ]);

        $id = $request->input('featured_id');
        $product = Product::find($id);

        if (!$product) {
            // Return error response if product not found
            return response()->json(['message' => 'Product not found', 'status' => 404]);
        }

        // Count the number of currently featured products
        $featuredCount = Product::where('featured', 1)->count();

        if ($product->featured) {
            // If the product is already featured, unmark it
            $product->featured = 0;
        } else {
            // If the product is not featured, check if we can mark it as featured
            if ($featuredCount >= 2) {
                // Return validation error if there are already two featured products
                return response()->json(['message' => 'There can be only two featured products at a time.', 'status' => 422]);
            }
            $product->featured = 1;
        }

        // Save the updated product status
        $product->save();

        // Return success response
        return response()->json(['message' => 'Featured status updated successfully', 'status' => 200]);
    }
}
