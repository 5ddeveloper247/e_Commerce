$(document).ready(function () {
    var table = $('#reviews-listing').DataTable({
        "paging": false,
        "searching": false,
        "ordering": true,
    });

    $('#review-search-input').on("keyup", function (e) {
        var tr = $('.data-row');
        if ($(this).val().length >= 1) {//character limit in search box.
            var noElem = true;
            var val = $.trim(this.value).toLowerCase();
            el = tr.filter(function () {
                return $(this).find('.data-col').text().toLowerCase().match(val);
            });
            if (el.length >= 1) {
                noElem = false;
            }
            tr.not(el).hide();
            el.fadeIn().show();
        } else {
            tr.fadeIn().show();
        }
    });


    fetchInitalContactListing();
    function fetchInitalContactListing() {
        const url = "/admin/reviews/listing";
        const type = "Get";
        SendAjaxRequestToServer(type, url, '', '', getInitialListingResponse, '', '');
        function getInitialListingResponse(response) {
            try {
                // Check if response status is 200 (success)
                if (response.status === 200) {
                    // Update UI elements with active, inactive, and total counts
                    $('#active').text(response?.active ?? 'N/A');
                    $('#inactive').text(response?.inactive ?? 'N/A');
                    $('#total').text(response?.count ?? 'N/A');

                    // Check if the contacts array exists and is not empty
                    if (Array.isArray(response.reviews) && response.reviews.length > 0) {
                        let html = '';

                        response.reviews.forEach((item, index) => {
                            // Safely access item properties with optional chaining and defaults
                            const fullName = item?.user?.username || 'N/A';
                            const rating = item?.rating || 0;
                            const review = item?.review || 'N/A';
                            const statusChecked = item?.status === 1 ? 'checked' : '';
                            const createdAt = item?.created_at
                                ? new Date(item.created_at).toLocaleDateString('en-US', { month: 'short', day: '2-digit' }) + ', ' +
                                new Date(item.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })
                                : 'N/A';

                            // Generate star icons based on the rating value
                            const stars = Array.from({ length: 5 }, (_, i) =>
                                i < rating
                                    ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#FFD700" class="bi bi-star-fill" viewBox="0 0 16 16"><path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73-3.522-3.356c-.329-.314-.158-.888.283-.95l4.898-.696L8.465.792a.513.513 0 0 1 .97 0l2.191 4.326 4.898.696c.441.062.612.636.283.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/></svg>'
                                    : '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ccc" class="bi bi-star" viewBox="0 0 16 16"><path d="M2.866 14.85c-.078.444.36.79.746.592l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.329-.314.158-.888-.283-.95l-4.898-.696-2.191-4.326a.513.513 0 0 0-.97 0L6.658 6.218l-4.898.696c-.441.062-.612.636-.283.95l3.522 3.356-.83 4.73z"/></svg>'
                            ).join('');

                            html += `
                                <tr class="data-row">
                                    <td class="ps-3 data-col">${index + 1}</td> <!-- Display row number -->
                                    <td class="ps-3 data-col">${fullName}</td> <!-- Display full name safely -->
                                    <td class="ps-3 data-col">${stars}</td> <!-- Display star icons based on rating -->
                                    <td class="ps-3 data-col">${review}</td> <!-- Display review safely -->
                                    <td class="text-center data-col">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input flexSwitchCheckChecked" type="checkbox" role="switch"
                                                   id="flexSwitchCheckChecked${item?.id}" ${statusChecked}>
                                        </div>
                                    </td>
                                    <td class="ps-3 text-nowrap data-col">${createdAt}</td> <!-- Safely handled created_at -->
                                </tr>
                            `;
                        });

                        // Insert the generated HTML into the table body
                        $('#reviews_listing_table_body').html(html);
                    } else {
                        // If no contacts are found, show a message
                        $('#reviews_listing_table_body').html('<tr><td colspan="7" class="text-center">No reviews found.</td></tr>');
                    }
                } else {

                    $('#reviews_listing_table_body').html('<tr><td colspan="7" class="text-center">Failed to load reviews. Please try again later.</td></tr>');
                }
            } catch (error) {

                $('#reviews_listing_table_body').html('<tr><td colspan="7" class="text-center">An error occurred while processing the reviews data.</td></tr>');
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

        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }

        const url = "/admin/reviews/status";
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
