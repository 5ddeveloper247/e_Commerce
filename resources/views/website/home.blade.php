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
        </div>
        <div class="swiper-slide mx-3">
            <img src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/original/carousel/12/slider-01__80936.jpg?c=1"
                alt="">
        </div>
        <div class="swiper-slide mx-3">
            <img src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/original/carousel/14/slider-03__76582.jpg?c=1"
                alt="">
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
        <h1 class="mb-0 fw-bold"><span class="the-future px-1">The Future</span> Of <br> Cooling<br>Starts
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
                        <h6 class="text-start mb-2">® PayeeShop</h6>
                        <p class="text-start mb-0 lh-sm"><small>Unlock New Products</small></p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-banner-card px-3 py-2">
                        <h6 class="text-start mb-2">® PayeeShop</h6>
                        <p class="text-start mb-0 lh-sm"><small>Unlock New Featured Products</small></p>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="hero-banner-card px-3 py-2">
                        <h6 class="text-start mb-2">® PayeeShop</h6>
                        <p class="text-start mb-0 lh-sm"><small>Unlock Whislist Products</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 px-md-0">
        <div class="swiper mySwiper10" id="hero-slider">
            <div class="swiper-wrapper">
                @if($banner_images)
                @foreach($banner_images as $value)
                <div class="swiper-slide">
                    <img class="new-hero-banner-img" src="{{url('/'.$value->file_path)}}" alt="">
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
                <?php $featured_products = getFeaturedProducts(); ?>

                @if($featured_products)
                @foreach($featured_products as $product)
                @php
                $is_offered = $product->is_offered == 1;
                $offeredPrice = $is_offered ? calculateDiscount($product->price, $product->offered_percentage) : null;
                $ratings = $product->ratings->toArray();
                $avgRating = calculateAvgRating($ratings);

                @endphp

                <div class="swiper-slide mt-5 p-2">
                    <div class="card featured-card border-0">
                        @if($is_offered)
                        <p class="sale-badge text-black">{{ $product->offered_percentage }}% Off</p>
                        @elseif($product->discount_price > 0)
                        <p class="sale-badge text-black">Discount</p>
                        @else
                        <p class="sale-badge text-black">New</p>
                        @endif

                        <div class="actions">
                            <button class="btn addWishListBtn" data-productid="{{ $product->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                    <path fill="#000"
                                        d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                                </svg>
                            </button>
                            <button type="button" class="btn viewDetailProduct" data-productid="{{ $product->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
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
                                        src="{{ url('/public/' . $product->productImages[0]->filepath) }}"
                                        alt="Card image">
                                    @else
                                    <img class="img-fluid" src="{{ asset('assets_user/images/category-img.png') }}"
                                        alt="Card image">
                                    @endif
                                </a>
                            </div>
                        </div>

                        <div class="card-body text-center mt-5">
                            <p> {!! renderStars($avgRating) !!} <small>({{$avgRating}})</small></p>
                            <p class="card-title mt-2 border-top pt-3 line-clamp-2">
                                <small>{{ $product->product_name }}</small>
                            </p>

                            <div class="price-and-btn">
                                <div class="d-flex justify-content-center card-price">
                                    <h5>${{ number_format($is_offered ? $offeredPrice : $product->discount_price, 0) }}
                                    </h5>
                                    <p class="text-danger ps-1">
                                        <small><del>${{ number_format($product->price, 0) }}</del></small>
                                    </p>
                                </div>

                                <button class="btn btn-add-to-cart AddToCartBtn" data-quantity="1"
                                    data-productid="{{ $product->id }}">
                                    <span class="me-2">+</span> Add to Cart
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

    @if($discountedProducts && $discountedProducts->count() > 0) <div class="promocards row mt-4">
        @foreach($discountedProducts as $index => $product)
        @php
        $ratings_2 = $product->ratings->toArray();
        $avgRating_2 = calculateAvgRating($ratings_2);
        @endphp
        @if($index < 2) <!-- Ensures that only up to two products are displayed -->
            <div class="col-lg-6 my-1">
                <div
                    class="mx-1 promocard {{ $index === 0 ? 'bg-danger' : 'bg-secondary' }} d-flex rounded-2 w-100 my-md-0 my-2">
                    <div class="row align-items-center py-2 px-2 w-100 my-1">
                        <div class="col-md-7">
                            <div class="promo-text d-flex flex-column align-items-center">
                                <h4 class="text-white">{{ $product->product_name ?? 'Product Name' }}</h4>
                                <p class="text-white">Get up to {{ $product->offered_percentage ?? '' }}% Save</p>
                                <p class="text-white">Price: ${{ $product->price ?? '' }}</p>
                                <p> {!! renderStars($avgRating_2) !!} <small>({{$avgRating_2}})</small></p>
                                <button class="btn btn-shop">
                                    <a href="{{ url('product_detail/' . str_replace(' ', '-', $product->category->category_name) . '/' . $product->sku) }}"
                                        style="text-decoration: none">Buy Now</a>
                                </button>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="d-flex justify-content-center mt-md-0 mt-4">
                                @if($product->productImages->isNotEmpty())
                                <img src="{{ url('/public/' . $product->productImages->first()->filepath) }}"
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
    @else
    <div class="no-discounts text-center my-5">
        <h2 class="text-muted">No Deals Right Now 😔</h2>
        <p class="text-muted">We’re cooking up some amazing deals just for you! 🔥 Check back soon for exciting
            discounts
            and exclusive offers. 🎉</p>
        <div style="font-size: 3em; color: #28a745;">🛍️✨</div>
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
            @php
            $testimonials = testimonials();
            @endphp

            @if($testimonials && count($testimonials) > 0) <div class="swiper-wrapper" id="testimonial-slider-element">
                @foreach($testimonials as $testimonial)
                <div class="swiper-slide p-2">
                    <div
                        class="testimonial d-flex flex-lg-nowrap flex-wrap justify-content-md-start justify-content-center align-items-center">
                        <img src="{{ url('/') . '/' . $testimonial->mediaPath }}" alt="Testimonial Image"
                            class="testimonial-image">
                        <div class="testimonial-content d-flex flex-column flex-lg-nowrap flex-wrap">
                            <p class="quote">{{ $testimonial->description ?? 'No description available' }}</p>
                            <h6>{{ $testimonial->name ?? 'Anonymous' }}</h6>
                            <p>{{ $testimonial->designation ?? '' }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Swiper Pagination and Navigation -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            @else
            <div class="no-testimonials text-center my-5">
                <h4 class="text-muted">We’re gathering stories from our valued customers. ✨</h4>
                <p class="text-muted">Be inspired soon by real experiences from people like you! 🌟</p>
                <div style="font-size: 3em; color: #ffc107;">🗣️❤️</div>
            </div>
            @endif
        </div>
    </div>


    <!-- _______________________Latest Blogs Card Slider_________________________ -->
</div>

</div>


<!-- Modal -->
<div class="modal fade viewDetailModalContent" id="viewDetailModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="viewDetailModalLabel" aria-hidden="true">
</div>
@endsection
@push('scripts')
<script src=" {{asset(" assets_user/customjs/home.js") }}"></script>
@endpush