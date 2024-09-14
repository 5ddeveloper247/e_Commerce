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
            Featured Productsx
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
                            <button class="btn addWishListBtn" data-productid="{{ $product->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>
                            <button type="button" class="btn viewDetailProduct" data-productid="{{ $product->id }}">
                                <svg class=""
                                    xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                    <path fill="#000"
                                        d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                </svg>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <div class="featured-card-images">
                                <a
                                    href="{{ url('product_detail/' . str_replace(' ', '-', $product->category->category_name) . '/' . $product->sku) }}">
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
                                <button class="btn btn-add-to-cart AddToCartBtn " data-quantity="1"
                                    data-productid="{{ $product->id }}">
                                    <span class="me-2">+</span>
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

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
<div class="modal fade viewDetailModalContent" id="viewDetailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="viewDetailModalLabel" aria-hidden="true">
   
</div>
@endsection
@push('scripts')
<script src=" {{asset("assets_user/customjs/home.js") }}"></script>
@endpush
