$(document).ready(function () {
    $('body').on('click', '.AddToCartBtn', function () {
        var product_id = $(this).attr('data-productId');
        var quantity = $(this).attr('data-quantity');
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
            cartView();

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



    //cart view header
    cartView();
    function cartView() {
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
        SendAjaxRequestToServer(type, url, data, '', cartViewResponse, '', '#cartView');

    }
    function cartViewResponse(response) {
        if (response.status === 200) {
            let cartHtml = '';
            let totalAmount = 0;  // Moved outside of the loop
            let quantity = 0;

            // Check if there are items in the response data
            if (response.data && response.data.length > 0) {
                quantity = response.data.length;
                response.data.forEach(item => {
                    // Ensure the product and cart detail data exist before using it
                    if (item?.product && item?.product?.product_images && item.product.product_images[0]) {
                        let imageUrl = `${base_url}/storage/${item.product.product_images[0].filepath}`;
                        let productName = item.product.product_name || 'Unnamed Product';
                        let productPrice = item?.discounted_price || 'Price not available';
                        totalAmount += parseInt(item?.total_amount || 0);  // Correctly add to totalAmount


                        cartHtml += `
                            <div class="px-3 pt-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="${imageUrl}" alt="Product Image" class="img-thumbnail me-3" style="width: 60px;">
                                    <div>
                                        <p class="card-text text-muted mb-0">${productName}</p>
                                        <p class="card-text fw-bold">${productPrice}</p>
                                    </div>
                                </div>
                            </div>
                        `;
                    } else {
                        cartHtml += `
                            <div class="px-3 pt-3">
                                <small>Product details are missing for one of the items.</small>
                            </div>
                        `;
                    }
                });

                // Update totalAmount once after the loop
                $('#totalAmount').text('Total: $' + totalAmount.toFixed(2));  // Display total amount with 2 decimal places for better UX
                $('#totalQuantity').text(quantity);  // Display total amount with 2 decimal places for better UX

            }
            else {
                // No items in the cart
                cartHtml = `
                    <div class="px-3 pt-3">
                        <small>No items in the cart. Please add some items to your cart.</small>
                    </div>
                `;
                $('#totalAmount').text('Total: $' + totalAmount.toFixed(2));  // Display total amount with 2 decimal places for better UX
                $('#totalQuantity').text(quantity);
            }

            // Inject the generated HTML into the cart menu element
            $('#cart_menu_item').html(cartHtml);


        } else {
            // Handle case when response status is not 200
            $('#cart_menu_item').html('<p class="text-center">No items in the cart</p>');
            $('#totalAmount').text('Total: $' + totalAmount.toFixed(2));  // Display total amount with 2 decimal places for better UX
            $('#totalQuantity').text(quantity);
        }
    }


});
