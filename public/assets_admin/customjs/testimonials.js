$(document).ready(function () {

    fetchInitialLoad();
    function fetchInitialLoad() {
        const url = "/admin/testimonials/ajax";
        const type = "Get";
        // Your data to send to the server here
        SendAjaxRequestToServer(type, url, '', '', getTestimonialsListing, '', '#contactReply_submit');

        function getTestimonialsListing(response) {
            try {
                // Check if response status is 200 (success)
                if (response.status === 200) {
                    // Update UI elements for active, inactive, and total counts safely
                    $('#state_active').text(response?.active ?? 'N/A');
                    $('#state_inactive').text(response?.inactive ?? 'N/A');
                    $('#state_total').text(response?.total ?? 'N/A');

                    // Check if the response data array exists and is not empty
                    if (Array.isArray(response.data) && response.data.length > 0) {
                        let html = '';

                        response.data.forEach((item, index) => {
                            // Safely access item properties with optional chaining and defaults
                            const name = item?.name || 'N/A';
                            const designation = item?.designation || 'N/A';
                            const description = item?.description || 'N/A';
                            const statusChecked = item?.status === 1 ? 'checked' : '';
                            const createdAt = item?.created_at
                                ? new Date(item.created_at).toLocaleDateString('en-US', { month: 'short', day: '2-digit' }) + ', ' +
                                  new Date(item.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })
                                : 'N/A';

                            // Append each testimonial row to the HTML string
                            html += `
                                <tr>
                                    <td class="ps-3">${index + 1}</td> <!-- Display row number -->
                                    <td class="ps-3">${name}</td> <!-- Display name safely -->
                                    <td class="ps-3">${designation}</td> <!-- Display designation safely -->
                                    <td class="ps-3">${description}</td> <!-- Display description safely -->
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
                                                   data-bs-target="#filterModal" data-edit-testimonial='${JSON.stringify(item)}' id="handleEditTestimonialBtn">Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                                   data-bs-target="#confirmationModalRemove" data-remove-testimonial='${JSON.stringify(item)}' id="handleRemoveTestimonialBtn">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            `;
                        });

                        // Insert the generated HTML into the table body
                        $('#testimonials_listing_table_body').html(html);
                    } else {
                        // If no testimonials are found, display a message
                        $('#testimonials_listing_table_body').html('<tr><td colspan="7" class="text-center">No testimonials found.</td></tr>');
                    }
                } else {
                    // Handle non-200 response status
                    console.error('Error: Response status is not 200. Actual status:', response.status);
                    $('#testimonials_listing_table_body').html('<tr><td colspan="7" class="text-center">Failed to load testimonials. Please try again later.</td></tr>');
                }
            } catch (error) {
                // Catch any unexpected errors and log them
                console.error('An unexpected error occurred:', error);
                $('#testimonials_listing_table_body').html('<tr><td colspan="7" class="text-center">An error occurred while processing the testimonials data.</td></tr>');
            }
        }

    }

    // Define additional functions for editing and removing admins
    $('body').on('click', '#handleEditTestimonialBtn', function () {
        const item = JSON.parse($(this).attr('data-edit-testimonial'));
        $('#name').val(item.name);
        $('#designation').val(item.designation);
        $('#description').val(item.description);
        $('#status').prop('checked', item.status == 1);
        $('#testimonial-id').val(item.id);
        const filePreview = document.getElementById('filePreview');
        const previewSectionMain = document.getElementById('previewSectionMain');
        filePreview.src = `${base_url}/storage/${item.mediaPath}`;
        filePreview.style.display = 'block';
        previewSectionMain.style.display = 'block';

    });









    $('body').on('click', '#editNowBtn', function () {

        let form = document.getElementById('addEventForm');
        const formData = new FormData(form);
        console.log(formData)

        const url = "/admin/testimonials/createOrUpdate";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', updatejaxResponse, '', '#editAdminNow');
    });

    function updatejaxResponse(response) {
        if (response.status === 200) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            // Reset the form and hide the modal
            const form = document.getElementById('addEventForm');
            const filePreview = document.getElementById('filePreview');
            filePreview.src = '';
            filePreview.style.display = 'none';
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


    $('body').on('click', '#handleRemoveTestimonialBtn', function () {
        const item = JSON.parse($(this).attr('data-remove-testimonial'));
        $("#delete-testimonial-id").val(item.id);
    });

    $('body').on('click', '#deleteNowBtn', function () {
        const data = {
            id: $('#delete-testimonial-id').val(),
        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }
        console.log(...formData);
        const url = "/admin/testimonial/delete";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', removeTestimonialResponse, '', '#deleteNowBtn');
    })

    function removeTestimonialResponse(response) {
        console.log(response);
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            fetchInitialLoad();
            $("#confirmationModalRemove").modal('hide');
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

        const url = "/admin/testimonial/status";
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



    //image preview
    const fileInput = document.getElementById('file');
    const filePreview = document.getElementById('filePreview');
    const previewSectionMain = document.getElementById('previewSectionMain');
    fileInput.addEventListener('change', function (event) {
        const file = event.target.files[0]; // Get the selected file
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                filePreview.src = e.target.result; // Set the preview image source
                filePreview.style.display = 'block'; // Show the preview image
                previewSectionMain.style.display = 'block'; // Show the preview image
            };
            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            filePreview.style.display = 'none'; // Hide the preview image if no file is selected
        }
    });


    $('body').on('click', '#addBtn', function () {
        const previewSectionMain = document.getElementById('previewSectionMain');
        const filePreview = document.getElementById('filePreview');
        filePreview.src = '';
        filePreview.style.display = 'none';
        previewSectionMain.style.display = 'none';

    });

})
