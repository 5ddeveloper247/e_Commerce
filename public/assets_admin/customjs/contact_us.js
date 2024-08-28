$(document).ready(function () {


    fetchInitalContactListing();
    function fetchInitalContactListing() {
        const url = "/admin/contact/ajax";
        const type = "Get";
        SendAjaxRequestToServer(type, url, '', '', getInitialContactListingResponse, '', '');
        contact_listing_table_body
        function getInitialContactListingResponse(response) {
            if (response.status == 200) {
                let html = '';
                response.contacts.forEach(item => {
                    html += `
                        <tr>
                            <td class="ps-3">${item.id}</td>
                            <td class="ps-3">${item.full_name}</td>
                            <td class="ps-3">${item.phone_number}</td>
                            <td class="ps-3">${item.email_address}</td>
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
                                        <a class="dropdown-item modal-btn" type="button" data-bs-toggle="modal"
                                           data-bs-target="#filterModal" data-modal-type="edit" data-edit-contact='${JSON.stringify(item.id)}' id="handleEditAddBtn">Edit</a>
                                        <div class="dropdown-divider"></div>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    `;
                });
                $('#contact_listing_table_body').html(html);
            }
        }
    }



    $('body').on('click', '#handleEditAddBtn', function () {
        const itemId = $(this).attr('data-edit-contact');
        const type = "POST";
        const url = "/admin/getcontact/ajax";

        // Define the data to send in the AJAX request
        const data = {
            id: itemId,  // Assuming 'id' is the expected parameter for the backend route
            _token: $('meta[name="csrf-token"]').attr('content') // Include CSRF token for security
        };

        // Send AJAX request to the server
        $.ajax({
            type: type,
            url: url,
            data: data,
            dataType: 'json',
            success: function (response) {
                console.log(response);

                // Check if the request was successful
                if (response.status == 200) {
                    let item = response.contact;
                    console.log("item", item);

                    // Populate form fields with the retrieved data
                    $('#full_name').val(item.full_name);
                    $('#phone_number').val(item.phone_number);
                    $('#email').val(item.email_address);
                    $('#order_number').val(item.order_number);
                    $('#company_name').val(item.company_name);
                    $('#rma_number').val(item.rma_number);
                    $('#comment').val(item.comment);
                    $('#status').prop('checked', item.status == 1);
                    $('#contact-id').val(item.id);
                }
            },
            error: function (xhr, status, error) {

                toast.error('An error occurred while processing your request.', '', {
                    time: 3000,
                });
            }
        });
    });


    $('body').on('click', '#editContactNow', function () {

        const form = document.getElementById('updateForm');
        const formData = new FormData(form);
        const url = "/admin/contact/storeOrUpdate";
        const type = "Post";
        SendAjaxRequestToServer(type, url, formData, '', getUpdateResponse, '', '');
        function getUpdateResponse(response) {
            console.log(response);
            if (response.status == 200) {
                // Success: Display success message and reset form
                toastr.success(response.message, '', {
                    timeOut: 3000
                })
                form.reset();
                fetchInitalContactListing();
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


});
