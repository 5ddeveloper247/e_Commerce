<div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
    
    <div class="mt-4 px-4 py-4 bg-white shadow table-container table-container">
        <div class="d-flex justify-content-end">
            <button type="button" class="btn theme-btn-outline btn-lg px-md-5" id="addNewSpecification" >Add Specification</button>
        </div>
        <table id="specifications-listing" class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th class="text-nowrap" scope="col">FEATURE</th>
                    <th class="text-nowrap" scope="col">SPECIFICATION</th>
                    <th class="text-nowrap" scope="col">UNIT</th>
                    <th class="text-nowrap" scope="col">VALUE</th>
                    <th class="text-nowrap" scope="col">CREATED AT</th>
                    <th class="text-end" scope="col">ACTIONS</th>
                </tr>
            </thead>
            <tbody id="specifications_table_body">
                {{-- DYNAMIC DATA WILL BE INJECTED HERE --}}
            </tbody>
        </table>
    </div>

    <div class="modal fade popup-form-modal" id="addSpecififcation_modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border">
                <form id="addSpecification_form" autocomplete="off">
                    <input type="hidden" id="specification_id" name="specification_id" value="">
                    <div class="modal-header justify-content-between border-0 px-4 py-3">
                        <h4 class="modal-title text-white">Specification Details</h4>
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
                                <input type="text" class="form-control" id="specification" name="specification" placeholder="Enter Feature" maxlength="20">
                                <label class="mx-2" for="specification">Feature</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="sub_specification" name="sub_specification" placeholder="Enter Specification" maxlength="20">
                                <label class="mx-2" for="sub-specification">Specification</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="unit" name="unit" placeholder="Enter Unit" maxlength="20">
                                <label class="mx-2" for="unit">Unit</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="value" name="value" placeholder="Enter Value" maxlength="20">
                                <label class="mx-2" for="value">Value</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-cancel px-4 close_modal" type="button">
                            Cancel
                        </button>
                        <button class="btn btn-done px-4" type="button" id="addSpecification_btn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmationModalSpecification" tabindex="-1" aria-labelledby="confirmationModalSpecification"
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
                    <button type="button" class="btn btn-outline-danger px-md-3" id="deleteSpecificationConfirmedBtn">YES</button>
                </div>
            </div>
        </div>
    </div>
</div>

