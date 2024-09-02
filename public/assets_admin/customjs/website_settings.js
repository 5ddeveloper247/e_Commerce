$(document).ready(function () {



    SendAjaxRequestToServer("Get", "/admin/site/settings/get", '', '', getSiteSettings, '');

    function getSiteSettings(response) {
        if (response.status === 200) {
            // Process the response to populate the files array
            response.settings.setting_files.forEach((file) => {
                const imgdata = {
                    id: file.id,
                    name: base_url + '/storage/' + file.file_path
                };
                files.push(imgdata);
            });

            displayExistedFiles(); // Call to display the initial files
        }
    }

    //logo handling started
    // JavaScript to dynamically preview the uploaded image
    document.getElementById('logo').addEventListener('change', function (event) {
        const file = event.target.files[0]; // Get the selected file

        if (file) {
            const reader = new FileReader(); // Create a new FileReader object

            // Define the onload event for the reader
            reader.onload = function (e) {
                // Set the src attribute of the image preview element
                document.getElementById('logo-preview').src = e.target.result;
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            // If no file is selected, reset the src attribute to a default image
            document.getElementById('logo-preview').src = "https://static.onecompiler.com/images/logo/oc_logo_v4_light.svg";
        }
    });

    //save settings
    //site_settings_form

    $('body').on('click', '#saveSettingsBtn', function () {

        const settingForm = document.getElementById('site_settings_form'); // get the jQuery object for the form
        var formData = new FormData(settingForm);
        if (selectedFiles.length > 0) {
            for (let i = 0; i < selectedFiles.length; i++) {
                formData.append('banner_images[]', selectedFiles[i]);
            }
        } else {
            formData.append('banner_images', '');
        }
        const url = "/admin/site/settings/store";
        const type = "POST";
        SendAjaxRequestToServer(type, url, formData, '', handleSiteSettingResponse, '', '#editAdminNow');

        function handleSiteSettingResponse(response) {
            if (response.status === 200) {
                // Success: Display success message and reset form
                toastr.success(response.message, '', {
                    timeOut: 3000
                });

                // Reset the form and hide the modal
                window.location.reload();

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
                        console.log(error, key)
                        console.log("error,key")
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
