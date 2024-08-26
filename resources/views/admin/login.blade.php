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
                            <input class="w-100 p-2 mt-1" type="text"  name="email" placeholder="enter your email">
                        </div>
                        <div class="mt-3">
                            <label for="">PASSWORD</label>
                            <br>
                            <input class="w-100 p-2 mt-1" type="password" name="password" placeholder="enter your password">
                        </div>
                        
                        <button type="submit" class="py-2 px-4 mt-4 mb-3 w-100">
                            SIGN IN
                        </button>
                        
                    </form>
                </div>
                <a href="{{url('forget_password')}}">Forget Password</a>
                <br>
                <span>
                    If Dont have a account then <a href="{{url('signup_form')}}">SignUp</a>
                </span>
            </div>
        </div>
        <div class="overlay"></div>
</section>



@endsection