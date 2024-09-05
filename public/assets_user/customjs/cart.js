$(document).ready(function () {
    $('body').on('click', '.AddToCartBtn', function () {
        var product_id = $(this).attr('data-productId');
        var quantity = $('#quantity').val();
        addToCart(product_id, quantity);
    });
    $('body').on('click', '#quantity_minus_btn', function () {
        var currentQuantity = parseInt($('#quantity').val());
        if (currentQuantity > 1) { // Prevent quantity from going below 1
            $('#quantity').val(currentQuantity - 1);
            $('#mainAddToCartBtn').attr('data-quantity', $('#quantity').val());
        }
        return false; // Prevent default action, if necessary
    });

    $('body').on('click', '#quantity_plus_btn', function () {
        var currentQuantity = parseInt($('#quantity').val());
        $('#quantity').val(currentQuantity + 1);
        $('#mainAddToCartBtn').attr('data-quantity', $('#quantity').val());
        return false; // Prevent default action, if necessary
    });

    $('body').on('change', '#quantity', function () {
        var val = parseInt($(this).val());
        if (isNaN(val) || val < 1) {
            $(this).val(1);
        }
    });



    function addToCart(productId, quantity) {
        var data = new FormData();
        data.append('product_id', productId);
        data.append('quantity', quantity);
        if (!is_auth) {
            const localStoragecart = localStorage.getItem('cart');
            if (localStoragecart == null) {
                data.append('cart_id', null);
            }
            else {
                data.append('cart_id', localStoragecart);
            }
        }
        const type = "Post";
        const url = "/cart/add";
        SendAjaxRequestToServer(type, url, data, '', addToCartResponse, '', '#mainAddToCartBtn');
    }

    function addToCartResponse(response) {
        if (response.status === 200) {
            // Success: Display success message and reset form
            if (!is_auth) {
                localStorage.setItem('cart', response.cart);
            }
            toastr.success(response.message, '', {
                timeOut: 3000
            });

        }
        else {
            // Error Handling
            let errorMessage = 'An error occurred. Please try again.';

            if (response.status === 402) {
                // Handle specific error status
                errorMessage = response.message;
            }
            else if (response.status == 404) {
                errorMessage = 'Product not found';
            }
            else if (response.status == 400) {
                errorMessage = response.message;
            }
            else if (response.status == 422) {
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
});
