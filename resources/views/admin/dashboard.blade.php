@extends('layouts.admin.admin_master')

@push('css')

@endpush

@section('content')

    <div>
        <div class="container py-5">
            <h2 class="fw-bold">Projects Dashboard</h2>
            <p>
                Here’s what’s going on at your business right now
            </p>

            <div class="row justify-content-center gx-0 gy-4 gap-4">
                <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 32 32">
                        <path fill="#004DFF"
                            d="M30 18H20v6.468a5.02 5.02 0 0 0 2.861 4.52L25 30l2.139-1.013A5.02 5.02 0 0 0 30 24.467zm-5 9.786l-1.283-.607A3.01 3.01 0 0 1 22 24.468V20h6v4.468a3.01 3.01 0 0 1-1.717 2.71zM17 18H5a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h12v-2H5v-5h12zM27 4h-5a2 2 0 0 0-2 2v9h2V6h5v9h2V6a2 2 0 0 0-2-2M15 4H5a2 2 0 0 0-2 2v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2M5 13V6h10v7z" />
                    </svg>
                    <div>
                        <h3 class="mb-0">
                            <span class="fw-bold fs-2">32</span><small class="fw-normal"> Projects</small>
                        </h3>
                        <small>Awating processing</small>
                    </div>
                </div>


                <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 1024 1024">
                        <path fill="#23890B"
                            d="M824.2 699.9a301.6 301.6 0 0 0-86.4-60.4C783.1 602.8 812 546.8 812 484c0-110.8-92.4-201.7-203.2-200c-109.1 1.7-197 90.6-197 200c0 62.8 29 118.8 74.2 155.5a301 301 0 0 0-86.4 60.4C345 754.6 314 826.8 312 903.8a8 8 0 0 0 8 8.2h56c4.3 0 7.9-3.4 8-7.7c1.9-58 25.4-112.3 66.7-153.5A226.62 226.62 0 0 1 612 684c60.9 0 118.2 23.7 161.3 66.8C814.5 792 838 846.3 840 904.3c.1 4.3 3.7 7.7 8 7.7h56a8 8 0 0 0 8-8.2c-2-77-33-149.2-87.8-203.9M612 612c-34.2 0-66.4-13.3-90.5-37.5a126.86 126.86 0 0 1-37.5-91.8c.3-32.8 13.4-64.5 36.3-88c24-24.6 56.1-38.3 90.4-38.7c33.9-.3 66.8 12.9 91 36.6c24.8 24.3 38.4 56.8 38.4 91.4c0 34.2-13.3 66.3-37.5 90.5A127.3 127.3 0 0 1 612 612M361.5 510.4c-.9-8.7-1.4-17.5-1.4-26.4c0-15.9 1.5-31.4 4.3-46.5c.7-3.6-1.2-7.3-4.5-8.8c-13.6-6.1-26.1-14.5-36.9-25.1a127.54 127.54 0 0 1-38.7-95.4c.9-32.1 13.8-62.6 36.3-85.6c24.7-25.3 57.9-39.1 93.2-38.7c31.9.3 62.7 12.6 86 34.4c7.9 7.4 14.7 15.6 20.4 24.4c2 3.1 5.9 4.4 9.3 3.2c17.6-6.1 36.2-10.4 55.3-12.4c5.6-.6 8.8-6.6 6.3-11.6c-32.5-64.3-98.9-108.7-175.7-109.9c-110.9-1.7-203.3 89.2-203.3 199.9c0 62.8 28.9 118.8 74.2 155.5c-31.8 14.7-61.1 35-86.5 60.4c-54.8 54.7-85.8 126.9-87.8 204a8 8 0 0 0 8 8.2h56.1c4.3 0 7.9-3.4 8-7.7c1.9-58 25.4-112.3 66.7-153.5c29.4-29.4 65.4-49.8 104.7-59.7c3.9-1 6.5-4.7 6-8.7" />
                    </svg>
                    <div>
                        <h3 class="mb-0">
                            <span class="fw-bold fs-2">94</span><small class="fw-normal"> Members</small>
                        </h3>
                        <small>Working hard</small>
                    </div>
                </div>


                <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                        <path fill="#D6630A"
                            d="M13.5 9.75a.75.75 0 0 0-.75-.75h-6a.75.75 0 0 0 0 1.5h6a.75.75 0 0 0 .75-.75m-1 3a.75.75 0 0 0-.75-.75h-5a.75.75 0 1 0 0 1.5h5a.75.75 0 0 0 .75-.75m.25 2.25a.75.75 0 1 1 0 1.5h-6a.75.75 0 0 1 0-1.5z" />
                        <path fill="#D6630A" fill-rule="evenodd"
                            d="M6 21.75h13A2.75 2.75 0 0 0 21.75 19v-5.5a.75.75 0 0 0-.75-.75h-3.25V4.943c0-1.423-1.609-2.251-2.767-1.424l-.175.125a2.26 2.26 0 0 1-2.622-.004a3.77 3.77 0 0 0-4.372 0a2.26 2.26 0 0 1-2.622.004l-.175-.125c-1.158-.827-2.767 0-2.767 1.424V18A3.75 3.75 0 0 0 6 21.75M8.686 4.86a2.27 2.27 0 0 1 2.628 0a3.76 3.76 0 0 0 4.366.005l.175-.125a.25.25 0 0 1 .395.203V19c0 .45.108.875.3 1.25H6A2.25 2.25 0 0 1 3.75 18V4.943a.25.25 0 0 1 .395-.203l.175.125a3.76 3.76 0 0 0 4.366-.005M17.75 19v-4.75h2.5V19a1.25 1.25 0 0 1-2.5 0"
                            clip-rule="evenodd" />
                    </svg>
                    <div>
                        <h3 class="mb-0">
                            <span class="fw-bold fs-2">23</span><small class="fw-normal"> Invoices</small>
                        </h3>
                        <small>Soon to be cleared</small>
                    </div>
                </div>


                <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                        <path fill="#CC1B00"
                            d="M5.676 4.257c3.928-3.219 9.733-2.995 13.4.672c3.905 3.905 3.905 10.237 0 14.142s-10.237 3.905-14.142 0a9.99 9.99 0 0 1-2.678-9.304l.077-.313l1.934.51a8 8 0 1 0 3.053-4.45l-.22.166l1.017 1.017l-4.596 1.06l1.06-4.596zM13.005 6v2h2.5v2h-5.5a.5.5 0 0 0-.09.992l.09.008h4a2.5 2.5 0 0 1 0 5h-1v2h-2v-2h-2.5v-2h5.5a.5.5 0 0 0 .09-.992l-.09-.008h-4a2.5 2.5 0 1 1 0-5h1V6z" />
                    </svg>
                    <div>
                        <h3 class="mb-0">
                            <span class="fw-bold fs-2">3</span><small class="fw-normal"> Refunds</small>
                        </h3>
                        <small>Fresh start</small>
                    </div>
                </div>
            </div>

            <ul class="nav nav-links my-3 mb-lg-2 mx-n3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><span>All </span><span
                            class="text-body-tertiary fw-semibold">(68817)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span>Published </span><span
                            class="text-body-tertiary fw-semibold">(70348)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span>Drafts </span><span
                            class="text-body-tertiary fw-semibold">(17)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><span>On discount </span><span
                            class="text-body-tertiary fw-semibold">(810)</span></a>
                </li>
            </ul>

            <div class="d-flex flex-wrap justify-content-md-between justify-content-center gap-3 my-4">
                <div class="search-box">
                    <form class="position-relative"><input class="form-control search-input search" type="search" placeholder="Search products" aria-label="Search">
                        <svg width="1.4em" height="1.4em" class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                            <path fill="currentColor" d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"></path>
                        </svg>
                    </form>
                </div>
                <div class="scrollbar overflow-hidden-y">
                    <div class="btn-group position-static" role="group">
                        <div class="btn-group position-static text-nowrap">
                            <button class="btn btn-outline-secondary px-md-5 px-2 py-2 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"> Category<svg height="1.4em" width="1.4em" class="svg-inline--fa fa-angle-down ms-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path>
                                </svg>
                            </button>
                            <ul class="dropdown-menu" style="">
                                <li>
                                    <a class="dropdown-item" href="#">Action</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                        <div class="btn-group position-static text-nowrap">
                            <button class="btn btn-sm btn-outline-secondary px-md-5 px-2 py-2 flex-shrink-0" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"> Vendor<svg class="svg-inline--fa fa-angle-down ms-2" width="1.4em" height="1.4em" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z"></path>
                                </svg>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">Action</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Another action</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                        <button class="btn btn-sm btn-outline-secondary px-md-5 px-2 py-2 flex-shrink-0">More filters</button>
                    </div>
                </div>
            </div>

            <div id="products">
                <div class="px-4 px-lg-6 bg-white border-top border-bottom border-translucent position-relative top-1">
                    <div class="table-responsive scrollbar px-1">
                        <table class="table fs-9 mb-0">
                            <thead>
                                <tr>
                                    <th class="white-space-nowrap fs-9 align-middle ps-0"
                                        style="max-width:20px; width:18px;">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                id="checkbox-bulk-products-select" type="checkbox"
                                                data-bulk-select="{&quot;body&quot;:&quot;products-table-body&quot;}">
                                        </div>
                                    </th>
                                    <th class="sort white-space-nowrap align-middle fs-10" scope="col"
                                        style="width:70px;"></th>
                                    <th class="sort white-space-nowrap align-middle ps-4 text-nowrap" scope="col"
                                        style="width:350px;" data-sort="product">PRODUCT NAME</th>
                                    <th class="sort align-middle text-end ps-4 text-nowrap" scope="col"
                                        data-sort="price" style="width:150px;">PRICE</th>
                                    <th class="sort align-middle ps-4 text-nowrap" scope="col" data-sort="category"
                                        style="width:150px;">CATEGORY</th>
                                    <th class="sort align-middle ps-3" scope="col" data-sort="tags"
                                        style="width:250px;">TAGS</th>
                                    <th class="sort align-middle fs-8 text-center ps-4 text-nowrap" scope="col"
                                        style="width:125px;"></th>
                                    <th class="sort align-middle ps-4 text-nowrap" scope="col" data-sort="vendor"
                                        style="width:200px;">VENDOR</th>
                                    <th class="sort align-middle ps-4 text-nowrap" scope="col" data-sort="time"
                                        style="width:50px;">PUBLISHED ON</th>
                                    <th class="sort text-end align-middle pe-0 ps-4 text-nowrap" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="list" id="products-table-body">
                                <tr class="position-static">
                                    <td class="fs-9 align-middle">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                type="checkbox"
                                                data-bulk-select-row="{&quot;product&quot;:&quot;Fitbit Sense Advanced Smartwatch with Tools for Heart Health, Stress Management &amp; Skin Temperature Trends, Carbon/Graphite, One Size (S &amp; L Bands...&quot;,&quot;productImage&quot;:&quot;/products/1.png&quot;,&quot;price&quot;:&quot;$39&quot;,&quot;category&quot;:&quot;Plants&quot;,&quot;tags&quot;:[&quot;Health&quot;,&quot;Exercise&quot;,&quot;Discipline&quot;,&quot;Lifestyle&quot;,&quot;Fitness&quot;],&quot;star&quot;:false,&quot;vendor&quot;:&quot;Blue Olive Plant sellers. Inc&quot;,&quot;publishedOn&quot;:&quot;Nov 12, 10:45 PM&quot;}">
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap py-0">

                                        <a class="d-block border border-translucent rounded-2"
                                            href="../../../apps/e-commerce/landing/product-details.html">
                                            <img src="https://prium.github.io/phoenix/v1.18.0/assets/img//products/1.png"
                                                alt="" width="53"></a>
                                    </td>
                                    <td class="product align-middle ps-4">

                                        <a class="fw-semibold line-clamp-3 mb-0"
                                            href="../../../apps/e-commerce/landing/product-details.html">Fitbit Sense
                                            Advanced Smartwatch with Tools for Heart Health, Stress Management &amp;
                                            Skin Temperature Trends, Carbon/Graphite, One Size (S &amp; ...</a>
                                    </td>
                                    <td
                                        class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                        $39</td>
                                    <td
                                        class="category align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                        Plants</td>
                                    <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">

                                        <a class="text-decoration-none" href="#!">

                                            <span class="badge badge-tag me-2 mb-2">Health</span>
                                        </a>

                                        <a class="text-decoration-none" href="#!">

                                            <span class="badge badge-tag me-2 mb-2">Exercise</span>
                                        </a>

                                        <a class="text-decoration-none" href="#!">

                                            <span class="badge badge-tag me-2 mb-2">Discipline</span>
                                        </a>

                                        <a class="text-decoration-none" href="#!">

                                            <span class="badge badge-tag me-2 mb-2">Lifestyle</span>
                                        </a>

                                        <a class="text-decoration-none" href="#!">

                                            <span class="badge badge-tag me-2 mb-2">Fitness</span>
                                        </a>
                                    </td>
                                    <td class="align-middle review fs-8 text-center ps-4">
                                        <div class="d-toggle-container">
                                            <div class="d-block-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                    </path>
                                                </svg>
                                            </div>
                                            <div class="d-none-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="far"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="vendor align-middle text-start fw-semibold ps-4"><a href="#!">Blue Olive
                                            Plant sellers. Inc</a></td>
                                    <td
                                        class="time align-middle white-space-nowrap text-body-tertiary text-opacity-85 ps-4">
                                        Nov 12, 10:45 PM</td>
                                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                        <div class="btn-reveal-trigger position-static">
                                            <button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs-10"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">

                                                <a class="dropdown-item" href="#!">View</a>

                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider"></div>

                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="position-static">
                                    <td class="fs-9 align-middle">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                type="checkbox"
                                                data-bulk-select-row="{&quot;product&quot;:&quot;iPhone 13 pro max-Pacific Blue-128GB storage&quot;,&quot;productImage&quot;:&quot;/products/2.png&quot;,&quot;price&quot;:&quot;$87&quot;,&quot;category&quot;:&quot;Furniture&quot;,&quot;tags&quot;:[&quot;Class&quot;,&quot;Camera&quot;,&quot;Discipline&quot;,&quot;invincible&quot;,&quot;Pro&quot;,&quot;Swag&quot;],&quot;star&quot;:true,&quot;vendor&quot;:&quot;Beatrice Furnitures&quot;,&quot;publishedOn&quot;:&quot;Nov 11, 7:36 PM&quot;}">
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap py-0">
                                        <a class="d-block border border-translucent rounded-2"
                                            href="../../../apps/e-commerce/landing/product-details.html">
                                            <img src="https://prium.github.io/phoenix/v1.18.0/assets/img//products/2.png"
                                                alt="" width="53"></a>
                                    </td>
                                    <td class="product align-middle ps-4">
                                        <a class="fw-semibold line-clamp-3 mb-0"
                                            href="../../../apps/e-commerce/landing/product-details.html">iPhone 13 pro
                                            max-Pacific Blue-128GB storage</a>
                                    </td>
                                    <td
                                        class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                        $87</td>
                                    <td
                                        class="category align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                        Furniture</td>
                                    <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Class</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Camera</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Discipline</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">invincible</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Pro</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Swag</span></a>
                                    </td>
                                    <td class="align-middle review fs-8 text-center ps-4"><svg
                                            class="svg-inline--fa fa-star text-warning" aria-hidden="true"
                                            focusable="false" data-prefix="fas" data-icon="star" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                            </path>
                                        </svg><!-- <span class="fas fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                    </td>
                                    <td class="vendor align-middle text-start fw-semibold ps-4"><a href="#!">Beatrice
                                            Furnitures</a></td>
                                    <td
                                        class="time align-middle white-space-nowrap text-body-tertiary text-opacity-85 ps-4">
                                        Nov 11, 7:36 PM</td>
                                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                        <div class="btn-reveal-trigger position-static"><button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs-10"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com --></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="position-static">
                                    <td class="fs-9 align-middle">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                type="checkbox"
                                                data-bulk-select-row="{&quot;product&quot;:&quot;Apple MacBook Pro 13 inch-M1-8/256GB-space&quot;,&quot;productImage&quot;:&quot;/products/3.png&quot;,&quot;price&quot;:&quot;$9&quot;,&quot;category&quot;:&quot;Plants&quot;,&quot;tags&quot;:[&quot;Efficiency&quot;,&quot;Handy&quot;,&quot;Apple&quot;,&quot;Creativity&quot;,&quot;Gray&quot;],&quot;star&quot;:false,&quot;vendor&quot;:&quot;PlantPlanet&quot;,&quot;publishedOn&quot;:&quot;Nov 11, 8:16 AM&quot;}">
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap py-0">
                                        <a class="d-block border border-translucent rounded-2"
                                            href="../../../apps/e-commerce/landing/product-details.html">
                                            <img src="https://prium.github.io/phoenix/v1.18.0/assets/img//products/3.png"
                                                alt="" width="53"></a>
                                    </td>
                                    <td class="product align-middle ps-4">
                                        <a class="fw-semibold line-clamp-3 mb-0"
                                            href="../../../apps/e-commerce/landing/product-details.html">Apple MacBook
                                            Pro 13 inch-M1-8/256GB-space</a>
                                    </td>
                                    <td
                                        class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                        $9</td>
                                    <td
                                        class="category align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                        Plants</td>
                                    <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Efficiency</span>
                                        </a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Handy</span>
                                        </a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Apple</span>
                                        </a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Creativity</span>
                                        </a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Gray</span>
                                        </a>
                                    </td>
                                    <td class="align-middle review fs-8 text-center ps-4">
                                        <div class="d-toggle-container">
                                            <div class="d-block-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                            <div class="d-none-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="far"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z">
                                                    </path>
                                                </svg><!-- <span class="far fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="vendor align-middle text-start fw-semibold ps-4"><a
                                            href="#!">PlantPlanet</a></td>
                                    <td
                                        class="time align-middle white-space-nowrap text-body-tertiary text-opacity-85 ps-4">
                                        Nov 11, 8:16 AM</td>
                                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                        <div class="btn-reveal-trigger position-static"><button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs-10"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com --></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="position-static">
                                    <td class="fs-9 align-middle">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                type="checkbox"
                                                data-bulk-select-row="{&quot;product&quot;:&quot;Apple iMac 24\&quot; 4K Retina Display M1 8 Core CPU...&quot;,&quot;productImage&quot;:&quot;/products/4.png&quot;,&quot;price&quot;:&quot;$8 - $58&quot;,&quot;category&quot;:&quot;Toys&quot;,&quot;tags&quot;:[&quot;Color&quot;,&quot;Stunning&quot;,&quot;Retina&quot;,&quot;Green&quot;,&quot;PC killer&quot;],&quot;star&quot;:false,&quot;vendor&quot;:&quot;Kizzstore&quot;,&quot;publishedOn&quot;:&quot;Nov 8, 6:39 PM&quot;}">
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap py-0">
                                        <a class="d-block border border-translucent rounded-2"
                                            href="../../../apps/e-commerce/landing/product-details.html">
                                            <img src="https://prium.github.io/phoenix/v1.18.0/assets/img//products/4.png"
                                                alt="" width="53"></a>
                                    </td>
                                    <td class="product align-middle ps-4">
                                        <a class="fw-semibold line-clamp-3 mb-0"
                                            href="../../../apps/e-commerce/landing/product-details.html">Apple iMac 24"
                                            4K Retina Display M1 8 Core CPU...</a>
                                    </td>
                                    <td
                                        class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                        $8 - $58</td>
                                    <td
                                        class="category align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                        Toys</td>
                                    <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Color</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Stunning</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Retina</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Green</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">PC killer</span></a>
                                    </td>
                                    <td class="align-middle review fs-8 text-center ps-4">
                                        <div class="d-toggle-container">
                                            <div class="d-block-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                            <div class="d-none-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="far"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z">
                                                    </path>
                                                </svg><!-- <span class="far fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="vendor align-middle text-start fw-semibold ps-4"><a
                                            href="#!">Kizzstore</a></td>
                                    <td
                                        class="time align-middle white-space-nowrap text-body-tertiary text-opacity-85 ps-4">
                                        Nov 8, 6:39 PM</td>
                                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                        <div class="btn-reveal-trigger position-static"><button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs-10"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com --></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="position-static">
                                    <td class="fs-9 align-middle">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                type="checkbox"
                                                data-bulk-select-row="{&quot;product&quot;:&quot;Razer Kraken v3 x Wired 7.1 Surroung Sound Gaming headset&quot;,&quot;productImage&quot;:&quot;/products/5.png&quot;,&quot;price&quot;:&quot;$120&quot;,&quot;category&quot;:&quot;Fashion&quot;,&quot;tags&quot;:[&quot;Music&quot;,&quot;Audio&quot;,&quot;Meeting&quot;,&quot;Record&quot;,&quot;Sound&quot;],&quot;star&quot;:false,&quot;vendor&quot;:&quot;Inertia Fashion&quot;,&quot;publishedOn&quot;:&quot;Nov 8, 5:32 PM&quot;}">
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap py-0">
                                        <a class="d-block border border-translucent rounded-2"
                                            href="../../../apps/e-commerce/landing/product-details.html">
                                            <img src="https://prium.github.io/phoenix/v1.18.0/assets/img//products/5.png"
                                                alt="" width="53"></a>
                                    </td>
                                    <td class="product align-middle ps-4">
                                        <a class="fw-semibold line-clamp-3 mb-0"
                                            href="../../../apps/e-commerce/landing/product-details.html">Razer Kraken v3
                                            x Wired 7.1 Surroung Sound Gaming headset</a>
                                    </td>
                                    <td
                                        class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                        $120</td>
                                    <td
                                        class="category align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                        Fashion</td>
                                    <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Music</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Audio</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Meeting</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Record</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Sound</span></a>
                                    </td>
                                    <td class="align-middle review fs-8 text-center ps-4">
                                        <div class="d-toggle-container">
                                            <div class="d-block-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                            <div class="d-none-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="far"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z">
                                                    </path>
                                                </svg><!-- <span class="far fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="vendor align-middle text-start fw-semibold ps-4"><a href="#!">Inertia
                                            Fashion</a></td>
                                    <td
                                        class="time align-middle white-space-nowrap text-body-tertiary text-opacity-85 ps-4">
                                        Nov 8, 5:32 PM</td>
                                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                        <div class="btn-reveal-trigger position-static"><button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs-10"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com --></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="position-static">
                                    <td class="fs-9 align-middle">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                type="checkbox"
                                                data-bulk-select-row="{&quot;product&quot;:&quot;PlayStation 5 DualSense Wireless Controller&quot;,&quot;productImage&quot;:&quot;/products/6.png&quot;,&quot;price&quot;:&quot;$239&quot;,&quot;category&quot;:&quot;Gadgets&quot;,&quot;tags&quot;:[&quot;Game&quot;,&quot;Control&quot;,&quot;Nav&quot;,&quot;Playstation&quot;,&quot;Wireless&quot;],&quot;star&quot;:false,&quot;vendor&quot;:&quot;FutureTech Inc&quot;,&quot;publishedOn&quot;:&quot;Nov 6, 11:34 PM&quot;}">
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap py-0">
                                        <a class="d-block border border-translucent rounded-2"
                                            href="../../../apps/e-commerce/landing/product-details.html">
                                            <img src="https://prium.github.io/phoenix/v1.18.0/assets/img//products/10.png"
                                                alt="" width="53"></a>
                                    </td>
                                    <td class="product align-middle ps-4">
                                        <a class="fw-semibold line-clamp-3 mb-0"
                                            href="../../../apps/e-commerce/landing/product-details.html">PlayStation 5
                                            DualSense Wireless Controller</a>
                                    </td>
                                    <td
                                        class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                        $239</td>
                                    <td
                                        class="category align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                        Gadgets</td>
                                    <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Game</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Control</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Nav</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Playstation</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Wireless</span></a>
                                    </td>
                                    <td class="align-middle review fs-8 text-center ps-4">
                                        <div class="d-toggle-container">
                                            <div class="d-block-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                            <div class="d-none-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="far"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z">
                                                    </path>
                                                </svg><!-- <span class="far fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="vendor align-middle text-start fw-semibold ps-4"><a href="#!">FutureTech
                                            Inc</a></td>
                                    <td
                                        class="time align-middle white-space-nowrap text-body-tertiary text-opacity-85 ps-4">
                                        Nov 6, 11:34 PM</td>
                                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                        <div class="btn-reveal-trigger position-static"><button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs-10"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com --></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="position-static">
                                    <td class="fs-9 align-middle">
                                        <div class="form-check mb-0 fs-8"><input class="form-check-input"
                                                type="checkbox"
                                                data-bulk-select-row="{&quot;product&quot;:&quot;2021 Apple 12.9-inch iPad Pro (Wi‑Fi, 128GB) - Space Gray&quot;,&quot;productImage&quot;:&quot;/products/7.png&quot;,&quot;price&quot;:&quot;$4&quot;,&quot;category&quot;:&quot;Food&quot;,&quot;tags&quot;:[&quot;Ipad&quot;,&quot;Pro&quot;,&quot;Creativity&quot;,&quot;Thunderbolt&quot;,&quot;Space&quot;],&quot;star&quot;:false,&quot;vendor&quot;:&quot;Maimuna’s Bakery&quot;,&quot;publishedOn&quot;:&quot;Nov 1, 7:45 AM&quot;}">
                                        </div>
                                    </td>
                                    <td class="align-middle white-space-nowrap py-0">
                                        <a class="d-block border border-translucent rounded-2"
                                            href="../../../apps/e-commerce/landing/product-details.html">
                                            <img src="https://prium.github.io/phoenix/v1.18.0/assets/img//products/12.png"
                                                alt="" width="53"></a>
                                    </td>
                                    <td class="product align-middle ps-4">
                                        <a class="fw-semibold line-clamp-3 mb-0"
                                            href="../../../apps/e-commerce/landing/product-details.html">2021 Apple
                                            12.9-inch iPad Pro (Wi‑Fi, 128GB) - Space Gray</a>
                                    </td>
                                    <td
                                        class="price align-middle white-space-nowrap text-end fw-bold text-body-tertiary ps-4">
                                        $4</td>
                                    <td
                                        class="category align-middle white-space-nowrap text-body-quaternary fs-9 ps-4 fw-semibold">
                                        Food</td>
                                    <td class="tags align-middle review pb-2 ps-3" style="min-width:225px;">
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Ipad</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Pro</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Creativity</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Thunderbolt</span></a>
                                        <a class="text-decoration-none" href="#!">
                                            <span class="badge badge-tag me-2 mb-2">Space</span></a>
                                    </td>
                                    <td class="align-middle review fs-8 text-center ps-4">
                                        <div class="d-toggle-container">
                                            <div class="d-block-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                            <div class="d-none-hover"><svg class="svg-inline--fa fa-star text-warning"
                                                    aria-hidden="true" focusable="false" data-prefix="far"
                                                    data-icon="star" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 576 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z">
                                                    </path>
                                                </svg><!-- <span class="far fa-star text-warning"></span> Font Awesome fontawesome.com -->
                                            </div>
                                        </div>
                                    </td>
                                    <td class="vendor align-middle text-start fw-semibold ps-4"><a href="#!">Maimuna’s
                                            Bakery</a></td>
                                    <td
                                        class="time align-middle white-space-nowrap text-body-tertiary text-opacity-85 ps-4">
                                        Nov 1, 7:45 AM</td>
                                    <td class="align-middle white-space-nowrap text-end pe-0 ps-4 btn-reveal-trigger">
                                        <div class="btn-reveal-trigger position-static"><button
                                                class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                aria-haspopup="true" aria-expanded="false"
                                                data-bs-reference="parent"><svg class="svg-inline--fa fa-ellipsis fs-10"
                                                    aria-hidden="true" focusable="false" data-prefix="fas"
                                                    data-icon="ellipsis" role="img" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor"
                                                        d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                    </path>
                                                </svg><!-- <span class="fas fa-ellipsis-h fs-10"></span> Font Awesome fontawesome.com --></button>
                                            <div class="dropdown-menu dropdown-menu-end py-2">
                                                <a class="dropdown-item" href="#!">View</a>
                                                <a class="dropdown-item" href="#!">Export</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item text-danger" href="#!">Remove</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                        <div class="col-auto d-flex">
                            <p class="mb-0 d-none d-sm-block me-3 fw-semibold text-body"
                                data-list-info="data-list-info">1 to 10 <span class="text-body-tertiary"> Items of
                                </span>16</p>
                            <a class="fw-semibold" href="#!" data-list-view="*">View all<svg
                                    class="svg-inline--fa fa-angle-right " width="1.4rem" height="1.4em" data-fa-transform="down-1"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""
                                    style="transform-origin: 0.3125em 0.5625em;">
                                    <g transform="translate(160 256)">
                                        <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                            <path fill="currentColor"
                                                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                                transform="translate(-160 -256)"></path>
                                        </g>
                                    </g>
                                </svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a>
                            <a class="fw-semibold d-none" href="#!" data-list-view="less">View Less<svg
                                    class="svg-inline--fa fa-angle-right ms-1" data-fa-transform="down-1"
                                    aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-right"
                                    role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""
                                    style="transform-origin: 0.3125em 0.5625em;">
                                    <g transform="translate(160 256)">
                                        <g transform="translate(0, 32)  scale(1, 1)  rotate(0 0 0)">
                                            <path fill="currentColor"
                                                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"
                                                transform="translate(-160 -256)"></path>
                                        </g>
                                    </g>
                                </svg><!-- <span class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span> Font Awesome fontawesome.com --></a>
                        </div>
                        <div class="col-auto d-flex table-bottom mb-2">
                            <button class="page-link disabled" data-list-pagination="prev" disabled=""><svg
                                    class="svg-inline--fa fa-chevron-left" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="chevron-left" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l192 192c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L77.3 256 246.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-192 192z">
                                    </path>
                                </svg>
                            </button>
                            <ul class="mb-0 pagination px-2">
                                <li class="active px-1">
                                    <button class="page" type="button" data-i="1" data-page="10">1</button>
                                </li>
                                <li class="px-1">
                                    <button class="page" type="button" data-i="2" data-page="10">2</button>
                                </li>
                            </ul>
                            <button class="page-link pe-0" data-list-pagination="next">
                                <svg class="svg-inline--fa fa-chevron-right" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="chevron-right" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection