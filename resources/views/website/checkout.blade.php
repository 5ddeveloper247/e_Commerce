@extends('layouts.website.website_master')

@push('css')

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
                <p class="mb-0">a12@gmail.com</p>
                <button class="btn btn-sm btn-outline-secondary">Sign Out</button>
            </div>
            <hr>
            <!-- Shipping Section -->
            <div class="old-address">
                <h4>Shipping</h4>
                <div class="mt-5">
                    <p for="shippingAddress" class="form-label fw-bold">Shipping Address</p>
                    <select id="shippingAddress" class="form-select">
                        <option value="1">Address</option>
                        <option class="new-address-btn" value="2">Enter New Address</option>
                        <option value="3">a12@gmail.com / a12@gmail.com</option>
                        <option value="4">a12@gmail.com / a12@gmail.com / Pakistan</option>
                    </select>
                </div>
                <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" value="" id="billingAddressCheck">
                    <label class="form-check-label" for="billingAddressCheck">
                        My billing address is the same as my shipping address.
                    </label>
                </div>

                <!-- Shipping Method Section -->
                <p class="fw-bold">Shipping Method</p>
                <div class="alert alert-warning">
                    Unfortunately one or more items in your cart can't be shipped to your location. Please choose a different delivery address.
                </div>
            </div>
            <div class="new-shipping-address d-none">
                <h4>Shipping</h4>

                <!-- Shipping Address Section -->
                <div class="form-floating mb-3">
                    <select id="addressSelect" class="form-select" aria-label="Floating label select example">
                        <option selected>Enter a new address</option>
                        <!-- Additional addresses can be added here -->
                    </select>
                    <label for="addressSelect">Shipping Address</label>
                </div>

                <div class="row g-3">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="firstName" placeholder="First Name">
                            <label for="firstName">First Name</label>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                            <label for="lastName">Last Name</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="companyName" placeholder="Company Name (Optional)">
                    <label for="companyName">Company Name (Optional)</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number (Optional)">
                    <label for="phoneNumber">Phone Number (Optional)</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="address" placeholder="Address">
                    <label for="address">Address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="apartment" placeholder="Apartment/Suite/Building (Optional)">
                    <label for="apartment">Apartment/Suite/Building (Optional)</label>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="city" placeholder="City">
                            <label for="city">City</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="postalCode" placeholder="Postal Code">
                            <label for="postalCode">Postal Code</label>
                        </div>
                    </div>
                </div>

                <div class="form-floating mb-3">
                    <select id="country" class="form-select" aria-label="Floating label select example">
                        <option selected>Select a country</option>
                        <!-- Additional countries can be added here -->
                    </select>
                    <label for="country">Country</label>
                </div>

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select id="state" class="form-select" aria-label="Floating label select example">
                                <option selected>Select a state</option>
                                <!-- Additional states can be added here -->
                            </select>
                            <label for="state">State/Province (Optional)</label>
                        </div>
                    </div>
                </div>

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
                <textarea class="form-control" id="orderComments" rows="2">sdfsdf</textarea>
            </div>
            <button class="btn btn-secondary disabled">Continue</button>
            <hr />
            <!-- Billing Section (Placeholder) -->
            <h5 class="mt-4">Billing</h5>
            <div class="placeholder mb-3"></div>
            <hr />
            <!-- Payment Section (Placeholder) -->
            <h5 class="mt-4">Payment</h5>
            <div class="placeholder mb-3"></div>
        </div>
        <!-- Order Summary Section -->
        <div class="col-md-4 mt-md-5">
            <div class="card">
                <div class="card-body">
                    <p class="card-title fw-bold">Order Summary (1 Item)</p>
                    <p class="d-flex justify-content-between">
                        <span>1 x Aliquam quat voluptatem</span>
                        <span>₹129.95</span>
                    </p>
                    <hr>
                    <p class="d-flex justify-content-between">
                        <span>Subtotal</span>
                        <span>₹129.95</span>
                    </p>
                    <p class="d-flex justify-content-between">
                        <span>Shipping</span>
                        <span>--</span>
                    </p>
                    <p><a href="#">Coupon/Gift Certificate</a></p>
                    <hr>
                    <p class="d-flex justify-content-between fw-bold">
                        <span>Total (INR)</span>
                        <span>₹129.95</span>
                    </p>
                    <hr>
                    <p class="d-flex justify-content-between align-items-end">
                        <span>Tax Included in Total: <br>
                            Tax</span>
                        <span>₹0.00</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




@endsection