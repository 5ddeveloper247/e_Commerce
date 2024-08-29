<div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">

    <div class="row justify-content-center gx-0 gy-2 gap-4 mb-4 add-specifications">
        <div class="col d-flex justify-content-center align-items-center d-card py-md-4 py-3 px-3">
            <div class="d-flex flex-column align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 32 32">
                    <path fill="currentColor"
                        d="M16 3C8.832 3 3 8.832 3 16s5.832 13 13 13s13-5.832 13-13S23.168 3 16 3m0 2c6.087 0 11 4.913 11 11s-4.913 11-11 11S5 22.087 5 16S9.913 5 16 5m-1 5v5h-5v2h5v5h2v-5h5v-2h-5v-5z" />
                </svg>
                <small class="text-center">Add Now</small>
            </div>
        </div>
    </div>

    <div class="px-4 py-4 bg-white shadow table-container table-container">
        <table id="specifications-listing" class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th class="text-nowrap" scope="col">MODEL NAME</th>
                    <th class="text-nowrap" scope="col">FEATURE</th>
                    <th class="text-center" scope="col">SPECIFICATION</th>
                    <th class="text-center" scope="col">UNIT</th>
                    <th class="text-center" scope="col">VALUE</th>
                    <th class="text-end" scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody id="specifications_table_body">
                {{-- DYNAMIC DATA WILL BE INJECTED HERE --}}
            </tbody>
        </table>
    </div>

    <form id="product_specifications_form">
        <!-- Product Details -->
        <div class="section">
            <h2>Product Specifications</h2>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="model-name" class="form-label">Model Name</label>
                    <input type="text" class="form-control" id="model-name" name="model_name"
                        placeholder="Enter Model Name">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="specification" class="form-label">Feature</label>
                    <input type="text" class="form-control" id="specification" name="specification"
                        placeholder="Enter Feature Name">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="subspecification" class="form-label">Specification</label>
                    <input type="text" class="form-control" id="subspecification" name="sub_specification"
                        placeholder="Enter Feature Specification">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="unit" class="form-label">Unit</label>
                    <input type="text" class="form-control" id="unit" name="unit" placeholder="Enter Feature Unit">
                </div>

                <div class="col-sm-6 mb-3">
                    <label for="value" class="form-label">Value</label>
                    <input type="text" class="form-control" id="value" name="value"
                        placeholder="Enter Feature Unit Value">
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <button type="button" id="saveProductBtn" class="btn theme-btn-outline btn-lg px-md-5">Save
                Specifications</button>
        </div>
    </form>

    <div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border">
                <form id="addUpdateCategory" autocomplete="off">
                    <div class="modal-header justify-content-between border-0 px-4 py-3">
                        <h4 class="modal-title text-white">Add/Update</h4>
                        <button class="btn p-1 btn-outline-light" type="button" data-bs-dismiss="modal"
                            aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 15 15">
                                <path fill="currentColor"
                                    d="M3.64 2.27L7.5 6.13l3.84-3.84A.92.92 0 0 1 12 2a1 1 0 0 1 1 1a.9.9 0 0 1-.27.66L8.84 7.5l3.89 3.89A.9.9 0 0 1 13 12a1 1 0 0 1-1 1a.92.92 0 0 1-.69-.27L7.5 8.87l-3.85 3.85A.92.92 0 0 1 3 13a1 1 0 0 1-1-1a.9.9 0 0 1 .27-.66L6.16 7.5L2.27 3.61A.9.9 0 0 1 2 3a1 1 0 0 1 1-1c.24.003.47.1.64.27" />
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body pt-4 pb-2 px-4">
                        <div class="row">
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="category_name" name="category_name"
                                    placeholder="name">
                                <label class="mx-2" for="generalInfo">category name</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="category_description"
                                    name="category_description" placeholder="name">
                                <label class="mx-2" for="generalInfo">category description</label>
                            </div>

                            <div class="form-check form-switch col-md-12 d-flex align-items-center mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" role="switch" name="category_status"
                                    id="category_status">
                                <label class="form-check-label ms-2" for="status">status</label>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                        <button class="btn btn-done px-4" type="button" id="editCategoryNow">Done</button>
                    </div>
                </form>
            </div>
        </div>
    </div>





    <div class="modal fade" id="confirmationModalProduct" tabindex="-1" aria-labelledby="confirmationModalProductLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content text-center">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmationModalRemoveLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="background-color: #00000040 !important;"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-center my-4">
                        <h6 class="mb-0 me-2">Are Sure Want to Delete</h6>
                        <input type="hidden" name="delete-id" id="delete-product-id">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                            <g fill="none">
                                <path
                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m0 2a8 8 0 1 0 0 16a8 8 0 0 0 0-16m0 12a1 1 0 1 1 0 2a1 1 0 0 1 0-2m0-9.5a3.625 3.625 0 0 1 1.348 6.99a.8.8 0 0 0-.305.201c-.044.05-.051.114-.05.18L13 14a1 1 0 0 1-1.993.117L11 14v-.25c0-1.153.93-1.845 1.604-2.116a1.626 1.626 0 1 0-2.229-1.509a1 1 0 1 1-2 0A3.625 3.625 0 0 1 12 6.5" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger px-md-3" data-bs-dismiss="modal">NO</button>
                    <button type="button" class="btn btn-outline-danger px-md-3" id="deleteNowBtn">YES</button>
                </div>
            </div>
        </div>
    </div>
</div>