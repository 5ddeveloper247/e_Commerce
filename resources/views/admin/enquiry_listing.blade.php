@extends('layouts.admin.admin_master')

@push('css')

@endpush

@section('content')

<div>
    <div>
        <div class="p-md-4 p-3">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">enquiry</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Enquiry Listing</li>
                </ol>
            </nav>
            {{-- //enquiry tab --}}
            <div class="row justify-content-center gx-0 gy-2 gap-4 mb-4">
                <div class="py-4" id="messages-tab-pane">
                    {{-- enquiry add form --}}
                    <form id="enquiryAddModalForm" class="d-none" style="width: 50%; margin: auto;">
                        <!-- Full Name -->
                        <div class="d-flex align-items-center mb-4">
                            <div class="back-to-enquiry" style="cursor:pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 512 512">
                                    <path fill="#000"
                                        d="M48 256c0 114.87 93.13 208 208 208s208-93.13 208-208S370.87 48 256 48S48 141.13 48 256m212.65-91.36a16 16 0 0 1 .09 22.63L208.42 240H342a16 16 0 0 1 0 32H208.42l52.32 52.73A16 16 0 1 1 238 347.27l-79.39-80a16 16 0 0 1 0-22.54l79.39-80a16 16 0 0 1 22.65-.09" />
                                </svg>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label required-asterisk">Title</label>
                            <input type="text" fieldType="alphanumeric" maxlength="50" class="  form-control"
                                id="enquiry_title" name="enquiry_title" placeholder="Enter Enquiry Title" required>
                        </div>
                        <div class="mb-3">
                            <label for="fullName" class="form-label required-asterisk">Full Name</label>
                            <input type="text" fieldType="alphabet" maxlength="15" class=" form-control"
                                id="enquiry_fullName" name="enquiry_fullName" placeholder="Enter full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label required-asterisk">Email</label>
                            <input type="text" fieldType="alphanumeric" maxlength="50" class="  form-control"
                                id="enquiry_email" name="enquiry_email" placeholder="Enter full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="phoneNumber" class="form-label required-asterisk">Phone Number</label>
                            <input type="number" fieldType="number" maxlength="15" class="  form-control"
                                id="enquiry_phoneNumber" name="enquiry_phoneNumber" placeholder="Enter phone number"
                                required>
                        </div>
                        <!-- Address Line 1 -->
                        <div class="mb-3">
                            <label for="description" class="form-label required-asterisk">Description</label>
                            <textarea type="text" fieldType="alphanumeric" maxlength="255" class="  form-control"
                                id="enquiry_description" name="enquiry_description" placeholder="Enter Description"
                                required></textarea>
                        </div>
                        <div class="white add-image-container d-flex mx-2" id="add-image-container"
                            data-page-name="products">
                        </div>
                        <hr>

                        <div class="col-xs-2 p-0 mb-5">
                            <div onclick="document.getElementById('file-input2').click();"
                                class="input-group position-relative border border-primary rounded shadow-sm overflow-hidden d-flex align-items-center justify-content-center"
                                style="height: 50px; cursor: pointer;">
                                <input type="file" id="file-input2" class="form-control d-none"
                                    name="add-enquiry_images" accept="image/*" single
                                    aria-describedby="file-input-label">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-upload text-primary cursor-pointer" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H1v4a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-4h-4a.5.5 0 0 1 0-1h4.5a.5.5 0 0 1 .5.5V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.9z" />
                                    <path
                                        d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V13.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 0 1-.708-.708l3-3z" />
                                </svg>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end ">
                            <button type="button" class="btn btn-primary my-5" id="addEnquiryBtn">Add</button>
                        </div>
                    </form>
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
                                        <div class="w-100 text-center border rounded-2 p-3 newEnquiryBtn"
                                            style="cursor: pointer;">
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
                        {{-- dynamically injected here --}}
                    </div>

                </div>


            </div>

        </div>
    </div>


</div>

<script>
    $('#exam-listing').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        pageLength: 10,
        buttons: [{
            extend: 'csv',
            text: 'Export'
        }, ],
        lengthMenu: [5, 10, 25, 50, 75, 100]
    });
</script>
@endsection
@push('scripts')
<script src="{{ asset('assets_admin/customjs/enquiry_listing.js') }}"></script>
@endpush
