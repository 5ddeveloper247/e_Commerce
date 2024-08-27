@extends('layouts.website.website_master')

@push('styles')
    <style>
        .product-page {
            .product-top {
                background-color: #F5F5F5;
                padding: 1rem 5rem;
            }

            .your-cart {
                padding: 3rem 10rem;
            }

            .navbar {
                margin: 0 1rem 0 5rem;
                background-color: #fff;
            }

            label {
                margin-top: .7rem;
                color: #707070;
                font-size: 14px;
            }

            button {
                border: none;
            }

            .l-btn {
                background-color: #FFAA3D;
            }

            .products {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 30px;
                margin-top : 2rem;

               
            }
        }
    </style>
@endpush

@section('content')

<div class="product-page">
    <div class="product-top d-flex align-items-center justify-content-between">
        <h6 class="mb-0">
            Shop All
        </h6>
        <div class="bread">
            <small>
                Home / Shop All
            </small>
        </div>
    </div>

    <nav class="navbar mx-3 d-block d-lg-none border rounded-4 navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler l-btn text-center w-100" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                Refine By
            </button>
            <div class="collapse navbar-collapse mt-3" id="navbarSupportedContent">
                <ul class="navbar-nav d-flex flex-column w-100">
                    <li class="nav-item">
                        <h6>Brand</h6>
                        <div>
                            <input type="checkbox" name="" id="">
                            <label class="mt-0" for="">Foodzone</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Mountain Climb</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Premium Quality</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Shoppe Fabs</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Walking Dreams</label>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <h6>Color</h6>
                        <div>
                            <input type="checkbox" name="" id="">
                            <label class="mt-0" for="">Black</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">White</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Blue</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Green</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Red</label>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <h6>Size</h6>
                        <div>
                            <input type="checkbox" name="" id="">
                            <label class="mt-0" for="">Large (2)</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Medium (4)</label>
                        </div>

                        <div>
                            <input type="checkbox" name="" id="">
                            <label for="">Small (1)</label>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <h6>Wine Vintage</h6>
                        <div>
                            <input type="checkbox" name="" id="">
                            <label class="mt-0" for="">1998</label>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <h6>Price</h6>
                        <div class="d-flex gap-2">
                            <div class="d-flex">
                                <input type="text" class="w-50" placeholder="Min" name="" id="">
                                <input type="text" class="w-50" placeholder="Max" name="" id="">
                            </div>
                            <button class="rounded-5 px-3 py-1">Update</button>
                        </div>
                    </li>
                    <hr>
                    <li class="nav-item">
                        <h6>Vintage</h6>
                        <div>
                            <input type="checkbox" name="" id="">
                            <label class="mt-0" for="">1999 (1)</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="d-flex py-5">
        <nav class="navbar d-none d-lg-block border rounded-4 w-50 navbar-expand-lg">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex flex-column w-100">
                        <li class="nav-item">
                            <h6>Brand</h6>
                            <div>
                                <input type="checkbox" name="" id="">
                                <label class="mt-0" for="">Foodzone</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">Mountain Climb</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">Premium Quality</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">Shoppe Fabs</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">Walking Dreams</label>
                            </div>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <h6>Color</h6>
                            <div>
                                <input type="checkbox" name="" id="">
                                <label class="mt-0" for="">Black</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">White</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">Blue</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">Green</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">Red</label>
                            </div>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <h6>Size</h6>
                            <div>
                                <input type="checkbox" name="" id="">
                                <label class="mt-0" for="">Large (2)</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">Medium (4)</label>
                            </div>

                            <div>
                                <input type="checkbox" name="" id="">
                                <label for="">Small (1)</label>
                            </div>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <h6>Wine Vintage</h6>
                            <div>
                                <input type="checkbox" name="" id="">
                                <label class="mt-0" for="">1998</label>
                            </div>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <h6>Price</h6>
                            <div class="d-flex gap-2">
                                <div class="d-flex">
                                    <input type="text" class="w-50" placeholder="Min" name="" id="">
                                    <input type="text" class="w-50" placeholder="Max" name="" id="">
                                </div>
                                <button class="rounded-5 px-3 py-1">Update</button>
                            </div>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <h6>Vintage</h6>
                            <div>
                                <input type="checkbox" name="" id="">
                                <label class="mt-0" for="">1999 (1)</label>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            <div class="d-flex flex-column flex-md-row gap-3 mx-3">
                <img class="border rounded-3 p-1"
                    src="https://cdn11.bigcommerce.com/s-xfjb6c0wb4/images/stencil/original/p/category-img-06__37886.original.jpg"
                    width="200" alt="">
                <div>
                    <h6>
                        Shop All
                    </h6>
                    <small>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce sodales tristique eleifend. Proin
                        et felis ac eros scelerisque rhoncus vitae eget augue. Suspendisse ac ante lectus. Donec a
                        sollicitudin lorem. Vivamus vehicula arcu ut diam viverra mollis. Vivamus felis justo, lobortis
                        non mollis eget, semper faucibus nunc. Donec sem odio, sollicitudin at vehicula accumsan,
                        efficitur in diam.
                    </small>
                </div>
            </div>

            <div class="products mx-3">
                <div class="card featured-card border-0">
                    <p class="sale-badge text-black">Sale</p>
                    <div class="actions">
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#000"
                                    d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                            </svg>
                        </button>
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                <g fill="#000">
                                    <path
                                        d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                    <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                    <path
                                        d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                    <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                    <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                </g>
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
                    <div class="card-body text-center">
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
                        <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                        <div class="price-and-btn">
                            <h5 class="card-price">$12.99</h5>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card featured-card border-0">
                    <p class="sale-badge text-black">Sale</p>
                    <div class="actions">
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#000"
                                    d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                            </svg>
                        </button>
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                <g fill="#000">
                                    <path
                                        d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                    <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                    <path
                                        d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                    <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                    <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                </g>
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
                    <div class="card-body text-center">
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
                        <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                        <div class="price-and-btn">
                            <h5 class="card-price">$12.99</h5>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card featured-card border-0">
                    <p class="sale-badge text-black">Sale</p>
                    <div class="actions">
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#000"
                                    d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                            </svg>
                        </button>
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                <g fill="#000">
                                    <path
                                        d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                    <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                    <path
                                        d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                    <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                    <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                </g>
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
                    <div class="card-body text-center">
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
                        <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                        <div class="price-and-btn">
                            <h5 class="card-price">$12.99</h5>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card featured-card border-0">
                    <p class="sale-badge text-black">Sale</p>
                    <div class="actions">
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#000"
                                    d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                            </svg>
                        </button>
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                <g fill="#000">
                                    <path
                                        d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                    <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                    <path
                                        d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                    <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                    <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                </g>
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
                    <div class="card-body text-center">
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
                        <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                        <div class="price-and-btn">
                            <h5 class="card-price">$12.99</h5>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card featured-card border-0">
                    <p class="sale-badge text-black">Sale</p>
                    <div class="actions">
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#000"
                                    d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                            </svg>
                        </button>
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                <g fill="#000">
                                    <path
                                        d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                    <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                    <path
                                        d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                    <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                    <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                </g>
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
                    <div class="card-body text-center">
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
                        <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                        <div class="price-and-btn">
                            <h5 class="card-price">$12.99</h5>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card featured-card border-0">
                    <p class="sale-badge text-black">Sale</p>
                    <div class="actions">
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#000"
                                    d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                            </svg>
                        </button>
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                <g fill="#000">
                                    <path
                                        d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                    <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                    <path
                                        d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                    <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                    <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                </g>
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
                    <div class="card-body text-center">
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
                        <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                        <div class="price-and-btn">
                            <h5 class="card-price">$12.99</h5>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card featured-card border-0">
                    <p class="sale-badge text-black">Sale</p>
                    <div class="actions">
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 256 256">
                                <path fill="#000"
                                    d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11" />
                            </svg>
                        </button>
                        <button class="btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                <g fill="#000">
                                    <path
                                        d="M5.254 14.596a.5.5 0 0 1 .707-.707A5.5 5.5 0 0 0 15.35 10a.5.5 0 0 1 .999.001a6.5 6.5 0 0 1-11.096 4.596" />
                                    <path d="M13.131 12.416a.5.5 0 0 1-.555-.832l3-2a.5.5 0 1 1 .555.832z" />
                                    <path
                                        d="M18.266 12.723a.5.5 0 1 1-.832.554l-2-3a.5.5 0 0 1 .832-.554zm-3.912-7.518a.5.5 0 0 1-.708.707a5.5 5.5 0 0 0-9.389 3.89a.5.5 0 0 1-1-.001a6.5 6.5 0 0 1 11.097-4.596" />
                                    <path d="M6.476 7.385a.5.5 0 0 1 .555.832l-3 2a.5.5 0 1 1-.555-.832z" />
                                    <path d="M1.341 7.078a.5.5 0 1 1 .832-.554l2 3a.5.5 0 0 1-.832.554z" />
                                </g>
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
                    <div class="card-body text-center">
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
                        <p class="card-title mt-2 border-top pt-3">Suscipit laboriosam nisi</p>
                        <div class="price-and-btn">
                            <h5 class="card-price">$12.99</h5>
                            <button class="btn btn-add-to-cart">
                                <span class="me-2">+</span>
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>


@endsection