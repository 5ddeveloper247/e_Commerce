$(document).ready(function () {
    fetchInital();
    function fetchInital() {


        getDashboardData();
    }

    function getDashboardData() {
        const url = "/admin/getDashboardData";
        const type = "GET";
        SendAjaxRequestToServer(type, url, '', '', getDashboardDataResponse, '', '');

        function getDashboardDataResponse(response) {
            try {
                // Check if response status is 200
                if (response && response.status === 200) {
                    // Safely access values with optional chaining
                    const totalUsers = response?.usersCount ?? 0;
                    const totalOrders = response?.ordersCount ?? 0;
                    const totalProducts = response?.productsCount ?? 0;
                    const totalAmount = response?.totalAmount ?? 0;

                    const productsPublished = response?.productsPublished ?? 0;
                    const productsUnpublished = response?.productsUnpublished ?? 0;
                    const productsDiscounted = response?.productsDiscounted ?? 0;

                    // Update dashboard values if they exist
                    $('#totalUsers').text(totalUsers);
                    $('#totalOrders').text(totalOrders);
                    $('#totalProducts').text(totalProducts);
                    // Ensure the totalAmount is a number and has a fixed format
                    $('#totalAmount').text((totalAmount));
                    $('#productsPublished').text((productsPublished));
                    $('#productsUnpublished').text((productsUnpublished));
                    $('#productsDiscounted').text((productsDiscounted));
                    $('#allProducts').text((totalProducts));
                } else { 
                    // Handle cases where response status is not 200
                    console.error('Error: Invalid response status', response);

                }
            } catch (error) {
                // Handle any unexpected errors
                console.error('An error occurred in getDashboardDataResponse:', error);

            }
        }

    }
})
