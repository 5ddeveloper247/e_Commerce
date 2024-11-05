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
                    <input type="text" class="form-control focusedField" id="first_name" name="first_name"
                        placeholder="First Name" maxlength="50">
                    <label for="first_name">First Name<span class="danger">*</span></label>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name"
                        maxlength="50">
                    <label for="last_name">Last Name<span class="danger">*</span></label>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address"
                        maxlength="50">
                    <label for="email">Email Address<span class="danger">*</span></label>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="number" class="form-control" id="phone_number" name="phone_number"
                        placeholder="Phone Number" maxlength="18">
                    <label for="phone_number">Phone Number<span class="danger">*</span></label>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="company_name" name="company_name"
                        placeholder="Company Name" maxlength="50">
                    <label for="company_name">Company Name<span class="danger"></span></label>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Address Line 1"
                        maxlength="50">
                    <label for="address">Address<span class="danger">*</span></label>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <select class="form-select" id="country" name="country">
                        <option value="">Choose a Country</option>
                    </select>
                    <label for="country">Country<span class="danger"></span></label>
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
                    <label for="country">City<span class="danger"></span></label>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="number" class="form-control" id="zipcode" name="zipcode" placeholder="Zip/Postcode"
                        maxlength="10">
                    <label for="zipcode">Zip/Postcode<span class="danger"></span></label>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        maxlength="20">
                    <label for="password">Password<span class="danger">*</span></label>
                    <span class="position-absolute" style="cursor: pointer; right: 10px; top: 15px;"
                        id="togglePasswordIcon">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24">
                            <path fill="#010308"
                                d="M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z" />
                        </svg>
                    </span>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <div class="form-floating">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password" maxlength="20">
                    <label for="password_confirmation">Confirm Password<span class="danger">*</span></label>
                    <!-- Eye icon for toggling password visibility -->
                    <span class="position-absolute" style="cursor: pointer; right: 10px; top: 15px;"
                        id="toggleConfirmPasswordIcon">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24">
                            <path fill="#010308"
                                d="M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z" />
                        </svg>
                    </span>
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
<script src="https://www.google.com/recaptcha/api.js?render=6LeTn3UqAAAAABmlZec57pJh5-tqpsYi2a0Mvvx4"></script>
<script src="{{ asset('assets_user/customjs/user_registration.js') }}"></script>
<script>
    document.getElementById('togglePasswordIcon').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('d', 'M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('d', 'M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z');
        }
    });
     document.getElementById('toggleConfirmPasswordIcon').addEventListener('click', function() {
        const passwordInput = document.getElementById('password_confirmation');
        const eyeIcon = document.getElementById('eyeIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('d', 'M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('d', 'M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z');
        }
    });
</script>

@endpush
