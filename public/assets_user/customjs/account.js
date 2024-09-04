



$(document).ready(function () {
    initialLoad()
    function initialLoad() {
        const type = 'Get';
        const url = '/user';
        SendAjaxRequestToServer(type, url, '', '', handleUserResponse, '', '#updateUserSettingsBtn');

    }
    function handleUserResponse(response) {
        if (response.status === 200) {
            const user = response.data;

            // Set the form values using the received user data
            document.getElementById('firstName').value = user.first_name || '';
            document.getElementById('lastName').value = user.last_name || '';
            document.getElementById('company').value = user.company_name || '';
            document.getElementById('phoneNumber').value = user.phone || '';
            document.getElementById('emailAddress').value = user.email || '';

            // You can add more fields as needed
        }
    }








    $('body').on('click', '#updateDetailBtn', function () {

        const form = document.getElementById('userSettingsForm')
        const fomrData = new FormData(form);
        const type = 'POST';
        const url = '/account/update';

        SendAjaxRequestToServer(type, url, fomrData, '', handleUserSettingsResponse, '', '#updateUserSettingsBtn');

        function handleUserSettingsResponse(response) {
            if (response.status === 200) {
                // Success: Display success message and reset form
                toastr.success(response.message, '', {
                    timeOut: 3000
                });
                // Reset the form and hide the modal
                const form = document.getElementById('userSettingsForm');
                form.reset();
                initialLoad();
                // Uncomment and define this function if you want to reload the admin list data
                // loadJobsPageData();
            }
            else {
                // Error Handling
                let errorMessage = 'An error occurred. Please try again.';
                if (response.status === 402) {
                    // Handle specific error status
                    errorMessage = response.message;
                }
                else if (response.status === 422) {
                    // Validation errors
                    errorMessage = response.responseJSON.message || 'Validation failed.';
                    const validationErrors = response.responseJSON.errors || {};

                    // Log the response for debugging
                    console.error(validationErrors);

                    // Highlight the invalid fields
                    $.each(validationErrors, function (key, error) {
                        const inputField = $('[name="' + key + '"]');
                        inputField.addClass('is-invalid');
                        // Optionally, show error messages next to each field
                        // inputField.after('<div class="invalid-feedback">' + error[0] + '</div>');
                    });
                }
                else if (response.status === 400) {
                    errorMessage = response.responseJSON.message || 'Validation failed.';
                    const validationErrors = response.responseJSON.validationErrors || {};

                    const inputField = $('[name="' + validationErrors.field + '"]');
                    inputField.addClass('is-invalid');
                    // Optionally, show error messages next to each field
                    // inputField.after('<div class="invalid-feedback">' + error[0] + '</div>');

                }
                else if (response.status === 500) {

                    // Handle server error
                    errorMessage = response.message || 'Internal server error. Please contact support.';
                }

                // Display error message
                toastr.error(errorMessage, '', {
                    timeOut: 3000
                });
            }
        }


    })

})
