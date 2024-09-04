@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<!-- _______________________Hero Slider_________________________ -->
<div class="swiper mySwiper d-none" id="hero-slider">
    <div class="swiper-wrapper">
        <div class="swiper-slide mx-3">
            <img src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/original/carousel/13/slider-02__42161.jpg?c=1"
                alt="">
            <!-- <div class="overlay"></div>
                <div class="content px-md-5">
                    <div class="left-content-on-swiper">
                        <h4>Big Sale <br>
                            Buy Home Pod
                        </h4>
                        <button class="small-button">Shop Now</button>
                    </div>
                    <div class="right-content-on-swiper">
                        <h4>Product Name <br>
                        </h4>
                         <h5 class="right-price-on-carosal">$99.99</h5>
                    </div>
                </div> -->
        </div>
        <div class="swiper-slide mx-3">
            <img src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/original/carousel/12/slider-01__80936.jpg?c=1"
                alt="">
            <!-- <div class="overlay"></div>
                <div class="content px-md-5">
                    <div class="left-content-on-swiper">
                        <h4>Big Sale <br>
                            Buy Home Pod
                        </h4>
                        <button class="small-button">Shop Now</button>
                    </div>
                    <div class="right-content-on-swiper">
                        <h4>Product Name <br>
                        </h4>
                         <h5 class="right-price-on-carosal">$99.99</h5>
                    </div>
                </div> -->
        </div>
        <div class="swiper-slide mx-3">
            <img src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/original/carousel/14/slider-03__76582.jpg?c=1"
                alt="">
            <!-- <div class="overlay"></div>
                <div class="content px-md-5">
                    <div class="left-content-on-swiper">
                        <h4>Big Sale <br>
                            Buy Home Pod
                        </h4>
                        <button class="small-button">Shop Now</button>
                    </div>
                    <div class="right-content-on-swiper">
                        <h4>Product Name <br>
                        </h4>
                         <h5 class="right-price-on-carosal">$99.99</h5>
                    </div>
                </div> -->
        </div>
    </div>
    <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
</div>
<!-- _______________________New Hero Banner_________________________ -->

<div class="row">
    <div class="col-lg-6 hero-banner p-md-5 p-4">
        <?php
            $settings = getWebsiteSettings();
            $banner_images = @$settings->settingFiles;
            // dd($banner_images);
            $words = explode(' ', @$settings->banner_heading);
            $firstTwoWords = implode(' ', array_slice($words, 0, 2));
            $thirdWords = implode(' ', array_slice($words, 2, 1));
            $fourthStatement = implode(' ', array_slice($words, 3, 3));
            $remainingStatement = implode(' ', array_slice($words, 6));
        ?>
        @if($settings)
        <h1 class="mb-0 fw-bold"><span class="the-future px-1">{{@$firstTwoWords}}</span> {{@$thirdWords}} <br>
            {{@$fourthStatement}}<br> {{@$remainingStatement}} </h1>
        <p class="my-4">{{@$settings->sub_heading}}</p>
        @else
        <h1 class="mb-0 fw-bold"><span class="the-future px-1">The Future</span> Of <br> Nursing Exam<br> Prep Starts
            Here</h1>
        <p class="my-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
            aliquip ex ea commodo consequat.</p>
        @endif

        <!-- <div class="swiperrr position-relative"> -->
        <div class="swiper mySwiper" id="hero-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="hero-banner-card px-3 py-2">
                        <h6 class="text-start mb-2">NCLEX RN®</h6>
                        <p class="text-start mb-0 lh-sm"><small>Unlock NCLEX RN Success with Archer Review</small></p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-banner-card px-3 py-2">
                        <h6 class="text-start mb-2">NCLEX RN®</h6>
                        <p class="text-start mb-0 lh-sm"><small>Unlock NCLEX RN Success with Archer Review</small></p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-banner-card px-3 py-2">
                        <h6 class="text-start mb-2">NCLEX RN®</h6>
                        <p class="text-start mb-0 lh-sm"><small>Unlock NCLEX RN Success with Archer Review</small></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="position-absolute">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div> -->
    </div>
    <div class="col-lg-6 px-md-0">
        <div class="swiper mySwiper10" id="hero-slider">
            <div class="swiper-wrapper">
                @if(@$banner_images)
                @foreach($banner_images as $value)
                <div class="swiper-slide">
                    <img class="new-hero-banner-img" src="{{url('/storage/'.$value->file_path)}}" alt="">
                </div>
                @endforeach
                @else
                <div class="swiper-slide">
                    <img class="new-hero-banner-img" src="{{asset('assets_user/images/hero-banner-img-1.png')}}" alt="">
                </div>
                <div class="swiper-slide">
                    <img class="new-hero-banner-img" src="{{asset('assets_user/images/hero-banner-img-2.png')}}" alt="">
                </div>
                @endif

            </div>
        </div>
    </div>
