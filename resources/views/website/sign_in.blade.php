@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container signin py-5">
    <h3 class="main-headings position-relative text-start">
        Featured Products
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
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-add-to-cart">
                        Sign in
                    </button> 
                    <a href="javascript:;" class="text-decoration-none text-black">Forgot your password?</a>
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