



$(document).ready(function () {
    initialLoad()
    function initialLoad() {
        getAddressData();
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









    function getAddressData() {
        const type = 'Post';
        const url = '/getRegisterPageData';
        SendAjaxRequestToServer(type, url, '', '', handleAddressDataResponse, '', '#updateUserSettingsBtn');
    }

    function handleAddressDataResponse(response) {
        if (response.status == 200) {

            const countries = response.data.countries;
            if (countries) {
                //populate country dropdown
                const countrySelect = document.getElementById('country');
                countries.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.id;
                    option.text = country.name;
                    countrySelect.appendChild(option);
                });
            }


            let addressHtml = '';
            if (response.data.shippingAddress) {
                let addressHtml = ''; // Initialize the addressHtml variable

                response.data.shippingAddress.forEach(address => {

                    addressHtml += `
                    <div class="col-md-3 col-11 border rounded-2 m-3">
                        <div class="p-3">
                            <h6 class="mb-1">${address.name}</h6>
                            <h6 class="mb-3">${address.email}</h6>
                            <p class="text-muted mb-1">${address.phone_number}</p>
                            <p class="text-muted mb-1">${address.address}</p>
                            <p class="text-muted mb-1">${address.country.name}</p>
                            <p class="text-muted mb-1">${address.state.name}</p>
                            <div class="d-flex justify-content-start">
                                                        <button type="button"
                                class="btn btn-outline-secondary rounded-pill px-3 py-1 mx-1 editAddressBtn"
                                data-edit-item='${JSON.stringify(address)}'
                                data-edit-id="${address.id}">Edit</button>
                                <button type="button"
                                    class="btn btn-outline-secondary rounded-pill px-3 py-1 mx-1" data-delete-id="${address.id}" id
                                    ="deleteAddressBtn">Delete</button>
                            </div>
                        </div>
                    </div>`;
                })

                // Prepend the generated HTML content as the first child
                $('#address_container').prepend(addressHtml);
            }


            else {
                addressHtml += `
                <div class="col-md-3 col-11 border rounded-2 m-3">
                <div class="p-3">
                <h6 class="mb-1">No addresses found</h6>
                </div>
                </div>
                `

            }
        }
    }

    $('#country').on('change', function () {
        const countryId = $(this).val();
        const type = 'Post';
        const url = '/getSpecificStates';
        const data = new FormData();
        data.append('country_id', countryId);
        SendAjaxRequestToServer(type, url, data, '', handleCountryResponse, '', '#updateUserSettingsBtn');
    });

    function handleCountryResponse(response) {
        if (response.status === 200) {
            const states = response.data.states;

            // Check if states data is available
            if (states && states.length > 0) {
                const stateSelect = document.getElementById('state');
                stateSelect.innerHTML = ''; // Clear existing options
                $("#state").val('');
                $("#city").val('');

                // Add default "Select State" option
                const optionSelect = document.createElement('option');
                optionSelect.value = '';  // Ensure it's an empty value
                optionSelect.text = 'Select State';
                optionSelect.disabled = true;
                optionSelect.selected = true;
                stateSelect.appendChild(optionSelect);

                // Populate state dropdown with received data
                states.forEach(state => {
                    const option = document.createElement('option');
                    option.value = state.id;  // Assuming 'id' is the value you want
                    option.text = state.name;  // Display state name in dropdown
                    stateSelect.appendChild(option);
                });
                $("#state").val('');
                $("#city").val('');
            }
            else {
                // Handle case when no states are returned in the response

                toastr.error("No states found for the selected country", '', {
                    timeOut: 3000
                });
            }
        }
        else {
            // Error handling for non-200 responses
            toastr.error("Failed to load states. Please try again.", '', {
                timeOut: 3000
            });
        }
    }


    $('#state').on('change', function () {
        const stateId = $(this).val();
        const type = 'Post';
        const url = '/getSpecificCities';
        const data = new FormData();
        data.append('state_id', stateId);
        SendAjaxRequestToServer(type, url, data, '', handleStatesResponse, '', '#updateUserSettingsBtn');
    })


    function handleStatesResponse(response) {
        if (response.status === 200) {
            const cities = response.data.cities;
            // Check if cities data is available
            if (cities && cities.length > 0) {
                const citySelect = document.getElementById('city');
                citySelect.innerHTML = ''; // Clear existing options
                // Add default "Select City" option
                const optionSelect = document.createElement('option');
                optionSelect.value = '';  // Ensure it's an empty value
                optionSelect.text = 'Select City';
                optionSelect.disabled = true;
                optionSelect.selected = true;
                citySelect.appendChild(optionSelect);

                // Populate city dropdown with received data
                cities.forEach(city => {
                    const option = document.createElement('option');
                    option.value = city.id;  // Assuming 'id' is the correct value
                    option.text = city.name;  // Display city name in dropdown
                    citySelect.appendChild(option);
                });
            } else {
                // Handle case when no cities are found
                alert('No cities found for the selected state.');
            }
        } else {
            // Error handling for non-200 responses
            alert('Failed to load cities. Please try again.');
        }
    }


    $('#addAddressBtn').on('click', function () {
        const form = document.getElementById('customerAddressForm');

        const formData = new FormData(form);
        const edit_id = $('#edit_id').val();
        if (edit_id !== '') {
            formData.append('edit_id', edit_id);
        }
        const type = 'POST';
        const url = '/addAddress';
        SendAjaxRequestToServer(type, url, formData, '', handleAddAddressResponse, '', '.addAddressBtn');
    })

    function handleAddAddressResponse(response) {
        if (response.status === 200) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            location.reload();
            // Reset the form and hide the modal
            const form = document.getElementById('customerAddressForm');
            form.reset();
            $("#addressAddModal").modal('hide');

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

    // clear the form here for add
    $('#newAddress').on('click', function () {
        const form = document.getElementById('customerAddressForm');
        const country = document.getElementById('country');
        const city = document.getElementById('city');
        const state = document.getElementById('state');
        const phone = document.getElementById('phoneNumber');

        // Reset the form
        form.reset();

        // Clear specific fields if needed (not necessary since form.reset() will do this)
        country.value = '';
        city.value = '';
        state.value = '';
        phone.value = '';
    });

    // Use the correct selector for dynamically added elements (class or attribute selector)
    $('body').on('click', '.editAddressBtn', function () {
        populateCountry();
        populateCity();
        populateState();
        // Retrieve the JSON string from data-edit-item and parse it to an object
        const addressData = JSON.parse($(this).attr('data-edit-item'));
        console.log(addressData)

        $('#edit_id').val(addressData.id);

        const addressId = $(this).attr('data-edit-id');
        $('#fullName').val(addressData.name);
        $('#email').val(addressData.email);
        $('#phoneNumber').val(addressData.phone_number);
        $('#address').text(addressData.address);
        $("#addressAddModal").modal('show');
        $('#country').val(addressData.country_id);
        $('#city').val(addressData.city_id);
        $('#state').val(addressData.state_id);

    });

    //handling edit drop down coutry dependents here
    var countries = '';
    countryData();
    function countryData() {
        // Call the server to fetch country data
        const type = 'Post';
        const url = '/countryData';
        const data = new FormData();
        SendAjaxRequestToServer(type, url, data, '', handleCountryDataResponse, '', '#updateUserSettingsBtn');
    }


    function handleCountryDataResponse(response) {
        if (response.data) {
            countries = response.data;

        }
    }


    function populateCountry() {
        console.log("populating start")
        if (countries && countries.countries.length > 0) {
            const countrySelect = document.getElementById('country');
            countrySelect.innerHTML = ''; // Clear existing options
            // Add default "Select State" option
            const optionSelect = document.createElement('option');
            optionSelect.value = '';  // Ensure it's an empty value
            optionSelect.text = 'Select State';
            optionSelect.disabled = true;
            optionSelect.selected = true;
            countrySelect.appendChild(optionSelect);
            // Populate state dropdown with received data
            countries.countries.forEach(country => {
                const option = document.createElement('option');
                option.value = country.id;  // Assuming 'id' is the value you want
                option.text = country.name;  // Display state name in dropdown
                countrySelect.appendChild(option);
            });
        }
    }

    function populateCity() {
        if (countries && countries.city.length > 0) {
            const citySelect = document.getElementById('city');
            citySelect.innerHTML = ''; // Clear existing options
            // Add default "Select State" option
            const optionSelect = document.createElement('option');
            optionSelect.value = '';  // Ensure it's an empty value
            optionSelect.text = 'Select City';
            optionSelect.disabled = true;
            optionSelect.selected = true;
            citySelect.appendChild(optionSelect);
            // Populate state dropdown with received data
            countries.city.forEach(city => {
                const option = document.createElement('option');
                option.value = city.id;  // Assuming 'id' is the value you want
                option.text = city.name;  // Display state name in dropdown
                citySelect.appendChild(option);
            });
        }
    }


    function populateState() {
        if (countries && countries.states.length > 0) {
            const stateSelect = document.getElementById('state');
            stateSelect.innerHTML = ''; // Clear existing options
            // Add default "Select State" option
            const optionSelect = document.createElement('option');
            optionSelect.value = '';  // Ensure it's an empty value
            optionSelect.text = 'Select State';
            optionSelect.disabled = true;
            optionSelect.selected = true;
            stateSelect.appendChild(optionSelect);
            // Populate state dropdown with received data
            countries.states.forEach(state => {
                const option = document.createElement('option');
                option.value = state.id;  // Assuming 'id' is the value you want
                option.text = state.name;  // Display state name in dropdown
                stateSelect.appendChild(option);
            });
        }

    }




    //delete address is here

    $('body').on('click', '#deleteAddressBtn', function () {
        const addressId = $(this).attr('data-delete-id');
        const formData = new FormData();
        formData.append('id', addressId);

        console.log(...formData);
        const type = 'Post';
        const url = '/deleteAddress';
        SendAjaxRequestToServer(type, url, formData, '', handleDeleteAddressResponse, '', '.deleteAddressBtn');
    })

    function handleDeleteAddressResponse(response) {
        if (response.status === 200) {
            // Success: Display success message and update the table
            toastr.success(response.message, '', {
                timeOut: 3000
            });
            // Update the table
            // getAddressData();
            location.reload();
        }
        else {
            // Error Handling
            let errorMessage = 'An error occurred. Please try again.';
            if (response.status === 402) {
                // Handle specific error status
                errorMessage = response.message;
            }
            else if (response.status == 422) {
                // Validation errors
                errorMessage = response.responseJSON.message || 'Validation failed.';
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

