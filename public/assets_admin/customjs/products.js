$(document).ready(function () {


    //handle hide show section of adding products and listings
    $('#productAddBtn').on('click', function () {
        showAddEditForm();
    });

    function showAddEditForm() {
        $('#product_add_edit_section').removeClass('d-none');
        $('#product_add_edit_section').addClass('d-block');
        $('#product_listing_section').removeClass('d-block');
        $('#product_listing_section').addClass('d-none');
    }

    function getProductsOnLoad() {
        const url = "/admin/product/ajax";
        const type = "Get";
        let data = {}; // Your data to send to the server here
        SendAjaxRequestToServer(type, url, data, '', getProductListingResponse, '', '#contactReply_submit');
    }

    function getProductListingResponse(response) {
        $('#activeRecord').text(response.acitveProducts);
        $('#inactiveRecord').text(response.inacitveProducts);
        $('#totalRecord').text(response.total);
        if (response.status == 200) {
            let html = '';
            response.products.forEach((item, index) => {
                // Determine the text for "Mark as Featured" based on the item's featured status
                const featuredText = item.featured == 1 ? 'Marked as Unfeatured' : 'Marked as Featured';

                html += `
                    <tr>
                        <td class="ps-3">${index + 1}</td>
                        <td class="ps-3">${item.product_name}</td>
                        <td class="ps-3">${item.description}</td>
                        <td class="text-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"
                                       id="flexSwitchCheckChecked${item.id}" ${item.status === 1 ? 'checked' : ''}>
                            </div>
                        </td>
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
                                    <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target=".makedAsDiscounted" data-product-discounted='${JSON.stringify(item.id)}' id="handleMarkAsDiscountedBtn">Marked as Discounted</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" type="button" data-bs-toggle="modal"
                                       data-bs-target=".makedAsFeaturedConfirmationModel" data-product-featured-value='${item.featured}' data-product-featured='${JSON.stringify(item.id)}' id="handleMarkAsFeaturedBtn">${featuredText}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" type="button"
                                       data-edit-product='${JSON.stringify(item)}' id="handleEditProductBtn">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                       data-bs-target="#confirmationModalProduct" data-remove-product='${JSON.stringify(item)}' id="handleRemoveProductBtn">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
            });

            $('#product_listing_table_body').html(html);
        }

    }

    function fetchCategories() {
        $.ajax({
            url: "/admin/product/category/fetch/ajax", // URL to fetch categories
            type: "GET", // HTTP GET method
            success: function (response) {
                if (response.status === 200) {
                    let html = ""; // Default placeholder option
                    // let html = '<option value="">Select a category</option>'; // Default placeholder option
                    response.data.forEach(item => {
                        html += `<option value="${item.id}">${item.category_name}</option>`;
                    });
                    $("#category_id").html(html); // Update the select element with fetched categories
                } else {
                    console.error('Error fetching categories', response);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.error('AJAX Error:', textStatus, errorThrown);
            }
        });
    }



    //fetch brands
    function fetchBrands() {
        const url = "/admin/product/brand/fetch/ajax";
        const type = "Get"
        const data = {}
        SendAjaxRequestToServer(type, url, '', '', handleBrandResponse, '', '#contactReply_submit');
        function handleBrandResponse(response) {
            if (response.status === 200) {
                var html = '';
                response.data.forEach(item => {
                    html += `
                        <option value="${item.id}">${item.title}</option>
                    `;
                });
                $('#brand_id').html(html);
            } else {
                console.error('Error fetching categories', response);
            }
        }
    }

    function InitiateOnLoad() {
        //fetch categories
        fetchCategories();
        fetchBrands();           //fetch brands
        getProductsOnLoad(); //show listings
    }
    InitiateOnLoad();


    $('body').on('click', '#saveProductBtn', function () {
        const saveForm = document.getElementById('product_settings_form'); // get the jQuery object for the form
        var formData = new FormData(saveForm);
        const url = "/admin/product/store/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', handleProductSaveResponse, '', '#editAdminNow');

        function handleProductSaveResponse(response) {
            if (response.status === 200) {
                // Success: Display success message and reset form
                toastr.success(response.message, '', {
                    timeOut: 3000
                });
                const form = document.getElementById('product_settings_form');
                form.reset();
                InitiateOnLoad();

                // Uncomment and define this function if you want to reload the admin list data
                // loadJobsPageData();

            } else {
                // Error Handling
                let errorMessage = 'An error occurred. Please try again.';

                if (response.status == 402) {
                    // Handle specific error status
                    errorMessage = response.message;


                } else if (response.status == 422) {
                    // Validation errors
                    errorMessage = response.responseJSON.message || 'Validation failed.';
                    const validationErrors = response.responseJSON.errors || {};

                    // Log the response for debugging


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

    });


    $('body').on('click', '#handleRemoveProductBtn', function () {
        const item = JSON.parse($(this).attr('data-remove-product'));
        $("#delete-product-id").val(item.id);
    });

    $('body').on('click', '#deleteNowBtn', function () {
        const data = {
            id: $('#delete-product-id').val(),
        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }

        const url = "/admin/product/delete/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', removeProductResponse, '', '#deleteNowBtn');
    })

    function removeProductResponse(response) {

        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            InitiateOnLoad();
        }
        else {
            toastr.error('An error occurred. Please try again.', '', {
                timeOut: 3000
            })
        }
    }




    $('body').on('change', '.flexSwitchCheckChecked', function () {
        const data = {
            id: $(this).attr('id').split('flexSwitchCheckChecked')[1],

            status: $(this).is(':checked') ? 1 : 0,
        }

        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }
        const url = "/admin/product/status/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', updateStatusResponse, '', '#flexSwitchCheckChecked');
    });


    function updateStatusResponse(response) {

        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            InitiateOnLoad();
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            });
        }

    }



    function fetchCategoryById(catId) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "/admin/product/categoryById/fetch/ajax", // The URL to send the request to
                type: "POST", // The HTTP method to use
                data: { id: catId }, // The data to send with the request
                success: function (response) { // Callback function on successful response
                    if (response.status === 200) {
                        resolve(response.category); // Resolve the Promise with the category data
                    } else {
                        reject('Failed to fetch category.'); // Reject the Promise with an error message
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) { // Callback function on error
                    console.error('AJAX Error:', textStatus, errorThrown);
                    reject('Error fetching category data.'); // Reject the Promise with a general error message
                }
            });
        });
    }

    function fetchBrandById(brandId) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "/admin/product/brandById/fetch/ajax", // The URL to send the request to
                type: "POST", // The HTTP method to use
                data: { id: brandId }, // The data to send with the request
                success: function (response) { // Callback function on successful response
                    if (response.status === 200) {
                        resolve(response.brand); // Resolve the Promise with the brand data
                    } else {
                        reject('Failed to fetch brand.'); // Reject the Promise with an error message
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) { // Callback function on error
                    console.error('AJAX Error:', textStatus, errorThrown);
                    reject('Error fetching brand data.'); // Reject the Promise with a general error message
                }
            });
        });
    }


    // Usage of fetchCategoryById and fetchBrandById
    $('body').on('click', '#handleEditProductBtn', async function () {
        try {
            fetchCategories();
            fetchBrands();
            const item = JSON.parse($(this).attr('data-edit-product'));
            // Fetch category and brand data asynchronously
            console.log(item)
            // const [category, brand] = await Promise.all([
            //     fetchCategoryById(item.category_id),
            //     fetchBrandById(item.brand_name)
            // ]);
            // Populate the form fields with the product data
            $('#product_id').val(item.id);
            $('#sku').val(item.sku);
            $('#category_id').val(item.category_id); // Assuming 'category_name' is the correct property
            $('#brand_id').val(item.brand_name); // Assuming 'title' is the correct property
            $('#product_name').val(item.product_name);
            $('#model_name').val(item.model_name);
            $('#price').val(item.price);
            $('#discount_price').val(item.discount_price);
            $('#weight').val(item.weight);
            $('#onhand_qty').val(item.onhand_qty);
            $('#description').val(item.description);
            // Set the status checkbox
            $('#status').prop('checked', item.status == 1);

            // Show the modal for editing
            showAddEditForm();
        } catch (error) {
            console.log(error)
            toastr.error('Failed to fetch category or brand data. Please try again.', '', {
                timeOut: 3000
            });
        }
    });



    $('body').on('click', '#handleMarkAsDiscountedBtn', function () {
        const discountedRecord = $(this).attr('data-product-discounted');

        $('#discounted_id').val(discountedRecord);

    })

    $('body').on('click', '#addDiscountNowBtn', function () {
        const formData = document.getElementById('markedDiscountedForm');
        const data = new FormData(formData);
        const url = "/admin/product/markAsDiscounted/ajax";

        SendAjaxRequestToServer('POST', url, data, '', handleMarkAsDiscountedResponse, '', '#addDiscountNowBtn');

        function handleMarkAsDiscountedResponse(response) {
            var errorMessage = "";
            if (response.status === 200) {
                toastr.success(response.message, '', {
                    timeOut: 3000
                });
                $('.makedAsDiscounted').modal('hide');
                InitiateOnLoad();
                formData.reset();
                //  $('.makedAsFeaturedConfirmationModel').hide();
            }
            else if (response.status === 422) {
                // Handle validation errors
                errorMessage = response.responseJSON.message;
                toastr.error(errorMessage || 'An error occurred', '', {
                    timeOut: 3000
                });
                const validationErrors = response.responseJSON.errors || {};
                $.each(validationErrors, function (key, error) {
                    const inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid');
                    // Display validation error message next to the input field

                });
            } else {
                // Handle other errors
                toastr.error(response.responseJSON.message || 'An error occurred', '', {
                    timeOut: 3000
                });
            }
        }
    });



    $('body').on('click', '#handleMarkAsFeaturedBtn', function () {
        const discountedRecord = $(this).attr('data-product-featured');
        const featuredVal = $(this).attr('data-product-featured-value');

        $('#featured_id').val(discountedRecord);
        if (featuredVal == 1) {

            $("#featured_heading").text("Mark As Unfeatured Now")
        }

    })



    $('body').on('click', '#featuredNowBtn', function () {
        const formData = document.getElementById('markedAsFeaturedForm');
        const data = new FormData(formData);
        const url = "/admin/product/markAsFeatured/ajax";

        SendAjaxRequestToServer('POST', url, data, '', handleMarkAsFeaturedResponse, '', '#addDiscountNowBtn');

        function handleMarkAsFeaturedResponse(response) {
            var errorMessage = "";
            if (response.status === 200) {
                toastr.success(response.message, '', {
                    timeOut: 3000
                });
                $('.makedAsFeaturedConfirmationModel').modal('hide');
                InitiateOnLoad();
                //  $('.makedAsFeaturedConfirmationModel').hide();
            }
            else if (response.status === 422) {
                // Handle validation errors
                errorMessage = response.responseJSON.message;
                toastr.error(errorMessage || 'An error occurred', '', {
                    timeOut: 3000
                });
                const validationErrors = response.responseJSON.errors || {};
                $.each(validationErrors, function (key, error) {
                    const inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid');
                    // Display validation error message next to the input field

                });
            } else {
                // Handle other errors
                toastr.error(response.responseJSON.message || 'An error occurred', '', {
                    timeOut: 3000
                });
            }
        }
    });









});
