$(document).ready(function () {
    fetchInitalListing();
    function fetchInitalListing() {
        const url = "/admin/user/listing/ajax";
        const type = "Get";
        let data = {}; // Your data to send to the server here
        SendAjaxRequestToServer(type, url, data, '', getUsersListing, '', '#contactReply_submit');
    }

    function getUsersListing(response) {
        if (response.status == 200) {
            const active=response.active;
            const inactive=response.inactive;
            const total=response.count;
            let html = '';
            response.users.forEach(item => {
                html += `
                    <tr>
                        <td class="ps-3">${item.id}</td>
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
                                       data-bs-target="#filterModal" data-edit-user='${JSON.stringify(item)}' id="handleEditUserBtn">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                       data-bs-target="#confirmationModal"  data-remove-user='${JSON.stringify(item)}' id="handleRemoveUserBtn">Remove</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                `;
            });
            $('#active').text(active)
            $('#inactive').text(inactive)
            $('#total').text(total)
            $('#user_listing_table_body').html(html);
        }

    }



    $('body').on('click', '#handleEditUserBtn', function () {
        const item = JSON.parse($(this).attr('data-edit-user'));
        const form = document.getElementById('addEventForm');
        $('.p-label').removeClass('required-asterisk');
        $('.p-confirm-label').removeClass('required-asterisk');
        $(form).find('.is-invalid').removeClass('is-invalid');
        // Reset the form fields
        form.reset();

        $('#user_name').val(item.username);
        $('#user_email').val(item.email);
        $('#user_status').prop('checked', item.status == 1);
        $('#user_id').val(item.id);
    })

    $('body').on('click', '#editUserNow', function () {

        const data = {
            id: $('#user_id').val(),
            user_name: $('#user_name').val(),
            user_email: $('#user_email').val(),
            user_status: $('#user_status').is(':checked') ? 1 : 0,
            user_password: $('#user_password').val(),
            user_confirm_password: $('#user_confirm_password').val(),
        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }

        console.log(...formData);
        const url = "/admin/user/edit/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', updateUserajaxResponse, '', '#editAdminNow');
    });



    function updateUserajaxResponse(response) {
        if (response.status === 200) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            // Reset the form and hide the modal
            $('#addEventForm').trigger("reset");
            $("#filterModal").modal('hide');
            fetchInitalListing();

        } else {
            // Error Handling
            let errorMessage = 'An error occurred. Please try again.';

            if (response.status === 402) {
                // Handle specific error status
                errorMessage = response.message;
            } else if (response.status == 422) {
                // Validation errors

                errorMessage = response.responseJSON.message || 'Validation failed.';
                const validationErrors = response.responseJSON.errors || {};
                $.each(validationErrors, function (key, error) {
                    const inputField = $('[name="' + key + '"]');
                    inputField.addClass('is-invalid');

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


    $('body').on('click', '#handleRemoveUserBtn', function () {
        const item = JSON.parse($(this).attr('data-remove-user'));
        $("#delete-user-id").val(item.id);
    });

    $('body').on('click', '#deleteNowBtn', function () {
        const data = {
            id: $('#delete-user-id').val(),
        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }
        const url = "/admin/admin/delete/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', removeUserResponse, '', '#deleteNowBtn');
    })

    function removeUserResponse(response) {
        console.log(response);
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            $('#confirmationModal').modal('hide');
            fetchInitalListing();
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
        const url = "/admin/user/status/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', updateStatusResponse, '', '#flexSwitchCheckChecked');
    });


    function updateStatusResponse(response) {
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            fetchInitalListing();
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            });
        }

    }

})
