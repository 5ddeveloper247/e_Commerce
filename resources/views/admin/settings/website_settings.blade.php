@extends('layouts.admin.admin_master')

@push('css')
<link rel="stylesheet" href="{{ asset('assets_admin/css/website_settings.css') }}">
@endpush

@section('content')

<div class="content">
    <div id="website_settings">
        <div class="p-md-4 p-3">
            <form id="site_settings_form">
                <!-- Website Settings Section -->
                <div class="section">
                    <h2>Website Settings</h2>
                    <h4>Contact Details</h4>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="phone" class="form-label">Phone No</label>
                            <input type="number" class="form-control" id="phone" value="{{ @$siteSettings->phone }}"
                                name="phone" placeholder="Enter contact links">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="Email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ @$siteSettings->email }}" placeholder="Email">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" rows="3" value="{{ @$siteSettings->address }}"
                                name="address"
                                placeholder="Enter contact information">{{ @$siteSettings->address }}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="website_name" class="form-label">Website Name</label>
                            <input type="text" class="form-control" id="website_name"
                                value="{{ @$siteSettings->website_name }}" name="website_name"
                                placeholder="Enter website name">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="banner_heading" class="form-label">Banner Heading</label>
                            <input type="text" class="form-control" name="banner_heading"
                                value="{{ @$siteSettings->banner_heading }}" id="banner_heading"
                                placeholder="Enter website name">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="sub_heading" class="form-label">Sub Heading</label>
                            <input type="text" class="form-control" id="sub_heading" name="sub_heading"
                                value="{{ @$siteSettings->sub_heading}}" placeholder="Enter website name">
                        </div>
                    </div>
                    <div class="row">
                        <!-- Upload Logo Section -->
                        <div class="col-2 mb-3">
                            <label for="logo" class="form-label fw-bold mb-2">Upload Logo</label>
                            <div onclick="document.getElementById('logo').click();" class="input-group position-relative border border-primary rounded shadow-sm overflow-hidden d-flex align-items-center justify-content-center p-2"
                                style="height: 50px; cursor: pointer;">
                                <!-- Hidden file input for logo -->
                                <input type="file" id="logo" name="logo" class="form-control d-none" accept="image/*">

                                <!-- SVG Icon acting as button for uploading logo -->
                                <svg
                                    xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-upload text-primary cursor-pointer" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H1v4a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-4h-4a.5.5 0 0 1 0-1h4.5a.5.5 0 0 1 .5.5V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.9z" />
                                    <path
                                        d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V13.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 0 1-.708-.708l3-3z" />
                                </svg>
                            </div>
                        </div>

                        <!-- Logo Preview Section -->
                        <div class="col-10  p-3 d-flex align-items-center">
                            <img 
                                class="logo-preview img-fluid border rounded-circle shadow-sm"
                                style="width: 50px; height: 50px;"
                                src="{{ url('/') . '/storage/' . @$siteSettings->logo }}"
                                alt="Logo Preview"
                                id="logo-preview"
                                onerror="this.onerror=null;this.src='{{ asset('assets_admin/images/user-icon.webp') }}';"
                            >
                        </div>                    
                    </div>
                    
                    <div class="row">
                        {{--Banner upload --}}
                        <div class="col-2 mb-3">
                            <label for="file-input" class="form-label fw-bold mb-2">Upload Banner</label>
                            <div onclick="document.getElementById('file-input').click();" class="input-group position-relative border border-primary rounded shadow-sm overflow-hidden d-flex align-items-center justify-content-center" 
                                style="height: 50px; cursor: pointer;">
                                <!-- Adjusted height to provide space for centering -->
                                <input type="file" id="file-input" class="form-control d-none" name="banner_images" accept="image/*" multiple aria-describedby="file-input-label">
                                <!-- SVG Icon acting as button -->
                                <svg
                                    xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                    class="bi bi-upload text-primary cursor-pointer" viewBox="0 0 16 16">
                                    <path
                                        d="M.5 9.9a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H1v4a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-4h-4a.5.5 0 0 1 0-1h4.5a.5.5 0 0 1 .5.5V14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V9.9z" />
                                    <path
                                        d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V13.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 0 1-.708-.708l3-3z" />
                                </svg>
                            </div>
                        </div>    

                        {{-- Banner Preview --}}
                        <div class="col-10 p-3 d-flex align-items-center">
                            <div class="white image-container-existed" id="image-container" data-page-name="settings"></div>
                            <div class="white image-container-selected" id="image-container" data-page-name="settings"></div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="button" id="saveSettingsBtn" class="btn theme-btn-outline btn-lg px-md-5">Save
                        Settings</button>
                </div>
            </form>
        </div>

    </div>

</div>
@endsection

@push('scripts')
<script src="{{ asset('assets_admin/customjs/website_settings.js') }}"></script>
@endpush
