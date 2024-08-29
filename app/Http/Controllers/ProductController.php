<?php

namespace App\Http\Controllers;

use Log;
use Storage;
use Exception;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
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
                'price' => 'required|numeric|min:0',
                'discount_price' => 'nullable|numeric|min:0',
                'weight' => 'nullable|numeric|min:0',
                'onhand_qty' => 'nullable|integer|min:0',
                'description' => 'nullable|string',
                'status' => 'nullable|in:on,off', // Ensure status is either 'on' or 'off'
            ]);
    
            // Update the existing product with validated data
            $product->update([
                'sku' => $request->input('sku'),
                'category_id' => $request->input('category_id'),
                'brand_id' => $request->input('brand_id'),
                'product_name' => $request->input('product_name'),
                'price' => $request->input('price'),
                'discount_price' => $request->input('discount_price'),
                'weight' => $request->input('weight'),
                'onhand_qty' => $request->input('onhand_qty'),
                'description' => $request->input('description'),
                'status' => $request->input('status') === 'on' ? 1 : 0, // Store 1 if status is 'on', 0 otherwise
            ]);
    
            return response()->json([
                'message' => 'Product updated successfully',
                'status' => 200,
                'product_id' => $product->id // Return the product ID
            ]);
        } else {
            // Create a new product

            // Validation rules for create
            $request->validate([
                'sku' => 'required|string|max:255|unique:products,sku', // Include unique check on all records
                'category_id' => 'required|integer|exists:categories,id', // Ensure category_id exists in categories table
                'brand_id' => 'required|integer|exists:brands,id', // Ensure brand_id exists in brands table
                'product_name' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'discount_price' => 'nullable|numeric|min:0',
                'weight' => 'nullable|numeric|min:0',
                'onhand_qty' => 'nullable|integer|min:0',
                'description' => 'nullable|string',
                'status' => 'nullable|in:on,off', // Ensure status is either 'on' or 'off'
            ]);
    
            // Create the new product with validated data
            $product = Product::create([
                'sku' => $request->input('sku'),
                'category_id' => $request->input('category_id'),
                'brand_id' => $request->input('brand_id'),
                'product_name' => $request->input('product_name'),
                'price' => $request->input('price'),
                'discount_price' => $request->input('discount_price'),
                'weight' => $request->input('weight'),
                'onhand_qty' => $request->input('onhand_qty'),
                'description' => $request->input('description'),
                'status' => $request->input('status') === 'on' ? 1 : 0, // Store 1 if status is 'on', 0 otherwise
                'created_by' => auth()->id(), // Assuming you are using authentication
            ]);
    
            return response()->json([
                'message' => 'Product stored successfully',
                'status' => 200,
                'product_id' => $product->id
            ]);
        }
    }

    public function getProductImages(Request $request)
    {
        $productId = $request->query('product_id');

        // Fetch images for the specified product
        $productImages = ProductImage::where('product_id',$productId)->get();

        if (!$productImages) {
            return response()->json(['status' => 404, 'message' => 'Product not found.'], 404);
        }

        $responseImages = $productImages->map(function ($image) {
            return [
                'id' => $image->id,
                'filepath' => $image->filepath
            ];
        });

        return response()->json(['status' => 200, 'images' => ['image' => $responseImages]]);
    }
    

    public function storeProductImages(Request $request) 
    {
        // Validation rules for image upload
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'product_images.*' => 'image|mimes:jpeg,png,ico|max:2048'
        ]);
    
        // Find the product by ID
        $product = Product::find($request->input('product_id'));
    
        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product not found'
            ], 404);
        }
    
        try {
            if ($request->hasFile('product_images')) {
                // Create a unique folder for the product
                $productFolder = 'product_images/' . $product->id;
    
                // Array to store image IDs
                $imageIds = [];
    
                // Upload and save new photos
                foreach ($request->file('product_images') as $photo) {
                    $photoName = time() . '_' . $photo->getClientOriginalName();
                    $photoPath = $photo->storeAs($productFolder, $photoName, 'public');
    
                    // Save each new photo path in the ProductImage table and get the ID
                    $productImage = ProductImage::create([
                        'product_id' => $product->id,
                        'filename' => $photoName,
                        'filepath' => $photoPath,
                    ]);
    
                    // Store the image ID in the array
                    $imageIds[] = $productImage->id;
                }
    
                return response()->json([
                    'success' => true,
                    'message' => 'Images uploaded successfully',
                    'data' => [
                        'product_id' => $product->id,
                        'image_count' => count($imageIds),
                        'image_ids' => $imageIds
                    ]
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No images provided'
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while uploading images',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
    
    public function deleteProductImages(Request $request)
    {
        try {
            // Get the ID of the product image to be removed from the request data
            $imageId = $request->input('id');
            $productImage = ProductImage::find($imageId);

            if ($productImage) {
                // Delete the image file from storage
                Storage::disk('public')->delete($productImage->filepath);

                // Delete the image record from the database
                $productImage->delete();

                return response()->json(['message' => 'Image removed successfully', 'status' => 200]);
            } else {
                return response()->json(['message' => 'Image not found', 'status' => 404]);
            }
        } catch (Exception $e) {
            Log::error('Error removing product image: ' . $e->getMessage());
            return response()->json(['message' => 'Something went wrong. Please try again.', 'status' => 500]);
        }
    }

    public function storeProductVideo(Request $request)
    {
        // Find the product by ID
        $product = Product::findOrFail($request->input('product_id'));

        // Validate the request
        $request->validate([
            'video_url' => ['nullable', 'url', 'regex:/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/']
        ], [
            'video_url.regex' => 'The video URL must be a valid YouTube link.'
        ]);

        // Update the product's video URL
        $product->video_url = $request->input('video_url');
        $product->save();

        return response()->json(['success' => true, 'message' => 'Product video url added successfully', 'status' => 200]);
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
