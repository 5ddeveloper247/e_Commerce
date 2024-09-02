$(document).ready(function () {


    fetchInitalNewsListing();
    function fetchInitalNewsListing() {
        const url = "/admin/newletters/ajax";
        const type = "Get";
        SendAjaxRequestToServer(type, url, '', '', getInitialNewListingResponse, '', '');
        function getInitialNewListingResponse(response) {
            console.log(response)
            if (response.status == 200) {
                $('#active').text(response.active)
                $('#inactive').text(response.inactive)
                $('#total').text(response.total);
                let html = '';
                response.newsletters.forEach((item, index) => {

                    // edit has done already with working functuanlity is required then add thsese
                    // below the remove button of the html which is created dynamically then the edit starts working
                    //     <a class="dropdown-item" type="button" data-bs-toggle="modal"
                    //     data-bs-target=".addUpdateNewsModal" data-edit-newsletter='${JSON.stringify(item)}' id="handleEditAddBtn">Edit</a>
                    //  <div class="dropdown-divider"></div>

                    html += `
                        <tr>
                            <td class="ps-3">${index + 1}</td>
                            <td class="ps-3">${item.email}</td>
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

                                       <a class="dropdown-item text-danger" type="button" data-bs-toggle="modal"
                                       data-bs-target="#confirmationModalRemove" data-remove-news='${JSON.stringify(item.id)}' id="handleRemoveNewsBtn">Remove</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    `;
                });
                $('#newsletter_listing_table_body').html(html);


            }
        }
    }





    $('body').on('click', '#handleEditAddBtn', function () {
        const item = JSON.parse($(this).attr('data-edit-newsletter'));
        console.log(item)

        // Populate form fields with the retrieved data
        $('#email').val(item.email);
        $('#news-id').val(item.id);
    });


    $('body').on('click', '#editNewsNow', function () {

        const form = document.getElementById('updateForm');
        const formData = new FormData(form);
        const url = "/admin/newsletters/create/ajax";
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
                fetchInitalNewsListing();
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


    $('body').on('click', '#handleRemoveNewsBtn', function () {
        const item = $(this).attr('data-remove-news');
        $("#delete-news-id").val(item);
    });

    $('body').on('click', '#deleteNowBtn', function () {
        const data = {
            id: $('#delete-news-id').val(),
        }
        const formData = new FormData();
        for (const key in data) {
            if (data.hasOwnProperty(key)) {
                formData.append(key, data[key]);
            }
        }
        const url = "/admin/newsDelete/ajax";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', removeNewsResponse, '', '#deleteNowBtn');
    })


    function removeNewsResponse(response) {
        console.log(response);
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            fetchInitalNewsListing();
            $('#confirmationModalRemove').modal('hide');
        }
        else {
            fetchInitalNewsListing();
            $('#confirmationModalRemove').modal('hide');
            toastr.error('An error occurred. Please try again.', '', {
                timeOut: 3000
            })
        }
    }

});
