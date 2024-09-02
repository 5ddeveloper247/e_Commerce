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
               <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" maxlength="50">
               <label for="first_name">First Name<span class="danger">*</span></label>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" maxlength="50">
               <label for="last_name">Last Name<span class="danger">*</span></label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" maxlength="50">
               <label for="email">Email Address<span class="danger">*</span></label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="number" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number"  maxlength="18">
               <label for="phone_number">Phone Number<span class="danger">*</span></label>
            </div>
         </div>
         
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" maxlength="50">
               <label for="company_name">Company Name<span class="danger">*</span></label>
            </div>
         </div>
         
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="address" name="address" placeholder="Address Line 1" maxlength="50">
               <label for="address">Address<span class="danger">*</span></label>
            </div>
         </div>
         
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <select class="form-select" id="country" name="country">
                  <option value="">Choose a Country</option>
               </select>
               <label for="country">Country<span class="danger">*</span></label>
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
               <label for="country">City<span class="danger">*</span></label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="number" class="form-control" id="zipcode" name="zipcode" placeholder="Zip/Postcode" maxlength="10">
               <label for="zipcode">Zip/Postcode<span class="danger">*</span></label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="password" class="form-control" id="password" name="password" placeholder="Password" maxlength="20">
               <label for="password">Password<span class="danger">*</span></label>
            </div>
         </div>

         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" maxlength="20">
               <label for="password_confirmation">Confirm Password<span class="danger">*</span></label>
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