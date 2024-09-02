<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductSpecification;;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function showProducts(Request $request)
    {
        $pageTitle = "Products";
        return view('admin.products', compact('pageTitle'));
    }

    public function getProducts(Request $request)
    {
        // Fetch the requested flags from the request
        $includeCategories = $request->input('includeCategories', false);
        $includeBrands = $request->input('includeBrands', false);
        $includeTotals = $request->input('includeTotals', false);

        // Fetch products
        $products = Product::all();

        // Calculate totals if requested
        $totalProducts = $includeTotals ? $products->count() : null;
        $activeProducts = $includeTotals ? $products->where('status', 1)->count() : null;
        $inactiveProducts = $includeTotals ? $products->where('status', 0)->count() : null;

        // Fetch categories and brands if requested
        $categories = $includeCategories ? Category::all() : null;
        $brands = $includeBrands ? Brand::all() : null;

        return response()->json([
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
            'message' => 'Products fetched successfully',
            'status' => 200,
            'total' => $totalProducts,
            'activeProducts' => $activeProducts,
            'inactiveProducts' => $inactiveProducts,
        ]);
    }

    public function storeProduct(ProductRequest $request)
    {
        // Check if product_id is present and not null or empty for update operation
        if ($request->has('product_id') && !empty($request->input('product_id'))) {
            return $this->updateExistingProduct($request);
        } else {
            return $this->storeNewProduct($request);
        }
    }

    protected function storeNewProduct(ProductRequest $request)
    {

        $request->validate([
            'sku' => 'required|string|max:50,unqiue:products,sku', // Consider whether 'sku' should be an integer or a string with max length
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'model_name' => 'required|string|max:255',
            'price' => 'required|numeric', // Use 'numeric' instead of 'float'
            'discount_price' => 'required|numeric',
            'weight' => 'required|numeric',
            'onhand_qty' => 'required|numeric',
            'description' => 'required|string|max:3000',
        ]);

        // Create the new product with validated data
        $product = Product::create([
            'sku' => $request->input('sku'),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'product_name' => $request->input('product_name'),
            'model_name' => $request->input('model_name'),
            'video_url' => $request->input('video_url'),
            'price' => $request->input('price'),
            'discount_price' => $request->input('discount_price'),
            'weight' => $request->input('weight'),
            'onhand_qty' => $request->input('onhand_qty'),
            'description' => $request->input('description'),
            // 'is_offered' => $request->input('is_offered'),
            // 'featured' => $request->input('featured'),
            // 'status' => $request->input('status'),
            // 'offered_percentage' => $request->input('offered_percentage'),
            // 'created_by' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Product stored successfully',
            'status' => 200,
            'product_id' => $product->id,
        ]);
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

    protected function updateExistingProduct(ProductRequest $request)
    {

        // Find the product by ID
        $product = Product::findOrFail($request->input('product_id'));

        // Prepare the update data
        $updateData = $request->only([
            'sku',
            'category_id',
            'brand_id',
            'product_name',
            'model_name',
            'video_url',
            'price',
            'discount_price',
            'weight',
            'onhand_qty',
            'description',
            'is_offered',
            'featured',
            'status',
            'offered_percentage',
        ]);

        $product->update($updateData);

        // Update the 'updated_by' field
        $product->update(['updated_by' => auth()->id()]);

        $includeTotals = $request->input('includeTotals', false);

        if ($includeTotals) {
            // Fetch products
            $products = Product::all();
        }

        // Calculate totals if requested
        $totalProducts = $includeTotals ? $products->count() : null;
        $activeProducts = $includeTotals ? $products->where('status', 1)->count() : null;
        $inactiveProducts = $includeTotals ? $products->where('status', 0)->count() : null;

        return response()->json([
            'message' => 'Product updated successfully',
            'status' => 200,
            'product_id' => $product->id,
            'total' => $totalProducts,
            'activeProducts' => $activeProducts,
            'inactiveProducts' => $inactiveProducts,
        ]);
    }

    public function getProductImages(Request $request)
    {
        $productId = $request->query('product_id');

        // Fetch images for the specified product
        $productImages = ProductImage::where('product_id', $productId)->get();

        if (!$productImages) {
            return response()->json(['status' => 404, 'message' => 'Product not found.'], 404);
        }

        $responseImages = $productImages->map(function ($image) {
            return [
                'id' => $image->id,
                'filepath' => $image->filepath,
            ];
        });

        return response()->json(['status' => 200, 'images' => ['image' => $responseImages]]);
    }

    public function storeProductImages(Request $request)
    {
        // Validation rules for image upload
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'product_images.*' => 'image|mimes:jpeg,png,ico|max:500048'
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
                    $productImages[] = $productImage;
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Images uploaded successfully',
                    'data' => [
                        'product_id' => $product->id,
                        'image_count' => count($imageIds),
                        'image_ids' => $imageIds,
                        'productImages' => $productImages,
                    ]
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No images provided'
                ], 400);
            }
        } catch (Exception $e) {
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

    public function deleteProduct(Request $request)
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

    public function getBrands(Request $request)
    {
        // Fetch all brands from database
        $brands = Brand::where('status', 1)->get();

        if ($brands) {
            return response()->json([
                'message' => "Brands fetched successfully",
                'status' => 200,
                'data' => $brands,
            ]);
        } else {
            return response()->json(['message' => "No brands found", 'status' => 404]);
        }
    }

    public function getBrand(Request $request, $id)
    {
        // Fetch brand by ID from database
        $brand = Brand::find($id);

        if ($brand) {
            return response()->json([
                'message' => "Brand fetched successfully",
                'status' => 200,
                'brand' => $brand,
            ]);
        } else {
            return response()->json(['message' => "No brand found", 'status' => 404]);
        }
    }

    public function getCategories(Request $request)
    {
        // Fetch all categories from database
        $categories = Category::where('status', 1)->get();

        if ($categories) {
            return response()->json([
                'message' => "Categories fetched successfully",
                'status' => 200,
                'data' => $categories,
            ]);
        } else {
            return response()->json(['message' => "No categories found", 'status' => 404]);
        }
    }

    public function getCategory(Request $request, $id)
    {
        // Fetch category by ID from database
        $category = Category::find($id);

        if ($category) {
            return response()->json([
                'message' => "Category fetched successfully",
                'status' => 200,
                'category' => $category,
            ]);
        } else {
            return response()->json(['message' => "No category found", 'status' => 404]);
        }
    }

    public function getProductSpecifications(Request $request)
    {
        // Find the product by ID
        $product = Product::with('productSpecifications')->findOrFail($request->input('product_id'));

        $productSpecifications = $product->productSpecifications->count();

        return response()->json([
            'productSpecifications' => $productSpecifications,
            'message' => 'Product specifications fetched successfully',
            'status' => 200
        ]);
    }

    public function storeProductSpecifications(Request $request)
    {
        // Validate the request data using $request->validate
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'specification' => 'nullable|string|max:255',
            'sub_specification' => 'nullable|string|max:255',
            'unit' => 'nullable|string|max:50',
            'value' => 'nullable|string|max:255',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($validatedData['product_id']);

        // Create the product specification
        $specification = ProductSpecification::create([
            'product_id' => $product->id,
            'specification' => $validatedData['specification'],
            'sub_specification' => $validatedData['sub_specification'],
            'key' => $validatedData['unit'],
            'value' => $validatedData['value'],
        ]);

        // Return success response
        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Specification added successfully.',
            'productSpecifications' => $specification
        ], 200);
    }
}
