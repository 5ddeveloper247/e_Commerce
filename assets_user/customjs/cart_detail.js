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
        if (response.status === 200) {
            let cartDetailHtml = ''; // Initialize variable for cart HTML
            let subtotal = 0;  // Initialize subtotal
            let discountedPrice = 0; // Variable to store discounted amount for each item
            let sumDiscountedPrice = 0; // Sum of all discounted prices
            let sumTotal = 0; // Total after applying discounts

            // Check if there are items in the response data
            if (response.data && response.data.length > 0) {
                response.data.forEach(item => {

                    // Ensure product and images exist in the item
                    if (item?.product && item?.product?.product_images && item.product.product_images[0]) {
                        // Extract necessary details
                        let imageUrl = `${base_url}/storage/${item.product.product_images[0].filepath}`;
                        let productName = item.product.product_name || 'Unnamed Product';
                        let category = item?.product?.category?.category_name || '';
                        let price = item?.price;
                        let qty = item?.quantity;

                        // Calculate total amount per item (price * quantity)
                        let totalAmount = parseInt(price) * parseInt(qty);
                        subtotal += totalAmount;  // Accumulate subtotal

                        // Calculate discount if available, assuming `item?.total_amount` is the final price
                        discountedPrice = totalAmount - parseInt(item?.total_amount) || 0;
                        sumDiscountedPrice += discountedPrice;  // Accumulate total discount

                        // Calculate the final total after applying all discounts
                        sumTotal = subtotal - sumDiscountedPrice;

                        // Build HTML structure for each cart item
                        cartDetailHtml += `
                            <tr class="border-top border-bottom">
                                <td class="d-flex align-items-center gap-3">
                                    <img class="border rounded-3 ms-3" src="${imageUrl}" width="120" alt="">
                                    <div>
                                        <small>${category}</small><br>
                                        <small class="fw-semibold">${productName}</small>
                                    </div>
                                </td>
                                <td>${price}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- Decrease Quantity Button -->

                                        <!-- Quantity Input -->
                                        <input type="number" readonly class="form-control qty text-center border-0" data-productId="${item.product.id}" value="${qty}" min="1" id="quantity">
                                        <!-- Increase Quantity Button -->

                                    </div>
                                </td>
                                <td class="text-nowrap">
                                    $${totalAmount}
                                    <svg id="delete_cart_item" data-cart_id=${item.cart_id} data-item_id="${item.id}" data-product_id="${item.product.id}" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                        <path fill="none" stroke="red" stroke-linecap="round" stroke-width="1.5" d="m8.464 15.535l7.072-7.07m-7.072 0l7.072 7.07"></path>
                                    </svg>
                                </td>
                            </tr>
                        `;
                    } else {
                        // No product data found for the item
                        cartDetailHtml += `
                            <div class="px-3 pt-3">
                                <small>No items in the cart</small>
                            </div>
                        `;
                    }
                });

                // Update the subtotal, discounted price, and final total in the HTML
                $('#sub_total').text(`$${subtotal.toFixed(2)}`);
                $('#discounted_price').text(`$${sumDiscountedPrice.toFixed(2)}`);
                $('#total').text(`$${sumTotal.toFixed(2)}`);

            } else {
                // If there are no items in the cart
                cartDetailHtml = `
                    <div class="px-3 pt-3">
                        <small>No items in the cart. Please add some items to your cart.</small>
                    </div>
                `;
                $('#sub_total').text(`$${subtotal.toFixed(2)}`);
                $('#discounted_price').text(`$${sumDiscountedPrice.toFixed(2)}`);
                $('#total').text(`$${sumTotal.toFixed(2)}`);
            }

            // Inject the generated HTML into the cart table body
            $('#cart_detail_table_body').html(cartDetailHtml);

        } else {
            // Handle case when response status is not 200
            $('#cart_detail_table_body').html('<p class="text-center">No items in the cart</p>');
        }
    }




    $('body').on('click', '#delete_cart_item', function () {
        const cartId = $(this).attr('data-cart_id');
        const itemId = $(this).attr('data-item_id');
        const productId = $(this).attr('data-product_id');

        const formData = new FormData();
        formData.append('cart_id', cartId);
        formData.append('item_id', itemId);
        formData.append('product_id', productId);

        const type = "Post";
        const url = "/cart/delete"
        SendAjaxRequestToServer(type, url, formData, '', cartDeleteResponse, '', '#cartView');
    })

    function cartDeleteResponse(response) {
        console.log(response);
        if (response.status === 200) {
            cartDetail();
            cartView()
            toastr.success(response.message, '', {
                timeOut: 3000
            });
        } else {
            // Handle case when item deletion fails
            cartDetail();
            cartView()
            toastr.error(response.message, '', {
                timeOut: 3000
            });

        }
    }




    //header cart view
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
