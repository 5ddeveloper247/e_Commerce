@extends('layouts.website.website_master')

@push('css')
<style>
    .ElementsApp input {
        font-size: 2rem !important
    }
</style>
@endpush

@section('content')

<div class="container checkout py-5">
    <h3 class="main-headings position-relative text-start">
        Checkout
        <div class="border-under-main-heading"></div>
    </h3>
    <div class="row justify-content-between">
        <div class="col-md-7 mt-5">
            <!-- Customer Section -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Customer</h4>
                @auth
                <p class="mb-0">{{ auth()->user()->email }}</p>
                @endauth
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('user.logout') }}">Sign Out</a>
            </div>
            <hr>
            <!-- Shipping Section -->
            <div class="old-address">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Shipping</h4>
                        <div class="mt-5">
                            <p for="shippingAddress" class="form-label fw-bold">Shipping Address</p>
                            <select id="shippingAddress" class="form-select">
                                <option value="">Address</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div type="button" data-bs-toggle="modal" data-bs-target="#addressAddModal"
                            class="col-md-3 col-11 d-flex align-items-center justify-content-center border rounded-2 m-3 w-100">
                            <div class="p-5 text-center" id="newAddress">
                                <div class="h1">+</div>
                                <div>New Address</div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- add new address --}}
                <!-- New Address Button Section -->


                {{-- add addres --}}
                <!-- Modal -->
                <div class="modal fade" id="addressAddModal" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="addressAddModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Address</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="customerAddressForm">
                                    <!-- Full Name -->
                                    <input type="hidden" name="" id="edit_id" name="edit_id">
                                    <div class="mb-3">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" name="fullName"
                                            placeholder="Enter full name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="Enter full name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phoneNumber" class="form-label">Phone Number</label>
                                        <input type="number" class="form-control" id="phoneNumber" name="phoneNumber"
                                            placeholder="Enter phone number" required>
                                    </div>


                                    <!-- Address Line 1 -->
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea type="text" class="form-control" id="address" name="address"
                                            placeholder="Enter street address" required></textarea>
                                    </div>

                                    <!-- Country Dropdown -->
                                    <div class="mb-3">
                                        <label for="country" class="form-label">Country</label>
                                        <select class="form-select" id="country" name="country" required>
                                            <option value="" selected>Select country</option>

                                            <!-- Add more countries or populate dynamically -->
                                        </select>
                                    </div>

                                    <!-- State/Province/Region Dropdown -->
                                    <div class="mb-3">
                                        <label for="state" class="form-label">State/Province/Region</label>
                                        <select class="form-select" id="state" name="state" required>
                                            <option value="" selected>Select state</option>

                                        </select>
                                    </div>

                                    <!-- City Dropdown -->
                                    <div class="mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <select class="form-select" id="city" name="city" required>
                                            <option value="" selected>Select city</option>

                                        </select>
                                    </div>

                                    <!-- Postal Code -->
                                    <div class="mb-3">
                                        <label for="postalCode" class="form-label">Postal Code</label>
                                        <input type="text" class="form-control" id="postalCode" name="postalCode"
                                            placeholder="Enter postal code" required>
                                    </div>
                                </form>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="addAddressBtn">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- add new address --}}
                <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" value="" id="billingAddressCheck">
                    <label class="form-check-label" for="billingAddressCheck">
                        My billing address is the same as my shipping address.
                    </label>
                </div>

                <!-- Shipping Method Section -->
                <p class="fw-bold">Shipping Method</p>
                <div class="alert alert-warning">
                    Unfortunately one or more items in your cart can't be shipped to your location. Please choose a
                    different delivery address.
                </div>
            </div>
            <div class="new-shipping-address d-none">
                <h4>Shipping</h4>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="saveAddressCheck">
                    <label class="form-check-label" for="saveAddressCheck">
                        Save this address in my address book.
                    </label>
                </div>

                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" id="billingAddressCheck">
                    <label class="form-check-label" for="billingAddressCheck">
                        My billing address is the same as my shipping address.
                    </label>
                </div>
                <!-- Shipping Method Section -->
                <p class="fw-bold mt-2">Shipping Method</p>
                <div class="alert alert-warning">
                    Please enter a shipping address in order to see shipping quotes.
                </div>
            </div>
            <!-- Order Comments Section -->
            <p class="fw-bold">Order Comments</p>
            <div class="mb-3">
                <textarea class="form-control" id="orderComments" rows="2" placeholder="Enter order comment"></textarea>
            </div>
            <button class="btn btn-secondary" id="checkoutContinueBtn">Continue</button>



            <!-- Billing Section (Placeholder) -->
            {{-- <h5 class="mt-4">Billing</h5>
            <div class="placeholder mb-3"></div> --}}
            <hr />



            <!-- Payment Section (Placeholder) -->
            <h5 class="mt-4">Payment</h5>
            <div class="collapse" id="collapseExample">
                <form id="payment-form" action="{{ route('payment.make') }}" method="POST">
                    @csrf
                    <label for="card-element" style="color: #FFAA3D">Credit or Debit Card</label>
                    <div class="border px-4 rounded-2 my-3 py-2" id="card-element" class="StripeElement"></div>
                    <div id="card-errors" role="alert"></div>
                    <input class="rounded-2 border py-2 px-4 fs-6" type="number" name="amount" id="amount"
                        placeholder="Amount in dollars" min="1" required disabled>
                    <br>
                    <button style="background-color: #ffab3d46; border: 1px solid #FFAA3D"
                        class="py-2 px-4 rounded-2 mt-3" type="submit">Submit Payment</button>
                </form>
            </div>

        </div>
        <!-- Order Summary Section -->
        <div class="col-md-4 mt-md-5">
            <div class="card">
                <div class="card-body">
                    <p class="card-title fw-bold">Order Summary (1 Item)</p>
                    <div id="order_summary">


                    </div>
                    <hr>
                    <p class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span id="subtotal"></span>
                    </p>
                    <p class="d-flex justify-content-between">
                        <span>Total discount</span>
                        <span id="sumDiscountedPrice"></span>
                    </p>
                    <p class="d-flex justify-content-between">
                        <span>Shipping fee</span>
                        <span>--</span>
                    </p>
                    <hr>
                    <p class="d-flex justify-content-between fw-bold">
                        <span>Total ($)</span>
                        <span id="total"></span>
                    </p>
                    <hr>
                    <p class="d-flex justify-content-between align-items-end">
                        <span>Tax Included in Total: <br>
                            Tax</span>
                        <span id="tax">$0.00</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>





@endsection

@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script src="{{ asset('assets_user/customjs/checkout.js') }}"></script>
@endpush