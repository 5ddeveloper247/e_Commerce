<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\ProductSpecification;
use App\Models\ProductFeature;

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
        $products = Product::with(['category', 'brand'])->get();

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
            'sku' => 'required|string|max:50|unique:products,sku', // Corrected unique rule
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'model_name' => 'required|string|max:255',
            'price' => 'required|numeric', // Use 'numeric' to validate floats
            'discount_price' => 'required|numeric',
            'weight' => 'required|numeric',
            'onhand_qty' => 'required|numeric',
            'description' => 'nullable|string|max:3000',
            'productExtraInfo' => 'nullable|string|max:3000',
        ]);

        // Create the new product with validated data
        $product = Product::create([
            'sku' => $request->input('sku'),
            'category_id' => $request->input('category_id'),
            'brand_id' => $request->input('brand_id'),
            'product_name' => $request->input('product_name'),
            'model_name' => $request->input('model_name'),
            'video_url' => $request->input('video_url'), // Assuming this is optional, handle accordingly
            'price' => $request->input('price'),
            'discount_price' => $request->input('discount_price'),
            'weight' => $request->input('weight'),
            'onhand_qty' => $request->input('onhand_qty'),
            'description' => $request->input('description'),
            'extra_info' => $request->input('productExtraInfo'),
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


        $request->validate([
            'product_id' => 'required|exists:products,id', // Ensure the product exists
            'sku' => 'required|string|max:50|unique:products,sku,' . $request->input('product_id'), // Corrected unique rule with ignore
            'product_name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'brand_id' => 'required|integer|exists:brands,id',
            'model_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'discount_price' => 'required|numeric',
            'weight' => 'required|numeric',
            'onhand_qty' => 'required|numeric',
            'description' => 'nullable|string|max:3000',
            'productExtraInfo' => 'nullable|string|max:3000',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($request->input('product_id'));

        // Prepare the update data
        $extra_info = $request->productExtraInfo;
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

        // Update the product and the 'updated_by' field in one call
        $product->update(array_merge($updateData, ['updated_by' => auth()->id(),'extra_info'=>$extra_info]));

        // Calculate totals if requested
        $includeTotals = $request->input('includeTotals', false);
        $totalProducts = null;
        $activeProducts = null;
        $inactiveProducts = null;

        if ($includeTotals) {
            // Fetch products and calculate totals
            $products = Product::all();
            $totalProducts = $products->count();
            $activeProducts = $products->where('status', 1)->count();
            $inactiveProducts = $products->where('status', 0)->count();
        }

        return response()->json([
            'message' => 'Product updated successfully',
            'status' => 200,
            'product_id' => $product->id,
            'total' => $totalProducts,
            'activeProducts' => $activeProducts,
            'inactiveProducts' => $inactiveProducts,
        ]);
    }


    public function getSpecificProductDetail(Request $request)
    {
        $product_id = $request->product_id;

        $product_detail = Product::where('id', $product_id)->with(['productImages', 'productSpecifications', 'productFeatures'])->first();
        if ($product_detail) {
            $data['product_detail'] = $product_detail;
            return response()->json(['status' => 200, 'message' => "", 'data' => $data]);
        } else {
            return response()->json(['status' => 402, 'message' => "Job not found..."]);
        }
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
            'product_images.*' => 'image|max:50080',
            'video_url' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if (!preg_match('/^(https?\:\/\/)?(www\.youtube\.com|youtu\.be)\/.+$/', $value)) {
                        $fail('The ' . $attribute . ' must be a valid YouTube URL.');
                    }
                },
            ]
        ]);

        // Find the product by ID
        $product = Product::find($request->input('product_id'));

        if (!$product) {
            return response()->json([
                'status' => 400,
                'message' => 'Product not found'
            ], 404);
        }

        try {
            // Save video URL if provided
            if ($request->video_url != '') {
                $product->video_url = $request->video_url;
                $product->save();
            }

            if ($request->hasFile('product_images')) {
                // Define the folder path in the public directory
                $productFolder = 'public/product_images/' . $product->id;

                // Ensure the folder exists in the public directory
                if (!file_exists($productFolder)) {
                    mkdir($productFolder, 0755, true);
                }

                // Array to store image IDs
                $imageIds = [];

                // Upload and save new photos directly in the public directory
                foreach ($request->file('product_images') as $photo) {
                    $photoName = time() . '_' . $photo->getClientOriginalName();

                    // Move the file to the public directory
                    $photo->move($productFolder, $photoName);

                    // Save each new photo path in the ProductImage table
                    $productImage = ProductImage::create([
                        'product_id' => $product->id,
                        'filename' => $photoName,
                        'filepath' => 'product_images/' . $product->id . '/' . $photoName, // Path relative to the public directory
                    ]);

                    // Store the image ID in the array
                    $imageIds[] = $productImage->id;
                }
            }

            return response()->json([
                'status' => 200,
                'message' => 'Product media successfully saved',
                'image_ids' => $imageIds, // Return image IDs for confirmation if needed
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'status' => 500,
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
            'specification' => 'required|string|max:255',
            'sub_specification' => 'required|string|max:255',
            'unit' => 'required|string|max:50',
            'value' => 'required|string|max:255',
        ]);

        // Find the product by ID
        $product = Product::findOrFail($validatedData['product_id']);

        if ($request->specification_id == '') {
            $specification = new ProductSpecification();
        } else {
            $specification = ProductSpecification::where('id', $request->specification_id)->first();
        }
        $specification->product_id = $product->id;
        $specification->specification = $request->specification;
        $specification->sub_specification = $request->sub_specification;
        $specification->key = $request->unit;
        $specification->value = $request->value;
        $specification->save();


        // Return success response
        if ($request->specification_id == '') {
            return response()->json(['status' => 200, 'message' => 'Specification Added Successfully']);
        } else {
            return response()->json(['status' => 200, 'message' => 'Specification Updated Successfully']);
        }
    }

    public function deleteSpecification(Request $request)
    {
        $product = ProductSpecification::where('id', $request->specification_id)->delete();
        return response()->json(['status' => 200, 'message' => 'Specification Deleted Successfully']);
    }


    public function storeProductFeature(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'product_id' => 'required|exists:products,id',
            'feature_title' => 'required|string|max:255',
            'feature_description' => 'required|string|max:1500',
            'feature_image' => 'required|image|max:10048',
        ]);

        // Determine whether to create a new feature or update an existing one
        $feature = $request->feature_id ? ProductFeature::findOrFail($request->feature_id) : new ProductFeature();

        // Assign feature details
        $feature->product_id = $request->product_id;
        $feature->title = $request->feature_title;
        $feature->description = $request->feature_description;
        $feature->save();

        // Handle image file upload
        if ($request->hasFile('feature_image')) {
            // Delete old image if it exists
            if ($feature->filepath) {
                unlink(public_path($feature->filepath));
            }

            $folder = 'product_feature_images/' . $request->product_id;
            $file = $request->file('feature_image');
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Move the file to the public directory
            $file->move(public_path($folder), $fileName);

            // Set the filepath relative to the public directory
            $filePath = "$folder/$fileName";

            $feature->filename = $file->getClientOriginalName();
            $feature->filepath = $filePath;
            $feature->save();
        }

        // Return success response
        $message = $request->feature_id ? 'Feature Updated Successfully' : 'Feature Added Successfully';
        return response()->json(['status' => 200, 'message' => $message]);
    }

    public function deleteProductFeature(Request $request)
    {
        $feature = ProductFeature::where('id', $request->feature_id)->first();
        if ($feature->filepath != null) {
            Storage::disk('public')->delete($feature->filepath);
        }
        ProductFeature::where('id', $request->feature_id)->delete();
        return response()->json(['status' => 200, 'message' => 'Feature Deleted Successfully']);
    }

    public function markProductStatus(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        if (!$product) {
            return response()->json(['message' => 'Product not found', 'status' => 404]);
        }

        $productImages = ProductImage::where('product_id', $product->id)->get();
        if ($product->status == 0) {
            if ($productImages->isEmpty()) {
                return response()->json(['message' => 'You cannot activate the status of this product. Product images not found; please add at least 1 image.', 'status' => 404]);
            }
        }

        if ($product->status == '1') {
            $product->status = '0';
            $product->save();
            return response()->json(['status' => 200, 'message' => 'Product Marked In-Active Successfully.']);
        } else {
            $product->status = '1';
            $product->save();
            return response()->json(['status' => 200, 'message' => 'Product Marked Active Successfully.']);
        }
    }

    public function changeProductOfferedStatus(Request $request)
    {
        $product_id = $request->product_id;
        $offered_flag = $request->offered_flag;
        $offered_percentage = $request->offered_percentage;

        $product = Product::where('id', $request->product_id)->first();

        if ($offered_flag == 1) {
            $offeredCount = Product::where('is_offered', 1)->count();
            if ($offeredCount >= 2) {
                return response()->json(['status' => 400, 'message' => 'Already two products marked as offered, cannot add more than 2 products as Offered.']);
            }
        }
        $product->is_offered = $offered_flag;
        $product->offered_percentage = $offered_percentage;
        $product->save();

        if ($offered_flag == '1') {
            return response()->json(['status' => 200, 'message' => 'Product Mark as Offered Successfully.']);
        } else {
            return response()->json(['status' => 200, 'message' => 'Product Removed From Offered Successfully.']);
        }
    }

    public function changeProductFeaturedStatus(Request $request)
    {
        $product_id = $request->product_id;

        $product = Product::where('id', $request->product_id)->first();

        if ($product->featured == '1') {
            $product->featured = '0';
        } else {
            $product->featured = '1';
        }
        $product->save();



        if ($product->featured == '1') {
            return response()->json(['status' => 200, 'message' => 'Product Mark as Featured Successfully.']);
        } else {
            return response()->json(['status' => 200, 'message' => 'Product Removed From Featured Successfully.']);
        }
    }

    public function filterProducts(Request $request)
    {
        $sku = $request->product_sku_filter;
        $qty = $request->product_qty_filter;
        $name = $request->product_name_filter;
        $status = $request->product_status_filter;
        $brand_id = $request->product_brand_filter;
        $category_id = $request->product_category_filter;
        $min_price = $request->min_price;
        $max_price = $request->max_price;
        $sort_by = $request->sort_by;

        $query = Product::query();

        // Filter by product sku
        if (isset($sku)) {
            $query->where('sku', 'like', '%' . $sku . '%');
        }
        // Filter by product name
        if (isset($name)) {
            $query->where('product_name', 'like', '%' . $name . '%');
        }
        if (isset($qty)) {
            $query->where('onhand_qty', '<=', $qty);
        }


        // Filter by product status
        if (isset($status)) {
            $query->where('status', $status);
        }

        // Filter by category using the relationship
        if (isset($category_id)) {
            $query->whereHas('category', function ($q) use ($category_id) {
                $q->where('id', $category_id);
            });
        }

        // Filter by brand using the relationship
        if (isset($brand_id)) {
            $query->whereHas('brand', function ($q) use ($brand_id) {
                $q->where('id', $brand_id);
            });
        }

        // Filter by price range
        if (isset($min_price) && isset($max_price)) {
            $query->whereBetween('price', [$min_price, $max_price]);
        } elseif (isset($min_price)) {
            $query->where('price', '>=', $min_price);
        } elseif (isset($max_price)) {
            $query->where('price', '<=', $max_price);
        }

        // Sorting logic
        if (isset($sort_by)) {
            if ($sort_by == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($sort_by == 'price_desc') {
                $query->orderBy('price', 'desc');
            } elseif ($sort_by == 'newest') {
                $query->orderBy('created_at', 'desc');
            }
        }

        // Execute the query and return the results
        $products = $query->get();

        return response()->json(['products' => $products, 'status' => 200]);
    }
}
