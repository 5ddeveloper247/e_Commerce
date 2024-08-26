@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container about-us py-5">

    <div class="row about-us-div">
        <div class="col-md-6 my-1">
            <h3 class="main-headings position-relative text-start">
                About Us
                <div class="border-under-main-heading"></div>
            </h3>
            <p class="mt-5">
                Launched in 1999, Alibaba.com is the leading platform for global wholesale trade. We serve millions of buyers and suppliers around the world.
            </p>
        </div>
        <div class="col-md-6 my-1 d-flex justify-content-center">
            <img class="img-fluid" src="https://img.alicdn.com/tps/i4/TB12rC6FVXXXXbeXFXXjP6tPXXX-372-205.jpg" alt="">
        </div>
    </div>
    <div class="row mt-5 our-mission-div">
        <div class="col-md-6 my-1 d-flex justify-content-center">
            <img class="img-fluid" src="https://img.alicdn.com/tps/i4/TB14.S5FVXXXXciXFXXLLTAZVXX-290-235.jpg" alt="">
        </div>
        <div class="col-md-6 my-1">
            <h3 class="main-headings position-relative text-start">
                Our Mission
                <div class="border-under-main-heading"></div>
            </h3>
            <p class="mt-5">
                As part of the Alibaba Group, our mission is to make it easy to do business anywhere.
                <br><br>
                We do this by giving suppliers the tools necessary to reach a global audience for their products, and by helping buyers find products and suppliers quickly and efficiently.
            </p>
        </div>
    </div>
    <div class="row mt-5 sourcing-div">
        <div class="col-md-6 my-1">
            <h3 class="main-headings position-relative text-start">
                One-Stop Sourcing
                <div class="border-under-main-heading"></div>
            </h3>
            <p class="mt-5">
                Alibaba.com brings you hundreds of millions of products in over 40 different major categories, including consumer electronics, machinery and apparel. <br> <br>
                Buyers for these products are located in 190+ countries and regions, and exchange hundreds of thousands of messages with suppliers on the platform each day.
            </p>
        </div>
        <div class="col-md-6 my-1 d-flex justify-content-center">
            <img class="img-fluid" src="https://img.alicdn.com/tps/i3/TB1vN1_FVXXXXa7XpXXViktNVXX-400-289.jpg" alt="">
        </div>
    </div>
    <div class="row my-md-5 mt-md-0 mt-5 anytime-div">
        <div class="col-md-6 my-1 d-flex justify-content-center">
            <img class="img-fluid" src="https://img.alicdn.com/tps/i2/TB1lam6FVXXXXbyXFXXAMLs6FXX-230-222.jpg" alt="">
        </div>
        <div class="col-md-6 my-1">
            <h3 class="main-headings position-relative text-start">
                Anytime, Anywhere
                <div class="border-under-main-heading"></div>
            </h3>
            <p class="mt-5">
                As a platform, we continue to develop services to help businesses do more and discover new opportunities.
                <br><br>
                Whether it’s sourcing from your mobile phone or contacting suppliers in their local language, turn to Alibaba.com for all your global business needs.
            </p>
        </div>
    </div>
</div>




@endsection