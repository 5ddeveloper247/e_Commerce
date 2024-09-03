<div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
    
    <div class="mt-4 px-4 py-4 bg-white shadow table-container table-container">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn theme-btn-outline btn-lg px-md-5" id="addNewFeature" >Add Feature</button>
        </div>
        <table id="features-listing" class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th class="text-nowrap" scope="col">FEATURE TITLE</th>
                    <th class="text-nowrap" scope="col">CREATED AT</th>
                    <th class="text-end" scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody id="features_table_body">
                {{-- DYNAMIC DATA WILL BE INJECTED HERE --}}
            </tbody>
        </table>
    </div>

    <div class="modal fade popup-form-modal" id="addFeature_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border">
                <form id="addFeature_form" autocomplete="off">
                    <input type="hidden" id="feature_id" name="feature_id" value="">
                    <div class="modal-header justify-content-between border-0 px-4 py-3">
                        <h4 class="modal-title text-white">Feature Details</h4>
                        <button class="btn p-1 btn-outline-light" type="button" data-bs-dismiss="modal"
                            aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 15 15">
                                <path fill="currentColor" d="M3.64 2.27L7.5 6.13l3.84-3.84A.92.92 0 0 1 12 2a1 1 0 0 1 1 1a.9.9 0 0 1-.27.66L8.84 7.5l3.89 3.89A.9.9 0 0 1 13 12a1 1 0 0 1-1 1a.92.92 0 0 1-.69-.27L7.5 8.87l-3.85 3.85A.92.92 0 0 1 3 13a1 1 0 0 1-1-1a.9.9 0 0 1 .27-.66L6.16 7.5L2.27 3.61A.9.9 0 0 1 2 3a1 1 0 0 1 1-1c.24.003.47.1.64.27" />
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body pt-4 pb-2 px-4">
                        <div class="row">
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="feature_title" name="feature_title" placeholder="Enter Feature" maxlength="20">
                                <label class="mx-2" for="specification">Feature Title</label>
                            </div>
                            <div class="col-md-12">
                            <label class="mx-2" for="specification">Feature Description</label>
                                <textarea id="editor2"></textarea>
                            </div>

                            
                            <div class="col-4">
                                <label for="feature_file" class="form-label fw-bold mb-2">Upload Image</label>
                                <div onclick="document.getElementById('feature_file').click();" class="position-relative border border-primary rounded shadow-sm d-flex align-items-center justify-content-center"
                                    style="height: 50px; cursor: pointer;">
                                    <!-- Adjusted height to provide space for centering -->
                                    <input type="file" id="feature_file" class="form-control d-none" name="feature_image" accept="image/*" single>
                                    <!-- SVG Icon acting as button -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-upload text-primary cursor-pointer" viewBox="0 0 16 16">
                                        <path d="M.5 9.9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H1v4a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-4h-4a.5.5 0 0 1 0-1h4.5a.5.5 0 0 1 .5.5V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.9z" />
                                        <path d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V13.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 0 1-.708-.708l3-3z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-6 mt-4 d-flex align-items-center">
                                <div class="white mx-2" id="imagePreview_div" style="display:none;">
                                    <div class="image-item-land" >
                                        <img id="featureImagePreview" src="">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-cancel px-4 close_modal" type="button">
                            Cancel
                        </button>
                        <button class="btn btn-done px-4" type="button" id="addFeature_btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmationModalFeature" tabindex="-1" aria-labelledby="confirmationModalFeature"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content text-center">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmationModalRemoveLabel">Confirmation</h5>
                    <button type="button" class="btn-close close_modal" data-bs-dismiss="modal" aria-label="Close"
                        style="background-color: #00000040 !important;"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-center my-4">
                        <h6 class="mb-0 me-2">Are you sure you want to delete this record? </h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                            <g fill="none">
                                <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor" d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m0 2a8 8 0 1 0 0 16a8 8 0 0 0 0-16m0 12a1 1 0 1 1 0 2a1 1 0 0 1 0-2m0-9.5a3.625 3.625 0 0 1 1.348 6.99a.8.8 0 0 0-.305.201c-.044.05-.051.114-.05.18L13 14a1 1 0 0 1-1.993.117L11 14v-.25c0-1.153.93-1.845 1.604-2.116a1.626 1.626 0 1 0-2.229-1.509a1 1 0 1 1-2 0A3.625 3.625 0 0 1 12 6.5" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger px-md-3 close_modal">NO</button>
                    <button type="button" class="btn btn-outline-danger px-md-3" id="deleteFeatureConfirmedBtn">YES</button>
                </div>
            </div>
        </div>
    </div>
</div>

