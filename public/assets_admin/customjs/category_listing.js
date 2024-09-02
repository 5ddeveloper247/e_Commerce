
$(document).ready(function () {

    $('#exam-listing').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        pageLength: 10,
        buttons: [{
            extend: 'csv',
            text: 'Export'
        },],
        lengthMenu: [5, 10, 25, 50, 75, 100]
    });

    getCategoriesOnLoad();
    function getCategoriesOnLoad() {
        const url = "/admin/category/listing/ajax";
        const type = "Get";
        let data = {}; // Your data to send to the server here
        SendAjaxRequestToServer(type, url, data, '', getCategoryListing, '', '#contactReply_submit');

        function getCategoryListing(response) {

            $('#activeRecord').text(response.active);
            $('#inactiveRecord').text(response.inactive);
            $('#totlaRecrod').text(response.count);
            if (response.status == 200) {
                let html = '';
                response.category.forEach((item, index) => {


                    html += `
                        <tr>
                            <td class="ps-3">${index + 1}</td>
                            <td class="ps-3">${item.category_name}</td>
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
                                        <a class="dropdown-item modal-edit-btn" type="button" data-bs-toggle="modal"
                                           data-bs-target="#filterModal" data-edit-category='${JSON.stringify(item)}' id="handleEditCategoryBtn">Edit</a>
                                        <div class="dropdown-divider"></div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    `;
                });
                $('#category_listing_table_body').html(html);
            }

        }
    }


    $('body').on('click', '#handleEditCategoryBtn', function () {
        const item = JSON.parse($(this).attr('data-edit-category'));
        $('#category_name').val(item.category_name);
        $('#category_description').val(item.description);
        $('#category_status').prop('checked', item.status == 1);
        $('#category_id').val(item.id);
    })

    $('body').on('click', '#editCategoryNow', function () {

        const data = {
            id: $('#category_id').val(),
            category_name: $('#category_name').val(),
            category_description: $('#category_description').val(),
            category_status: $('#category_status').is(':checked') ? 1 : 0,

        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }
        const url = "/admin/category/edit/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', updateCategoryjaxResponse, '', '#editAdminNow');
    });

    function updateCategoryjaxResponse(response) {
        if (response.status === 200) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            // Reset the form and hide the modal
            const form = document.getElementById('addUpdateCategory');
            form.reset();
            $('.filterModal').modal('hide');

            getCategoriesOnLoad();

            // Uncomment and define this function if you want to reload the admin list data
            // loadJobsPageData();

        } else if (response.status === 403) {
            // Handle forbidden error
            toastr.error(response.message, '', {
                timeOut: 3000
            });

        } else if (response.status === 402) {
            // Handle specific error status
            toastr.error(response.message, '', {
                timeOut: 3000
            });

        } else if (response.status === 422) {
            // Validation errors
            let errorMessage = response.responseJSON.message || 'Validation failed.';
            const validationErrors = response.responseJSON.errors || {};

            // Highlight the invalid fields
            $.each(validationErrors, function (key, error) {
                const inputField = $('[name="' + key + '"]');
                inputField.addClass('is-invalid');
                // Optionally, show error messages next to each field
                // inputField.after('<div class="invalid-feedback">' + error[0] + '</div>');
            });

            toastr.error(errorMessage, '', {
                timeOut: 3000
            });

        } else if (response.status === 500) {
            // Handle server error
            toastr.error(response.message || 'Internal server error. Please contact support.', '', {
                timeOut: 3000
            });

        } else {
            // General error handling for other statuses
            toastr.error('An error occurred. Please try again.', '', {
                timeOut: 3000
            });
        }
    }

    $('body').on('click', '#handleRemoveCategoryBtn', function () {
        const item = JSON.parse($(this).attr('data-remove-category'));
        $("#delete-category-id").val(item.id);
    });

    $('body').on('click', '#deleteNowBtn', function () {
        const data = {
            id: $('#delete-category-id').val(),
        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }
        console.log(...formData);
        const url = "/admin/admin/category/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', removeCategoryResponse, '', '#deleteNowBtn');
    });

    function removeCategoryResponse(response) {
        console.log(response);
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            location.reload();
        }
        else {
            toastr.error('An error occurred. Please try again.', '', {
                timeOut: 3000
            })
        }
    }

    //update user status
    //update status

    $('body').on('change', '.flexSwitchCheckChecked', function () {
        const data = {
            id: $(this).attr('id').split('flexSwitchCheckChecked')[1],

            status: $(this).is(':checked') ? 1 : 0,
        }
        console.log(data);
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }
        console.log(...formData);
        const url = "/admin/category/status/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', updateStatusResponse, '', '#flexSwitchCheckChecked');
    });

    function updateStatusResponse(response) {
        console.log('Status updated successfully');
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            getCategoriesOnLoad();
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            });
        }

    }

});
