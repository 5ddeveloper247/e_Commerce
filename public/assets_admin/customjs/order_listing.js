


$(document).ready(function () {


    initialLoad();
    function initialLoad() {
        fetchOrderDetail();
    }


    function fetchOrderDetail() {
        const url = `/admin/order/listing`;
        const type = "Post";
        const data = new FormData();
        SendAjaxRequestToServer(type, url, data, '', getOrderDetailResponse, '', '');
    }

    function getOrderDetailResponse(response) {
        console.log(response)
        if (response.status == 200) {
            let html = '';
            response.orders.forEach((order, index) => {
                html += `
                <tr>
                    <td class="ps-3">${index + 1}</td> <!-- Changed item.id to index + 1 -->
                    <td class="ps-3">${order.user.username}</td>
                    <td class="ps-3">${order.user.email}</td>
                    <td class="ps-3 text-nowrap">${new Date(order.created_at).toLocaleDateString('en-US', { month: 'short', day: '2-digit' })}, ${new Date(order.created_at).toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })}</td>
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

            $('#order_listing_table_body').html(html);
        }
    }


    //view order detail here

    $('body').on('click', '#viewDetailBtn', function () {
        const orderId = JSON.parse($(this).attr('data-detail-order'));
        const data = new FormData();
        data.append('order_id', orderId);
        const url = `/admin/order/listing`;
        const type = "Post";
        SendAjaxRequestToServer(type, url, data, '', getDetailbyIdResponse, '', '');

        // fetch order detail by id and display it here
    })

    function getDetailbyIdResponse(response) {
        if (response.status === 200) {
            const order = response.order;
            createShippingDetail(order)
            createPaymentDetail(order)
            updateSteps(order.status.id);
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
        }
    }

    function updateSteps(status) {
        // Clear any existing active classes first
        let steps = ['step-1', 'step-2', 'step-3', 'step-4'];
        steps.forEach(step => {
            document.getElementById(step).classList.remove('active');
        });

        // Apply the active class based on the status
        if (status === 1) {
            document.getElementById('step-1').classList.add('active');
        }
        else if (status === 3) {
            document.getElementById('step-1').classList.add('active');
            document.getElementById('step-2').classList.add('active');
        }
        else if (status === 2 || status === 4) {
            document.getElementById('step-1').classList.add('active');
            document.getElementById('step-2').classList.add('active');
            document.getElementById('step-3').classList.add('active');
        }
        else if (status === 5) {
            steps.forEach(step => {
                document.getElementById(step).classList.add('active');
            });
        }
    }

    function createShippingDetail(order) {
        let shippingDetailHtml = ''
        shippingDetailHtml += `
        <tr class="border-top border-bottom">

            <td>${order?.shipping_address?.name}</td>
            <td>${order?.shipping_address?.email}</td>
            <td>${order?.shipping_address?.phone_number}</td>
            <td>${order?.shipping_address?.address}</td>
            <td>${order?.shipping_address?.country_id}</td>
            <td>${order?.shipping_address?.state_id}</td>
            <td>${order?.shipping_address?.city_id}</td>

                           </tr >`
        $('#shipping-detail-table-body').html(shippingDetailHtml);

    }
    function createPaymentDetail(order) {
        let paymentDetailHtml = ''
        paymentDetailHtml += `
        <tr class="border-top border-bottom">

        <td>${order?.order_payment?.transaction_id}</td>
        <td>${formatDate(order?.order_payment?.created_at)}</td>
    </tr >`
        $('#payment-detail-table-body').html(paymentDetailHtml);
    }

    $('body').on('click', '.back-to-orders-div', function () {
        $('#products').show();
        $('.order-detail-div').addClass('d-none');
    })



    function createOrderStatus(order) {
        console.log(order, "order")
        console.log("order")

        let statusHtml = ''

        if (order.status.name == "Pending") {
            statusHtml = `
            <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM3 21V3h6.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H21v8.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm9-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                </svg>
                <div class="ms-3 statusBtn" data-status="Confirmed" data-order-id="${order.id}">
                    <h3 class="mb-0 text-center">
                        <span class="fw-bold fs-2"></span>
                    </h3>
                    <small>Confirm</small>
                </div>
            </div>
            <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM3 21V3h6.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H21v8.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm9-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                </svg>
                <div class="ms-3 statusBtn" data-status="Cancelled" data-order-id="${order.id}">
                    <h3 class="mb-0 text-center">
                        <span class="fw-bold fs-2"></span>
                    </h3>
                    <small>Cancel</small>
                </div>
            </div>
            `


        }
        else if (order.status.name == "Confirmed") {
            statusHtml = `
            <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM3 21V3h6.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H21v8.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm9-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                </svg>
                <div class="ms-3 statusBtn" data-status="In-Transit" data-order-id="${order.id}">
                    <h3 class="mb-0 text-center">
                        <span class="fw-bold fs-2"></span>
                    </h3>
                    <small>In-Transit</small>
                </div>
            </div>
            <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM3 21V3h6.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H21v8.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm9-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                </svg>
                <div class="ms-3 statusBtn" data-status="Cancelled" data-order-id="${order.id}">
                    <h3 class="mb-0 text-center">
                        <span class="fw-bold fs-2"></span>
                    </h3>
                    <small>Cancel</small>
                </div>
            </div>
            `

        }
        else if (order.status.name == "In-Transit") {
            statusHtml = `
            <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM3 21V3h6.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H21v8.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm9-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                </svg>
                <div class="ms-3 statusBtn " data-status="Shipped" data-order-id="${order.id}">
                    <h3 class="mb-0 text-center">
                        <span class="fw-bold fs-2"></span>
                    </h3>
                    <small>Shipped</small>
                </div>
            </div>
            <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM3 21V3h6.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H21v8.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm9-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                </svg>
                <div class="ms-3 statusBtn " data-status="Cancelled" data-order-id="${order.id}">
                    <h3 class="mb-0 text-center">
                        <span class="fw-bold fs-2"></span>
                    </h3>
                    <small>Cancel</small>
                </div>
            </div>
            `

        }
        else if (order.status.name == "Shipped") {
            statusHtml = `
            <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM3 21V3h6.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H21v8.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm9-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                </svg>
                <div class="ms-3 statusBtn " data-status="Delivered" data-order-id="${order.id}">
                    <h3 class="mb-0 text-center">
                        <span class="fw-bold fs-2"></span>
                    </h3>
                    <small>Shipped</small>
                </div>
            </div>
            `

        }

        $('#statusHandler').html(statusHtml);
    }




    $('body').on('click', '.statusBtn', function () {
        var status = $(this).attr('data-status');
        var orderId = $(this).attr('data-order-id');

        if (status == "In-Transit") {
            //inputfield will be here
            $('#transitModal').modal('show');

        }
        const formData = new FormData()
        formData.append('status', status);
        formData.append('orderId', orderId);
        const type = 'POST';
        const url = '/admin/order/status/ajax';
        SendAjaxRequestToServer(type, url, formData, '', updateStatusResponse, '', this);


    })
    function updateStatusResponse(response) {
        //update status here
        console.log(response);
        if (response.status == 200) {
            toastr.success(response.message, '', {
                timeOut: 3000
            })
            initialLoad();
            $('#products').show();
            $('.order-detail-div').addClass('d-none');
        }
        else {
            toastr.error(response.message, '', {
                timeOut: 3000
            })
        }

    }
});
