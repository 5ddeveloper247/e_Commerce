@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container register py-5">
   <h3 class="main-headings position-relative text-start">
      New Account
      <div class="border-under-main-heading"></div>
   </h3>
   <form class="needs-validation mt-5" novalidate>
      <div class="row">
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="email" class="form-control" id="email" placeholder="Email Address" required>
               <label for="email">Email Address</label>
               <div class="invalid-feedback">
                  Please provide a valid email.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="password" class="form-control" id="password" placeholder="Password" required>
               <label for="password">Password</label>
               <div class="invalid-feedback">
                  Please provide a password.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password" required>
               <label for="confirm-password">Confirm Password</label>
               <div class="invalid-feedback">
                  Please confirm your password.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="first-name" placeholder="First Name" required>
               <label for="first-name">First Name</label>
               <div class="invalid-feedback">
                  Please provide your first name.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="last-name" placeholder="Last Name" required>
               <label for="last-name">Last Name</label>
               <div class="invalid-feedback">
                  Please provide your last name.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="company-name" placeholder="Company Name">
               <label for="company-name">Company Name</label>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="tel" class="form-control" id="phone-number" placeholder="Phone Number" required>
               <label for="phone-number">Phone Number</label>
               <div class="invalid-feedback">
                  Please provide your phone number.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="address-line-1" placeholder="Address Line 1" required>
               <label for="address-line-1">Address Line 1</label>
               <div class="invalid-feedback">
                  Please provide your address.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="address-line-2" placeholder="Address Line 2">
               <label for="address-line-2">Address Line 2</label>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="city" placeholder="Suburb/City" required>
               <label for="city">Suburb/City</label>
               <div class="invalid-feedback">
                  Please provide your city.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <select class="form-select" id="country" aria-label="Country" required>
                  <option selected disabled value="">Choose a Country</option>
                  <option value="USA">USA</option>
                  <option value="Canada">Canada</option>
                  <option value="Australia">Australia</option>
                  <!-- Add more countries as needed -->
               </select>
               <label for="country">Country</label>
               <div class="invalid-feedback">
                  Please select a country.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="state" placeholder="State/Province" required>
               <label for="state">State/Province</label>
               <div class="invalid-feedback">
                  Please provide your state/province.
               </div>
            </div>
         </div>
         <div class="col-md-6 mb-3">
            <div class="form-floating">
               <input type="text" class="form-control" id="zipcode" placeholder="Zip/Postcode" required>
               <label for="zipcode">Zip/Postcode</label>
               <div class="invalid-feedback">
                  Please provide your zip/postcode.
               </div>
            </div>
         </div>
         <div class="col-12 mb-3">
            <div class="form-check">
               <input class="form-check-input" type="checkbox" value="" id="recaptcha" required>
               <label class="form-check-label" for="recaptcha">
                  I'm not a robot
               </label>
               <div class="invalid-feedback">
                  Please confirm you are not a robot.
               </div>
            </div>
         </div>
         <div class="col-12">
            <button class="btn btn-add-to-cart mt-3 py-2">
               Register
            </button>
         </div>
      </div>
   </form>
</div>
@endsection