</div>

<div class="container my-2">
    <!-- _______________________Feature Card_________________________ -->
    <!-- <div class="row features g-3">
        <div class="col-lg-3 col-6">
            <div class="card-custom text-center p-md-3 p-sm-2 p-1">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M3 3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm1 6V5h5v4zm-1 4a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm1 6v-4h5v4zm9-15a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1h-7a1 1 0 0 1-1-1zm2 1v4h5V5zm-1 8a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1v-6a1 1 0 0 0-1-1zm1 6v-4h5v4z" />
                    </svg>
                </div>
                <h5>Millions of business offerings</h5>
                <p>Explore products and suppliers for your business from millions of offerings worldwide.</p>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card-custom text-center p-md-3 p-sm-2 p-1">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                            <path d="M14.262 3.6C13.196 2.532 12.662 2 12 2s-1.196.533-2.262 1.6c-.64.64-1.274.936-2.186.936c-.796 0-1.93-.154-2.552.473c-.618.623-.464 1.752-.464 2.543c0 .912-.297 1.546-.937 2.186C2.533 10.804 2 11.338 2 12s.533 1.196 1.6 2.262c.716.717.936 1.18.936 2.186c0 .796-.154 1.93.473 2.552c.623.617 1.752.464 2.543.464c.971 0 1.44.19 2.133.883c.59.59 1.381 1.653 2.315 1.653s1.725-1.063 2.315-1.653c.694-.693 1.162-.883 2.133-.883c.791 0 1.92.154 2.543-.464m1.41-9.262C21.467 10.804 22 11.338 22 12s-.533 1.196-1.6 2.262c-.716.717-.936 1.18-.936 2.186c0 .796.154 1.93-.473 2.552m0 0H19" />
                            <path d="M8 10.308S10.25 10 12 14c0 0 5.059-10 10-12" />
                        </g>
                    </svg>
                </div>
                <h5>Assured quality and transactions</h5>
                <p>Ensure production quality from verified suppliers, with your orders protected from payment to delivery.</p>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card-custom text-center p-md-3 p-sm-2 p-1">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor">
                            <path d="M2 19s1 0 2 2c0 0 3.176-5 6-6m.5 6H16c2.828 0 4.243 0 5.121-.879C22 19.243 22 17.828 22 15v-2c0-2.828 0-4.243-.879-5.121C20.243 7 18.828 7 16 7h-6m-8 8v-4c0-3.771 0-5.657 1.172-6.828S6.229 3 10 3h4c.93 0 1.395 0 1.777.102a3 3 0 0 1 2.12 2.122C18 5.605 18 6.07 18 7" />
                            <path d="M16 13.5a1.5 1.5 0 1 0 3 0a1.5 1.5 0 0 0-3 0" />
                        </g>
                    </svg>
                </div>
                <h5>One-stop trading solution</h5>
                <p>Order seamlessly from product/supplier search to order management, payment, and fulfillment.</p>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card-custom text-center p-md-3 p-sm-2 p-1">
                <div class="card-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="m9.853 14.633l-6.201-3.946a2 2 0 0 1 0-3.374l6.2-3.946a4 4 0 0 1 4.296 0l6.2 3.946a2 2 0 0 1 0 3.374l-6.2 3.946a4 4 0 0 1-4.296 0Z" />
                            <path d="m18.286 12l2.063 1.313a2 2 0 0 1 0 3.374l-6.201 3.946a4 4 0 0 1-4.296 0l-6.2-3.946a2 2 0 0 1 0-3.374L5.714 12" />
                        </g>
                    </svg>
                </div>
                <h5>Tailored trading experience</h5>
                <p>Get curated benefits, such as exclusive discounts, enhanced protection, and extra support, to help grow your business every step of the way.</p>
            </div>
        </div>
    </div> -->
    <!-- _______________________Categories Card Slider_________________________ -->
    <div class="swiper mySwiper2 mt-5 d-none">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="card categories-card p-4 border-0">
                    <h4 class="card-title position-relative text-start">
                        Computers
                        <div class="border-under-heading"></div>
                    </h4>
                    <p class="card-text text-start pt-2">6 items</p>
                    <div class="img-fluid img-in-card">
                        <img class="object-fit-contain" src="{{asset('assets_user/images/category-img.png')}}">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card categories-card p-4 border-0">
                    <h4 class="card-title position-relative text-start">
                        Computers
                        <div class="border-under-heading"></div>
                    </h4>
                    <p class="card-text text-start pt-2">6 items</p>
                    <div class="img-fluid img-in-card">
                        <img class="object-fit-contain" src="{{asset('assets_user/images/category-img.png')}}">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card categories-card p-4 border-0">
                    <h4 class="card-title position-relative text-start">
                        Computers
                        <div class="border-under-heading"></div>
                    </h4>
                    <p class="card-text text-start pt-2">6 items</p>
                    <div class="img-fluid img-in-card">
                        <img class="object-fit-contain" src="{{asset('assets_user/images/category-img.png')}}">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card categories-card p-4 border-0">
                    <h4 class="card-title position-relative text-start">
                        Computers
                        <div class="border-under-heading"></div>
                    </h4>
                    <p class="card-text text-start pt-2">6 items</p>
                    <div class="img-fluid img-in-card">
                        <img class="object-fit-contain" src="{{asset('assets_user/images/category-img.png')}}">
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="card categories-card p-4 border-0">
                    <h4 class="card-title position-relative text-start">
                        Computers
                        <div class="border-under-heading"></div>
                    </h4>
                    <p class="card-text text-start pt-2">6 items</p>
                    <div class="img-fluid img-in-card">
                        <img class="object-fit-contain" src="{{asset('assets_user/images/category-img.png')}}">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- _______________________Counters_________________________ -->
    <div class="counters mt-4">
        <div class="row">
            <div class="col-md-7 d-flex align-items-center">
                <h2 class=" font-weight-bold pt-md-3 pt-1 mt-lg-3 mt-0">Explore Hundreds
                    Of Offerings
                    Tailored To Your
                    Business Needs</h2>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <!-- Card 1 -->
                    <div class="col-6 my-md-3 my-2">
                        <div class="px-2 border-left-card">
                            <div>
                                <h2 class="mb-0">200K+</h2>
                                <p class="card-text d-flex">
                                    Products
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="col-6 my-md-3 my-2">
                        <div class="px-2 border-left-card">
                            <div>
                                <h2 class="mb-0">2,000+</h2>
                                <p class="card-text d-flex">
                                    Suppliers
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-6 my-md-3 my-2">
                        <div class="px-2 border-left-card">
                            <div>
                                <h2 class="mb-0">500+
                                </h2>
                                <p class="card-text d-flex">
                                    Product Categories
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-6 my-md-3 my-2">
                        <div class="px-2 border-left-card">
                            <div>
                                <h2 class="mb-0">2+
                                </h2>
                                <p class="card-text d-flex">
                                    Countries and Regions
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- _______________________Featured Card Slider_________________________ -->
    <div class="featured-cards-div mt-4">
        <h3 class="main-headings position-relative text-start">
            Featured Products
            <div class="border-under-main-heading"></div>
        </h3>
        <div class="swiper mySwiper3">
            <div class="swiper-wrapper">
                <?php
                    $featured_products = getFeaturedProducts();
                    // dd($featured_products);

                ?>
                @if($featured_products != null)
                @foreach(@$featured_products as $product)
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">

                                    @if(isset($product->productImages[0]->filepath))
                                    <img class="img-fluid"
                                        src="{{url('/').'/storage/'.$product->productImages[0]->filepath}}"
                                        alt="Card image">
                                    @else
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}"
                                        alt="Card image">
                                    @endif

                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2">
                                <small>{{@$product->product_name}}</small>
                            </p>
                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>${{ number_format(@$product->discount_price != null ? $product->discount_price :
                                        $product->price, 2) }}</h5>
                                    @if(@$product->discount_price != null)
                                    <p class="text-danger ps-1"><small><del>${{number_format(@$product->price, 2)
                                                }}</del></small></p>
                                    @endif
                                </div>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
                <!-- <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                           <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                        <div class="price-and-btn">
                             <div class="d-flex justify-content-center card-price">
                                <h5>$12.99</h5>
                                <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                            </div>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                           <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                        <div class="price-and-btn">
                             <div class="d-flex justify-content-center card-price">
                                <h5>$12.99</h5>
                                <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                            </div>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                           <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                        <div class="price-and-btn">
                             <div class="d-flex justify-content-center card-price">
                                <h5>$12.99</h5>
                                <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                            </div>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                           <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                        <div class="price-and-btn">
                             <div class="d-flex justify-content-center card-price">
                                <h5>$12.99</h5>
                                <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                            </div>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                           <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                        <div class="price-and-btn">
                             <div class="d-flex justify-content-center card-price">
                                <h5>$12.99</h5>
                                <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                            </div>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                           <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                        <div class="price-and-btn">
                             <div class="d-flex justify-content-center card-price">
                                <h5>$12.99</h5>
                                <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                            </div>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000" d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}" alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32" d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                           <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                        <div class="price-and-btn">
                             <div class="d-flex justify-content-center card-price">
                                <h5>$12.99</h5>
                                <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                            </div>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                        </div>
                    </div>
                </div> -->

            </div>
            <!-- Add Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <!-- _______________________Promo Cards_________________________ -->
    <div class="promocards row mt-4 d-none">
        <div class="col-md-4">
            <div class="mx-1 promocard bg-danger d-flex rounded-2 w-100 my-md-0 my-2">
                <div class="row align-items-center py-4 px-2">
                    <div class="col-md-8">
                        <div class="promo-text d-flex flex-column align-items-center">
                            <h5 class="text-white">New Apple Watch</h5>
                            <p class="text-white">Get up to 20% Save</p>
                            <button class="btn btn-shop">Shop Now</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center mt-md-0 mt-4">
                            <img src="{{asset('assets_user/images/category-img.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mx-1 promocard bg-secondary d-flex rounded-2 w-100 my-md-0 my-2">
                <div class="row align-items-center py-4 px-2">
                    <div class="col-md-8">
                        <div class="promo-text d-flex flex-column align-items-center">
                            <h5 class="text-white">New Apple Watch</h5>
                            <p class="text-white">Get up to 20% Save</p>
                            <button class="btn btn-shop">Shop Now</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center mt-md-0 mt-4">
                            <img src="{{asset('assets_user/images/category-img.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mx-1 promocard bg-success d-flex rounded-2 w-100 my-md-0 my-2">
                <div class="row align-items-center py-4 px-2">
                    <div class="col-md-8">
                        <div class="promo-text d-flex flex-column align-items-center">
                            <h5 class="text-white">New Apple Watch</h5>
                            <p class="text-white">Get up to 20% Save</p>
                            <button class="btn btn-shop">Shop Now</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="d-flex justify-content-center mt-md-0 mt-4">
                            <img src="{{asset('assets_user/images/category-img.png')}}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- _______________________Our Mission Cards_________________________ -->
    <div class="our-mission-cards-div mt-4">
        <h3 class="main-headings position-relative text-start">
            Empowering businesses
            <div class="border-under-main-heading"></div>
        </h3>
        <div class="row mt-5">
            <div class="col-md-6 d-flex align-items-stretch my-1">
                <div class="info-card info-card-dark w-100 py-4">
                    <div>
                        <h6>Our Mission</h6>
                        <h3>Make it easy to do business anywhere.</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch my-1">
                <div>
                    <div class="info-card info-card-light w-100 py-4 my-1 mb-md-2">
                        <div class="row align-items-end">
                            <div class="col-lg-8 my-1">
                                <h6>Our Locations</h6>
                                <h3>We have teams around the world.</h3>
                            </div>
                            <div class="col-lg-4 my-1">
                                <p>
                                    Hangzhou, China Paris, France Munich, Germany Tokyo, Japan Seoul, Korea London,
                                    UKNew York, US...
                                    and many other locations worldwide.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="info-card info-card-dar w-100 py-4 my-1 mt-md-2">
                        <div>
                            <h6>Our ESG Promises</h6>
                            <h3>Responsible technology.<br>Sustainable future.</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- _______________________New Products Card Slider_________________________ -->
    <div class="new-products-cards-div mt-4">
        <h3 class="main-headings position-relative text-start">
            New Products
            <div class="border-under-main-heading"></div>
        </h3>
        <div class="swiper mySwiper4">
            <div class="swiper-wrapper" id="new_products_element">

                {{-- new products will be dynamically injected here --}}
            </div>
            <!-- Add Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    <!-- _______________________Promo Cards 2_________________________ -->


    <?php
