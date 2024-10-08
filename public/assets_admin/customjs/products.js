$(document).ready(function () {
    getProductsOnLoad();

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
        const url = "/admin/products/get";
        const type = "POST";
        var formData = new FormData();
        formData.append('includeCategories', true);
        formData.append('includeBrands', true);
        formData.append('includeTotals', true);
        SendAjaxRequestToServer(type, url, formData, '', getProductLoadResponse, '', '');
    }

    function getProductLoadResponse(response) {
        if (response.status == 200) {
            populateTotals(response)
            populateListng(response.products);
            populateCategories(response.categories);
            populateBrands(response.brands);
        }
    }

    function populateTotals(response){
        if (response.activeProducts !== undefined && response.inactiveProducts !== undefined && response.total !== undefined) {
            $('#activeRecord').text(response.activeProducts);
            $('#inactiveRecord').text(response.inactiveProducts);
            $('#totalRecord').text(response.total);
        }
    }

    function populateListng(response){
        let html = '';
        response.forEach(item => {
            // Determine the text for "Mark as Featured" based on the item's featured status
            const featuredText = item.featured == 1 ? 'Marked as Unfeatured' : 'Marked as Featured';

            html += `
                <tr>
                    <td class="ps-3">${item.id}</td>
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
                                data-bs-target=".makedAsOffered" data-product-id='${JSON.stringify(item.id)}' id="handleMarkAsOfferedBtn">Marked as Offered</a>
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

    function populateCategories(response){
        var html = '';
        response.forEach(item => {
            html += `
                <option value="${item.id}">${item.category_name}</option>
            `;
        });
        $('#category_id').html(html);
    }

    function populateBrands(response){
        var html = '';
        response.forEach(item => {
            html += `
                <option value="${item.id}">${item.title}</option>
            `;
        });
        $('#brand_id').html(html);
    }

    // Global Function to Add or update product
    function productUpdateStore(formData){
        const url = "/admin/products/store";
        const type = "POST";

        SendAjaxRequestToServer(type, url, formData, '', handleProductSaveResponse, '', '');

        function handleProductSaveResponse(response) {
            if (response.status === 200) {
                // Success: Display success message and reset form
                toastr.success(response.message, '', {
                    timeOut: 3000
                });

                $('#product_id').val(response.product_id);

                $('.media-nav-item').removeClass('d-none');
                $('.specifications-nav-item').removeClass('d-none');

                populateTotals(response);

                // Reset the form and hide the modal
                // window.location.reload();

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
    }

    // Add Product Details
    $('body').on('click', '#saveProductBtn', function () {
        const saveForm = document.getElementById('product_settings_form');
        var formData = new FormData(saveForm);
        productUpdateStore(formData);
    });

    // Product Status Change
    $('body').on('change', '.flexSwitchCheckChecked', function () {
        const formData = new FormData();
        formData.append('product_id', $(this).attr('id').split('flexSwitchCheckChecked')[1]);
        formData.append('status', $(this).is(':checked') ? 1 : 0);
        formData.append('includeTotals', true);
        productUpdateStore(formData);
    });

    $('body').on('click', '#saveProductAssetsBtn', function () {
        // Get the product ID from the hidden input field
        const productId = document.querySelector('input[name="product_id"]').value;

        // Create a new FormData object
        var formData = new FormData();

        // Append the product ID to the FormData
        formData.append('product_id', productId);

        saveVideo(formData);
        saveImages(formData, productId);
    });

    function saveVideo(formData) {
        const url = "/admin/product/store/video";
        const type = "POST";

        formData.append('video_url', document.querySelector('input[name="video_url"]').value);

        SendAjaxRequestToServer(type, url, formData, '', handleProductVideoSaveResponse, '', '#saveProductAssetsBtn');

        function handleProductVideoSaveResponse(response) {
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
    }

    function saveImages(formData, productId) {
        // Check if selected files are present and append them to the FormData
        if (selectedFiles && selectedFiles.length > 0) {
            for (let i = 0; i < selectedFiles.length; i++) {
                formData.append('product_images[]', selectedFiles[i]);
            }
        } else {
            errorMessage = "Please either select new images or click the upload button to choose images before saving. If no images are selected, ensure to choose some before submitting.";

            toastr.error(errorMessage, '', {
                timeOut: 3000
            });

            return false;
        }

        const url = "/admin/product/store/images";
        const type = "POST";

        SendAjaxRequestToServer(type, url, formData, '', handleProductImagesSaveResponse, '', '#saveProductAssetsBtn');

        function handleProductImagesSaveResponse(response) {
            if (response.success) {
                // Success: Display success message and reset form
                toastr.success(response.message, '', {
                    timeOut: 3000
                });

                // Clear the selectedFiles
                selectedFiles = [];
                files = [];
                $('.image-container-selected').empty();
                $('input[name="product_images[]"]').val('');

                SendAjaxRequestToServer("get", `/admin/product/get/images?product_id=${productId}`, '', '', renderExistingImages, '');

                function renderExistingImages(response) {
                    if (response.status === 200) {
                        // Process the response to populate the files array
                        response.images.image.forEach((file) => {
                            const imgdata = {
                                id: file.id,
                                name: base_url + '/storage/' + file.filepath
                            };
                            files.push(imgdata);
                        });

                        displayExistedFiles(); // Call to display the initial files
                    }
                }

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
    }

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
        } else {
            toastr.error('An error occurred. Please try again.', '', {
                timeOut: 3000
            })
        }
    }

    function fetchCategoryById(catId) {
        return new Promise((resolve, reject) => {
            $.ajax({
                url: "/admin/product/categoryById/fetch/ajax", // The URL to send the request to
                type: "POST", // The HTTP method to use
                data: {
                    id: catId
                }, // The data to send with the request
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
                data: {
                    id: brandId
                }, // The data to send with the request
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
            const [category, brand] = await Promise.all([
                fetchCategoryById(item.category_id),
                fetchBrandById(item.brand_name)
            ]);
            console.log("category, brand", category, brand)
            console.log(category.category_name)

            // Populate the form fields with the product data
            $('#product_id').val(item.id);
            $('#sku').val(item.sku);
            $('#category_id').val(category.category_name); // Assuming 'category_name' is the correct property
            $('#brand_id').val(brand.title); // Assuming 'title' is the correct property
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
            toastr.error('Failed to fetch category or brand data. Please try again.', '', {
                timeOut: 3000
            });
        }
    });



    $('body').on('click', '#handleMarkAsOfferedBtn', function () {
        const discountedRecord = $(this).attr('data-product-id');
        $('#product_id_offerd').val(discountedRecord);
    })

    $('body').on('click', '#addOfferedValueBtn', function () {
        const formData = new FormData();
        formData.append('product_id',$('#product_id_offerd').val());
        formData.append('is_offered', 1);
        formData.append('offered_percentage',$('#offered_percentage').val());
        productUpdateStore(formData);
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

        SendAjaxRequestToServer('POST', url, data, '', handleMarkAsFeaturedResponse, '', '#addOfferedValueBtn');

        function handleMarkAsFeaturedResponse(response) {
            var errorMessage = "";
            if (response.status === 200) {
                toastr.success(response.message, '', {
                    timeOut: 3000
                });
                InitiateOnLoad();
                //  $('.makedAsFeaturedConfirmationModel').hide();
            } else if (response.status === 422) {
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