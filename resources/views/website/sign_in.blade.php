@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container signin py-5">
    <h3 class="main-headings position-relative text-start">
        SIGN IN
        <div class="border-under-main-heading"></div>
    </h3>
    <div class="row mt-5 justify-content-center align-items-center">
        <div class="col-md-5 my-1">
            <form action="{{route('user.loginSubmit')}}" method="POST">
                @csrf
                @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
                @elseif($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
                @endif
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating mb-3 position-relative">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>

                    <!-- Eye icon for toggling password visibility -->
                    <span class="position-absolute" style="cursor: pointer; right: 10px; top: 15px;"
                        id="togglePasswordIcon">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                            viewBox="0 0 24 24">
                            <path fill="#010308"
                                d="M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z" />
                        </svg>
                    </span>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-add-to-cart">
                        Sign in
                    </button>
                    <a href="{{route('user.forgetpassword')}}" class="text-decoration-none text-black">Forgot
                        password?</a>
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
                <a href="{{ url('/register') }}" style="text-decoration: none">Create Account</a>
            </button>
        </div>
    </div>
</div>




@endsection
@push('scripts')
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
</script>
@endpush