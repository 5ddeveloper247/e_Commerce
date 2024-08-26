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
        // Define validation rules
        $request->validate([
            'sku' => 'required|string|max:255|unique:products,sku',
            'category_id' => 'required|integer|exists:categories,id', // Assuming you have a 'categories' table
            'brand_id' => 'required|integer|max:255',
            'product_name' => 'required|string|max:255',
            'model_name' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'discount_price' => 'nullable|numeric|min:0',
            'weight' => 'nullable|numeric|min:0',
            'onhand_qty' => 'nullable|integer|min:0',
            'description' => 'nullable|string',
            'status' => 'required|in:on,off', // Assuming 'status' is a boolean        ];
        ]);
        // Validate the request data

        // Create a new product record
        $product = Product::create([
            'sku' => $request->input('sku'),
            'category_id' => $request->input('category_id'),
            'brand_name' => $request->input('brand_id'),
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
}
