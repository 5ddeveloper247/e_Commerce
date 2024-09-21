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
            gap: 36px;
            margin-top: 2rem;


        }
    }

    #brand-filter input {
        margin-right: 5px
    }

    #category-filter input {
        margin-right: 5px
    }
</style>
@endpush

@section('content')

<div class="product-page">
    <div class="product-top d-flex align-items-center justify-content-between d-none">
        <h6 class="mb-0">
            Shop All
        </h6>
        <div class="bread">
            <small>
                Home / Shop All
            </small>
        </div>
    </div>

    <nav class="navbar mx-3 d-block d-lg-none border rounded-4 navbar-expand-lg mt-3">
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
                    <hr>
                    <hr>
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
                </ul>
            </div>
        </div>
    </nav>

    <div class="row py-5">
        <div id="categorySearchItem" class="d-none">
            @if(isset($notFound) && $notFound)
            <p id="categorySearchItemId">404</p>
            @else
            @if($category)
            <p id="categorySearchItemId">{{ $category->id }}</p>
            <p id="categorySearchItemName">{{ $category->category_name }}</p>
            @else
            @endif
            @endif
        </div>

        <div class="col-md-3">
            <nav class="navbar d-none d-lg-block border rounded-4 navbar-expand-lg"
                style="height:fit-content; width:fit-content">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex flex-column w-100" id="filter-form">
                            <li class="nav-item">
                                <h6>Brand</h6>
                                <!-- Container for dynamically populated brand checkboxes -->
                                <div id="brand-filter">
                                    <!-- Dynamic brand checkboxes will be added here -->
                                </div>
                            </li>
                            <li class="nav-item">
                                <h6 class="mt-3">Category</h6>
                                <!-- Container for dynamically populated category checkboxes -->
                                <div id="category-filter">
                                    <!-- Dynamic category checkboxes will be added here -->
                                </div>
                            </li>
                            <hr>
                            <li class="nav-item">
                                <h6>Price</h6>
                                <div class="d-flex gap-2">
                                    <div class="d-flex">
                                        <input type="text" class="w-50" placeholder="Min" name="minPrice"
                                            id="min-price">
                                        <input type="text" class="w-50" placeholder="Max" name="maxPrice"
                                            id="max-price">
                                    </div>
                                </div>
                            </li>
                            <hr>
                        </ul>

                    </div>
                </div>
            </nav>
        </div>

        <div class="col-md-9">
            <div class="d-flex flex-column flex-md-row gap-3 mx-3 d-none">
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
            <div class="d-flex align-items-center justify-content-between mx-md-3 my-4 py-2 px-3 rounded-2 gridandlist">
                <h5 class="mb-0">AC Products</h5>
                <div class="list-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                        <path fill="none" stroke="#000" stroke-linecap="round" stroke-width="2"
                            d="M9 8h10M9 12h10M9 16h10M4.99 8H5m-.02 4h.01m0 4H5" />
                    </svg>
                </div>
                <div class="grid-icon d-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1.7em" height="1.7em" viewBox="0 0 56 56">
                        <path fill="#000"
                            d="M43.265 27.696h8.975c2.5 0 3.76-1.26 3.76-3.859V15.04c0-2.598-1.26-3.838-3.76-3.838h-8.975c-2.5 0-3.76 1.24-3.76 3.838v8.798c0 2.599 1.26 3.858 3.76 3.858m-39.505 0h8.975c2.5 0 3.76-1.26 3.76-3.859V15.04c0-2.598-1.26-3.838-3.76-3.838H3.76C1.26 11.2 0 12.44 0 15.039v8.798c0 2.599 1.26 3.858 3.76 3.858m19.762 0h8.956c2.52 0 3.76-1.26 3.76-3.859V15.04c0-2.598-1.24-3.838-3.76-3.838h-8.956c-2.5 0-3.76 1.24-3.76 3.838v8.798c0 2.599 1.26 3.858 3.76 3.858M3.799 24.92c-.689 0-1.024-.354-1.024-1.083V15.04c0-.709.335-1.063 1.024-1.063h8.877c.69 0 1.043.354 1.043 1.063v8.798c0 .729-.354 1.083-1.043 1.083Zm19.762 0c-.689 0-1.023-.354-1.023-1.083V15.04c0-.709.334-1.063 1.023-1.063h8.897q1.004 0 1.004 1.063v8.798c0 .729-.334 1.083-1.004 1.083Zm19.743 0c-.689 0-1.023-.354-1.023-1.083V15.04c0-.709.334-1.063 1.023-1.063h8.878c.708 0 1.042.354 1.042 1.063v8.798c0 .729-.334 1.083-1.042 1.083ZM3.76 47.438h8.975c2.5 0 3.76-1.24 3.76-3.838v-8.818c0-2.579-1.26-3.839-3.76-3.839H3.76c-2.5 0-3.76 1.26-3.76 3.839V43.6c0 2.598 1.26 3.838 3.76 3.838m19.762 0h8.956c2.52 0 3.76-1.24 3.76-3.838v-8.818c0-2.579-1.24-3.839-3.76-3.839h-8.956c-2.5 0-3.76 1.26-3.76 3.839V43.6c0 2.598 1.26 3.838 3.76 3.838m19.743 0h8.975c2.5 0 3.76-1.24 3.76-3.838v-8.818c0-2.579-1.26-3.839-3.76-3.839h-8.975c-2.5 0-3.76 1.26-3.76 3.839V43.6c0 2.598 1.26 3.838 3.76 3.838M3.799 44.663c-.689 0-1.024-.354-1.024-1.063v-8.8c0-.728.335-1.082 1.024-1.082h8.877c.69 0 1.043.354 1.043 1.082v8.8c0 .709-.354 1.063-1.043 1.063Zm19.762 0c-.689 0-1.023-.354-1.023-1.063v-8.8c0-.728.334-1.082 1.023-1.082h8.897c.67 0 1.004.354 1.004 1.082v8.8q0 1.063-1.004 1.063Zm19.743 0c-.689 0-1.023-.354-1.023-1.063v-8.8c0-.728.334-1.082 1.023-1.082h8.878c.708 0 1.042.354 1.042 1.082v8.8c0 .709-.334 1.063-1.042 1.063Z" />
                    </svg>
                </div>
            </div>

            <div class="products grid-view-products mx-3" id="product_grid_element">

                {{-- will be dynamically injected by js here --}}
            </div>
            <div class="list-view-products mx-3 d-none" id="product_list_element">
                <div class="card list-view-card p-2 border-0 my-4">
                    <div class="verified-badge">AC</div>
                    <div class="row align-items-center">
                        <div class="col-md-3">
                            <!-- Property Image or Placeholder -->
                            <div class="text-center">
                                <img src="{{asset('assets_user/images/category-img.png')}}" alt="Property Image"
                                    class="img-fluid list-view-card-images" style="max-width: 100%;">
                            </div>
                        </div>
                        <div class="col-md-7 d-flex flex-column justify-content-center border-end">
                            <h6 class="property-price">Ramsond 15000 BTU PTAC AC HEAT PUMP WITH 5K BACKUP HEAT STRIP
                                COMBO</h6>
                            <div class="rating-list-view pb-2">
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
                            <!-- <p class="property-type">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod, culpa.</p> -->
                            <p class="card-text mb-0 line-clamp-4">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum modi, ipsam
                                molestias maiores magni dolores suscipit voluptatem laborum rerum voluptate, veritatis,
                                at quibusdam voluptates doloribus impedit molestiae blanditiis fuga sit veniam! Nostrum
                                quibusdam eveniet sit. lorem3
                            </p>

                        </div>
                        <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                            <div class="d-flex card-price">
                                <h5 class=" mb-0">$12.99</h5>
                                <p class="mb-0 text-danger ps-1"><small><del>$15.00</del></small></p>
                            </div>
                            <p class="fw-bold text-success">Free Shipping</p>
                            <button class="btn btn-view-details my-1">
                                <small>View Detail</small>
                            </button>
                            <button class="btn btn-add-to-cart my-1">
                                <small>Add to Cart</small>
                            </button>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade viewDetailModalContent" id="viewDetailModal" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewDetailModalLabel" aria-hidden="true">
    </div>

</div>


@endsection
@push('scripts')
<script src="{{ asset('assets_user/customjs/product_listing.js') }}"></script>
@endpush
