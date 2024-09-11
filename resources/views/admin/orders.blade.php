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
                        <li class="breadcrumb-item"><a href="#">Order</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order Listing</li>
                    </ol>
                </nav>
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
        <div class="row justify-content-center gx-0 gy-2 gap-4 mb-4" id="statusHandler">


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

            <div class="d-flex text-start gap-5 justify-content-end py-4">
                <small class="fw-bold">
                    Total amount:
                </small>

                <small>
                    $
                    <span id="subTotal">

                    </span>
                </small>
            </div>
        </div>



        {{-- order related detail --}}

        <div class="row">


            <div class="col-12">
                <small class="fw-bold">
                    Shipping detail
                </small>
                <div class="your-cart container mt-5">
                    <div class="table-responsive add-to-cart">
                        <table class="w-100">
                            <thead class="py-3">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Country</th>
                                    <th>State</th>
                                    <th>City</th>

                                </tr>
                            </thead>
                            <tbody id="shipping-detail-table-body">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12 ">
                <small class="fw-bold">
                    Payment detail
                </small>
                <div class="your-cart container mt-5">
                    <div class="table-responsive add-to-cart">
                        <table class="w-100">
                            <thead class="py-3">
                                <tr>
                                    <th>TXN</th>
                                    <th>Captured at</th>

                                </tr>
                            </thead>
                            <tbody id="payment-detail-table-body">

                            </tbody>
                        </table>
                    </div>
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
                    <input type="text" placeholder="Enter Tracking Id" name="trackingId" id="trackingid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" trackingIdBtn>Save changes</button>
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
<script src="{{ asset('assets_admin/customjs/order_listing.js') }}"></script>
@endpush
