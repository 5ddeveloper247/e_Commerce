


$(document).ready(function () {
    $(".checkoutBtn").on('click', function () {
        var Url = base_url + "/checkout"; // Store current URL in a variable
        var cartid = localStorage.getItem('cart');
        if (is_auth) {
            window.location.href = '/checkout';
        }
        else {
            if (!cartid) {
                window.location.href = '/login';
            }
            else {
                const type = "Post";
                const url = "/tempSession";
                const formData = new FormData();
                formData.append('cartId', cartid);
                formData.append('url', Url);
                SendAjaxRequestToServer(type, url, formData, '', handleTempSessionResponse, '', '#checkoutBtn');
            }
        }
    });
    function handleTempSessionResponse(response) {
        if (response.status == 200) {
            window.location.href = '/login';
        }
    }

    // Ensure this script runs after the document is ready
    $('#nav-search-btn').on('click', function (e) {
        e.preventDefault();
        // Detect if it's mobile or web based on screen width
        function getViewPortType() {
            return window.innerWidth <= 768 ? 'mobile' : 'web';
        }
        const viewPort = getViewPortType();
    });

    // Function to simulate product search and show modal


    function calculateDiscount(price, percentage) {
        if (percentage < 1 || percentage > 100) {
            return 'Percentage must be between 1 and 100, mate!';
        }

        let discount = (price * percentage) / 100;
        let discountedPrice = price - discount;

        return discountedPrice.toFixed(2); // To keep it neat with 2 decimal places
    }


});

