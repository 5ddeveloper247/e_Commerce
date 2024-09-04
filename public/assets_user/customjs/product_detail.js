



$(document).ready(function () {
    $('body').on('click', '#mainAddToCartBtn', function () {
        var product_id = $(this).attr('data-productId');
        var quantity = $('#quantity').val();
        console.log(product_id)
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



    function addToCart(quantity, productId) {
        var data = new FormData();
        data.append('product_id', productId);
        data.append('quantity', quantity);
        console.log(quantity, productId)
        const type = "Post";
        const url = "/cart/add";

        SendAjaxRequestToServer(type, url, data, '', addToCartResponse, '', '#mainAddToCartBtn');
    }

    function addToCartResponse(response) {
        console.log(response);
        if (response.status == 200) {
            console.log('Item added to cart successfully');
        } else {
            console.log('Failed to add item to cart');
        }
    }
});

