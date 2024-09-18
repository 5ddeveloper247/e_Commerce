@extends('layouts.website.website_master')

@push('css')

@endpush

@section('content')

<div class="container account py-5">
    <h3 class="main-headings position-relative text-start">
        Account Settings
        <div class="border-under-main-heading"></div>
    </h3>
    <div class="mt-5">
        <ul class="nav nav-tabs account-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link px-0 active" id="orders-tab" data-bs-toggle="tab"
                    data-bs-target="#orders-tab-pane" type="button" role="tab" aria-controls="orders-tab-pane"
                    aria-selected="true">
                    Order
                </button>
            </li>
            <li class="nav-item mx-md-3 mx-3" role="presentation">
                <button class="nav-link px-0" id="messages-tab" data-bs-toggle="tab" data-bs-target="#messages-tab-pane"
                    type="button" role="tab" aria-controls="messages-tab-pane" aria-selected="false">
                    Enquiry <small id="enquiryCount">()</small>
                </button>
            </li>
            <li class="nav-item mx-md-2 mx-2" role="presentation">
                <button class="nav-link px-0" id="address-tab" data-bs-toggle="tab" data-bs-target="#address-tab-pane"
                    type="button" role="tab" aria-controls="address-tab-pane" aria-selected="false">
                    Addresses
                </button>
            </li>
            <li class="nav-item mx-md-2 mx-2" role="presentation">
                <button class="nav-link px-0" id="wish-list-tab" data-bs-toggle="tab"
                    data-bs-target="#wish-list-tab-pane" type="button" role="tab" aria-controls="wish-list-tab-pane"
                    aria-selected="false">
                    Wish Lists <small id="wishListLength"></small>
                </button>
            </li>
            <li class="nav-item mx-md-2 mx-2" role="presentation">
                <button class="nav-link px-0" id="recently-viewed-tab" data-bs-toggle="tab"
                    data-bs-target="#recently-viewed-tab-pane" type="button" role="tab"
                    aria-controls="recently-viewed-tab-pane" aria-selected="false">
                    Recently Viewed
                </button>
            </li>
            <li class="nav-item mx-md-2 mx-2" role="presentation">
                <button class="nav-link px-0" id="account-settings-tab" data-bs-toggle="tab"
                    data-bs-target="#account-settings-tab-pane" type="button" role="tab"
                    aria-controls="account-settings-tab-pane" aria-selected="false">
                    Account Settings
                </button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade py-4 show active" id="orders-tab-pane" role="tabpanel"
                aria-labelledby="orders-tab" tabindex="0">
                <div class="row orders-div" id="orderDiv">

                </div>
                <div class="order-detail-div d-none">
                    <div class="back-to-orders-div" style="cursor:pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512">
                            <path fill="#000"
                                d="M48 256c0 114.87 93.13 208 208 208s208-93.13 208-208S370.87 48 256 48S48 141.13 48 256m212.65-91.36a16 16 0 0 1 .09 22.63L208.42 240H342a16 16 0 0 1 0 32H208.42l52.32 52.73A16 16 0 1 1 238 347.27l-79.39-80a16 16 0 0 1 0-22.54l79.39-80a16 16 0 0 1 22.65-.09">
                            </path>
                        </svg>
                    </div>
                    <div class="md-stepper-horizontal orange">

                        <div class="row" id="statusContainer">

                        </div>
                    </div>

                    <div id="refund-btn-container">

                    </div>
                    <div class="your-cart container">
                        <div class="table-responsive add-to-cart">
                            <table class="w-100">
                                <thead class="py-3">
                                    <tr>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="product-detail-table-body">
                                    {{-- dynamically injected here --}}
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex text-start gap-5 justify-content-end py-4">
                            <small class="fw-bold">
                                Total amount:
                            </small>

                            <small>
                                $
                                <span id="subTotal">

                                </span>
                            </small>
                        </div>
                    </div>
                </div>
                <p class="mb-0 d-flex align-items-center bg-secondary p-3 text-white rounded-2">
                    <svg class="me-2 d-md-block d-none" xmlns="http://www.w3.org/2000/svg" width="1.05em"
                        height="1.05em" viewBox="0 0 20 20">
                        <path fill="#fff"
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93A10 10 0 0 1 2.93 17.07M9 5v6h2V5zm0 8v2h2v-2z" />
                    </svg>
                    Once you place an order you'll have full access to send messages from this page.
                </p>
            </div>


            <div class="tab-pane fade py-4" id="messages-tab-pane" role="tabpanel" aria-labelledby="messages-tab"
                tabindex="0">
                <div class="row main-messages">
                    <div class="col-md-3 col-sm-4">
                        <div class="mail-categories">
                            <div class="mail-menu m-0 p-0">
                                <!-- Status toggle -->
                                <div class="mail-menu-item mail-categories" data-bs-toggle="collapse"
                                     href="#enquiriesStatus" role="button" aria-expanded="false"
                                     aria-controls="enquiriesStatus">
                                    <span class="mail-text">Status</span>
                                    <span class="mail-icon">▾</span>
                                </div>
                                <!-- Status options -->
                                <div class="collapse show" id="enquiriesStatus">
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input enquiryActiveList" type="radio"
                                                   name="flexRadioDefault" id="flexRadioDefault1">
                                        </div>
                                        <span class="mail-text">Active</span>
                                    </div>
                                    <div class="mail-menu-item mail-sub-categories">
                                        <div class="form-check">
                                            <input class="form-check-input enquiryInActiveList" type="radio"
                                                   name="flexRadioDefault" id="flexRadioDefault2">
                                        </div>
                                        <span class="mail-text">InActive</span>
                                    </div>
                                </div>

                                <!-- New Enquiry Button -->
                                <div class="d-flex align-items-center justify-content-center mt-3">
                                    <div class="w-100 text-center border rounded-2 p-3" style="cursor: pointer;"
                                         data-bs-toggle="modal" data-bs-target="#enquiryAddModal">
                                        <div class="h1">+</div>
                                        <div>New Enquiry</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-9 col-sm-8 ">
                        <div
                            class="px-4 px-lg-6 bg-white border-top border-bottom border-translucent position-relative top-1">
                            <div class="list-group mt-3 inquiry-list-container">

                                {{-- will be injected here dynamically by js --}}
                            </div>
                        </div>
                    </div>
                </div>


                {{-- inquiry detail --}}
                <div class="row ticket-detail d-none" id="inquiry-detail-view">
                    {{-- <div class="d-flex align-items-center mb-4">
                        <div class="back-to-ticket-list" style="cursor:pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512">
                                <path fill="#000"
                                    d="M48 256c0 114.87 93.13 208 208 208s208-93.13 208-208S370.87 48 256 48S48 141.13 48 256m212.65-91.36a16 16 0 0 1 .09 22.63L208.42 240H342a16 16 0 0 1 0 32H208.42l52.32 52.73A16 16 0 1 1 238 347.27l-79.39-80a16 16 0 0 1 0-22.54l79.39-80a16 16 0 0 1 22.65-.09" />
                            </svg>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                    </div>
                    <div class="col-md-9 col-sm-8 ">
                        <div class="d-flex align-items-start justify-content-between profile-area mt-2">
                            <div class="d-flex mail-profile-detail">
                                <img src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/60.webp" alt="">
                                <div class="ms-2">
                                    <h6>Ingredia Nutrisha</h6>
                                    <p><small>20 May 2020</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="mail-structure">
                            <div class="d-flex align-items-center justify-content-between">
                                <p>
                                    <b>A collection of textile samples lay spread</b>
                                </p>
                                <p class="mx-2">07:23 AM</p>
                            </div>
                            <br>
                            <p>
                                <b>Ingredia Nutrisha,</b> A collection of textile samples lay spread out on the table -
                                Samsa was a travelling salesman - and above it there hung a picture
                            </p>
                            <p class="pt-2">
                                Even the all-powerful Pointing has no control about the blind texts it is an almost
                                unorthographic life One day however a small line of blind text by the name of Lorem
                                Ipsum decided to leave for the far World of Grammar. Aenean vulputate eleifend tellus.
                                Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                                dapibus in, viverra quis, feugiat a, tellus.
                            </p>
                            <p class="pt-2">
                                Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae,
                                eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus.
                                Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam
                                ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam
                                rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit
                                amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar,
                                <br><br>
                                <b>Kind Regards</b>
                            </p>
                            <p class="pt-2">Mr Smith</p>
                            <hr>
                        </div>
                        <hr>
                        <h5 class="my-4">Reply</h5>
                        <div class="form_blk">
                            <textarea name="" id="" class="text_box p-3 rounded"
                                placeholder="eg: Details about your dealership brand &amp; service"></textarea>
                        </div>

                        <div class="attachments mt-3">
                            <div class="d-flex align-items-center mb-2">
                                <h5 class="mb-0">Attachments (3)</h5>
                                <svg style="cursor:pointer" class="advance-plus-icon ms-3"
                                    xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M188 184a16 16 0 1 1 16-16a16 16 0 0 1-16 16m36-68h-44a12 12 0 0 0 0 24h40v56H36v-56h40a12 12 0 0 0 0-24H32a20 20 0 0 0-20 20v64a20 20 0 0 0 20 20h192a20 20 0 0 0 20-20v-64a20 20 0 0 0-20-20M88.49 80.49L116 53v75a12 12 0 0 0 24 0V53l27.51 27.52a12 12 0 1 0 17-17l-48-48a12 12 0 0 0-17 0l-48 48a12 12 0 1 0 17 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div class="d-flex">
                                <p class="px-2 mb-0">My-Photo.png</p>
                                <p class="px-2 mb-0">My-Document.docx</p>
                            </div>
                            <hr>
                            <div class="col-xs-12 p-0 mb-5">
                                <div class="uploader_blk uploader-blk-support text_box">
                                    <div class="icon mb-3">
                                        <img src="{{asset('assets_user/images/upload.svg')}}" alt="">
                                    </div>
                                    <h6>Drag &amp; Drop</h6>
                                    <div class="or">OR</div>
                                    <div class="btn_blk text-center">
                                        <button type="button" class="btn theme-btn">Browse Files</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-success my-4 px-md-5">Send</a>
                        </div>
                    </div> --}}
                </div>
                <p class="mb-0 d-flex align-items-center bg-secondary p-3 mt-5 text-white rounded-2">
                    <svg class="me-2 d-md-block d-none" xmlns="http://www.w3.org/2000/svg" width="1.05em"
                        height="1.05em" viewBox="0 0 20 20">
                        <path fill="#fff"
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93A10 10 0 0 1 2.93 17.07M9 5v6h2V5zm0 8v2h2v-2z" />
                    </svg>
                    You haven't placed any orders with us. When you do, their status will appear on this page.
                </p>



                {{-- add enquiry modal --}}
                <div class="modal fade" id="enquiryAddModal" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="enquiryAddModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Submit Enquiry</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="enquiryAddModalForm">
                                <!-- Full Name -->
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="enquiry_title" name="enquiry_title"
                                        placeholder="Enter Enquiry Title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="fullName" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="enquiry_fullName" name="enquiry_fullName"
                                        placeholder="Enter full name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="enquiry_email" name="enquiry_email"
                                        placeholder="Enter full name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Phone Number</label>
                                    <input type="number" class="form-control" id="enquiry_phoneNumber"
                                        name="enquiry_phoneNumber" placeholder="Enter phone number" required>
                                </div>


                                <!-- Address Line 1 -->
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea type="text" class="form-control" id="enquiry_description" name="enquiry_description"
                                        placeholder="Enter Description" required></textarea>
                                </div>
                            </form>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="addEnquiryBtn">Add</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="tab-pane fade py-4" id="address-tab-pane" role="tabpanel" aria-labelledby="address-tab"
                tabindex="0">
                <div class="row justify-content-md-start justify-content-center" id="address_container">
                    <!-- Address List Section -->
                    {{-- will be injected here dynamically --}}

                    <!-- New Address Button Section -->
                    <div type="button" data-bs-toggle="modal" data-bs-target="#addressAddModal"
                        class="col-md-3 col-11 d-flex align-items-center justify-content-center border rounded-2 m-3">
                        <div class="p-5 text-center" id="newAddress">
                            <div class="h1">+</div>
                            <div>New Address</div>
                        </div>
                    </div>

                    {{-- add addres --}}
                    <!-- Modal -->
                    <div class="modal fade" id="addressAddModal" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="addressAddModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Address</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="customerAddressForm">
                                        <!-- Full Name -->
                                        <input type="hidden" name="" id="edit_id" name="edit_id">
                                        <div class="mb-3">
                                            <label for="fullName" class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="fullName" name="fullName"
                                                placeholder="Enter full name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email"
                                                placeholder="Enter full name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phoneNumber" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" id="phoneNumber"
                                                name="phoneNumber" placeholder="Enter phone number" required>
                                        </div>


                                        <!-- Address Line 1 -->
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea type="text" class="form-control" id="address" name="address"
                                                placeholder="Enter street address" required></textarea>
                                        </div>

                                        <!-- Country Dropdown -->
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <select class="form-select" id="country" name="country" required>
                                                <option value="" selected>Select country</option>

                                                <!-- Add more countries or populate dynamically -->
                                            </select>
                                        </div>

                                        <!-- State/Province/Region Dropdown -->
                                        <div class="mb-3">
                                            <label for="state" class="form-label">State/Province/Region</label>
                                            <select class="form-select" id="state" name="state" required>
                                                <option value="" selected>Select state</option>

                                            </select>
                                        </div>

                                        <!-- City Dropdown -->
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <select class="form-select" id="city" name="city" required>
                                                <option value="" selected>Select city</option>

                                            </select>
                                        </div>

                                        <!-- Postal Code -->
                                        <div class="mb-3">
                                            <label for="postalCode" class="form-label">Postal Code</label>
                                            <input type="text" class="form-control" id="postalCode" name="postalCode"
                                                placeholder="Enter postal code" required>
                                        </div>
                                    </form>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="addAddressBtn">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade py-4" id="wish-list-tab-pane" role="tabpanel" aria-labelledby="wish-list-tab"
                tabindex="0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-nowrap" scope="col">Product ID</th>
                                <th class="text-nowrap" scope="col">Product Name</th>
                                <th class="text-nowrap" scope="col">Category</th>
                                <th class="text-nowrap" scope="col">Price</th>
                                <th class="text-nowrap" scope="col">Added Date</th>
                                <th class="text-nowrap" scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="wishlist_table_body">
                            <!-- Example row -->
                            {{-- <tr>
                                <td class="text-nowrap">101</td>
                                <td class="text-nowrap">Wireless Headphones</td>
                                <td class="text-nowrap">Electronics</td>
                                <td class="text-nowrap">$99</td>
                                <td class="text-nowrap">2024-08-13</td>
                                <td class="text-nowrap">
                                    <button class="btn btn-primary btn-sm">Add to Cart</button>
                                    <button class="btn btn-danger btn-sm">Remove</button>
                                </td>
                            </tr> --}}
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
                <h3 class="text-center">Wish List</h3>
                <div class="row mt-3" id="wishListContainer">

                    {{-- <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
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
                    </div> --}}

                </div>
                <p class="mb-0 d-flex align-items-center bg-secondary p-3 text-white rounded-2 mt-5">
                    <svg class="me-2 d-md-block d-none" xmlns="http://www.w3.org/2000/svg" width="1.05em"
                        height="1.05em" viewBox="0 0 20 20">
                        <path fill="#fff"
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93A10 10 0 0 1 2.93 17.07M9 5v6h2V5zm0 8v2h2v-2z" />
                    </svg>
                    You haven't placed any orders with us. When you do, their status will appear on this page.
                </p>
            </div>
            <div class="tab-pane fade py-4" id="recently-viewed-tab-pane" role="tabpanel"
                aria-labelledby="recently-viewed-tab" tabindex="0">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
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
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
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
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
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

                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
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
                    <div class="col-lg-3 col-md-4 col-sm-6 my-2">
                        <div class="card featured-card border-0">
                            <p class="sale-badge text-black">Sale</p>
                            <div class="actions">
                                <button class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 256 256">
                                        <path fill="#000"
                                            d="M178 42c-21 0-39.26 9.47-50 25.34C117.26 51.47 99 42 78 42a60.07 60.07 0 0 0-60 60c0 29.2 18.2 59.59 54.1 90.31a334.7 334.7 0 0 0 53.06 37a6 6 0 0 0 5.68 0a334.7 334.7 0 0 0 53.06-37C219.8 161.59 238 131.2 238 102a60.07 60.07 0 0 0-60-60m-50 175.11c-16.41-9.47-98-59.39-98-115.11a48.05 48.05 0 0 1 48-48c20.28 0 37.31 10.83 44.45 28.27a6 6 0 0 0 11.1 0C140.69 64.83 157.72 54 178 54a48.05 48.05 0 0 1 48 48c0 55.72-81.59 105.64-98 115.11">
                                        </path>
                                    </svg>
                                </button>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 24 24">
                                        <path fill="#000"
                                            d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="d-flex justify-content-center my-4">
                                <div class="featured-card-imagess">
                                    <a href="product_detail">
                                        <img src="http://127.0.0.1:8000/assets/images/category-img.png"
                                            alt="Card image">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="rating border-bottom pb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linejoin="round"
                                            stroke-width="32"
                                            d="M480 208H308L256 48l-52 160H32l140 96l-54 160l138-100l138 100l-54-160Z">
                                        </path>
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
            </div>
            <div class="tab-pane fade py-4" id="account-settings-tab-pane" role="tabpanel"
                aria-labelledby="account-settings-tab" tabindex="0">


                {{-- ____________settings_form___________ --}}

                <form id="userSettingsForm" name="userSettingsForm">
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="firstName" name="firstName"
                                    placeholder="First Name" required value=" {{$user->first_name }}">
                                <label for="firstName">First Name <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="lastName" name="lastName"
                                    placeholder="Last Name" required
                                    value="{{ old('lastName', $user->last_name ?? '') }}">
                                <label for="lastName">Last Name <span class="text-danger">*</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="company" name="company"
                                    placeholder="Company" value="{{ old('company', $user->company_name ?? '') }}">
                                <label for="company">Company</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                    placeholder="Phone Number" value="{{ old('phoneNumber', $user->phone ?? '') }}">
                                <label for="phoneNumber">Phone Number</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control" id="emailAddress" name="emailAddress"
                                    placeholder="Email Address" required
                                    value="{{ old('emailAddress', $user->email ?? '') }}">
                                <label for="emailAddress">Email Address <span class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                    placeholder="Confirm Password">
                                <label for="confirmPassword">Confirm Password</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                    placeholder="Current Password">
                                <label for="currentPassword">Current Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-5">
                        <button type="button" class="btn btn-add-to-cart py-2" id="updateDetailBtn">Update
                            Details</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>




@endsection
@push('scripts')
<script src="{{asset('assets_user/customjs/account.js') }}"></script>
<script src="{{asset('assets_user/customjs/enquiry.js') }}"></script>
@endpush
