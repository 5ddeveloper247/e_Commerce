


$(document).ready(function () {


    initialLoad();
    function initialLoad() {
        fetchOrderDetail();
    }


    function fetchOrderDetail() {
        const url = `/admin/payments/listing`;
        const type = "Post";
        const data = new FormData();
        SendAjaxRequestToServer(type, url, data, '', getOrderDetailResponse, '', '');
    }

    function getOrderDetailResponse(response) {

        if (response.status == 200) {
            createStates(response.payments);
            let html = '';
            response.payments.forEach((payment, index) => {
                console.log(payment.order_id)
                console.log(payment)
                html += `
                <tr>
                    <td class="ps-3">${index + 1}</td> <!-- Changed item.id to index + 1 -->
                    <td class="ps-3">${payment?.user?.username}</td>
                    <td class="ps-3">${payment?.user?.email}</td>
                    <td class="ps-3 text-nowrap">${new Date(payment.created_at).toLocaleDateString('en-US', { month: 'short', day: '2-digit' })}, ${new Date(payment.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })}</td>
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
                            <div class="dropdown-menu dropdown-menu-end viewDetailBtn" data-detail-order='${payment?.order_id}'>
                                <a class="dropdown-item modal-edit-btn" type="button"
                                     >View Detail</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            `;
            });

            $('#order_listing_table_body').html(html);
        }
    }


    //view order detail here

    $('body').on('click', '.viewDetailBtn', function () {
        const orderId = $(this).attr('data-detail-order');
        console.log(orderId)

        const data = new FormData();
        data.append('order_id', orderId);
        const url = `/admin/payments/listing`;
        const type = "Post";
        SendAjaxRequestToServer(type, url, data, '', getDetailbyIdResponse, '', '');

        // fetch order detail by id and display it here
    })

    function getDetailbyIdResponse(response) {
        if (response.status === 200) {
            const payment = response.payment;
            const shippingAddress = response.orderShippingAddress;
            createShippingDetail(shippingAddress);
            createPaymentDetail(payment);
            let orderDetailHtml = '';
            let subTotal = 0;
            if (payment?.response) {
                var paymentResponse = JSON.parse(payment?.response);
            }
            payment?.order?.order_details?.forEach(item => {
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

                                    </tr >`
            });
            $('#product-detail-table-body').html(orderDetailHtml);
            $('#subTotal').text(subTotal);
            $('.order-detail-div').removeClass('d-none');
            $('#products').hide();
            $('#counters').hide();
        }
    }
    function createShippingDetail(shippingAddress) {
        $('#address_name').text(shippingAddress?.name);
        $('#address_email').text(shippingAddress?.email);
        $('#address_phone').text(shippingAddress?.phone_number);
        $('#address_address').text(shippingAddress?.address);
    }
    function createStates(payments) {
        let completed = 0;
        let cancelled = 0;
        let totalOrders = 0
        payments.forEach(payment => {
            if (payment?.status == 1) {
                completed += 1;
            }
            else if (payment?.status == 0) {
                cancelled += 1;
            }
            totalOrders += 1
        })

        $('#pendingOrders').text(completed);
        $('#cancelledOrders').text(cancelled);
        $('#totalOrders').text(totalOrders);

    }



    function createPaymentDetail(payment) {
        const paymentResponse = JSON.parse(payment?.response);
        let invvoiceHtml = `
        <span><a href="${paymentResponse?.receipt_url}">view</a> </span>
        `
        let paymentStatusHtml = `
         <span>
            ${payment?.status == 1 ? "✅ Paid" : "❌ Unpaid"}
        </span>

        `
        $('#txn').text(payment?.transaction_id);
        $('#invoicePayment').html(invvoiceHtml);
        $('#paymentStatus').html(paymentStatusHtml);
    }



    $('body').on('click', '.back-to-orders-div', function () {
        $('#products').show();
        $('#counters').show();
        $('.order-detail-div').addClass('d-none');
    });


    $('body').on('click', '.statusBtn', function () {
        var status = $(this).attr('data-status');
        var orderId = $(this).attr('data-order-id');
        $('#confrimStatusBtn').attr('data-order-id', orderId);
        $('#confrimStatusBtn').attr('data-status', status);
        if (status == "In-Transit") {
            $('#confirmationModalRemove').modal('hide');
            $('#transitModal').modal('show');
            $('#transit_order_id').val(orderId);
            $('#transit_status').val(status);
        }
        else {
            $('#confirmationModalRemove').modal('show');
        }

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

    })


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