$discountedProducts = getDiscountedProducts();
?>

    @if($discountedProducts && $discountedProducts->count() > 0)
    <div class="promocards row mt-4">
        @foreach($discountedProducts as $index => $product)
        @if($index < 2) <!-- Ensures that only up to two products are displayed -->
            <div class="col-lg-6 my-1">
                <div
                    class="mx-1 promocard {{ $index === 0 ? 'bg-danger' : 'bg-secondary' }} d-flex rounded-2 w-100 my-md-0 my-2">
                    <div class="row align-items-center py-2 px-2 w-100 my-1">
                        <div class="col-md-7">
                            <div class="promo-text d-flex flex-column align-items-center">
                                <h4 class="text-white">{{ $product->product_name ?? 'Product Name' }}</h4>
                                <p class="text-white">Get up to {{ $product->offered_percentage ?? '0' }}% Save</p>
                                <button class="btn btn-shop">Shop Now</button>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex justify-content-center mt-md-0 mt-4">
                                @if($product->productImages->isNotEmpty())
                                <img src="{{ url('/storage/' . $product->productImages->first()->filepath) }}"
                                    alt="Product Image" class="img-fluid">
                                @else
                                <img src="{{ asset('assets_user/images/default-product.png') }}" alt="Default Image"
                                    class="img-fluid">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
    </div>
    @endif




    <!-- _______________________Best Seller Card Slider_________________________ -->
    <div class="best-seller-cards-div mt-4 d-none">
        <h3 class="main-headings position-relative text-start">
            Best Sellers
            <div class="border-under-main-heading"></div>
        </h3>
        <div class="swiper mySwiper5">
            <div class="swiper-wrapper">
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}"
                                        alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                    HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>$12.99</h5>
                                    <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                </div>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}"
                                        alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                    HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>$12.99</h5>
                                    <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                </div>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}"
                                        alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                    HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>$12.99</h5>
                                    <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                </div>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}"
                                        alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                    HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>$12.99</h5>
                                    <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                </div>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}"
                                        alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                    HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>$12.99</h5>
                                    <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                </div>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}"
                                        alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                    HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>$12.99</h5>
                                    <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                </div>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        <p class="sale-badge text-black">Sale</p>
                        <div class="actions">
                            <button class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>

                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a href="{{'product_detail'}}">
                                    <img class="img-fluid" src="{{asset('assets_user/images/category-img.png')}}"
                                        alt="Card image">
                                </a>
                            </div>
                        </div>
                        <div class="card-body text-center mt-5">
                            <div class="rating border-bottom pb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z" />
                                </svg>
                            </div>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2"><small>Ramsond 15000 BTU PTAC AC
                                    HEAT PUMP WITH 5K BACKUP HEAT STRIP COMBO</small></p>
                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>$12.99</h5>
                                    <p class="text-danger ps-1"><small><del>$15.00</del></small></p>
                                </div>
                                <button class="btn btn-add-to-cart">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>


    <!-- _______________________Testimonials Slider_________________________ -->
    <div class="testimonials-div mt-4">
        <h3 class="main-headings position-relative text-start">
            Testimonials
            <div class="border-under-main-heading"></div>
        </h3>
        <div class="swiper mySwiper8 mt-5">
            <div class="swiper-wrapper" id="testimonial-slider-element">
                {{-- <div class="swiper-slide p-2">
                    <div
                        class="testimonial d-flex flex-lg-nowrap flex-wrap justify-content-md-start justify-content-center align-items-center">
                        <img src="https://s.alicdn.com/@img/imgextra/i3/O1CN01wllRR11a9Uiq6syoP_!!6000000003287-2-tps-352-352.png_350x350.jpg"
                            alt="Dr. Sayed Ibrahim">
                        <div class="testimonial-content d-flex flex-column flex-lg-nowrap flex-wrap">
                            <p class="quote">“Once I discovered Alibaba.com, I was amazed at how many options I had with
                                suppliers from all over the world.”</p>
                            <h6>Dr. Sayed Ibrahim</h6>
                            <p>Founder of SprinJene</p>
                        </div>
                    </div>
                </div> --}}
            </div>
            <!-- <div class="swiper-pagination"></div> -->
        </div>
    </div>
    <!-- _______________________Latest Blogs Card Slider_________________________ -->
    <div class="best-seller-cards-div my-4">
        <h3 class="main-headings position-relative text-start">
            Latest Blogs
            <div class="border-under-main-heading"></div>
        </h3>
        <div class="swiper mySwiper6">
            <div class="swiper-wrapper">
                <div class="swiper-slide mt-5">
                    <div class="card latest-blogs-cards mb-3">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-5 d-flex justify-content-center g-0 ps-3">
                                <div class="latest-blogs-images">
                                    <svg class="search-icon-blogs" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 15 15">
                                        <path fill="none" stroke="currentColor"
                                            d="m8.5 8.5l2 2M7 9.5a2.5 2.5 0 1 1 0-5a2.5 2.5 0 0 1 0 5Zm.5 5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Z" />
                                    </svg>
                                    <div class="overlay-blogs"></div>
                                </div>
                            </div>
                            <div class="col-md-7 ms-0">
                                <div class="card-body  px-md-0 px-2">
                                    <h6 class="card-title text-start mb-0 line-clamp-1">tempora incidunt utlabore</h6>
                                    <p class="card-text text-start mb-0"><small>This is a wider card with supporting
                                            text below as a natural lead-in to additional content.</small></p>
                                    <p class="card-text text-start mb-0 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="rgb(33 37 41 / 75%)"
                                                d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1" />
                                        </svg>
                                        <small class="text-body-secondary ms-2">Admin</small>
                                    </p>
                                    <p class="card-text text-start mb-0 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="#000" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"
                                                d="M16.5 5V3m-9 2V3M3.25 8h17.5M3 10.044c0-2.115 0-3.173.436-3.981a3.9 3.9 0 0 1 1.748-1.651C6.04 4 7.16 4 9.4 4h5.2c2.24 0 3.36 0 4.216.412c.753.362 1.364.94 1.748 1.65c.436.81.436 1.868.436 3.983v4.912c0 2.115 0 3.173-.436 3.981a3.9 3.9 0 0 1-1.748 1.651C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.412a3.9 3.9 0 0 1-1.748-1.65C3 18.128 3 17.07 3 14.955z" />
                                        </svg>
                                        <small class="text-body-secondary ms-2">8th May 2020</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5">
                    <div class="card latest-blogs-cards mb-3">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-5 d-flex justify-content-center g-0 ps-3">
                                <div class="latest-blogs-images">
                                    <svg class="search-icon-blogs" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 15 15">
                                        <path fill="none" stroke="currentColor"
                                            d="m8.5 8.5l2 2M7 9.5a2.5 2.5 0 1 1 0-5a2.5 2.5 0 0 1 0 5Zm.5 5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Z" />
                                    </svg>
                                    <div class="overlay-blogs"></div>
                                </div>
                            </div>
                            <div class="col-md-7 ms-0">
                                <div class="card-body  px-md-0 px-2">
                                    <h6 class="card-title text-start mb-0 line-clamp-1">tempora incidunt utlabore</h6>
                                    <p class="card-text text-start mb-0"><small>This is a wider card with supporting
                                            text below as a natural lead-in to additional content.</small></p>
                                    <p class="card-text text-start mb-0 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="rgb(33 37 41 / 75%)"
                                                d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1" />
                                        </svg>
                                        <small class="text-body-secondary ms-2">Admin</small>
                                    </p>
                                    <p class="card-text text-start mb-0 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="#000" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"
                                                d="M16.5 5V3m-9 2V3M3.25 8h17.5M3 10.044c0-2.115 0-3.173.436-3.981a3.9 3.9 0 0 1 1.748-1.651C6.04 4 7.16 4 9.4 4h5.2c2.24 0 3.36 0 4.216.412c.753.362 1.364.94 1.748 1.65c.436.81.436 1.868.436 3.983v4.912c0 2.115 0 3.173-.436 3.981a3.9 3.9 0 0 1-1.748 1.651C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.412a3.9 3.9 0 0 1-1.748-1.65C3 18.128 3 17.07 3 14.955z" />
                                        </svg>
                                        <small class="text-body-secondary ms-2">8th May 2020</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5">
                    <div class="card latest-blogs-cards mb-3">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-5 d-flex justify-content-center g-0 ps-3">
                                <div class="latest-blogs-images">
                                    <svg class="search-icon-blogs" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 15 15">
                                        <path fill="none" stroke="currentColor"
                                            d="m8.5 8.5l2 2M7 9.5a2.5 2.5 0 1 1 0-5a2.5 2.5 0 0 1 0 5Zm.5 5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Z" />
                                    </svg>
                                    <div class="overlay-blogs"></div>
                                </div>
                            </div>
                            <div class="col-md-7 ms-0">
                                <div class="card-body  px-md-0 px-2">
                                    <h6 class="card-title text-start mb-0 line-clamp-1">tempora incidunt utlabore</h6>
                                    <p class="card-text text-start mb-0"><small>This is a wider card with supporting
                                            text below as a natural lead-in to additional content.</small></p>
                                    <p class="card-text text-start mb-0 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="rgb(33 37 41 / 75%)"
                                                d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1" />
                                        </svg>
                                        <small class="text-body-secondary ms-2">Admin</small>
                                    </p>
                                    <p class="card-text text-start mb-0 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="#000" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"
                                                d="M16.5 5V3m-9 2V3M3.25 8h17.5M3 10.044c0-2.115 0-3.173.436-3.981a3.9 3.9 0 0 1 1.748-1.651C6.04 4 7.16 4 9.4 4h5.2c2.24 0 3.36 0 4.216.412c.753.362 1.364.94 1.748 1.65c.436.81.436 1.868.436 3.983v4.912c0 2.115 0 3.173-.436 3.981a3.9 3.9 0 0 1-1.748 1.651C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.412a3.9 3.9 0 0 1-1.748-1.65C3 18.128 3 17.07 3 14.955z" />
                                        </svg>
                                        <small class="text-body-secondary ms-2">8th May 2020</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide mt-5">
                    <div class="card latest-blogs-cards mb-3">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-md-5 d-flex justify-content-center g-0 ps-3">
                                <div class="latest-blogs-images">
                                    <svg class="search-icon-blogs" xmlns="http://www.w3.org/2000/svg" width="1em"
                                        height="1em" viewBox="0 0 15 15">
                                        <path fill="none" stroke="currentColor"
                                            d="m8.5 8.5l2 2M7 9.5a2.5 2.5 0 1 1 0-5a2.5 2.5 0 0 1 0 5Zm.5 5a7 7 0 1 1 0-14a7 7 0 0 1 0 14Z" />
                                    </svg>
                                    <div class="overlay-blogs"></div>
                                </div>
                            </div>
                            <div class="col-md-7 ms-0">
                                <div class="card-body  px-md-0 px-2">
                                    <h6 class="card-title text-start mb-0 line-clamp-1">tempora incidunt utlabore</h6>
                                    <p class="card-text text-start mb-0"><small>This is a wider card with supporting
                                            text below as a natural lead-in to additional content.</small></p>
                                    <p class="card-text text-start mb-0 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="rgb(33 37 41 / 75%)"
                                                d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 2a2 2 0 0 0-2 2a2 2 0 0 0 2 2a2 2 0 0 0 2-2a2 2 0 0 0-2-2m0 7c2.67 0 8 1.33 8 4v3H4v-3c0-2.67 5.33-4 8-4m0 1.9c-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V17c0-.64-3.13-2.1-6.1-2.1" />
                                        </svg>
                                        <small class="text-body-secondary ms-2">Admin</small>
                                    </p>
                                    <p class="card-text text-start mb-0 d-flex align-items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="#000" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5"
                                                d="M16.5 5V3m-9 2V3M3.25 8h17.5M3 10.044c0-2.115 0-3.173.436-3.981a3.9 3.9 0 0 1 1.748-1.651C6.04 4 7.16 4 9.4 4h5.2c2.24 0 3.36 0 4.216.412c.753.362 1.364.94 1.748 1.65c.436.81.436 1.868.436 3.983v4.912c0 2.115 0 3.173-.436 3.981a3.9 3.9 0 0 1-1.748 1.651C17.96 21 16.84 21 14.6 21H9.4c-2.24 0-3.36 0-4.216-.412a3.9 3.9 0 0 1-1.748-1.65C3 18.128 3 17.07 3 14.955z" />
                                        </svg>
                                        <small class="text-body-secondary ms-2">8th May 2020</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Navigation buttons -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>

