@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container register py-5">
   <h3 class="main-headings position-relative text-start">
      New Account
      <div class="border-under-main-heading"></div>
   </h3>
   <form id="signUp_form" action="" class="needs-validation mt-5">
      <div class="row">

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name">
               <label for="first_name">First Name</label>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name">
               <label for="last_name">Last Name</label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
               <label for="email">Email Address</label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number">
               <label for="phone_number">Phone Number</label>
            </div>
         </div>
         
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name">
               <label for="company_name">Company Name</label>
            </div>
         </div>
         
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="address" name="address" placeholder="Address Line 1">
               <label for="address">Address</label>
            </div>
         </div>
         
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <select class="form-select" id="country" name="country">
                  <option value="">Choose a Country</option>
               </select>
               <label for="country">Country</label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <select class="form-select" id="state" name="state">
                  <option value="">Choose a State</option>
               </select>
               <label for="country">State</label>
            </div>
         </div>
         
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <select class="form-select" id="city" name="city" aria-label="city">
                  <option value="">Choose a City</option>
               </select>
               <label for="country">City</label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="number" class="form-control" id="zipcode" name="zipcode" placeholder="Zip/Postcode">
               <label for="zipcode">Zip/Postcode</label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="password" class="form-control" id="password" name="password" placeholder="Password">
               <label for="password">Password</label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
               <label for="password_confirmation">Confirm Password</label>
            </div>
         </div>

         <div class="col-12 mb-3">
            <div class="form-check">
               <input class="form-check-input" type="checkbox" value="1" id="recaptcha" name="recaptcha">
               <label class="form-check-label" for="recaptcha">
                  I'm not a robot
               </label>
            </div>
         </div>

         <div class="col-12">
            <button type="button" class="btn btn-add-to-cart mt-3 py-2" id="signUp_submit">
               Register
            </button>
         </div>
      </div>
   </form>
</div>
@endsection
@push('scripts')
<script src="{{ asset('assets_user/customjs/user_registration.js') }}"></script>
@endpush