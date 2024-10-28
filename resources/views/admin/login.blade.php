@extends('layouts.admin.admin_master')

@push('css')

@endpush

@section('content')

<section class="login d-flex align-items-center justify-content-center">
    <div class="container d-flex align-items-center justify-content-center">
        <div class="login-content p-5 rounded-3 text-center">
            <div class="text-start">
                <h1 class="text-center">
                    LOGIN
                </h1>
                <form class="mx-5 px-5 mx-lg-0 px-lg-0" action="{{route('loginSubmit')}}" method="POST">
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
                    <div class="mt-4">
                        <label for="">EMAIL</label>
                        <br>
                        <input class="w-100 p-2 mt-1" type="text" name="email" placeholder="Enter your email">
                    </div>
                    <div class="mt-3 position-relative">
                        <label for="">PASSWORD</label>
                        <br>
                        <input class="w-100 p-2 mt-1" type="password" id="password" name="password"
                            placeholder="Enter your password">
                        <!-- Eye icon for toggling password visibility -->
                        <span class="position-absolute" style="cursor: pointer; right: 10px; top: 35px;"
                            id="togglePassword">
                            <svg id="eyeIconPassword" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M12 4.5c-4.7 0-8.5 3.8-10 7.5c1.5 3.7 5.3 7.5 10 7.5c4.7 0 8.5-3.8 10-7.5c-1.5-3.7-5.3-7.5-10-7.5zm0 12c-2.7 0-4.9-2.2-4.9-4.5S9.3 7.5 12 7.5s4.9 2.2 4.9 4.5s-2.2 4.5-4.9 4.5zm0-7c-1.2 0-2.1 1-2.1 2.2S10.8 12 12 12s2.1-1 2.1-2.2S13.2 9.5 12 9.5z" />
                            </svg>
                        </span>
                    </div>

                    <button type="submit" class="py-2 px-4 mt-4 mb-3 w-100">
                        SIGN IN
                    </button>

                </form>
            </div>
            <a href="{{url('forget_password')}}">Forget Password</a>
            <br>
            {{-- <span>
                If Dont have a account then <a href="{{url('signup_form')}}">SignUp</a>
            </span> --}}
        </div>
    </div>
    <div class="overlay"></div>
</section>



@endsection
@push('scripts')
<script>
    // Toggle password visibility for the password field
      document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIconPassword');

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