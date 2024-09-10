


$(document).ready(function () {
    $("#checkoutBtn").on('click', function () {
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
});

