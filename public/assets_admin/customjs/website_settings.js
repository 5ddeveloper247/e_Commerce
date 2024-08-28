$(document).ready(function () {



    SendAjaxRequestToServer("Get", "/admin/site/settings/get", '', '', getSiteSettings, '');
    var files = [];

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

    function removeExistedFiles(fileIndex) {
        // Remove the file from the files array
        const removedfile = files[fileIndex]; // Directly use fileIndex to get the file object
        files.splice(fileIndex, 1); // Remove the file from the array

        if (removedfile !== undefined) {
            const url = "/admin/settings/file/remove";
            const type = "POST";
            const data = {
                id: removedfile.id
            };

            // Ensure that AJAX settings are correct
            $.ajax({
                type: type,
                url: url,
                data: JSON.stringify(data),
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                success: function (response) {
                    handleFileRemoveResponse(response);
                },
                error: function (error) {
                    console.error("Error removing file:", error);
                }
            });
        }

        // Re-render the image container after removal
        displayExistedFiles();
    }


    function handleFileRemoveResponse(response) {
        if (response.status == 200) {
            toastr.success(response.message, '', {
                "timeOut": "3000"
            })
        }
        else {
            toastr.error(response.message, '', {
                "timeOut": "3000"
            })
        }
    }

    function displayExistedFiles() {
        const $imageContainerexisted = $('.image-container-existed');
        $imageContainerexisted.empty(); // Clear previous images

        files.forEach((file, index) => {
            const $imageDiv = $('<div>').addClass('image-item-land');
            const $image = $('<img>').attr('src', file.name);
            $imageDiv.append($image);

            const $fileName = $('<p>').text(file.name); // Display the file ID if needed
            $imageDiv.append($fileName);

            const $cancelButton = $('<span>').html('&times;').addClass('cancel-icon');
            $cancelButton.on('click', function () {
                removeExistedFiles(index); // Call remove function with the current index
            });

            $imageDiv.append($cancelButton);
            $imageContainerexisted.append($imageDiv);
        });
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






    //logo handling ended
    $('#file-input').on('change', function (event) {
        const files = event.target.files;
        var allfileslength = files.length + selectedFiles.length;
        if (allfileslength > 7) {
            toastr.error('You can upload a maximum of 7 images.');
            return;
        }
        $('.image-container-selected').empty();
        // Validate and add selected files to selectedFiles array
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            // Check if the file is an image
            if (!file.type.startsWith('image/')) {
                toastr.error('Please select only image files.');
                continue;
            }
            selectedFiles.push(file);
        }
        // Update the display
        displaySelectedFiles();
    });





    var selectedFiles = [];
    function displaySelectedFiles() {
        const $imageContainerselected = $('.image-container-selected');
        $imageContainerselected.empty(); // Clear previous images
        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (e) {
                const $imageDiv = $('<div>').addClass('image-item-land'); const $image = $('<img>').attr('src', e.target.result);
                $imageDiv.append($image);
                const $fileName = $('<p>').text(file.name);
                $imageDiv.append($fileName);
                const $cancelButton = $('<span>').html('&times;').addClass('cancel-icon');
                $cancelButton.on('click', function () {
                    selectedFiles.splice(index, 1);
                    displaySelectedFiles();
                });

                $imageDiv.append($cancelButton);
                $imageContainerselected.append($imageDiv);
            }
            reader.readAsDataURL(file);
        });
    }




    //save settings
    //site_settings_form

    $('body').on('click', '#saveSettingsBtn', function () {

        const settingForm = document.getElementById('site_settings_form'); // get the jQuery object for the form
        var formData = new FormData(settingForm);
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
