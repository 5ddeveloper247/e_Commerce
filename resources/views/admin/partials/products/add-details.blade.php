<div class="tab-pane fade show active" id="product-details" role="tabpanel"
    aria-labelledby="product-details-tab">
    <form id="product_settings_form">
        <!-- Product Details -->
        <div class="section">
            <h2>Product Details</h2>
            <div class="row">

                {{-- update id --}}
                <input type="hidden" id="product_id" name="product_id" value="">
                {{-- update id --}}
                <div class="col-sm-6 mb-3">
                    <label for="sku" class="form-label">SKU</label>
                    <input type="text" class="form-control" id="sku" name="sku" placeholder="Enter SKU">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="" disabled selected>Select a category</option>
                        <!-- Example options; replace with dynamic data -->
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Brand Name</label>
                    <select class="form-control" id="brand_id" name="brand_id">
                        <option value="" disabled selected>Select a brand</option>
                        <!-- Example options; replace with dynamic data -->
                    </select>
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name"
                        placeholder="Enter product name">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price"
                        placeholder="Enter price">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="discount_price" class="form-label">Discount Price</label>
                    <input type="number" step="0.01" class="form-control" id="discount_price"
                        name="discount_price" placeholder="Enter discount price">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="weight" class="form-label">Weight (kg)</label>
                    <input type="number" step="0.01" class="form-control" id="weight" name="weight"
                        placeholder="Enter weight">
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="onhand_qty" class="form-label">On Hand Quantity</label>
                    <input type="number" class="form-control" id="onhand_qty" name="onhand_qty"
                        placeholder="Enter stock quantity">
                </div>
                <div class="col-sm-12 mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Enter description"></textarea>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="button" id="saveProductBtn" class="btn theme-btn-outline btn-lg px-md-5">Save
                Settings</button>
        </div>
    </form>
</div>