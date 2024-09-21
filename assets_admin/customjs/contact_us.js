$(document).ready(function () {


    fetchInitalContactListing();
    function fetchInitalContactListing() {
        const url = "/admin/contact/ajax";
        const type = "Get";
        SendAjaxRequestToServer(type, url, '', '', getInitialContactListingResponse, '', '');
        contact_listing_table_body
        function getInitialContactListingResponse(response) {
            try {
                // Check if response status is 200 (success)
                if (response.status === 200) {
                    // Update UI elements with active, inactive, and total counts
                    $('#active').text(response?.active ?? 'N/A');
                    $('#inactive').text(response?.inactive ?? 'N/A');
                    $('#total').text(response?.total ?? 'N/A');

                    // Check if the contacts array exists and is not empty
                    if (Array.isArray(response.contacts) && response.contacts.length > 0) {
                        let html = '';

                        response.contacts.forEach((item, index) => {
                            // Safely access item properties with optional chaining and defaults
                            const fullName = item?.full_name || 'N/A';
                            const phoneNumber = item?.phone_number || 'N/A';
                            const emailAddress = item?.email_address || 'N/A';
                            const statusChecked = item?.status === 1 ? 'checked' : '';
                            const createdAt = item?.created_at
                                ? new Date(item.created_at).toLocaleDateString('en-US', { month: 'short', day: '2-digit' }) + ', ' +
                                  new Date(item.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })
                                : 'N/A';

                            html += `
                                <tr>
                                    <td class="ps-3">${index + 1}</td> <!-- Display row number -->
                                    <td class="ps-3">${fullName}</td> <!-- Display full name safely -->
                                    <td class="ps-3">${phoneNumber}</td> <!-- Display phone number safely -->
                                    <td class="ps-3">${emailAddress}</td> <!-- Display email address safely -->
                                    <td class="text-center">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"
                                                   id="flexSwitchCheckChecked${item?.id}" ${statusChecked}>
                                        </div>
                                    </td>
                                    <td class="ps-3 text-nowrap">${createdAt}</td> <!-- Safely handled created_at -->
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
                                                   data-bs-target="#filterModal" data-edit-contact='${JSON.stringify(item?.id)}' id="handleEditAddBtn">Edit</a>
                                                <div class="dropdown-divider"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            `;
                        });

                        // Insert the generated HTML into the table body
                        $('#contact_listing_table_body').html(html);
                    } else {
                        // If no contacts are found, show a message
                        $('#contact_listing_table_body').html('<tr><td colspan="7" class="text-center">No contacts found.</td></tr>');
                    }
                } else {
                    // Handle non-200 response status
                    console.error('Error: Response status is not 200. Actual status:', response.status);
                    $('#contact_listing_table_body').html('<tr><td colspan="7" class="text-center">Failed to load contacts. Please try again later.</td></tr>');
                }
            } catch (error) {
                // Catch any unexpected errors and log them
                console.error('An unexpected error occurred:', error);
                $('#contact_listing_table_body').html('<tr><td colspan="7" class="text-center">An error occurred while processing the contact data.</td></tr>');
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
                // Check if the request was successful
                if (response.status == 200) {
                    let item = response.contact;
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
            if (response.status == 200) {
                // Success: Display success message and reset form
                toastr.success(response.message, '', {
                    timeOut: 3000
                });
                form.reset();
                $('.addUpdateContactModal').modal('hide');
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

        const url = "/admin/contact/status/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', updateStatusResponse, '', '#flexSwitchCheckChecked');
    });




    function updateStatusResponse(response) {
        console.log('Status updated successfully');
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            fetchInitalContactListing();
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            });
        }

    }


});
