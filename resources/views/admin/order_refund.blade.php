@extends('layouts.admin.admin_master')

@push('css')

@endpush

@section('content')

<div>
    <div>
        <div class="p-md-4 p-3">
            <form id="add_edit_order_form">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Refund</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Refund Listing</li>
                    </ol>
                </nav>
                <div class="row justify-content-center gx-0 gy-2 gap-4 mb-4 counters" id="counters">
                    <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 27 24">
                            <path fill="#2fa992"
                                d="M24 24H0V0h18.4v2.4h-16v19.2h20v-8.8h2.4V24zM4.48 11.58l1.807-1.807l5.422 5.422l13.68-13.68L27.2 3.318L11.709 18.809z" />
                        </svg>
                        <div class="ms-3">
                            <h3 class="mb-0 text-center">
                                <span class="fw-bold fs-2" id="pendingOrders"></span>
                            </h3>
                            <small>Pending</small>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                            <path fill="#ff0000bd"
                                d="M8 22q-.825 0-1.412-.587T6 20v-2H4q-.825 0-1.412-.587T2 16v-2h2v2h2V8q0-.825.588-1.412T8 6h8V4h-2V2h2q.825 0 1.413.588T18 4v2h2q.825 0 1.413.588T22 8v12q0 .825-.587 1.413T20 22zm0-2h12V8H8zm-6-8V8h2v4zm0-6V4q0-.825.588-1.412T4 2h2v2H4v2zm6-2V2h4v2zm0 16V8z" />
                        </svg>
                        <div class="ms-3">
                            <h3 class="mb-0 text-center">
                                <span class="fw-bold fs-2" id="cancelledOrders"></span>
                            </h3>
                            <small>Cancelled</small>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM3 21V3h6.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H21v8.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm9-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                        </svg>
                        <div class="ms-3">
                            <h3 class="mb-0 text-center">
                                <span class="fw-bold fs-2" id="totalOrders"></span>
                            </h3>
                            <small>Total</small>
                        </div>
                    </div>
                </div>
                <div id="products">
                    <div class="px-4 py-4 bg-white shadow table-container table-container">
                        <table id="order-listing" class="table table-responsive">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th class="text-nowrap" scope="col">NAME</th>
                                    <th scope="col" data-sort="category">EMAIL</th>
                                    <th scope="col">CREATED AT</th>
                                    <th class="text-end" scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="order_listing_table_body">
                                {{-- dYNAMIC DATA WILL BE INJECTED HERE --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="order-detail-div d-none">

        <div class="back-to-orders-div" style="cursor:pointer">
            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512">
                <path fill="#000"
                    d="M48 256c0 114.87 93.13 208 208 208s208-93.13 208-208S370.87 48 256 48S48 141.13 48 256m212.65-91.36a16 16 0 0 1 .09 22.63L208.42 240H342a16 16 0 0 1 0 32H208.42l52.32 52.73A16 16 0 1 1 238 347.27l-79.39-80a16 16 0 0 1 0-22.54l79.39-80a16 16 0 0 1 22.65-.09">
                </path>
            </svg>
        </div>

        <div class="md-stepper-horizontal orange mt-5">
            <div class="md-step  done" id="step-1">
                <div class="md-step-circle"><span>1</span></div>
                <div class="md-step-title ">Placed</div>
                <div class="md-step-bar-left"></div>
                <div class="md-step-bar-right"></div>
            </div>
            <div class="md-step  editable" id="step-2">
                <div class="md-step-circle"><span>2</span></div>
                <div class="md-step-title">Confirmed</div>
                <div class="md-step-bar-left"></div>
                <div class="md-step-bar-right"></div>
            </div>
            <div class="md-step " id="step-3">
                <div class="md-step-circle"><span>3</span></div>
                <div class="md-step-title">Intransit</div>
                <div class="md-step-bar-left"></div>
                <div class="md-step-bar-right"></div>
            </div>
            <div class="md-step" id="step-4">
                <div class="md-step-circle"><span>4</span></div>
                <div class="md-step-title">Delivered</div>
                <div class="md-step-bar-left"></div>
                <div class="md-step-bar-right"></div>
            </div>
        </div>
        <div class="row justify-content-end gx-0 gy-2 gap-4 mb-4" id="statusHandler">

        </div>
        <div class="your-cart container mt-5">
            <div class="table-responsive add-to-cart">
                <table class="w-100">
                    <thead class="py-3">
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Payment Status</th>
                            <th>Reciept</th>
                        </tr>
                    </thead>
                    <tbody id="product-detail-table-body">
                        {{-- <tr class="border-top border-bottom">
                            <td class="d-flex align-items-center gap-3">
                                <img class="border rounded-3 ms-3"
                                    src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/1920w/products/97/406/07__37672.1589167510.jpg?c=1z"
                                    width="120" alt="">
                                <div>
                                    <small>
                                        Shoppe Fabs
                                    </small>
                                    <br>
                                    <small class="fw-semibold">
                                        Quis autem veleuminium
                                    </small>
                                </div>
                            </td>
                            <td>₹119.95</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <svg type="button" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                        viewBox="0 0 512 512">
                                        <path fill="cuurentColor"
                                            d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240s240-107.452 240-240S388.548 16 256 16m147.078 387.078a207.253 207.253 0 1 1 44.589-66.125a207.3 207.3 0 0 1-44.589 66.125">
                                        </path>
                                        <path fill="cuurentColor"
                                            d="M272.112 314.481V128h-32v186.481l-75.053-75.052l-22.627 22.627l113.68 113.68l113.681-113.68l-22.627-22.627z">
                                        </path>
                                    </svg>
                                    <input type="number" class="form-control qty text-center border-0" value="1" min="1"
                                        id="quantity">
                                    <svg type="button" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                        viewBox="0 0 512 512">
                                        <path fill="cuurentColor"
                                            d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240s240-107.452 240-240S388.548 16 256 16m147.078 387.078a207.253 207.253 0 1 1 44.589-66.125a207.3 207.3 0 0 1-44.589 66.125">
                                        </path>
                                        <path fill="cuurentColor"
                                            d="m142.319 241.027l22.628 22.627L240 188.602V376h32V188.602l75.053 75.052l22.628-22.627L256 127.347z">
                                        </path>
                                    </svg>
                                </div>
                            </td>

                            <td>
                                ₹239.90
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="none" stroke="black" stroke-linecap="round" stroke-width="1.5"
                                        d="m8.464 15.535l7.072-7.07m-7.072 0l7.072 7.07" />
                                </svg>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>



        {{-- order related detail --}}

        <div class="row py-5">
            <div class="col-8">
                <div class="d-flex text-start gap-5 justify-content-start py-2">
                    <small class="fw-bold">
                        Name:
                    </small>

                    <small>

                        <span id="address_name">

                        </span>
                    </small>
                </div>
                <div class="d-flex text-start gap-5 justify-content-start py-2">
                    <small class="fw-bold">
                        Email:
                    </small>

                    <small>

                        <span id="address_email">

                        </span>
                    </small>
                </div>
                <div class="d-flex text-start gap-5 justify-content-start py-2">
                    <small class="fw-bold">
                        Phone:
                    </small>

                    <small>

                        <span id="address_phone">

                        </span>
                    </small>
                </div>
                <div class="d-flex text-start gap-5 justify-content-start py-2">
                    <small class="fw-bold">
                        Address:
                    </small>

                    <small>

                        <span id="address_address">

                        </span>
                    </small>
                </div>
            </div>

            <div class="col-4 ">
                <div class="d-flex text-start gap-5 justify-content-start py-2">
                    <small class="fw-bold">
                        Total amount:
                    </small>

                    <small>
                        $
                        <span id="subTotal">

                        </span>
                    </small>
                </div>
                <div class="d-flex text-start gap-5 justify-content-end py-2">
                    <small class="fw-bold">
                        Transaction Id:
                    </small>

                    <small>

                        <span id="txn">
                            25324532
                        </span>
                    </small>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="transitModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                </div>
                <div class="modal-body">
                    <input type="hidden" placeholder="" name="transit_order_id" id="transit_order_id">
                    <input type="hidden" placeholder="" name="transit_status" id="transit_status">
                    <input class="form-control" type="text" placeholder="Enter Tracking Id" name="trackingId"
                        id="trackingId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="trackingIdBtn">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmationModalRemove" tabindex="-1" aria-labelledby="confirmationModalRemoveLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content text-center">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmationModalRemoveLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="background-color: #00000040 !important;"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-center my-4">
                        <h6 class="mb-0 me-2">Are Sure Want to Update the order status</h6>
                        <input type="hidden" name="order-id" id="order-id">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                            <g fill="none">
                                <path
                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m0 2a8 8 0 1 0 0 16a8 8 0 0 0 0-16m0 12a1 1 0 1 1 0 2a1 1 0 0 1 0-2m0-9.5a3.625 3.625 0 0 1 1.348 6.99a.8.8 0 0 0-.305.201c-.044.05-.051.114-.05.18L13 14a1 1 0 0 1-1.993.117L11 14v-.25c0-1.153.93-1.845 1.604-2.116a1.626 1.626 0 1 0-2.229-1.509a1 1 0 1 1-2 0A3.625 3.625 0 0 1 12 6.5" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger px-md-3" data-bs-dismiss="modal">NO</button>
                    <button type="button" class="btn btn-outline-danger px-md-3" data-order-id="" data-status=""
                        id="confrimStatusBtn">YES</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exam-listing').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        pageLength: 10,
        buttons: [{
            extend: 'csv',
            text: 'Export'
        }, ],
        lengthMenu: [5, 10, 25, 50, 75, 100]
    });
</script>
@endsection
@push('scripts')
<script src="{{ asset('assets_admin/customjs/order_refund.js') }}"></script>
@endpush
