@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container contact-us py-5">
    <h3 class="main-headings position-relative text-start">
        Contact Us
        <div class="border-under-main-heading"></div>
    </h3>
    <div class="row">
        <div class="col-md-7">
            <p class="mt-5 w-md-50">We're happy to answer questions or help you with returns. Please fill out the form
                below if you need assistance.</p>
        </div>
    </div>
    <form id="contactus_form">
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control focusedField" maxlength="50" id="full_name" name="full_name"
                        placeholder="Full Name" required>
                    <label for="full_name">Full Name </label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" maxlength="15" id="phone_number" name="phone_number"
                        placeholder="Phone Number">
                    <label for="phone_number">Phone Number (Required)</label>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                        required>
                    <label for="email_address">Email Address (Required)</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="order_number" name="order_number"
                        placeholder="Order Number">
                    <label for="order_number">Order Number</label>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="company_name" name="company_name"
                        placeholder="Company Name">
                    <label for="company_name">Company Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="rma_number" name="rma_number" placeholder="RMA Number">
                    <label for="rma_number">RMA Number</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Comments/Questions" id="comment" name="comment"
                style="height: 150px;" required></textarea>
            <label for="comment">Comments/Questions (Required)</label>
        </div>
        <button type="button" id="contactus_form_btn" class="btn btn-add-to-cart mt-3 py-2">
            Create Account
        </button>
    </form>

</div>




@endsection
@push('scripts')
<script src="{{ asset('assets_user/customjs/contact_us.js') }}"></script>
@endpush