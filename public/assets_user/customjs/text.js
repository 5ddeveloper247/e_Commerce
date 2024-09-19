


$(document).ready(function () {


    initialLoad();
    function initialLoad() {
        fetchOrderDetail();
    }


    function fetchOrderDetail() {
        const url = `/admin/refund/listing`;
        const type = "Post";
        const data = new FormData();
        SendAjaxRequestToServer(type, url, data, '', getOrderDetailResponse, '', '');
    }

    function getOrderDetailResponse(response) {
        try {
            console.log(response); // Log the response for debugging

            // Check if the response status is 200 (successful response)
            if (response.status === 200) {
                // Check if the orders field exists and is an array
                if (Array.isArray(response.orders) && response.orders.length > 0) {
                    createStates(response.orders);
                    let html = '';

                    response.orders.forEach((order, index) => {
                        // Safeguard against missing fields
                        const username = order?.user?.username || 'N/A'; // Default to 'N/A' if username is missing
                        const email = order?.user?.email || 'N/A'; // Default to 'N/A' if email is missing
                        const createdAt = order?.created_at ? new Date(order.created_at) : null; // Check for valid date

                        // Generate table row for each order
                        html += `
                            <tr>
                                <td class="ps-3">${index + 1}</td> <!-- Display index instead of order ID -->
                                <td class="ps-3">${username}</td>
                                <td class="ps-3">${email}</td>
                                <td class="ps-3 text-nowrap">${createdAt ? createdAt.toLocaleDateString('en-US', { month: 'short', day: '2-digit' }) + ', ' + createdAt.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' }) : 'N/A'}</td>
                                <td class="text-end">
                                    <div class="btn-reveal-trigger position-static">
                                        <button class="btn btn-sm dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg class="svg-inline--fa fa-ellipsis" aria-hidden="true" focusable="false"
                                                 data-prefix="fas" data-icon="ellipsis" role="img"
                                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path fill="currentColor"
                                                      d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                </path>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item modal-edit-btn" type="button"
                                                data-detail-order='${JSON.stringify(order.id)}' id="viewDetailBtn">View Detail</a>
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                    });

                    // Append the generated HTML to the table body
                    $('#order_listing_table_body').html(html);
                } else {
                    // Handle case where orders array is empty or not provided
                    $('#order_listing_table_body').html('<tr><td colspan="5" class="text-center">No orders found</td></tr>');
                }
            } else {
                // Handle cases where response status is not 200
                console.error('Unexpected response status:', response.status);
                $('#order_listing_table_body').html('<tr><td colspan="5" class="text-center">Error loading orders</td></tr>');
            }
        } catch (error) {
            // Catch and log any unexpected errors during execution
            console.error('Error processing order details:', error);
            $('#order_listing_table_body').html('<tr><td colspan="5" class="text-center">An error occurred while loading orders</td></tr>');
        }
    }




    //view order detail here

    $('body').on('click', '#viewDetailBtn', function () {
        const orderId = JSON.parse($(this).attr('data-detail-order'));
        const data = new FormData();
        data.append('order_id', orderId);
        const url = `/admin/refund/listing`;
        const type = "Post";
        SendAjaxRequestToServer(type, url, data, '', getDetailbyIdResponse, '', '');

        // fetch order detail by id and display it here
    });

    function getDetailbyIdResponse(response) {
        if (response.status === 200) {
            const order = response.order;
            const orderTrackings = response.orderTrackings;
            createShippingDetail(order)
            createPaymentDetail(order)
            updateSteps(order.status.id, orderTrackings);
            createOrderStatus(order);
            let orderDetailHtml = ''
            let subTotal = 0
            if (order.order_payment.response) {
                var paymentResponse = JSON.parse(order?.order_payment?.response);
            }
            order.order_details.forEach(item => {
                subTotal += parseInt(item?.total_amount)
                const url = base_url + '/storage/' + item?.product?.product_images[0]?.filepath;
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
                                        <td class="gap-3">
                                            <div class="d-flex align-items-center">
                                                <input type="number" class="form-control qty text-center border-0"
                                                    value="${item?.quantity}" min="1" id="quantity" readonly
                                                    style="width: 60px;">
                                            </div>
                                        </td>
                                        <td>
                                            $ ${item?.total_amount}
                                        </td>
                                        <td>
                                            ${order?.order_payment?.status == 1 ? "✅ Paid" : "❌ Unpaid"}
                                        </td>
                                    <td>
                                        ${paymentResponse?.receipt_url
                        ? `<a href="${paymentResponse.receipt_url}" target="_blank">View</a>`
                        : "No Receipt Available"
                    }
                                         </td>

                                    </tr >`
            });
            $('#product-detail-table-body').html(orderDetailHtml);
            $('#subTotal').text(subTotal);
            $('.order-detail-div').removeClass('d-none');
            $('#products').hide();
            $('#counters').hide();
        }
    }


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

    function createShippingDetail(order) {

        $('#address_name').text(order?.shipping_address?.name);
        $('#address_email').text(order?.shipping_address?.email);
        $('#address_phone').text(order?.shipping_address?.phone_number);
        $('#address_address').text(order?.shipping_address?.address);
    }

    function createStates(orders) {
        let pending = 0;
        let cancelled = 0;
        let totalOrders = 0
        orders.forEach(order => {
            if (order.status.name == "Refund Request") {
                pending += 1;
            }
            else if (order.status.name == "Refund Cancel") {
                cancelled += 1;
            }
            totalOrders += 1
        })

        $('#pendingOrders').text(pending);
        $('#cancelledOrders').text(cancelled);
        $('#totalOrders').text(totalOrders);

    }

    function createPaymentDetail(order) {
        $('#txn').text(order?.order_payment?.transaction_id);
    }

    $('body').on('click', '.back-to-orders-div', function () {
        $('#products').show();
        $('#counters').show();
        $('.order-detail-div').addClass('d-none');
    });



    function createOrderStatus(order) {

        let statusHtml = ''

        if (order.status.name == "Pending") {
            statusHtml = `
             <div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-cancel px-4 statusBtn" type="button" data-status="Cancelled" data-order-id="${order.id}" >
                            Cancel
                        </button>
                        <button class="btn btn-done px-4 statusBtn" type="button" data-status="Confirmed" data-order-id="${order.id}">Confirm</button>
                    </div>`

        }
        else if (order.status.name == "Confirmed") {
            statusHtml = `
            <div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-cancel px-4 statusBtn" type="button" data-status="Cancelled" data-order-id="${order.id}" >
                            Cancel
                        </button>
                        <button class="btn btn-done px-4 statusBtn" type="button" data-status="In-Transit" data-order-id="${order.id}">In-Transit</button>
                    </div>
            `

        }
        else if (order.status.name == "In-Transit") {
            statusHtml = `
            <div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-cancel px-4 statusBtn" type="button" data-status="Cancelled" data-order-id="${order.id}" >
                            Cancel
                        </button>
                        <button class="btn btn-done px-4 statusBtn" type="button" data-status="Shipped" data-order-id="${order.id}">Shipped</button>
                    </div>
            `

        }
        else if (order.status.name == "Shipped") {
            statusHtml = `
            <div class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-cancel px-4 statusBtn" type="button" data-status="Cancelled" data-order-id="${order.id}" >
                            Cancel
                        </button>
                    </div>
            `

        }
        else if (order.status.name == "Refund Request") {
            statusHtml = `
            <div class="row justify-content-end">
                <div class="col-auto d-flex align-items-center pb-4 px-4 mx-2 my-2 pt-3 pe-0">
                    <button class="btn btn-done btn-cancel px-4 me-0 statusBtn" type="button" data-status="Refund Cancel" data-order-id="${order.id}">
                        Cancel Refund Request
                    </button>
                </div>
                <div class="col-auto d-flex align-items-center pb-4 px-4 pt-3 mx-2 my-2 ps-0">
                    <button class="btn btn-done btn-cancel px-4 statusBtn" type="button" data-status="Refund Confirm" data-order-id="${order.id}">
                        Refund Confirm
                    </button>
                </div>
            </div>
        `;


        }
        $('#statusHandler').html(statusHtml);
    }



    $('body').on('click', '.statusBtn', function () {
        var status = $(this).attr('data-status');
        var orderId = $(this).attr('data-order-id');
        $('#confrimStatusBtn').attr('data-order-id', orderId);
        $('#confrimStatusBtn').attr('data-status', status);
        $('#confirmationModalRemove').modal('show');

    });

    function updateOrderStatus(status, orderId, tracking_id = null) {
        const formData = new FormData()
        formData.append('status', status);
        formData.append('orderId', orderId);
        if (tracking_id !== null) {
            formData.append('trackingId', tracking_id);
        }
        const type = 'POST';
        const url = '/admin/order/status/ajax';
        SendAjaxRequestToServer(type, url, formData, '', updateStatusResponse, '', this);
    }

    function updateStatusResponse(response) {
        //update status here
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            initialLoad();
            $('#confirmationModalRemove').modal('hide');
            $('#products').show();
            $('.order-detail-div').addClass('d-none');
            $('#counters').show();

        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            })
        }

    }

    $('#confrimStatusBtn').on('click', function () {
        var status = $(this).attr('data-status');
        var orderId = $(this).attr('data-order-id');
        if (status == "In-Transit") {
            //inputfield will be here
            $('#transitModal').modal('show');
            $('#transit_order_id').val(orderId);
            $('#transit_status').val(status);
        }
        else {
            updateOrderStatus(status, orderId)
        }

    });

    $('#trackingIdBtn').on('click', function () {

        if (trackingId == '' || trackingId == undefined) {
            $('#trackingId').addClass('is-invalid');
            return false;
        }
        var transit_order_id = $('#transit_order_id').val();
        var transit_status = $('#transit_status').val();
        $('#transitModal').modal('hide');
        $('#trackingId').val('');
        $('#transit_order_id').val('');
        $('#transit_status').val('');
        updateOrderStatus(transit_status, transit_order_id, trackingId);
    });
});
