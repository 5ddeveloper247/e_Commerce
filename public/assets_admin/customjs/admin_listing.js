


$(document).ready(function () {
    var table = $('#admin-listing').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: 'listing/data-table', // replace with your server endpoint
            type: 'Post'
        },
        columns: [
            { data: 'id' },          // Adjust based on your data structure
            { data: 'username' },        // Adjust based on your data structure
            { data: 'email' },      // Adjust based on your data structure
            { data: 'status' },      // Adjust based on your data structure
            { data: 'action' }        // Adjust based on your data structure
        ],
        dom: '<"top"f>rt<"bottom"lip><"clear">', // Place filter (f) on top and align it with CSS
        buttons: [
            'copyHtml5', 'csvHtml5', 'excelHtml5', 'pdfHtml5', 'print'
        ]
    });

    fetchInitialLoad();
    function fetchInitialLoad() {
        const url = "/admin/listing/ajax";
        const type = "Get";
        let data = {}; // Your data to send to the server here
        SendAjaxRequestToServer(type, url, data, '', getAdminListing, '', '#contactReply_submit');

        function getAdminListing(response) {
            if (response.status == 200) {
                const active = response.active;
                const inactive = response.inactive;
                const total = response.count;
                console.log(active, inactive, total)
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

                $('#active').text(active)
                $('#inactive').text(inactive)
                $('#total').text(total)
                $('#admin_listing_table_body').html(html);
            }

        }
    }

    // Define additional functions for editing and removing admins
    $('body').on('click', '#handleEditAdminBtn', function () {
        const form = document.getElementById('addEventForm');
        // Remove all 'is-invalid' classes from form inputs and their error messages
        $('.p-label').removeClass('required-asterisk');
        $('.p-confirm-label').removeClass('required-asterisk');
        $(form).find('.is-invalid').removeClass('is-invalid');
        $(form).find('.invalid-feedback').remove(); // Assuming you're using Bootstrap-style error messages
        // Reset the form fields
        form.reset();
        // Retrieve the admin data from the clicked button and populate the form fields
        const item = JSON.parse($(this).attr('data-edit-admin'));
        $('#admin_name').val(item.username);
        $('#admin_email').val(item.email);
        $('#admin_status').prop('checked', item.status == 1);
        $('#admin-id').val(item.id);
        setTimeout(() => {
            $('#admin_name').focus();
        }, 2000)
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

        const url = "/admin/admin/delete/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', removeAdminResponse, '', '#deleteNowBtn');
    })

    function removeAdminResponse(response) {

        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })

            $('#confirmationModalRemove').modal('hide');
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
            fetchInitialLoad();
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            });
        }

    }

})

document.getElementById('togglePassword').addEventListener('click', function () {
    const passwordInput = document.getElementById('admin_password');
    const eyeIcon = document.getElementById('eyeIcon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.setAttribute('d', 'M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z');
    } else {
        passwordInput.type = 'password';
        eyeIcon.setAttribute('d', 'M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z');
    }
});

document.getElementById('toggleConfirmPassword').addEventListener('click', function () {
    const confirmPasswordInput = document.getElementById('admin_confirm_password');
    const eyeIconConfirm = document.getElementById('eyeIconConfirm');

    if (confirmPasswordInput.type === 'password') {
        confirmPasswordInput.type = 'text';
        eyeIconConfirm.setAttribute('d', 'M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z');
    } else {
        confirmPasswordInput.type = 'password';
        eyeIconConfirm.setAttribute('d', 'M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z');
    }

});



$('.modal-add-btn').on('click', function () {
    setTimeout(() => {
        $('#admin_name').focus();
    }, 2000)

});






