
$(document).ready(function () {

    // cart view header
    cartDetail();
    function cartDetail() {
        const type = "Post";
        const url = "/cart/view";
        const cartId = localStorage.getItem('cart')
        const data = new FormData();
        if (is_auth) {
            data.append('user_id', auth_user.id)
        }
        else {
            const cartId = localStorage.getItem('cart');
            data.append('cart_id', cartId)
        }
        SendAjaxRequestToServer(type, url, data, '', cartDetailResponse, '', '#cartView');

    }


    function cartDetailResponse(response) {
        if (response.status !== 200) return; // Exit early if the response is not successful

        let cartDetailHtml = ''; // Initialize variable for cart HTML
        let subtotal = 0;  // Initialize subtotal
        let sumDiscountedPrice = 0; // Sum of all discounted prices
        let sumTotal = 0; // Total after applying discounts
        let order_summaryHtml = ''; // HTML for order summary
        // Check if response has data and items exist
        if (response.data && response.data.length > 0) {
            response.data.forEach(item => {
                // Check if the product and its images exist in the item
                if (item?.product) {
                    let imageUrl = `${base_url}/storage/${item.product.product_images[0].filepath}`;
                    let productName = item.product.product_name || 'Unnamed Product';
                    let category = item?.product?.category?.category_name || '';
                    let price = parseInt(item?.price) || 0;
                    let qty = parseInt(item?.quantity) || 0;

                    // Calculate the total amount for the item (price * quantity)
                    let totalAmount = price * qty;
                    subtotal += totalAmount;  // Accumulate subtotal

                    // Calculate the discount if any (assuming item?.total_amount is final price)
                    let discountedPrice = totalAmount - (parseInt(item?.total_amount) || 0);
                    sumDiscountedPrice += discountedPrice;

                    // Calculate the final total after applying all discounts
                    sumTotal = subtotal - sumDiscountedPrice;

                    // Append order summary HTML
                    order_summaryHtml += `
                        <p class="d-flex justify-content-between">
                            <span>${qty} x ${productName}</span>
                            <span>$${totalAmount.toFixed(2)}</span>
                        </p>`;
                }
            });

            // Update the DOM with the calculated values
            $('#order_summary').html(order_summaryHtml);
            $('#subtotal').text(subtotal.toFixed(2));
            $('#total').text(sumTotal.toFixed(2));
            $('#sumDiscountedPrice').text(sumDiscountedPrice.toFixed(2));

        } else {
            // If there are no items in the cart, show an empty summary
            $('#order_summary').html(`
                <p class="d-flex justify-content-between">
                    <span>No items</span>
                    <span>$0.00</span>
                </p>
            `);
            $('#subtotal, #total, #sumDiscountedPrice').text('0.00');
        }
    }




    getAddressData()
    function getAddressData() {
        const type = 'Post';
        const url = '/getRegisterPageData';
        SendAjaxRequestToServer(type, url, '', '', handleAddressDataResponse, '', '#updateUserSettingsBtn');
    }

    function handleAddressDataResponse(response) {
        console.log(response);
        handleAddressDataResponseCities(response)

        if (response.status !== 200) return; // Exit early if the response status is not 200

        const countries = response.data.countries;
        let addressHtml = '';

        // Check if shipping addresses exist in the response
        if (response.data.shippingAddress && response.data.shippingAddress.length > 0) {
            response.data.shippingAddress.forEach(address => {
                addressHtml += `<option value="${address.id}">${address.address}</option>`;
            });
        } else {
            // If no shipping address is found, provide a default option
            addressHtml += `<option value="">No address available</option>`;
        }

        // Update the shipping address select element with the generated HTML
        $('#shippingAddress').html(addressHtml);
    }



    function handleAddressDataResponseCities(response) {
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






    //add new address here
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
            getAddressData();
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



    //hadling payment collapse here
    function toggleCollapse() {
        const collapseElement = document.getElementById('collapseExample');
        if (collapseElement.classList.contains('collapse')) {
            collapseElement.classList.toggle('show');
        } else {
            collapseElement.classList.add('collapse');
            collapseElement.classList.toggle('show');
        }
    }

    ///checkout continue handled here
    $('body').on('click', '#checkoutContinueBtn', function () {
        const totalAmount = $('#total').text();
        $('#amount').val(totalAmount)
        toggleCollapse();
    })


    function saveCheckout(paymentResponse) {
        console.log(paymentResponse, "paymentresponse")
        const type = "Post";
        const url = "/continue/checkout/prepayment";
        const shippingAddress = $('#shippingAddress').val();
        const orderComments = $('#orderComments').val();
        const formData = new FormData()
        if (!is_auth) {
            window.location.href = "/login";
            return;
        }

        else {
            formData.append('user_id', auth_user.id);
            formData.append('shipping_address', shippingAddress);
            formData.append('order_comments', orderComments);
            formData.append('paymentResponse', JSON.stringify(paymentResponse));


            SendAjaxRequestToServer(type, url, formData, "", handleCheckoutResponse, "", "#checkoutContinueBtn");
        }
    }
    function handleCheckoutResponse(response) {
        if (response.status === 200) {
            // Success: Display success message and reset form
            toastr.success(response.message, '', {
                timeOut: 3000
            });

            location.reload();
        } else {
            // Error Handling
            let errorMessage = 'An error occurred. Please try again.';

            switch (response.status) {
                case 401:
                    // Unauthorized user error
                    errorMessage = response.message || 'Unauthorized. Please log in again.';
                    break;
                case 402:
                    // Specific error related to payment or validation
                    errorMessage = response.message || 'Payment required or another specific issue occurred.';
                    break;
                case 422:
                    // Validation errors
                    errorMessage = response.responseJSON?.message || 'Validation failed.';
                    const validationErrors = response.responseJSON?.errors || {};
                    // Optionally, display the validation errors
                    for (const [field, messages] of Object.entries(validationErrors)) {
                        messages.forEach(msg => toastr.error(`${field}: ${msg}`, '', { timeOut: 3000 }));
                    }
                    break;
                case 404:
                    // Resource not found
                    errorMessage = response.message || 'Resource not found.';
                    break;
                case 500:
                    // Handle server error
                    errorMessage = response.message || 'Internal server error. Please contact support.';
                    break;
                default:
                    // General error case
                    errorMessage = response.message || 'An unexpected error occurred.';
            }

            // Display error message
            toastr.error(errorMessage, '', {
                timeOut: 3000
            });
        }
    }







    //handling stripe checkou here
    const stripe = Stripe('pk_test_51Px1EkP7RhDtH6R9qfRgqfgTyddOKBibU5EDJCrTIjZuC4WwTderbMhzf4NlRxqyHlpLWuNokH5Ba7TKQCncj7Sm00d5ZG55Lt');
    const elements = stripe.elements();
    const card = elements.create('card');
    card.mount('#card-element');
    // Form submission event listener
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async (event) => {
        event.preventDefault();
        await handlePayment();
    });

    async function handlePayment() {
        try {
            const { token, error } = await stripe.createToken(card); // Create Stripe token
            if (error) {
                document.getElementById('card-errors').textContent = error.message; // Display any errors
                return;
            }
            // Get amount from the form
            const amount = document.getElementById('amount').value;
            // Prepare form data
            const formData = new FormData(form);
            formData.append('stripeToken', token.id);
            formData.append('amount', amount);

            const type = "POST";
            const url = "/payment";
            // Make the AJAX request
            SendAjaxRequestToServer(type, url, formData, '', checkOutPaymentResponse, '', '#cartView');
        }
        catch (err) {
            toastr.error("Payment has failed due network error", '', {
                timeOut: 3000
            });
        }
    }
    // Function to handle the AJAX response
    function checkOutPaymentResponse(response) {
        if (response.success) {
            // Call a function to handle the successful checkout logic
            saveCheckout(response.paymentResponse);
        }
        else {
            toastr.error("An error occured on Payment", '', {
                timeOut: 3000
            });
        }
    }




})

