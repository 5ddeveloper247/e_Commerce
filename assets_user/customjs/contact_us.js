$(document).ready(function () {
    $('#contactus_form_btn').on('click', function () {
        const form = document.getElementById('contactus_form');
        const formData = new FormData(form);
        const url = '/admin/contact/storeOrUpdate';
        const type = 'POST';

        SendAjaxRequestToServer(type, url, formData, '', handleContactusResponse, '', '.contactus_btn');

        function handleContactusResponse(response) {
            console.log(response);
            if (response.status == 200) {
                // Success: Display success message and reset form
                toastr.success(response.message, '', {
                    timeOut: 3000
                });
                // Reset the form and hide the modal
                form.reset();
                // Uncomment and define this function if you want to reload the admin list data
                // loadJobsPageData();
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
    });
});
