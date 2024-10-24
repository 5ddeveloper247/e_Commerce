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
            $('#AddToCartBtn').attr('data-quantity', $('#quantity').val());
        }
        return false; // Prevent default action, if necessary
    });

    $('body').on('click', '#quantity_plus_btn', function () {
        var currentQuantity = parseInt($('#quantity').val());
        $('#quantity').val(currentQuantity + 1);
        $('#AddToCartBtn').attr('data-quantity', $('#quantity').val());
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
                                        <p class="card-text fw-bold"><small>$</small> ${productPrice}</p>
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
                $('#totalAmount').text('Total: $' + totalAmount);  // Display total amount with 2 decimal places for better UX
                $('#totalQuantity').text(0);
            }

            // Inject the generated HTML into the cart menu element
            $('#cart_menu_item').html(cartHtml);


        }
        else {
            // Handle case when response status is not 200
            $('#cart_menu_item').html('<p class="text-center">No items in the cart</p>');

            // Ensure totalAmount is a number and format it to 2 decimal places
            let totalAmountFormatted = parseFloat(0);

            $('#totalAmount').text('Total: $' + totalAmountFormatted);  // Display total amount correctly
            $('#totalQuantity').text(0);  // Reset quantity to 0
        }

    }




    $('body').on('click', '.addWishListBtn', function () {
        let productId = $(this).attr('data-productid');
        addToWishList(productId);
    })
    function addToWishList(productId) {
        let data = new FormData();
        data.append('productId', productId);
        if (!is_auth) {
            toastr.error('You must have to login first', '', {
                timeOut: 3000
            });
            return false;
        }
        const type = "Post";
        const url = "/wish_list/add";
        SendAjaxRequestToServer(type, url, data, '', addToWishListResponse, '', '#addWishListBtn_' + productId);
    }

    function addToWishListResponse(response) {
        if (response.status == 200) {
            // success
            toastr.success('Product added to wishlist successfully', '', {
                timeOut: 3000
            });
        }
        else {
            // error
            toastr.error('An error occurred. Please try again later', '', {
                timeOut: 3000
            });
        }
    }





    //product detail modal
    $('body').on('click', '.viewDetailProduct', function () {
        var productId = $(this).attr('data-productid');
        const type = "Post";
        const url = "/productListingDetail";
        const formData = new FormData();
        formData.append('productId', productId);
        SendAjaxRequestToServer(type, url, formData, '', viewDetailProductResponse, 'newsLetterSubscribeBtn');
    })

    function viewDetailProductResponse(response) {
        if (response.status === 200) {
            const product = response.product;
            const product_id = product.id;
            const product_name = product.product_name;
            const product_price = product.price;
            const product_sku = product.sku;
            const product_weight = product.weight;
            const product_category_name = product.category.category_name;
            const product_images = product.product_images;  // Assuming this is an array of image URLs
            let viewDetailModalContentHtml = '';
            let mainImage = product_images.length > 0 ? base_url + '/storage/' + product_images[0]?.filepath : '';
            let imageThumbnailsHtml = product_images.slice(1, 5).map((img, index) => `
                <div class="col-3">
                    <img src="${base_url + '/storage/' + img?.filepath}" class="img-thumbnail thumbnail-img" alt="Thumbnail ${index + 1}">
                </div>
            `).join('');

            // Handling product images dynamically (assuming product_images is an array

            viewDetailModalContentHtml = `
        <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-head d-md-none d-block">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-5">
                <div class="row">
                    <div class="col-md-5 my-1 d-flex align-items-center justify-content-center">
                        <div class="row align-items-center justify-content-center">
                            <img class="w-100" style="height:23rem" id="mainImage"
                                src="${mainImage}" alt="Card image"
                                style="width: 100%; height: auto;">
                            <div class="row mt-3">
                               ${imageThumbnailsHtml}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 my-1">
                        <div class="d-flex justify-content-between">
                            <h5 class="product-title mb-0">${product_name}</h5>
                            <button type="button" class="btn-close d-md-block d-none" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <hr class="mb-0">
                        <p class="text-muted mt-2">${product_category_name}</p>
                        <p class="fw-bold">$ ${product_price}</p>

                        <div class="d-flex align-items-center">
                            <div class="rating-popup mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                            </div>
                            <p class="mb-0 ms-2">2 reviews</p>
                        </div>

                        <hr>

                        <ul class="list-unstyled">
                            <li><span class="pe-3">SKU:</span>${product_sku}</li>
                            <li><span class="pe-3">Weight:</span>${product_weight} KGS</li>
                            <li><span class="pe-3">Shipping:</span> Calculated at Checkout</li>
                        </ul>

                        <hr>
                        <p class="me-3 fw-bold">Quantity:</p>
                       <div class="d-flex align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <svg id="quantity_minus_btn" type="button" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 512 512">
                        <path fill="cuurentColor" d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240s240-107.452 240-240S388.548 16 256 16m147.078 387.078a207.253 207.253 0 1 1 44.589-66.125a207.3 207.3 0 0 1-44.589 66.125"></path>
                        <path fill="cuurentColor" d="M272.112 314.481V128h-32v186.481l-75.053-75.052l-22.627 22.627l113.68 113.68l113.681-113.68l-22.627-22.627z"></path>
                    </svg>
                    <input type="number" class="form-control text-center w-25 border-0 px-3" value="1" min="1" id="quantity">
                    <svg id="quantity_plus_btn" type="button" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 512 512">
                        <path fill="cuurentColor" d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240s240-107.452 240-240S388.548 16 256 16m147.078 387.078a207.253 207.253 0 1 1 44.589-66.125a207.3 207.3 0 0 1-44.589 66.125"></path>
                        <path fill="cuurentColor" d="m142.319 241.027l22.628 22.627L240 188.602V376h32V188.602l75.053 75.052l22.628-22.627L256 127.347z"></path>
                    </svg>
                </div>
                <button class="btn btn-add-to-cart AddToCartBtn" data-quantity="1" data-productid="${product_id}" id="AddToCartBtn">
                    Add to Cart
                </button>
            </div>


                        <div class="d-flex align-items-center mt-3">
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="#666666"
                                            d="M4 12a8 8 0 1 1 9 7.938V14h2a1 1 0 1 0 0-2h-2v-2a1 1 0 0 1 1-1h.5a1 1 0 1 0 0-2H14a3 3 0 0 0-3 3v2H9a1 1 0 1 0 0 2h2v5.938A8 8 0 0 1 4 12m8 10c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" />
                                    </g>
                                </svg>
                            </a>
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 24 24">
                                    <path fill="#666666"
                                        d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z" />
                                </svg> </a>
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 14 14">
                                    <g fill="none">
                                        <g clip-path="url(#primeTwitter0)">
                                            <path fill="#666666"
                                                d="M11.025.656h2.147L8.482 6.03L14 13.344H9.68L6.294 8.909l-3.87 4.435H.275l5.016-5.75L0 .657h4.43L7.486 4.71zm-.755 11.4h1.19L3.78 1.877H2.504z" />
                                        </g>
                                        <defs>
                                            <clipPath id="primeTwitter0">
                                                <path fill="#fff" d="M0 0h14v14H0z" />
                                            </clipPath>
                                        </defs>
                                    </g>
                                </svg> </a>
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 1024 1024">
                                    <path fill="#666666"
                                        d="M847.7 112H176.3c-35.5 0-64.3 28.8-64.3 64.3v671.4c0 35.5 28.8 64.3 64.3 64.3h671.4c35.5 0 64.3-28.8 64.3-64.3V176.3c0-35.5-28.8-64.3-64.3-64.3m0 736q-671.7-.15-671.7-.3q.15-671.7.3-671.7q671.7.15 671.7.3q-.15 671.7-.3 671.7M230.6 411.9h118.7v381.8H230.6zm59.4-52.2c37.9 0 68.8-30.8 68.8-68.8a68.8 68.8 0 1 0-137.6 0c-.1 38 30.7 68.8 68.8 68.8m252.3 245.1c0-49.8 9.5-98 71.2-98c60.8 0 61.7 56.9 61.7 101.2v185.7h118.6V584.3c0-102.8-22.2-181.9-142.3-181.9c-57.7 0-96.4 31.7-112.3 61.7h-1.6v-52.2H423.7v381.8h118.6z" />
                                </svg> </a>
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 24 24">
                                    <path fill="#666666"
                                        d="M13.372 2.094a10.003 10.003 0 0 0-5.369 19.074a7.8 7.8 0 0 1 .162-2.292c.185-.839 1.296-5.463 1.296-5.463a3.7 3.7 0 0 1-.324-1.577c0-1.485.857-2.593 1.923-2.593a1.334 1.334 0 0 1 1.342 1.508c0 .9-.578 2.262-.88 3.54a1.544 1.544 0 0 0 1.575 1.923c1.897 0 3.17-2.431 3.17-5.301c0-2.201-1.457-3.847-4.143-3.847a4.746 4.746 0 0 0-4.93 4.793a2.96 2.96 0 0 0 .648 1.97a.48.48 0 0 1 .162.554c-.046.184-.162.623-.208.785a.354.354 0 0 1-.51.253c-1.384-.554-2.036-2.077-2.036-3.816c0-2.847 2.384-6.255 7.154-6.255c3.796 0 6.319 2.777 6.319 5.747c0 3.909-2.176 6.848-5.393 6.848a2.86 2.86 0 0 1-2.454-1.246s-.579 2.316-.692 2.754a8 8 0 0 1-1.019 2.131c.923.28 1.882.42 2.846.416a9.99 9.99 0 0 0 9.996-10.002a10 10 0 0 0-8.635-9.904" />
                                </svg> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            `;

            // Now inject the content into the modal body or specific container
            $('.viewDetailModalContent').html(viewDetailModalContentHtml);
            $('#viewDetailModal').modal('show');
        }
    }
});
