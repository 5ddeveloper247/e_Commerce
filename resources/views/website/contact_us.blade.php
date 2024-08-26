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
            <p class="mt-5 w-md-50">We're happy to answer questions or help you with returns. Please fill out the form below if you need assistance.</p>
        </div>
    </div>
    <form>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="fullName" placeholder="Full Name" required>
                    <label for="fullName">Full Name (Required)</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
                    <label for="phoneNumber">Phone Number</label>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" class="form-control" id="emailAddress" placeholder="Email Address" required>
                    <label for="emailAddress">Email Address (Required)</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="orderNumber" placeholder="Order Number">
                    <label for="orderNumber">Order Number</label>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="companyName" placeholder="Company Name">
                    <label for="companyName">Company Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="rmaNumber" placeholder="RMA Number">
                    <label for="rmaNumber">RMA Number</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Comments/Questions" id="commentsQuestions" style="height: 150px;" required></textarea>
            <label for="commentsQuestions">Comments/Questions (Required)</label>
        </div>
        <button class="btn btn-add-to-cart mt-3 py-2">
            Create Account
        </button>
    </form>
</div>




@endsection