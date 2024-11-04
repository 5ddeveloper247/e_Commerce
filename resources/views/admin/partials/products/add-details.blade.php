<div class="tab-pane fade show active" id="product-details" role="tabpanel" aria-labelledby="product-details-tab">
    <form id="product_settings_form">
        <!-- Product Details -->
        <div class="section">
            <h2>Product Details</h2>
            <div class="row">

                {{-- update id --}}
                <input type="hidden" id="product_id" name="product_id" value="">
                {{-- update id --}}

                <div class="col-sm-6 mb-3">
                    <label for="sku" class="form-label">SKU<span class="danger">*</span></label>
                    <input type="text" fieldType="alphanumeric" maxlength="30" class="form-control" id="sku"
                        maxlength="50" name="sku" placeholder="Enter SKU">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="product_name" class="form-label">Product Name<span class="danger">*</span></label>
                    <input type="text" fieldType="alphanumeric" maxlength="255" class="form-control" id="product_name"
                        maxlength="255" name="product_name" placeholder="Enter product name">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Category<span class="danger">*</span></label>
                    <select class="form-control" id="category_id" name="category_id">
                        <option value="">Select a category</option>
                        <!-- Example options; replace with dynamic data -->
                    </select>
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Brand<span class="danger">*</span></label>
                    <select class="form-control" id="brand_id" name="brand_id">
                        <option value="">Select a brand</option>
                        <!-- Example options; replace with dynamic data -->
                    </select>
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="product_name" class="form-label">Model Name<span class="danger">*</span></label>
                    <input type="text" class="form-control" id="model_name" fieldType="alphanumeric" maxlength="255"
                        name="model_name" placeholder="Enter Model Name">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="price" class="form-label">Price<span class="danger">*</span></label>
                    <input type="number" step="0.01" class="form-control" id="price" fieldType="number" maxlength="15"
                        name="price" placeholder="Enter price">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="discount_price" class="form-label">Discount Price<span class="danger">*</span></label>
                    <input type="number" step="0.01" class="form-control" fieldType="number" maxlength="15"
                        id="discount_price" name="discount_price" placeholder="Enter discount price">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="weight" class="form-label">Weight (kg)<span class="danger">*</span></label>
                    <input type="number" step="0.01" class="form-control" fieldType="number" maxlength="10" id="weight"
                        name="weight" placeholder="Enter weight">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="onhand_qty" class="form-label">On Hand Quantity<span class="danger">*</span></label>
                    <input type="number" class="form-control" id="onhand_qty" fieldType="number" maxlength="10"
                        name="onhand_qty" placeholder="Enter stock quantity">
                </div>

                <div class="col-sm-12 mb-3">
                    <label for="description" class="form-label">Description<span class="danger"></span></label>
                    <textarea class="form-control productDecription" id="description" name="description"
                        fieldType="alphanumeric" maxlength="3000" rows="3" placeholder="Enter description"></textarea>
                </div>
                <div class="col-sm-12 mb-3">
                    <label for="description" class="form-label">Extra Info</label>
                    <textarea class="form-control" id="productExtraInfo" name="productExtraInfo"
                        fieldType="alphanumeric" maxlength="3000" rows="3" placeholder="Enter extra info"></textarea>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4 ">
            <button type="button" id="backProductBtn" class=" mx-2 btn btn-danger btn-lg px-md-5">Back</button>
            <button type="button" id="saveProductBtn" class="btn theme-btn-outline btn-lg px-md-5">Save</button>
        </div>
    </form>
</div>
