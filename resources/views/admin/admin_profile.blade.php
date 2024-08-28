@extends('layouts.admin.admin_master')

@push('css')
@endpush

@section('content')
<div class="content">
    <div id="enrolled-students-with-exams">
        <div class="p-md-4 p-3">
            <div class="enroll-students-detail">
                <div class="row g-3 h-100">
                    {{-- popup for add profile --}}
                    <div class="modal fade" id="filterModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border">

                                <section>
                                    <form id="editProfileForm">
                                        <div class="modal-header justify-content-between border-0 px-4 py-3">
                                            <h4 class="modal-title text-white">Edit Profile</h4>
                                            <button class="btn p-1 btn-outline-light" type="button"
                                                data-bs-dismiss="modal" aria-label="Close">
                                                <!-- Close Button SVG -->
                                            </button>
                                        </div>
                                        <div class="modal-body pt-4 pb-2 px-4">
                                            <div class="row">
                                                <!-- Full Name -->
                                                <div class="form-floating col-md-12 mb-3">
                                                    <input type="text" class="form-control" name="firstName"
                                                        id="firstName" value="{{ $user->username }}" placeholder="">
                                                    <label class="mx-2" for="firstName">Full Name</label>
                                                    <span id="firstName-error" class="text-danger"></span>
                                                </div>

                                                <!-- Last Name -->
                                                <div class="form-floating col-md-12 mb-3">
                                                    <input type="text" class="form-control" name="lastName"
                                                        id="lastName" value="{{ $user->last_name }}" placeholder="">
                                                    <label class="mx-2" for="lastName">Last Name</label>
                                                    <span id="lastName-error" class="text-danger"></span>
                                                </div>

                                                <!-- Email -->
                                                <div class="form-floating col-md-12 mb-3">
                                                    <input type="email" class="form-control" name="email" id="email"
                                                        placeholder="" value="{{ $user->email }}" readonly>
                                                    <label class="mx-2" for="email">Email</label>
                                                    <span id="email-error" class="text-danger"></span>
                                                </div>

                                                <!-- Password -->
                                                <div class="form-floating col-md-12 mb-3">
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" placeholder="">
                                                    <label class="mx-2" for="password">Password</label>
                                                    <span id="password-error" class="text-danger"></span>
                                                </div>

                                                <!-- Confirm Password -->
                                                <div class="form-floating col-md-12 mb-3">
                                                    <input type="password" class="form-control" name="confirmPassword"
                                                        id="confirmPassword" placeholder="">
                                                    <label class="mx-2" for="confirmPassword">Confirm Password</label>
                                                    <span id="confirmPassword-error" class="text-danger"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="modal-footer d-flex justify-content-center align-items-center px-4 pb-4 pt-3">
                                            <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="modal"
                                                aria-label="Close">Cancel</button>
                                            <button class="btn btn-done px-4" type="submit">Done</button>
                                        </div>
                                    </form>
                                </section>

                            </div>
                        </div>
                    </div>
                    {{-- popup for add profile --}}



                    <div class="col-12 col-md-7">
                        <div class="card h-100">
                            <div class="card-body d-flex flex-column justify-content-between pb-3">
                                <div class="row align-items-center g-5 mb-3 text-center text-sm-start">
                                    <div
                                        class="col-12 col-sm-auto mb-sm-2 d-flex justify-content-md-start justify-content-center">
                                        <div class="avatar avatar-5xl">
                                            <img class="rounded-circle img-fluid"
                                                src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/15.webp"
                                                alt="">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-auto flex-1 modal-edit-btn" data-bs-toggle="modal"
                                        data-bs-target="#filterModal" data-modal-type="edit">
                                        <h3>{{ $user->username }}</h3>
                                        <p class="text-body-secondary">
                                            Joined {{ \Carbon\Carbon::parse($user->created_at)->format('Y-m-d') }}
                                            <a type="button" class="text-info">Edit</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- address section --}}


                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content text-center">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        style="background-color: #00000040 !important;"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex align-items-center justify-content-center my-4">
                        <h6 class="mb-0 me-2">Are Sure Want to Delete</h6>
                        <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 24 24">
                            <g fill="none">
                                <path
                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12S6.477 2 12 2m0 2a8 8 0 1 0 0 16a8 8 0 0 0 0-16m0 12a1 1 0 1 1 0 2a1 1 0 0 1 0-2m0-9.5a3.625 3.625 0 0 1 1.348 6.99a.8.8 0 0 0-.305.201c-.044.05-.051.114-.05.18L13 14a1 1 0 0 1-1.993.117L11 14v-.25c0-1.153.93-1.845 1.604-2.116a1.626 1.626 0 1 0-2.229-1.509a1 1 0 1 1-2 0A3.625 3.625 0 0 1 12 6.5" />
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger px-md-3" data-bs-dismiss="modal">NO</button>
                    <button type="button" class="btn btn-outline-danger px-md-3">YES</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('scripts')
<script src="{{ asset('assets_admin/customjs/profile.js') }}"></script>
@endpush
