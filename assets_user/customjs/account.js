



$(document).ready(function () {
    initialLoad()
    function initialLoad() {
        getAddressData();
        orderListing();
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


    //order listing is here

    function orderListing() {
        const type = "Post";
        const url = "/orderListing";
        const data = new FormData();
        SendAjaxRequestToServer(type, url, data, '', handleOrderListingResponse, '', '.orderListingBtn');
    }

    function handleOrderListingResponse(response) {
        let ordersHtml = '';
        if (response.status === 200) {
            wishList_Listing(response);
            const orders = response.orders;
            if (orders && orders.length > 0) {
                orders.forEach(order => {
                    ordersHtml += `
                         <div class="col-lg-6">
                        <div class="card mb-3 border-0 py-2">
                            <div class="col-12 d-flex justify-content-between">
                                <p class="mb-0"><b>Order: </b>O-${formatDate(order?.created_at)}-${order?.id}</p>
                                <p class="mb-0">${formatDate(order?.created_at)}</p>
                            </div>
                            <div class="row align-items-center justify-content-between g-0">
                                <div class="col-3 d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="5.5em" height="5.5em"
                                        viewBox="0 0 256 193">
                                        <defs>
                                            <linearGradient id="logosParcelIcon0" x1="49.385%" x2="50.286%" y1="49.503%"
                                                y2="50.417%">
                                                <stop offset="0%" />
                                                <stop offset="100%" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon1" x1="50.147%" x2="49.946%" y1="49.935%"
                                                y2="50.142%">
                                                <stop offset="0%" />
                                                <stop offset="100%" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon2" x1="81.503%" x2="93.734%" y1="46.547%"
                                                y2="50.202%">
                                                <stop offset="0%" stop-color="#c37a44" />
                                                <stop offset="44.42%" stop-color="#bb713d" />
                                                <stop offset="64.06%" stop-color="#a05728" />
                                                <stop offset="100%" stop-color="#964e23" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon3" x1="63.475%" x2="41.388%" y1="61.32%"
                                                y2="43.414%">
                                                <stop offset="0%" stop-color="#e9b880" />
                                                <stop offset="100%" stop-color="#e4af76" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon4" x1="50.894%" x2="49.16%" y1="51.117%"
                                                y2="49.274%">
                                                <stop offset="0%" stop-color="#c37a45" stop-opacity="0" />
                                                <stop offset="13.34%" stop-color="#c37a45" />
                                                <stop offset="29.45%" stop-color="#d08d55" />
                                                <stop offset="50.21%" stop-color="#dea167" />
                                                <stop offset="69.66%" stop-color="#e8af73" />
                                                <stop offset="86.31%" stop-color="#ecb477" />
                                                <stop offset="100%" stop-color="#ecb477" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon5" x1="47.423%" x2="22.315%" y1="28.937%"
                                                y2="77.493%">
                                                <stop offset="8.81%" stop-color="#af6938" />
                                                <stop offset="48.29%" stop-color="#9a5227" />
                                                <stop offset="77.92%" stop-color="#8d4520" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon6" x1="41.147%" x2="56.579%" y1="57.288%"
                                                y2="44.95%">
                                                <stop offset="3.27%" stop-color="#e4af76" />
                                                <stop offset="100%" stop-color="#e9b880" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon7" x1="49.624%" x2="50.677%" y1="50.47%"
                                                y2="49.223%">
                                                <stop offset="0%" stop-color="#af6a38" stop-opacity="0" />
                                                <stop offset="8.6%" stop-color="#af6a38" />
                                                <stop offset="19.77%" stop-color="#b87542" />
                                                <stop offset="58.28%" stop-color="#d59c66" />
                                                <stop offset="77.71%" stop-color="#e4af76" />
                                                <stop offset="92.39%" stop-color="#e4af76" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon8" x1="8.211%" x2="93.243%" y1="50.006%"
                                                y2="50.006%">
                                                <stop offset="0%" stop-color="#743f1a" stop-opacity="0" />
                                                <stop offset="49.29%" stop-color="#743f1a" stop-opacity="0.887" />
                                                <stop offset="50%" stop-color="#743f1a" stop-opacity="0.9" />
                                                <stop offset="52.97%" stop-color="#743f1a" stop-opacity="0.847" />
                                                <stop offset="100%" stop-color="#743f1a" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcon9" x1="49.901%" x2="49.998%" y1="50.091%"
                                                y2="49.994%">
                                                <stop offset="0%" stop-color="#322214" />
                                                <stop offset="23.97%" stop-color="#322314" stop-opacity="0.989" />
                                                <stop offset="100%" stop-color="#322214" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcona" x1="51.38%" x2="48.714%" y1="48.236%"
                                                y2="51.568%">
                                                <stop offset="4.76%" stop-color="#c69866" />
                                                <stop offset="41.56%" stop-color="#ba8c5e" />
                                                <stop offset="81.35%" stop-color="#b5875b" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIconb" x1="63.039%" x2="24.984%" y1="46.844%"
                                                y2="8.907%">
                                                <stop offset="0%" stop-color="#845f35" />
                                                <stop offset="43.11%" stop-color="#91673c" />
                                                <stop offset="44.07%" stop-color="#976a40" />
                                                <stop offset="87.37%" stop-color="#986b40" />
                                                <stop offset="100%" stop-color="#ab8157" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIconc" x1="49.999%" x2="50.108%" y1="50.004%"
                                                y2="50.114%">
                                                <stop offset="0%" stop-color="#322214" stop-opacity="0" />
                                                <stop offset="100%" stop-color="#322214" />
                                            </linearGradient>
                                            <linearGradient id="logosParcelIcond" x1="45.656%" x2="50.475%" y1="62.623%"
                                                y2="33.538%">
                                                <stop offset="0%" stop-color="#a9794b" />
                                                <stop offset="38.57%" stop-color="#ae7f53" />
                                                <stop offset="45.57%" stop-color="#ac7d50" />
                                                <stop offset="62.36%" stop-color="#a9794b" />
                                                <stop offset="100%" stop-color="#b2875d" />
                                            </linearGradient>
                                        </defs>
                                        <path fill="url(#logosParcelIcon0)"
                                            d="m140.515 191.333l70.257-44.428c.26-.16.6-.09.76.17s.09.6-.17.76l-70.487 44.568c-.09.06-.19.09-.29.09z" />
                                        <path fill="url(#logosParcelIcon1)"
                                            d="M140.585 192.493c-.06 0-.13-.01-.19-.03l-95.787-35.699a.543.543 0 0 1-.32-.71c.11-.29.42-.43.71-.32l95.537 35.599z" />
                                        <path fill="#e8b67f"
                                            d="m241.1 21.81l-11.059 18.309l-44.428 18.89l-2.47 1.05l-39.929 37.338c-.77.77-1.29 1.87-1.38 2.48c-.04.21-.22.12-.39.11c-.18-.01-.43.06-.45-.16c-.02-.8-.11-1.69-1.4-2.49l-20.009-12.96l-14.59-9.46l-41.097-10.539l-34.4-8.82L7.71 21.71l.33-.38l.02-.03L89.857.04c.12-.04.14-.02.19.05l27.898 41.789l.55.82c.6.88.66 1.42.66 1.81h.51v-.09c0-.04 0-.09.01-.14c0-.03.01-.06.01-.1c.01-.04.01-.08.02-.12s.01-.08.02-.13c.03-.14.07-.3.11-.46c.01-.05.03-.1.04-.14c.05-.16.1-.33.16-.49c.03-.06.05-.13.08-.19c.08-.2.16-.38.25-.54c.08-.16.16-.29.24-.4l25.15-36.579c.06-.09.09-.13.22-.11l94.966 16.34z" />
                                        <path fill="url(#logosParcelIcon2)"
                                            d="M119.585 84.367h-.01l-14.579-9.449l-41.098-10.54l55.257-19.869l.15-.29v.29z" />
                                        <path fill="url(#logosParcelIcon3)"
                                            d="M119.155 44.509L63.898 64.368l-4.98-1.28l-29.42-7.55L7.71 21.69l.35-.41L89.857.02c.12-.04.14-.02.19.05l27.898 41.789l.55.82c.6.9.66 1.44.66 1.83" />
                                        <path fill="url(#logosParcelIcon4)"
                                            d="M119.35 46.619L67.102 65.398l-8.15-2.09l59.028-21.22l.55.82c.6.88.66 1.42.66 1.81h.15z" />
                                        <path fill="#d2a679" d="m30.249 55.738l-.74-.19L7.72 21.7l.33-.38z" />
                                        <path fill="url(#logosParcelIcon5)"
                                            d="m185.613 59.008l-2.47 1.05l-39.929 37.339c-.77.77-1.29 1.87-1.38 2.48c-.04.21-.22.12-.39.11c-.18-.01-.43.06-.45-.16c-.02-.8-.11-1.69-1.4-2.49l-20.009-12.97l-.27-39.848v-.29l.37.29z" />
                                        <path fill="url(#logosParcelIcon6)"
                                            d="m241.1 21.81l-11.059 18.309l-40.438 17.19l-3.98 1.69l-65.948-14.49c-.04-.51.31-1.67.69-2.41c.08-.16.16-.29.24-.4l25.15-36.579c.06-.09.09-.13.22-.11l94.966 16.34z" />
                                        <path fill="url(#logosParcelIcon7)"
                                            d="m189.603 57.308l-6.45 2.74l-.83.8l-63.018-13.93l.29-2.42h.08c-.04-.51.31-1.67.69-2.41z" />
                                        <path fill="url(#logosParcelIcon8)"
                                            d="M121.055 44.809v40.508l-1.47-.95h-.01l-1.93-1.26V45.049l1.51-.54h.51z"
                                            opacity="0.75" />
                                        <path fill="#bf9064"
                                            d="m140.195 191.843l-95.867-35.769c-.54-.23-.62-.74-.65-1.37c0 0-4.12-81.696-4.13-81.706c-.01-.21.25-.34.23-.47c-.07-.31-.66-1.48-.85-1.6L0 48.808l.33-.75l104.666 26.86l34.589 22.409c1.29.8 1.39 1.69 1.4 2.49c.01.22.27.15.45.16s.35.1.39-.11c.09-.61.61-1.71 1.38-2.47l39.928-37.339L255.54 29.28l.44.61l-39.088 34.349c-.76.76-1.11 1.69-.96 2.07l-4 80.067c-.06.51-.3.66-.81 1.01l-70.077 44.358c-.28.18-.58.23-.85.1" />
                                        <path fill="#bd8f63"
                                            d="m141.434 99.977l-.69 91.906a.83.83 0 0 1-.56-.04l-95.866-35.759c-.54-.23-.62-.75-.65-1.37l-4.13-81.706v-.02c0-.02 0-.04.01-.06c0-.02.01-.03.02-.04c.01-.02.02-.03.03-.05s.02-.03.03-.05c.04-.06.1-.12.12-.17c.01-.01.01-.02.01-.03v-.01l101.237 27.279c.04.18.28.11.44.12" />
                                        <path fill="url(#logosParcelIcon9)"
                                            d="M140.755 191.613v.26a.83.83 0 0 1-.56-.04l-95.867-35.759c-.38-.16-.53-.47-.6-.85z"
                                            opacity="0.54" />
                                        <path fill="#322214"
                                            d="m97.406 135.865l37.119 12.14l-.09 36.198l-36.429-13.38zm18.6 24.32l.09 16.769l17.978 6.604v-17.094zm5.311 5.417l3.633 5.782l3.559-3.118l.62.707l-3.673 3.217l3.681 5.858l-.533.335l-3.628-5.773l-3.541 3.104l-.62-.707l3.655-3.203l-3.686-5.867zm10.698 6.512v1.65l.95.31v1.86l-.95-.38v1.5l-2.08-3.16zm-3.2-2.01l.73.23v6.59l-.73-.26zm-30.679-16.13l.27 16.51l17.18 6.28l-.1-16.73zm26.86 19.68l1.88 3.03l-3.75-1.36zm2.899-2.78v4.3l-1.95-2.75zm-7.44-3.83l.72.24v6.58l-.72-.25zm1.62 1.77l1.86 2.87l-1.86 1.43zm-15.54-7.97l.71.23l.002.422c2.114.85 4.202 2.97 5.209 6.268c-.66-1.11-1.24-1.32-2.27-.97c-.38-.79-1.5-1.21-2.17-.79a1.93 1.93 0 0 0-.746-.776l.036 6.276c0 .58-.4 1.1-1.39.9c-.9-.22-1.27-.91-1.17-2.09l.5.08c0 .79.06 1.24.66 1.38c.51.12.74-.07.74-.54l-.066-6.225c-.284-.02-.547.05-.734.215c-.23-.58-1.32-1.36-2.14-.78c-.58-.92-1.67-1.27-2.28-.6c.779-2.355 2.894-3.18 5.113-2.585zm11.38 6.13l2.03 3.2l-2.01 1.67l.04-1.57l-.98-.23v-1.82l.92.34zm5.15.69l3.8 1.38l-1.9 1.67zm-7.09-25.2l.04 17.1l18.07 6.3v-17.47zm3.37 14.77l10.8 3.69v2.15l-10.8-3.72zm-9.338 4.069l.039.011c.07.07.07.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm1-1.71l.039.011c.08.07.08.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm-2.8-.07l.039.011c.08.07.08.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm-2.83-.41l.039.011c.08.07.08.82-.16.99a.41.41 0 0 1-.42-.05c-.14-.11-.22-.27-.16-.51s.66-.5.74-.43zm22.308-11.228l2.62 5.17l-1.79-.61v7.49l-1.79-.62l.01-7.43l-1.78-.58zm-29.889-11.38l.31 16.87l17.39 5.98l-.15-17.09zm23.98 9.41l2.62 5.17l-1.79-.61v7.49l-1.79-.62l.02-7.43l-1.79-.58zm-20.09-6.02l1.42.47l.66 2.39l-.74-.05l2.11 5.1l-1.09-4.2l.62-.01l-.63-2.93l7.33 2.42v4.03c0 1.53-1.66 3.46-4 2.5l.01 4.05l3.36 2.16l-8.13-2.82l3.27.16l-.06-4.01c-2.32-.69-4-3.48-4-5.18z" />
                                        <path fill="url(#logosParcelIcona)"
                                            d="M141.434 99.977c-.4.01-.7.54-.71 1.02l-.09.04l-101.096-28.04c-.01-.19.21-.31.23-.43q.015-.015 0-.03c-.07-.31-.66-1.48-.85-1.6L0 48.81l.33-.75l104.656 26.849h.01l34.589 22.409c1.29.81 1.39 1.69 1.4 2.49c0 .01 0 .03.01.04c.04.19.28.12.44.13" />
                                        <path fill="#cd9c6b"
                                            d="M216.902 64.228c-.76.76-1.11 1.69-.96 2.07l-73.628 34.839l-.15-.12c-.01-.58-.38-.97-.66-1.03c.15.02.29.07.33-.12c.02-.12.05-.26.1-.41c.04-.13.1-.27.17-.42c.21-.48.53-1 .94-1.46c.06-.06.12-.13.18-.19l39.929-37.339L255.56 29.27l.44.61z" />
                                        <path fill="url(#logosParcelIconb)"
                                            d="M95.996 109.136c.11.03.15.04.15-.05l-.38-20.339c-.03-.69-.2-2.05-1.03-2.6L57.868 63.748l-17.28-4.46l37.469 22.39c.94.62 1.02 1.78 1.06 2.64l.54 19.778c0 .1.02.12.09.15z" />
                                        <path fill="#d4a271"
                                            d="M141.434 99.977c-.41.01-.71.57-.71 1.06c-.01.04-.08.03-.09 0c-.08-1.09-.53-2.31-1.12-2.74l-34.868-22.48l.34-.91h.01l34.589 22.41c1.29.81 1.39 1.69 1.4 2.49c0 .01 0 .03.01.04c.04.19.28.12.44.13" />
                                        <path fill="#deb37e" d="m104.986 74.918l-.34.9L0 48.809l.33-.74z" />
                                        <path fill="#dbad77"
                                            d="m215.952 66.298l-4 80.067c-.06.51-.3.66-.81 1.01l-70.077 44.358c-.1.07-.21.11-.31.14l.69-91.906c.18.01.35.1.39-.11c0-.03.01-.05.01-.08l74.087-33.57c0 .05.01.07.02.09" />
                                        <path fill="url(#logosParcelIconc)"
                                            d="M211.952 146.335v.04c-.06.51-.3.66-.81 1.01l-70.077 44.358c-.1.07-.21.11-.31.14v-.26z"
                                            opacity="0.54" />
                                        <path fill="#322214"
                                            d="m210.642 111.496l-1.6 32.599l-23.3 14.51l1.2-33.93zm-12.46 23.6l-11.58 6.809l-.55 16.05l11.53-7.17zm-5.53 6.889l-.02.54c1.383-.69 2.69-.21 3.24 2.08c-.38-.53-1.07-.32-1.53.76c-.21-.45-1.28-.08-1.44.86c-.085-.153-.238-.209-.414-.189l-.255 6.189c-.02.53-.05 1.1-.72 1.51c-.31.14-1.13.25-1.02-.9l.39-.3c-.03.73.16.95.56.71c.48-.29.39-.75.41-1.18l.215-5.864a1.4 1.4 0 0 0-.605.894c-.12-.36-1.28-.14-1.42.89c-.33-.44-1.23-.01-1.57 1.1c.626-2.883 2.178-5.276 3.723-6.306l.017-.474zm16.9-13.61l-11.04 6.53l-.61 15.73l10.92-6.87zm-3.41 5.3l.32.3l-2.406 5.458l1.986 2.742l-.32.68l-1.98-2.71l-2.38 5.4l-.33-.3l2.424-5.491l-2.054-2.809l.36-.68l2.01 2.775zm-6.72 6.27l1.25 1.52l-1.33 2.86v-1.26l-.56.34l.03-1.63l.56-.33zm2.16-1.98l-.26 6.03l-.45.3l.25-6.01zm2.11 3.15l1.07 1.41l-2.3 1.4zm-12.25.44c.05 0 .02.69-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m10.64-2.77l1.06 1.31l-1.24 2.45zm-7.6 1.52c.04.01.01.7-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m4.44-21.84l-11.7 6.56l-.61 16.37l11.61-6.84zm7.71 16.43l-.28 6.02l-.4.26l.27-6.01zm-13.25 4.96c.05 0 .02.69-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m12.22-3.21l-.16 3.84l-1.04-1.24zm2.48-1.83l-.06 1.48l.58-.32l-.07 1.64l-.56.33l-.02 1.35l-1.21-1.45zm-12.83 3.06c.05 0 .02.69-.15 1.03c-.06.12-.17.25-.26.26s-.13-.09-.08-.35s.44-.94.49-.94m9.78-2.32l-1.24 2.84l-1.07-1.45zm-8.83-13.61l-.15 4.12c-.06 1.4-1.18 3.94-2.85 5l-.18 3.89l2.23-.48l-5.43 3.14l2.26-2.15l.12-3.82c-1.45.83-2.61-.71-2.54-2.27l.13-3.78l.98-.53l.32 1.82l-.53.43l1.17 3.39l-.45-3.09l.4-.46l-.31-2.43zm14.2-9.859l-11.2 6.26l-.7 16.09l11.1-6.64zm-2.92 13.87l-.14 1.91l-6.56 3.88l.09-1.93zm-4.64-8.25l1.45 3.06l-1.09.61l-.33 6.87l-1.04.6l.2-6.87l-1.05.63zm3.64-2.02l1.41 3.01l-1.16.65l-.24 6.82l-1.11.62l.35-6.87l-1.09.62z" />
                                        <path fill="#d7aa77"
                                            d="m183.733 60.838l-39.589 36.799c-1.12 1.07-1.86 2.67-1.83 3.5c-.02.04-.12.07-.16 0c.05-.64-.36-1.08-.66-1.15c.15.02.29.07.33-.12c.02-.12.05-.26.1-.41c.04-.13.1-.27.17-.42c.24-.54.63-1.16 1.11-1.64l39.929-37.339z" />
                                        <path fill="url(#logosParcelIcond)"
                                            d="M175.003 105.476c0 .11.05.16.12.13l11.89-6.1c.02-.01.03-.03.04-.07l.66-19.489c.02-1.07.62-2.13 1.44-2.86L228.64 41.6l-12.02 5.15l-39.688 35.958c-1.02 1-1.37 2.18-1.39 3.18z" />
                                        <path fill="#f8ce93"
                                            d="m183.733 60.838l72.257-30.959l-.44-.6l-72.407 30.769z" />
                                    </svg>

                                </div>
                                <div class="col-6 d-flex flex-column justify-content-between">
                                    <div class="card-body p-0">
                                        <div class="d-flex flex-column">
                                            <p class="fw-bold mb-0">Shipping Address: </p>
                                            <p class="mb-0">${order?.shipping_address?.name}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mt-2 d-flex flex-column">
                                        <button type="button" class="btn btn-sm my-2 btn-success">Order
                                            Confirmed</button>
                                        <button type="button"
                                            class="btn btn-sm my-2 btn-secondary view-order-details" data-order-id="${order?.id}"  >Order
                                            Detail</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#orderDiv').html(ordersHtml);
            } else {
                $('#orderListingTable tbody').html('<tr><td colspan="5">No orders found.</td></tr>');
            }
        }
    }


    //view order detail

    $('body').on('click', '.view-order-details', function () {
        const orderId = $(this).data('order-id');
        fetchOrderDetail(orderId);
    })

    function fetchOrderDetail(orderId) {
        const type = "Post";
        const url = "/orderListing";
        const data = new FormData();
        data.append('order_id', orderId);
        SendAjaxRequestToServer(type, url, data, '', handleOrderDetailResponse, '', '.orderListingBtn');
    }

    function handleOrderDetailResponse(response) {
        if (response.status === 200) {
            let order = response.order;
            let orderDetailHtml = ''
            let orderStatusBtnHtml = ''
            let subTotal = 0
            // Example usage based on order status
            updateSteps(order.status.id, response.orderTrackings);
            order.order_details.forEach(item => {
                subTotal += parseInt(item.total_amount)
                const url = base_url + '/public/' + item?.product.product_images[0]?.filepath;
                orderDetailHtml += `
                 <tr class="border-top border-bottom">
                                        <td class="d-flex align-items-center gap-3">
                                            <img class="border rounded-3 ms-3"
                                                src="${url}"
                                                width="120" alt="">
                                            <div>
                                                <small>
                                                    ${item?.product?.model_name}
                                                </small>
                                                <br>
                                                <small class="fw-semibold">
                                                    ${item?.product?.product_name}
                                                </small>
                                            </div>
                                        </td>
                                        <td>$ ${item?.price}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <input type="number" class="form-control qty text-center border-0"
                                                    value="${item?.quantity}" min="1" id="quantity" readonly>

                                            </div>
                                        </td>

                                        <td>
                                            $ ${item?.total_amount}
                                        </td>
                                    </tr> `
            });

            //showing pending button
            if (order.status.name == "Pending") {
                orderStatusBtnHtml = `<div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-done px-4 RefundRequestBtn" type="button" data-status="Refund Request" data-order-id="${order.id}">Refund Request</button>
                    </div>`
                $('#refund-btn-container').html(orderStatusBtnHtml);
            }
            $('#product-detail-table-body').html(orderDetailHtml);
            $('#subTotal').text(subTotal);
            $('.order-detail-div').removeClass('d-none');
            $('#orderDiv').hide();
        }
    }

    $('body').on('click', '.back-to-orders-div', function () {
        $('#orderDiv').show();
        $('.order-detail-div').addClass('d-none');
    })


    function updateSteps(status, orderTrackings) {
        // Clear previous steps
        $('#statusContainer').empty();
        // Loop through the order trackings
        let statusTrackHtml = '';
        orderTrackings.forEach((tracking, index) => {
            statusTrackHtml += `
                    <div class="col-2 md-step active done" id="step-1">
                        <div class="md-step-circle"><span>${index + 1}</span></div>
                        <div class="md-step-title">${tracking.status.name}</div>
                        <div class="md-step-bar-left"></div>
                        <div class="md-step-bar-right"></div>
                </div>`;
            // Append the generated HTML for each row
        });
        $('#statusContainer').html(statusTrackHtml);

    }



    $('body').on('click', '.RefundRequestBtn', function () {
        var status = $(this).attr('data-status');
        var orderId = $(this).attr('data-order-id');
        markedRefundRequest(status, orderId);
    });

    function markedRefundRequest(status, orderId) {
        const formData = new FormData()
        formData.append('status', status);
        formData.append('orderId', orderId);
        const type = 'POST';
        const url = '/order/status/refund';
        SendAjaxRequestToServer(type, url, formData, '', updateStatusResponse, '', this);

    }
    function updateStatusResponse(response) {
        //update status here
        if (response.status == 200) {
            let orderStatusBtnHtml = '';
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            initialLoad();
            orderStatusBtnHtml = `<div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-done px-4 type="button">Refund request in process</button>
                    </div>`
            $('#refund-btn-container').empty();
            $('#refund-btn-container').html(orderStatusBtnHtml);
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            })
        }
    }



    function wishList_Listing(response) {
        try {

            // Check if wishList exists and is an array
            if (!response || !Array.isArray(response.wishList)) {
                console.error("Invalid wishlist data");
                return;
            }

            let wishListHtml = '';
            let wishListLength = 0;
            let wishlists = response.wishList;
            wishListLength = wishlists.length;
            // Loop through each wishlist item
            wishlists.forEach(wishlist => {
                // Safely access product details
                const product = wishlist.product || {};
                const product_price = product.price || '';
                const product_name = product.product_name || "No name available";
                const product_desc = product.description || "No description available";
                const product_id = product.id || 0; // Use 0 as a fallback for invalid IDs
                const product_category = product.category.category_name || ''; // Use 0 as a fallback for invalid IDs
                const created_at = product.created_at || '';
                const product_images = product.product_images || [];
                const image_filepath = product_images.length > 0 ? product_images[0].filepath : 'default_image_path.jpg'; // Provide a default image path

                wishListHtml += `
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn" data-productid="${product_id}" id="wishListRemove" >
                           <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24"><path fill="red" d="M19.3 5.71a4.92 4.92 0 0 0-3.51-1.46a4.92 4.92 0 0 0-3.51 1.46L12 6l-.28-.28a4.95 4.95 0 0 0-7 0a5 5 0 0 0 0 7l6.77 6.79a.75.75 0 0 0 1.06 0l6.77-6.79a5 5 0 0 0-.02-7.01"/></svg>
                           </button>
                            </div>
                            <div class="d-flex justify-content-center my-4"> 
                                <div class="featured-card-imagess">
                                    <a href="${base_url + '/product_detail/' + (product?.category?.category_name?.replace(/\s/g, '-') || 'default-category') + '/' + (product?.sku || 'default-sku')}">
                                        <img src="${base_url}/public/${image_filepath}" alt="Product image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <!-- Star rating SVGs go here -->
                                </div>
                                <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>${product_name}</small></p>
                                <div class="price-and-btn">
                                    <div class="d-flex justify-content-center card-price">
                                        <h5>${product_price}</h5>
                                        <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                    </div>
                                    <button class="btn btn-add-to-cart AddToCartBtn" data-quantity="1" data-productid="${product_id}">
                                        <span class="me-2">+</span>
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>`;
            });
            // Render the wishlist HTML to the container
            $('#wishListContainer').html(wishListHtml);
            $('#wishListLength').html(`(${wishListLength})`);
        } catch (error) {
            $('#wishListContainer').html('<p>An error occurred while loading the wishlist. Please try again later.</p>');
        }
    }

    $('body').on('click', '#wishListRemove', function () {
        const productId = $(this).data('productid');
        removeFromWishlist(productId);
    })
    function removeFromWishlist(product_id) {
        const type = 'Post';
        const url = '/wishList/remove';
        const data = new FormData()
        data.append('product_id', product_id);
        SendAjaxRequestToServer(type, url, data, '', wishListRemoveResponse, '', this);
    }

    function wishListRemoveResponse(response) {
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            initialLoad();
            window.location.reload();
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            })
        }
    }

})
