@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container signin py-5">
    <h3 class="main-headings position-relative text-start">
        Forget Password
        <div class="border-under-main-heading"></div>
    </h3>
    <div class="row mt-5 justify-content-center align-items-center">
        <div class="col-md-5 my-1">
            <form action="" method="">

                <div class="form-floating mb-3" id="email_div">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating mb-3" id="otp_div" style="display:none;">
                    <input type="text" class="form-control" id="otp" name="otp" placeholder="">
                    <label for="email">Otp</label>
                </div>

                <div id="pass_div" style="display:none;">
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter Password">
                        <label for="password">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Confirm Password">
                        <label for="password_confirmation">Confirm Password</label>
                    </div>
                </div>


                <div class="d-flex justify-content-left align-items-center">
                    <button type="button" class="btn btn-add-to-cart" id="back_btn"
                        style="margin-right:10px;display:none;">
                        Back
                    </button>
                    <button type="button" class="btn btn-add-to-cart" id="forgetPass_btn">
                        Verify
                    </button>
                    <!-- <a href="{{route('user.login')}}" class="text-decoration-none text-black">Sign-In?</a> -->
                </div>
            </form>
        </div>
        <div class="col-md-5 my-1 offset-md-1 box-shadow p-4 bg-light">
            <h5 class="fw-bold">New Customer?</h5>
            <p>Create an account with us and you'll be able to:</p>
            <ul>
                <li>Check out faster</li>
                <li>Save multiple shipping addresses</li>
                <li>Access your order history</li>
                <li>Track new orders</li>
                <li>Save items to your Wish List</li>
            </ul>
            <button class="btn btn-add-to-cart">
                Create Account
            </button>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="{{ asset('assets_user/customjs/user_forgetpassword.js') }}"></script>
@endpush
