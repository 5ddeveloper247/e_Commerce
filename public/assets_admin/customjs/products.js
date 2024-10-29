var selectedFiles = [];
$(document).ready(function () {
    getProductsOnLoad();

    //handle hide show section of adding products and listings
    $('#productAddBtn').on('click', function () {
        showAddEditForm();
        $(".media-nav-item,.specifications-nav-item,.features-nav-item").addClass('d-none');
        $('input, select, textarea').removeClass('is-invalid');
        setTimeout(() => {
            $('#sku').focus();
        }, 2000)
    });
    $('#backProductBtn').on('click', function () {
        hideAddEditForm();
        resetForm();

    });

    function showAddEditForm() {
        $('#product_add_edit_section').removeClass('d-none').addClass('d-block');
        $('#product_listing_section').removeClass('d-block').addClass('d-none');
    }

    function hideAddEditForm() {
        $('#product_add_edit_section').removeClass('d-block').addClass('d-none');
        $('#product_listing_section').removeClass('d-none').addClass('d-block');
    }

    function resetForm() {
        let form = document.getElementById('product_settings_form');
        form.reset();

        let form1 = document.getElementById('addSpecification_form');
        form1.reset();

        let form2 = document.getElementById('addFeature_form');
        form2.reset();


        $("#product_id, #file-input1, #video_url, #specification_id, #feature_id, #feature_file").val('');
        $(".image-container-existed, .image-container-selected, #specifications_table_body").html('');
        $("#imagePreview_div").hide();
        $("#featureImagePreview").attr('src', '');
        setEditorData('#editor2', '');
        setEditorData('#productExtraInfoEditor', '');
        setEditorData('.productDecription', '');
        getProductsOnLoad();
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

    function populateTotals(response) {
        if (response.activeProducts !== undefined && response.inactiveProducts !== undefined && response.total !== undefined) {
            $('#activeRecord').text(response.activeProducts);
            $('#inactiveRecord').text(response.inactiveProducts);
            $('#totalRecord').text(response.total);
        }
    }

    function populateListng(response) {

        // if ($.fn.DataTable.isDataTable('#productListing_table')) {
        //     $('#productListing_table').DataTable().destroy();
        // }

        let html = '';
        response.forEach(item => {
            // Determine the text for "Mark as Featured" based on the item's featured status
            var featuredText = item.featured == 1 ? 'Remove from featured' : 'Marked as featured';
            var offeredText = item.is_offered == 1 ? 'Remove from offered' : 'Marked as offered';
            html += `
                <tr>
                    <td class="ps-3">${item.id}</td>
                    <td class="ps-3">${trimText(item.product_name, 15)}</td>
                    <td class="ps-3">${item.category != null ? trimText(item.category.category_name, 15) : ''}</td>
                    <td class="ps-3">${item.brand != null ? trimText(item.brand.title, 15) : ''}</td>
                    <td class="ps-3">${item.model_name != null ? trimText(item.model_name, 15) : ''}</td>
                    <td class="text-center">
                        <div class="form-check form-switch">
                            <input class="form-check-input flexSwitchCheckChecked" data-id="${item.id}" type="checkbox" role="switch" ${item.status === 1 ? 'checked' : ''}>
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
                                <a type="button" class="dropdown-item edit_product" data-id='${item.id}' >Edit</a>
                                <hr>
                                <a class="dropdown-item" type="button" data-id='${item.id}' data-offered-flag='${item.is_offered}' id="handleMarkAsOfferedBtn">${offeredText}</a>
                                <hr>
                                <a class="dropdown-item" type="button" data-id='${item.id}' data-featured-flag='${item.featured}'  id="hacndleMarkAsFeaturedBtn">${featuredText}</a>



                            </div>
                        </div>
                    </td>
                </tr>
            `;
        });

        $('#product_listing_table_body').html(html);

    }

    function populateCategories(response) {
        var html = '<option value="">Choose Category</option>';

        response.forEach(item => {

            if (item.status == 1) {
                html += `
                <option value="${item.id}">${item.category_name}</option>
            `;
            }

        });
        $('#category_id').html(html);
    }

    function populateBrands(response) {
        var html = '<option value="">Choose Brand</option>';
        response.forEach(item => {
            html += `
                <option value="${item.id}">${item.title}</option>
            `;
        });
        $('#brand_id').html(html);
    }

    // Global Function to Add or update product
    function productUpdateStore(formData) {
        const url = "/admin/products/store";
        const type = "POST";

        SendAjaxRequestToServer(type, url, formData, '', handleProductSaveResponse, '', '');
    }
    function handleProductSaveResponse(response) {
        if (response.status === 200) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            $('#product_id').val(response.product_id);

            $('.media-nav-item,.specifications-nav-item,.features-nav-item').removeClass('d-none');
            populateTotals(response);
            setTimeout(() => {
                $('#video_url').focus();
            }, 2000)
        } else {

            if (response.status == 402) {
                error = response.message;
            } else {
                error = response.responseJSON.message;
                var is_invalid = response.responseJSON.errors;

                $.each(is_invalid, function (key) {
                    // Assuming 'key' corresponds to the form field name
                    var inputField = $('[name="' + key + '"]');
                    // Add the 'is-invalid' class to the input field's parent or any desired container
                    inputField.addClass('is-invalid');
                });
            }
            toastr.error(error, '', {
                timeOut: 3000
            });
        }
    }





    // Add Product Details
    $('body').on('click', '#saveProductBtn', function () {
        const saveForm = document.getElementById('product_settings_form');
        var formData = new FormData(saveForm);
        var product_desc = $('.productDecription').next().find('.ck-content').html();
        var product_extra_info = $('.productDecription').next().find('.ck-content').html();
        formData.append('description', product_desc);
        formData.append('extra_info', product_extra_info);
        productUpdateStore(formData);
    });

    $(document).on('click', '.edit_product', function (e) {
        var product_id = $(this).attr('data-id');

        let data = new FormData();
        data.append('product_id', product_id);
        let type = 'POST';
        let url = '/admin/products/getSpecificProductDetail';
        SendAjaxRequestToServer(type, url, data, '', getSpecificProductDetailResponse, '', '.edit_product');
    });




    function getSpecificProductDetailResponse(response) {

        var data = response.data;
        var product_detail = data.product_detail;
        if (product_detail != null) {
            var product_images = product_detail.product_images;
            var product_specifications = product_detail.product_specifications;
            var product_features = product_detail.product_features;

            $('#product_id').val(product_detail.id);
            $('#sku').val(product_detail.sku);
            $('#category_id').val(product_detail.category_id);
            $('#brand_id').val(product_detail.brand_id);
            $('#product_name').val(product_detail.product_name);
            $('#model_name').val(product_detail.model_name);
            $('#price').val(product_detail.price);
            $('#discount_price').val(product_detail.discount_price);
            $('#weight').val(product_detail.weight);
            $('#onhand_qty').val(product_detail.onhand_qty);
            setEditorData('.productDecription', product_detail.description)
            //$('#description').val(product_detail.description);
            $('#video_url').val(product_detail.video_url);
            $("#image-container,.image-container-selected").html('');
            var image_html = '';
            if (product_images != null) {
                $.each(product_images, function (index, value) {
                    var image_url = base_url + '/public/' + value.filepath;
                    image_html += `<div class="image-item-land file_section uploaded_files" >
                                    <img src="${image_url}">
                                    <span class="cancel-icon remove_file_section" data-id="${value.id}">×</span>
                                </div>`;
                });
            }
            $("#image-container").html(image_html);

            makeProductSpecificationListing(product_specifications);

            makeProductFeaturesListing(product_features);
            // Show the modal for editing
            showAddEditForm();
            $(".media-nav-item,.specifications-nav-item,.features-nav-item").removeClass('d-none');
            setTimeout(() => {
                $('#sku').focus();
            }, 2000)
        }
    }


    function makeProductSpecificationListing(product_specifications) {

        let html = '';
        if (product_specifications.length > 0) {
            product_specifications.forEach(item => {

                html += `<tr>
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
                                        <a class="dropdown-item" type="button" data-specification='${JSON.stringify(item)}' id="handleEditSpecificationBtn">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a type="button" class="dropdown-item text-danger deleteSpecificationConfirmBtn" data-id='${item.id}'>Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
            });
        } else {
            html = `<tr>
                        <td class="text-center" colspan="6">No record found...</td>
                    </tr>`;
        }
        $('#specifications_table_body').html(html);
    }

    function makeProductFeaturesListing(product_features) {

        let html = '';
        if (product_features.length > 0) {
            product_features.forEach(item => {

                html += `<tr>
                            <td class="ps-3">${item.id}</td>
                            <td class="ps-3">${item.title}</td>
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
                                        <a class="dropdown-item" type="button" data-feature='${JSON.stringify(item)}' id="handleEditFeatureBtn">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a type="button" class="dropdown-item text-danger deleteFeatureConfirmBtn" data-id='${item.id}'>Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
            });
        } else {
            html = `<tr>
                        <td class="text-center" colspan="6">No record found...</td>
                    </tr>`;
        }
        $('#features_table_body').html(html);
    }

    var removedExistingFiles = []; // Array to track removed existing files
    var selectedFiles = []; // Array to track new selected files

    $('#file-input1').on('change', function (event) {
        const files = event.target.files;
        const existing = $('.uploaded_files');

        var allfileslength = existing.length + files.length + selectedFiles.length - removedExistingFiles.length;

        if (allfileslength > 7) {
            toastr.error('You can upload a maximum of 7 images.');
            return;
        }

        // Validate and add selected files to selectedFiles array
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (!file.type.startsWith('image/')) {
                toastr.error('Please select only image files.');
                continue;
            }
            selectedFiles.push(file);
        }

        // Update the display for new files only
        displaySelectedFiles_product();
    });

    function displaySelectedFiles_product() {
        var imageContainerselected = $('.image-container-selected');
        imageContainerselected.empty(); // Clear previous images

        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                var image_html = `<div class="image-item-land file_section" data-index="${index}">
                                <img src="${e.target.result}">
                                <span class="cancel-icon remove_file_section" data-new="true" data-id="${index}">×</span>
                              </div>`;
                imageContainerselected.append(image_html);
            }
            reader.readAsDataURL(file);
        });
    }

    $(document).on('click', '.remove_file_section', function (e) {
        var isNewFile = $(this).attr('data-new') === "true";
        var imageIndex = $(this).attr('data-id');

        if (isNewFile) {
            // Remove the selected new file
            selectedFiles.splice(imageIndex, 1);
            displaySelectedFiles_product(); // Re-render
        } else {
            // Handle removal of existing files
            var image_id = $(this).attr('data-id');
            let data = new FormData();
            data.append('id', image_id);
            let type = 'POST';
            let url = '/admin/product/delete/images';
            let $this = $(this);

            SendAjaxRequestToServer(type, url, data, '', function (response) {
                deleteProductImageResponse(response, $this);
            }, '', '.remove_file_section');
        }
    });

    function deleteProductImageResponse(response, element) {
        if (response.status == 200) {
            toastr.success(response.message, '', { timeOut: 3000 });
            var image_id = element.attr('data-id');
            removedExistingFiles.push(image_id); // Track removed file

            // Remove from UI
            element.closest('.file_section').remove();
        } else {
            toastr.error("Something went wrong", '', { timeOut: 3000 });
        }
    }


    $('body').on('click', '#saveProductAssetsBtn', function () {
        // Get the product ID from the hidden input field
        const productId = $("input[name='product_id']").val();
        const video_url = $("input[name='video_url']").val();

        // Create a new FormData object
        var formData = new FormData();
        formData.append('product_id', productId);
        formData.append('video_url', video_url);

        // Append selected files to the FormData
        if (selectedFiles && selectedFiles.length > 0) {
            for (let i = 0; i < selectedFiles.length; i++) {
                formData.append('product_images[]', selectedFiles[i]);
            }
        }

        // Save images via AJAX
        saveImages(formData);
    });

    function saveImages(formData) {
        const url = "/admin/product/store/images";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', handleProductImagesSaveResponse, '', '#saveProductAssetsBtn');
    }

    function handleProductImagesSaveResponse(response) {
        if (response.status == 200) {
            var product_id = $("#product_id").val();
            getSpecificProductDetail(product_id);  // Refresh product details
            // Clear the selectedFiles array
            selectedFiles = [];
            // Optionally clear the UI for selected files
            $('.image-container-selected').empty();

            toastr.success(response.message, '', { timeOut: 3000 });
        } else {
            var error = response.responseJSON.message || "An error occurred"; // Fallback error message
            toastr.error(error, '', { timeOut: 3000 });
        }
    }


    function getSpecificProductDetail(product_id) {

        var product_id = product_id;
        let data = new FormData();
        data.append('product_id', product_id);
        let type = 'POST';
        let url = '/admin/products/getSpecificProductDetail';
        SendAjaxRequestToServer(type, url, data, '', getSpecificProductDetailResponse, '', '');
    }

    // specifications tab Js start
    $(document).on('click', '#addNewSpecification', function (e) {

        let form = $('#addSpecification_form');
        form.trigger("reset");
        $("#specification_id").val('');
        $('input').removeClass('is-invalid');

        $("#addSpecififcation_modal").modal('show');
        setTimeout(() => {
            $("#specification").focus();
        }, 2000);
    });

    $(document).on('click', '#addSpecification_btn', function (e) {

        var product_id = $("#product_id").val();
        let form = document.getElementById('addSpecification_form');
        let data = new FormData(form);
        data.append('product_id', product_id);
        let type = 'POST';
        let url = '/admin/products/saveProductSpecifications';
        SendAjaxRequestToServer(type, url, data, '', saveProductSpecification, '', '#addSpecification_btn');
    });

    function saveProductSpecification(response) {
        if (response.status == 200) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            let form = $('#addSpecification_form');
            form.trigger("reset");
            $("#specification_id").val('');

            $("#addSpecififcation_modal").modal('hide');

            var product_id = $("#product_id").val();
            getSpecificProductDetail(product_id);

        } else {
            if (response.status == 402) {
                error = response.message;
            } else {
                error = response.responseJSON.message;
                var is_invalid = response.responseJSON.errors;

                $.each(is_invalid, function (key) {
                    // Assuming 'key' corresponds to the form field name
                    var inputField = $('[name="' + key + '"]');
                    // Add the 'is-invalid' class to the input field's parent or any desired container
                    inputField.addClass('is-invalid');
                });
            }
            toastr.error(error, '', {
                timeOut: 3000
            });
        }
    }


    $(document).on('click', '#handleEditSpecificationBtn', function (e) {
        var details = $(this).attr('data-specification');

        if (details != '') {
            details = JSON.parse(details);

            $("#specification_id").val(details.id);
            $("#specification").val(details.specification);
            $("#sub_specification").val(details.sub_specification);
            $("#unit").val(details.key);
            $("#value").val(details.value);

            $("#addSpecififcation_modal").modal('show');
        } else {
            toastr.error('Something went wrong...', '', {
                timeOut: 3000
            });
        }
    });

    var tempSpecifId = '';
    $(document).on('click', '.deleteSpecificationConfirmBtn', function (e) {
        var specification_id = $(this).attr('data-id');
        tempSpecifId = specification_id;
        $("#confirmationModalSpecification").modal('show');
    });

    $(document).on('click', '#deleteSpecificationConfirmedBtn', function (e) {
        var specification_id = tempSpecifId;

        let form = '';
        let data = new FormData();
        data.append('specification_id', specification_id);
        let type = 'POST';
        let url = '/admin/products/deleteSpecification';
        SendAjaxRequestToServer(type, url, data, '', deleteSpecificationResponse, '', '#deleteSpecificationConfirmedBtn');
    });

    function deleteSpecificationResponse(response) {

        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            tempSpecifId = '';
            $("#confirmationModalSpecification").modal('hide');

            var product_id = $("#product_id").val();
            getSpecificProductDetail(product_id);

        } else {
            error = response.responseJSON.message;
            toastr.error(error, '', {
                timeOut: 3000
            });
        }
    }

    // features tab Js start
    $(document).on('click', '#addNewFeature', function (e) {

        let form = $('#addFeature_form');
        form.trigger("reset");
        setEditorData('#editor2', '');
        $("#feature_id,#file-input2").val('');
        $("#imagePreview_div").hide();
        $("#featureImagePreview").attr('src', '');
        $('input').removeClass('is-invalid');

        $("#addFeature_modal").modal('show');
        setTimeout(() => {
            $('#feature_title').focus();
        }, 2000);
    });

    $('#feature_file').on('change', function () {
        var file = this.files[0]; // Get the file
        if (file) {
            var reader = new FileReader(); // Create a FileReader
            reader.onload = function (e) {
                $('#featureImagePreview').attr('src', e.target.result);
                $('#imagePreview_div').show();
            };
            reader.readAsDataURL(file);
        } else {
            $('#featureImagePreview').attr('src', '');
            $('#imagePreview_div').hide();
        }
    });

    $(document).on('click', '#addFeature_btn', function (e) {

        var product_id = $("#product_id").val();
        let feature_desc = $('#editor2').next().find('.ck-content').html();
        let form = document.getElementById('addFeature_form');
        let data = new FormData(form);
        data.append('product_id', product_id);
        data.append('feature_description', feature_desc);

        let type = 'POST';
        let url = '/admin/products/saveProductFeature';
        SendAjaxRequestToServer(type, url, data, '', saveProductSpecificationsResponse, '', '#addFeature_btn');
    });

    function saveProductSpecificationsResponse(response) {
        if (response.status == 200) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            let form = $('#addSpecification_form');
            form.trigger("reset");
            $("#specification_id").val('');

            $("#addFeature_modal").modal('hide');

            var product_id = $("#product_id").val();
            getSpecificProductDetail(product_id);

        } else {
            if (response.status == 402) {
                error = response.message;
            } else {
                error = response.responseJSON.message;
                var is_invalid = response.responseJSON.errors;

                $.each(is_invalid, function (key) {
                    // Assuming 'key' corresponds to the form field name
                    var inputField = $('[name="' + key + '"]');
                    // Add the 'is-invalid' class to the input field's parent or any desired container
                    inputField.addClass('is-invalid');
                });
            }
            toastr.error(error, '', {
                timeOut: 3000
            });
        }
    }
    $(document).on('click', '#handleEditFeatureBtn', function (e) {
        var details = $(this).attr('data-feature');

        if (details != '') {
            details = JSON.parse(details);
            console.log(details);
            $("#feature_id").val(details.id);
            $("#feature_title").val(details.title);
            setEditorData('#editor2', details.description);

            $('#featureImagePreview').attr('src', base_url + '/public/' + details.filepath);
            $('#imagePreview_div').show();

            $("#addFeature_modal").modal('show');
        } else {
            toastr.error('Something went wrong...', '', {
                timeOut: 3000
            });
        }
    });

    var tempFeatureId = '';
    $(document).on('click', '.deleteFeatureConfirmBtn', function (e) {
        var feature_id = $(this).attr('data-id');
        tempFeatureId = feature_id;
        $("#confirmationModalFeature").modal('show');
    });

    $(document).on('click', '#deleteFeatureConfirmedBtn', function (e) {
        var feature_id = tempFeatureId;

        let form = '';
        let data = new FormData();
        data.append('feature_id', feature_id);
        let type = 'POST';
        let url = '/admin/products/deleteProductFeature';
        SendAjaxRequestToServer(type, url, data, '', deleteProductFeatureResponse, '', '#deleteFeatureConfirmedBtn');
    });

    function deleteProductFeatureResponse(response) {

        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            tempFeatureId = '';
            $("#confirmationModalFeature").modal('hide');

            var product_id = $("#product_id").val();
            getSpecificProductDetail(product_id);

        } else {
            error = response.responseJSON.message;
            toastr.error(error, '', {
                timeOut: 3000
            });
        }
    }


    $(document).on('click', '.flexSwitchCheckChecked', function (e) {

        var product_id = $(this).attr('data-id');

        let data = new FormData();
        data.append('product_id', product_id);
        let type = 'POST';
        let url = '/admin/products/markProductStatus';
        SendAjaxRequestToServer(type, url, data, '', markProductStatusResponse, '', '.edit_product');
    });

    function markProductStatusResponse(response) {
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 5000
            });

            getProductsOnLoad();

        }
        else if (response.status == 404) {
            toastr.error(response.message, '', {
                timeOut: 5000
            })
            getProductsOnLoad();
        }
        else {
            error = "Opps! Something went wrong";
            toastr.error(error, '', {
                timeOut: 5000
            });
        }
        getProductsOnLoad();

    }

    $(document).on('click', '.close_modal', function (e) {
        tempFeatureId = '';
        tempSpecifId = '';

        $(".modal").modal('hide');
    });

    $('body').on('click', '#handleMarkAsOfferedBtn', function () {
        var offered_prod_id = $(this).attr('data-id');
        var offered_flag = $(this).attr('data-offered-flag');
        $('#product_id_offered').val(offered_prod_id);
        $('#product_offered_flag').val(offered_flag == '0' ? '1' : '0');
        if (offered_flag == '0') {
            $(".makedAsOffered").modal('show');
        } else {
            $("#offered_percentage").val('');
            $(".removedFromOfferdConfirmModel").modal('show');
        }
    });

    $(document).on('click', '.changeProductOfferedStatus', function (e) {

        var product_id = $("#product_id_offered").val();
        var offered_flag = $("#product_offered_flag").val();
        var offered_percentage = $("#offered_percentage").val();
        if (offered_flag == '1') {
            if (offered_percentage == '') {
                toastr.error('Offer Percentage is required.', '', { timeOut: 3000 });
                return;
            }
            if (offered_percentage <= 0 || offered_percentage > 100) {
                toastr.error('Offer Percentage must be in between 0 to 100.', '', { timeOut: 3000 });
                return;
            }
        } else {
            offered_percentage = '0';
        }

        let data = new FormData();
        data.append('product_id', product_id);
        data.append('offered_flag', offered_flag);
        data.append('offered_percentage', offered_percentage);
        let type = 'POST';
        let url = '/admin/products/changeProductOfferedStatus';
        SendAjaxRequestToServer(type, url, data, '', changeProductOfferedStatusResponse, '', '.changeProductOfferedStatus');
    });

    function changeProductOfferedStatusResponse(response) {

        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            $('.modal').modal('hide');
            getProductsOnLoad();

        }
        else if (response.status == 400) {
            toastr.error(response.message, '', {
                timeOut: 3000
            });
        }
        else {
            error = "Opps! Something went wrong";
            toastr.error(error, '', {
                timeOut: 3000
            });
        }

    }

    $('body').on('click', '#hacndleMarkAsFeaturedBtn', function () {
        var product_id = $(this).attr('data-id');
        var featured_flag = $(this).attr('data-featured-flag');
        $('#featured_product_id').val(product_id);

        if (featured_flag == '1') {
            $("#featured_heading").html('Are you sure you want to remove this product from featured.');
        } else {
            $("#featured_heading").html('Are you sure you want to mark this product as featured.');
        }
        console.log('asd');

        $(".makedAsFeaturedConfirmationModel").modal('show');
    });

    $(document).on('click', '#featuredNowBtn', function (e) {

        var product_id = $("#featured_product_id").val();
        if (product_id != '') {
            let data = new FormData();
            data.append('product_id', product_id);
            let type = 'POST';
            let url = '/admin/products/changeProductFeaturedStatus';
            SendAjaxRequestToServer(type, url, data, '', changeProductFeaturedStatusResponse, '', '#featuredNowBtn');
        }

    });

    function changeProductFeaturedStatusResponse(response) {

        toastr.success(response.message, '', {
            timeOut: 3000
        });

        $('.modal').modal('hide');
        getProductsOnLoad();
    }




    // $('body').on('click', '#handleMarkAsFeaturedBtn', function () {
    //     const discountedRecord = $(this).attr('data-product-featured');
    //     const featuredVal = $(this).attr('data-product-featured-value');

    //     $('#featured_id').val(discountedRecord);
    //     if (featuredVal == 1) {

    //         $("#featured_heading").text("Mark As Unfeatured Now")
    //     }

    // })



    // $('body').on('click', '#featuredNowBtn', function () {
    //     const formData = document.getElementById('markedAsFeaturedForm');
    //     const data = new FormData(formData);
    //     const url = "/admin/product/markAsFeatured";

    //     SendAjaxRequestToServer('POST', url, data, '', handleMarkAsFeaturedResponse, '', '#addOfferedValueBtn');

    //     function handleMarkAsFeaturedResponse(response) {
    //         var errorMessage = "";
    //         if (response.status === 200) {
    //             toastr.success(response.message, '', {
    //                 timeOut: 3000
    //             });
    //             InitiateOnLoad();
    //             //  $('.makedAsFeaturedConfirmationModel').hide();
    //         } else if (response.status === 422) {
    //             // Handle validation errors
    //             errorMessage = response.responseJSON.message;
    //             toastr.error(errorMessage || 'An error occurred', '', {
    //                 timeOut: 3000
    //             });
    //             const validationErrors = response.responseJSON.errors || {};
    //             $.each(validationErrors, function (key, error) {
    //                 const inputField = $('[name="' + key + '"]');
    //                 inputField.addClass('is-invalid');
    //                 // Display validation error message next to the input field

    //             });
    //         } else {
    //             // Handle other errors
    //             toastr.error(response.responseJSON.message || 'An error occurred', '', {
    //                 timeOut: 3000
    //             });
    //         }
    //     }
    // });








    //-----------------------validation_________________________

    $('#client_name,#supplier_name').on('keydown', function (e) {    // only characters allow
        var key = e.keyCode || e.which;
        var char = String.fromCharCode(key);
        var controlKeys = ['Backspace', 'Tab', 'ArrowLeft', 'ArrowRight', 'Delete'];
        // Allow control keys and non-numeric characters
        if (controlKeys.includes(e.key) || !char.match(/[0-9]/)) {
            return true;
        } else {
            e.preventDefault();
            return false;
        }
    });
    $('#phone_number,onhand_qty').on('keydown', function (e) {      // only numbers allow
        var key = e.keyCode || e.which;
        var char = String.fromCharCode(key);
        var controlKeys = ['Backspace', 'Tab', 'ArrowLeft', 'ArrowRight', 'Delete', 'Enter'];
        // Allow control keys and numeric characters
        if (controlKeys.includes(e.key) || char.match(/[0-9]/)) {
            return true;
        } else {
            e.preventDefault();
            return false;
        }
    });


    $('#sku').on('keydown', function (event) {
        // Check if the Tab key (key code 9) is pressed
        if (event.key === 'Tab' || event.keyCode === 9) {
            event.preventDefault(); // Prevent the default tab behavior
            $('#product_name').focus(); // Move focus to the next field with ID product_name
        }
    });
    $('#price').on('keydown', function (event) {
        // Check if the Tab key (key code 9) is pressed
        if (event.key === 'Tab' || event.keyCode === 9) {
            event.preventDefault(); // Prevent the default tab behavior
            $('#discount_price').focus(); // Move focus to the next field with ID product_name
        }
    });
    $('#discount_price').on('keydown', function (event) {
        // Check if the Tab key (key code 9) is pressed
        if (event.key === 'Tab' || event.keyCode === 9) {
            event.preventDefault(); // Prevent the default tab behavior
            $('#weight').focus(); // Move focus to the next field with ID product_name
        }
    });
    $('#weight').on('keydown', function (event) {
        // Check if the Tab key (key code 9) is pressed
        if (event.key === 'Tab' || event.keyCode === 9) {
            event.preventDefault(); // Prevent the default tab behavior
            $('#onhand_qty').focus(); // Move focus to the next field with ID product_name
        }
    });

});
