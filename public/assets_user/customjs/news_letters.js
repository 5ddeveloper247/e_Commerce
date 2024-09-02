
$(document).ready(function () {
    $('#newsLetterSubscribeBtn').on('click', function () {
        var form = document.getElementById('newsLetterForm');
        const formData = new FormData(form);
        const type = "POST";
        const url = "/admin/newsletters/create/ajax"; // replace with your server-side route

        SendAjaxRequestToServer(type, url, formData, '', getNewsLetterResponse, 'newsLetterSubscribeBtn');

        function getNewsLetterResponse(response) {
            if (response.status == 200) {
                toastr.success(response.message, '', {
                    timeOut: 3000,
                });
                form.reset()
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

