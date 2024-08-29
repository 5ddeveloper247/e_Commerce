<div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
    <div class="mt-4 px-4 py-4 bg-white shadow table-container table-container">
        <table id="specifications-listing" class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">ID</th>
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

    <div class="modal fade popup-form-modal" id="add-specififcation-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border">
                <form id="add-specification-form" autocomplete="off">
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
                                <input type="text" class="form-control" id="specification" name="specification" placeholder="Enter Feature">
                                <label class="mx-2" for="specification">Feature</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="sub-specification" name="sub_specification" placeholder="Enter Specification">
                                <label class="mx-2" for="sub-specification">Specification</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="unit" name="unit" placeholder="Enter Unit">
                                <label class="mx-2" for="unit">Unit</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="value" name="value" placeholder="Enter Value">
                                <label class="mx-2" for="value">Value</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                        <button class="btn btn-done px-4" type="button" id="addSpecification">Done</button>
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
                        <input type="hidden" name="delete-id" id="delete-specification-id">
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

<script>
    function initializeSpecificationsDatatable(){
        $('#specifications-listing').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            pageLength: 10,
            buttons: [],
            lengthMenu: [5, 10, 25, 50, 75, 100]
        });
    }
    initializeSpecificationsDatatable();

    $('#saveProductmodel').on('click', function () {
        const url = "/admin/product/store/model";
        const type = "POST";
        var formData = new FormData();

        productId = document.querySelector('input[name="product_id"]').value;
        modelName = document.querySelector('input[name="model_name"]').value;

        // Append the product ID & model name to the FormData
        formData.append('product_id', productId);
        formData.append('model_name', modelName);

        SendAjaxRequestToServer(type, url, formData, '', getProductAddModelResponse, '', '#saveProductmodel');
    });

    function getProductAddModelResponse(response) {
        if (response.success) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });
        } else {
            // Error Handling
            let errorMessage = 'An error occurred. Please try again.';

            if (response.status == 422) {
                // Validation errors
                errorMessage = response.message || 'Validation failed.';
                const validationErrors = response.errors || {};

                // Highlight the invalid fields
                $.each(validationErrors, function (key, error) {
                    const inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid');
                    // Optionally, show error messages next to each field
                    // inputField.after('<div class="invalid-feedback">' + error[0] + '</div>');
                });
            } else if (response.status === 500) {
                // Handle server error
                errorMessage = response.message || 'Internal server error. Please contact support.';
            }

            // Display error message
            toastr.error(errorMessage, '', {
                timeOut: 3000
            });
        }
    }

    $('#addSpecification').on('click', function () {
        const url = "/admin/product/store/specification";
        const type = "POST";

        var formData = new FormData();

        productId = document.querySelector('input[name="product_id"]').value;
        specification = document.querySelector('input[name="specification"]').value;
        subspecification = document.querySelector('input[name="sub_specification"]').value;
        unit = document.querySelector('input[name="unit"]').value;
        value = document.querySelector('input[name="value"]').value;

        // Append the product ID & model name to the FormData
        formData.append('product_id', productId);
        formData.append('specification', specification);
        formData.append('sub_specification', subspecification);
        formData.append('unit', unit);
        formData.append('value', value);

        SendAjaxRequestToServer(type, url, formData, '', getProductAddSpecificationResponse, '', '');
    });

    function getProductAddSpecificationResponse(response) {
        if (response.success) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            // Reset Datatable
            $('#specifications-listing').DataTable().clear().destroy();
            // Populate with new markup
            getProductSpecificationsListingResponse(response);
            // Reinitialize datatable with new data
            initializeSpecificationsDatatable();

            
        } else {
            // Error Handling
            let errorMessage = 'An error occurred. Please try again.';

            if (response.status == 422) {
                // Validation errors
                errorMessage = response.message || 'Validation failed.';
                const validationErrors = response.errors || {};

                // Highlight the invalid fields
                $.each(validationErrors, function (key, error) {
                    const inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid');
                    // Optionally, show error messages next to each field
                    // inputField.after('<div class="invalid-feedback">' + error[0] + '</div>');
                });
            } else if (response.status === 500) {
                // Handle server error
                errorMessage = response.message || 'Internal server error. Please contact support.';
            }

            // Display error message
            toastr.error(errorMessage, '', {
                timeOut: 3000
            });
        }
    }

    function getSpecifications() {
        const url = "/admin/product/get/specifications";
        const type = "POST";
        productId = document.querySelector('input[name="product_id"]').value;
        let data = {
            product_id: productId
        };
        SendAjaxRequestToServer(type, url, data, '', getProductSpecificationsListingResponse, '', '');
    }

    function getProductSpecificationsListingResponse(response) {
        if (response.status == 200) {
            let html = '';
            response.productSpecifications.forEach(item => {
                html += `
                    <tr>
                        <td class="ps-3">${item.id}</td>
                        <td class="ps-3">${item.specification}</td>
                        <td class="ps-3">${item.sub_specification}</td>
                        <td class="ps-3">${item.key}</td>
                        <td class="ps-3">${item.value}</td>
                        <td class="ps-3 text-nowrap">${new Date(item.created_at).toLocaleDateString('en-US', { month: 'short', day: '2-digit' })}, ${new Date(item.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })}</td>
                        <td class="text-end">
                            <div class="btn-reveal-trigger position-static">
                                <button class="btn btn-sm dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg class="svg-inline--fa fa-ellipsis" aria-hidden="true" focusable="false"
                                         data-prefix="fas" data-icon="ellipsis" role="img"
                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                              d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                        </path>
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" type="button"
                                       data-specification-edit='${JSON.stringify(item)}' id="handleEditSpecificationBtn">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                       data-bs-target="#confirmationModalProduct" data-remove-product='${JSON.stringify(item)}' id="handleRemoveSpecificationBtn">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
            });

            $('#specifications_table_body').html(html);
        }
    }

    $('#saveProductmodel').on('click', function () {
        const url = "/admin/product/store/model";
        const type = "POST";
        var formData = new FormData();

        productId = document.querySelector('input[name="product_id"]').value;
        modelName = document.querySelector('input[name="model_name"]').value;

        // Append the product ID & model name to the FormData
        formData.append('product_id', productId);
        formData.append('model_name', modelName);

        SendAjaxRequestToServer(type, url, formData, '', getProductAddModelResponse, '', '#saveProductmodel');
    });

    function getProductAddModelResponse(response) {
        if (response.success) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });
        } else {
            // Error Handling
            let errorMessage = 'An error occurred. Please try again.';

            if (response.status == 422) {
                // Validation errors
                errorMessage = response.message || 'Validation failed.';
                const validationErrors = response.errors || {};

                // Highlight the invalid fields
                $.each(validationErrors, function (key, error) {
                    const inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid');
                    // Optionally, show error messages next to each field
                    // inputField.after('<div class="invalid-feedback">' + error[0] + '</div>');
                });
            } else if (response.status === 500) {
                // Handle server error
                errorMessage = response.message || 'Internal server error. Please contact support.';
            }

            // Display error message
            toastr.error(errorMessage, '', {
                timeOut: 3000
            });
        }
    }

</script>