</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-head d-md-none d-block">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-5">
                <div class="row">
                    <div class="col-md-5 my-1 d-flex align-items-center justify-content-center">
                        <div class="row align-items-center justify-content-center">
                            <img class="w-100" style="height:23rem" id="mainImage"
                                src="{{asset('assets_user/images/category-img.png')}}" alt="Card image"
                                style="width: 100%; height: auto;">
                            <div class="row mt-3">
                                <div class="col-3">
                                    <img src="{{asset('assets_user/images/category-img.png')}}"
                                        class="img-thumbnail thumbnail-img" alt="Thumbnail 1">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('assets_user/images/category-imgg.png')}}"
                                        class="img-thumbnail thumbnail-img" alt="Thumbnail 2">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('assets_user/images/category-img.png')}}"
                                        class="img-thumbnail thumbnail-img" alt="Thumbnail 3">
                                </div>
                                <div class="col-3">
                                    <img src="{{asset('assets_user/images/category-imgg.png')}}"
                                        class="img-thumbnail thumbnail-img" alt="Thumbnail 4">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 my-1">
                        <div class="d-flex justify-content-between">
                            <h5 class="product-title mb-0">Aspetur Autodit Autfugit</h5>
                            <button type="button" class="btn-close d-md-block d-none" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <hr class="mb-0">
                        <p class="text-muted mt-2">Foodzone</p>
                        <p class="fw-bold">₹234.95</p>

                        <div class="d-flex align-items-center">
                            <div class="rating-popup mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="32"
                                        d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                    </path>
                                </svg>
                            </div>
                            <p class="mb-0 ms-2">2 reviews</p>
                        </div>

                        <hr>

                        <ul class="list-unstyled">
                            <li><span class="pe-3">SKU:</span> DPB</li>
                            <li><span class="pe-3">Weight:</span> 1.00 KGS</li>
                            <li><span class="pe-3">Shipping:</span> Calculated at Checkout</li>
                        </ul>

                        <hr>
                        <p class="me-3 fw-bold">Quantity:</p>
                        <div class="d-flex align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <svg type="button" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                    viewBox="0 0 512 512">
                                    <path fill="cuurentColor"
                                        d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240s240-107.452 240-240S388.548 16 256 16m147.078 387.078a207.253 207.253 0 1 1 44.589-66.125a207.3 207.3 0 0 1-44.589 66.125" />
                                    <path fill="cuurentColor"
                                        d="M272.112 314.481V128h-32v186.481l-75.053-75.052l-22.627 22.627l113.68 113.68l113.681-113.68l-22.627-22.627z" />
                                </svg>
                                <input type="number" class="form-control text-center w-25 border-0 px-3" value="1"
                                    min="1" id="quantity">
                                <svg type="button" xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em"
                                    viewBox="0 0 512 512">
                                    <path fill="cuurentColor"
                                        d="M256 16C123.452 16 16 123.452 16 256s107.452 240 240 240s240-107.452 240-240S388.548 16 256 16m147.078 387.078a207.253 207.253 0 1 1 44.589-66.125a207.3 207.3 0 0 1-44.589 66.125" />
                                    <path fill="cuurentColor"
                                        d="m142.319 241.027l22.628 22.627L240 188.602V376h32V188.602l75.053 75.052l22.628-22.627L256 127.347z" />
                                </svg>
                            </div>
                            <button class="btn btn-add-to-cart">
                                Add to Cart
                            </button>
                        </div>

                        <div class="d-flex">
                            <button class="btn btn-outline-secondary rounded-pill dropdown-toggle"
                                data-bs-toggle="dropdown">Add to Wish List</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Wishlist 1</a></li>
                                <li><a class="dropdown-item" href="#">Wishlist 2</a></li>
                                <li><a class="dropdown-item" href="#">Wishlist 3</a></li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 24 24">
                                    <g fill="none" fill-rule="evenodd">
                                        <path
                                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="#666666"
                                            d="M4 12a8 8 0 1 1 9 7.938V14h2a1 1 0 1 0 0-2h-2v-2a1 1 0 0 1 1-1h.5a1 1 0 1 0 0-2H14a3 3 0 0 0-3 3v2H9a1 1 0 1 0 0 2h2v5.938A8 8 0 0 1 4 12m8 10c5.523 0 10-4.477 10-10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10" />
                                    </g>
                                </svg>
                            </a>
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 24 24">
                                    <path fill="#666666"
                                        d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2zm-2 0l-8 5l-8-5zm0 12H4V8l8 5l8-5z" />
                                </svg> </a>
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 14 14">
                                    <g fill="none">
                                        <g clip-path="url(#primeTwitter0)">
                                            <path fill="#666666"
                                                d="M11.025.656h2.147L8.482 6.03L14 13.344H9.68L6.294 8.909l-3.87 4.435H.275l5.016-5.75L0 .657h4.43L7.486 4.71zm-.755 11.4h1.19L3.78 1.877H2.504z" />
                                        </g>
                                        <defs>
                                            <clipPath id="primeTwitter0">
                                                <path fill="#fff" d="M0 0h14v14H0z" />
                                            </clipPath>
                                        </defs>
                                    </g>
                                </svg> </a>
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 1024 1024">
                                    <path fill="#666666"
                                        d="M847.7 112H176.3c-35.5 0-64.3 28.8-64.3 64.3v671.4c0 35.5 28.8 64.3 64.3 64.3h671.4c35.5 0 64.3-28.8 64.3-64.3V176.3c0-35.5-28.8-64.3-64.3-64.3m0 736q-671.7-.15-671.7-.3q.15-671.7.3-671.7q671.7.15 671.7.3q-.15 671.7-.3 671.7M230.6 411.9h118.7v381.8H230.6zm59.4-52.2c37.9 0 68.8-30.8 68.8-68.8a68.8 68.8 0 1 0-137.6 0c-.1 38 30.7 68.8 68.8 68.8m252.3 245.1c0-49.8 9.5-98 71.2-98c60.8 0 61.7 56.9 61.7 101.2v185.7h118.6V584.3c0-102.8-22.2-181.9-142.3-181.9c-57.7 0-96.4 31.7-112.3 61.7h-1.6v-52.2H423.7v381.8h118.6z" />
                                </svg> </a>
                            <a href="#" class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1.3em" height="1.3em"
                                    viewBox="0 0 24 24">
                                    <path fill="#666666"
                                        d="M13.372 2.094a10.003 10.003 0 0 0-5.369 19.074a7.8 7.8 0 0 1 .162-2.292c.185-.839 1.296-5.463 1.296-5.463a3.7 3.7 0 0 1-.324-1.577c0-1.485.857-2.593 1.923-2.593a1.334 1.334 0 0 1 1.342 1.508c0 .9-.578 2.262-.88 3.54a1.544 1.544 0 0 0 1.575 1.923c1.897 0 3.17-2.431 3.17-5.301c0-2.201-1.457-3.847-4.143-3.847a4.746 4.746 0 0 0-4.93 4.793a2.96 2.96 0 0 0 .648 1.97a.48.48 0 0 1 .162.554c-.046.184-.162.623-.208.785a.354.354 0 0 1-.51.253c-1.384-.554-2.036-2.077-2.036-3.816c0-2.847 2.384-6.255 7.154-6.255c3.796 0 6.319 2.777 6.319 5.747c0 3.909-2.176 6.848-5.393 6.848a2.86 2.86 0 0 1-2.454-1.246s-.579 2.316-.692 2.754a8 8 0 0 1-1.019 2.131c.923.28 1.882.42 2.846.416a9.99 9.99 0 0 0 9.996-10.002a10 10 0 0 0-8.635-9.904" />
                                </svg> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
             <script src=" {{asset("assets_user/customjs/home.js") }}"></script>
@endpush
