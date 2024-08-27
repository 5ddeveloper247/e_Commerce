@extends('layouts.website.website_master')

@push('styles')
<style>

</style>
@endpush

@section('content')

<div class="add-to-cart">
    <!-- <div class="cart-top d-flex align-items-center justify-content-between">
        <h6 class="mb-0">
            Your Cart
        </h6>
        <div class="bread">
            <small>
                Home / Your Cart
            </small>
        </div>
    </div> -->

    <div class="your-cart container">
        <h3 class="main-headings position-relative text-start">
            Featured Products
            <div class="border-under-main-heading"></div>
        </h3>

        <div class="table-responsive">
            <table class="w-100">
                <thead class="py-3">
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-top border-bottom">
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

                        <td class="text-nowrap">
                            ₹239.90
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="none" stroke="black" stroke-linecap="round" stroke-width="1.5"
                                    d="m8.464 15.535l7.072-7.07m-7.072 0l7.072 7.07" />
                            </svg>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="d-flex text-start gap-5 justify-content-end py-4">
            <small class="fw-bold">
                Subtotal:
            </small>

            <small>
                ₹354.90
            </small>
        </div>

        <div class="d-flex text-start gap-5 justify-content-end py-4">
            <small class="fw-bold">
                Shipping:
            </small>

            <small>
                ₹354.90
            </small>
        </div>

        <div class="d-flex text-start gap-5 justify-content-end py-4">
            <small class="fw-bold">
                Coupon Code:
            </small>

            <small>
                ₹354.90
            </small>
        </div>
    </div>

</div>


@endsection