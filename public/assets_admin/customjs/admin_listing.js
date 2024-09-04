$(document).ready(function () {

    fetchInitialLoad();
    function fetchInitialLoad() {
        const url = "/admin/admin/listing/ajax";
        const type = "Get";
        let data = {}; // Your data to send to the server here
        SendAjaxRequestToServer(type, url, data, '', getAdminListing, '', '#contactReply_submit');

        function getAdminListing(response) {

            console.log(response);
            if (response.status == 200) {
                let html = '';
                response.admins.forEach((item, index) => {
                    html += `
                    <tr>
                        <td class="ps-3">${index + 1}</td> <!-- Changed item.id to index + 1 -->
                        <td class="ps-3">${item.username}</td>
                        <td class="ps-3">${item.email}</td>
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
                                       data-bs-target="#filterModal" data-edit-admin='${JSON.stringify(item)}' id="handleEditAdminBtn">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                       data-bs-target="#confirmationModalRemove" data-remove-admin='${JSON.stringify(item)}' id="handleRemoveAdminBtn">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
                });

                $('#admin_listing_table_body').html(html);
            }

        }
    }

    // Define additional functions for editing and removing admins
    $('body').on('click', '#handleEditAdminBtn', function () {
        const item = JSON.parse($(this).attr('data-edit-admin'));
        $('#admin_name').val(item.username);
        $('#admin_email').val(item.email);
        $('#admin_status').prop('checked', item.status == 1);
        $('#admin-id').val(item.id);
    });

    $('body').on('click', '#editAdminNow', function () {
        const data = {
            id: $('#admin-id').val(),
            admin_name: $('#admin_name').val(),
            admin_email: $('#admin_email').val(),
            admin_status: $('#admin_status').is(':checked') ? 1 : 0,
            admin_password: $('#admin_password').val(),
            admin_confirm_password: $('#admin_confirm_password').val(),
        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }
        const url = "/admin/admin/edit/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', updateAdminajaxResponse, '', '#editAdminNow');
    });

    function updateAdminajaxResponse(response) {
        if (response.status === 200) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            // Reset the form and hide the modal
            const form = document.getElementById('addEventForm');
            form.reset();
            $("#filterModal").modal('hide');
            fetchInitialLoad();

            // Uncomment and define this function if you want to reload the admin list data
            // loadJobsPageData();
        }
        else {
            // Error Handling
            let errorMessage = 'An error occurred. Please try again.';

            if (response.status === 402) {
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




    $('body').on('click', '#handleRemoveAdminBtn', function () {
        const item = JSON.parse($(this).attr('data-remove-admin'));
        $("#delete-admin-id").val(item.id);
    });

    $('body').on('click', '#deleteNowBtn', function () {
        const data = {
            id: $('#delete-admin-id').val(),
        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }
        console.log(...formData);
        const url = "/admin/admin/delete/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', removeAdminResponse, '', '#deleteNowBtn');
    })

    function removeAdminResponse(response) {
        console.log(response);
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            fetchInitialLoad();
        }
        else {
            toastr.error('An error occurred. Please try again.', '', {
                timeOut: 3000
            })
        }
    }



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
        const url = "/admin/user/status/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', updateStatusResponse, '', '#flexSwitchCheckChecked');
    });




    function updateStatusResponse(response) {
        console.log('Status updated successfully');
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            fetchInitialLoad();
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            });
        }

    }

})
