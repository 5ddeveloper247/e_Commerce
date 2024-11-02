@extends('layouts.admin.admin_master')

@push('css')

@endpush

@section('content')

<div>
    <div>
        <div class="p-md-4 p-3">
            <form id="add_edit_admin_form">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Contact</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Listing</li>
                    </ol>
                </nav>
                <div class="row justify-content-center gx-0 gy-2 gap-4 mb-4">
                    <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 27 24">
                            <path fill="#2fa992"
                                d="M24 24H0V0h18.4v2.4h-16v19.2h20v-8.8h2.4V24zM4.48 11.58l1.807-1.807l5.422 5.422l13.68-13.68L27.2 3.318L11.709 18.809z" />
                        </svg>
                        <div class="ms-3">
                            <h3 class="mb-0 text-center">
                                <span class="fw-bold fs-2" id="active"></span>
                            </h3>
                            <small>Active</small>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                            <path fill="#ff0000bd"
                                d="M8 22q-.825 0-1.412-.587T6 20v-2H4q-.825 0-1.412-.587T2 16v-2h2v2h2V8q0-.825.588-1.412T8 6h8V4h-2V2h2q.825 0 1.413.588T18 4v2h2q.825 0 1.413.588T22 8v12q0 .825-.587 1.413T20 22zm0-2h12V8H8zm-6-8V8h2v4zm0-6V4q0-.825.588-1.412T4 2h2v2H4v2zm6-2V2h4v2zm0 16V8z" />
                        </svg>
                        <div class="ms-3">
                            <h3 class="mb-0 text-center">
                                <span class="fw-bold fs-2" id="inactive"></span>
                            </h3>
                            <small>InActive</small>
                        </div>
                    </div>
                    <div class="col d-flex justify-content-center gap-2 align-items-center d-card py-3 px-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M17 22q-2.075 0-3.537-1.463T12 17t1.463-3.537T17 12t3.538 1.463T22 17t-1.463 3.538T17 22m1.675-2.625l.7-.7L17.5 16.8V14h-1v3.2zM3 21V3h6.175q.275-.875 1.075-1.437T12 1q1 0 1.788.563T14.85 3H21v8.25q-.45-.325-.95-.55T19 10.3V5h-2v3H7V5H5v14h5.3q.175.55.4 1.05t.55.95zm9-16q.425 0 .713-.288T13 4t-.288-.712T12 3t-.712.288T11 4t.288.713T12 5" />
                        </svg>
                        <div class="ms-3">
                            <h3 class="mb-0 text-center">
                                <span class="fw-bold fs-2" id="total"></span>
                            </h3>
                            <small>Total</small>
                        </div>
                    </div>
                </div>
                <div id="contact">

                    <div class="px-4 py-4 bg-white shadow table-container table-container">
                        <table id="contact-listing" class="table table-responsive">
                            <div class="top text-end">
                                <div><label for="dt-search-0">Search:</label><input id="contact-search-input"
                                        type="search" class="rounded-5 py-1 px-2" aria-controls="contact-listing"></div>
                            </div>
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th class="text-nowrap" scope="col">NAME</th>
                                    <th class="text-nowrap" scope="col">PHONE</th>
                                    <th scope="col" data-sort="category">EMAIL</th>
                                    <th class="text-center" scope="col">STATUS</th>
                                    <th scope="col">CREATED AT</th>
                                    <th class="text-end" scope="col">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody id="contact_listing_table_body">
                                {{-- dYNAMIC DATA WILL BE INJECTED HERE --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade filterModal addUpdateContactModal" id="filterModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border">
                <form id="updateForm" autocomplete="off">
                    <div class="modal-header justify-content-between border-0 px-4 py-3">
                        <h4 class="modal-title text-white">Contact</h4>
                        <button class="btn p-1 btn-outline-light" type="button" data-bs-dismiss="modal"
                            aria-label="Close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 15 15">
                                <path fill="currentColor"
                                    d="M3.64 2.27L7.5 6.13l3.84-3.84A.92.92 0 0 1 12 2a1 1 0 0 1 1 1a.9.9 0 0 1-.27.66L8.84 7.5l3.89 3.89A.9.9 0 0 1 13 12a1 1 0 0 1-1 1a.92.92 0 0 1-.69-.27L7.5 8.87l-3.85 3.85A.92.92 0 0 1 3 13a1 1 0 0 1-1-1a.9.9 0 0 1 .27-.66L6.16 7.5L2.27 3.61A.9.9 0 0 1 2 3a1 1 0 0 1 1-1c.24.003.47.1.64.27" />
                            </svg>
                        </button>
                    </div>
                    <div class="modal-body pt-4 pb-2 px-4">
                        <div class="row">

                            <input type="hidden" name="contact_id" id="contact-id">
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" fieldType="alphabet" maxlength="15" class="form-control"
                                    id="full_name" name="full_name" placeholder="name">
                                <label class="mx-2 required-asterisk" for="generalInfo">username</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="number" class="form-control" fieldType="number" maxlength="15"
                                    id="phone_number" name="phone_number" placeholder="">
                                <label class="mx-2 required-asterisk" for="generalInfo">phone number</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="email" class="form-control" fieldType="alphanumeric" maxlength="50"
                                    id="email" name="email" placeholder="name@example.com">
                                <label class="mx-2 required-asterisk" for="generalInfo">email</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" fieldType="alphanumeric" maxlength="50"
                                    id="order_number" name="order_number" placeholder="order number">
                                <label class="mx-2 required-asterisk" for="generalInfo">order number</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" fieldType="alphanumeric" maxlength="50"
                                    id="company_name" name="company_name" placeholder="company name">
                                <label class="mx-2 required-asterisk" for="generalInfo">company name</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <input type="text" class="form-control" id="rma_number" fieldType="alphanumeric"
                                    maxlength="50" name="rma_number" placeholder="rma number">
                                <label class="mx-2 required-asterisk" for="generalInfo">rma number</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <textarea type="text" class="form-control" fieldType="alphanumeric" maxlength="255"
                                    id="comment" name="comment" placeholder="comment"></textarea>
                                <label class="mx-2 required-asterisk" for="generalInfo">comment</label>
                            </div>
                            <div class="form-floating col-md-12 mb-3">
                                <textarea type="text" class="form-control" fieldType="alphanumeric" maxlength="255"
                                    id="reply" name="reply" placeholder="reply"></textarea>
                                <label class="mx-2 required-asterisk" for="generalInfo">reply</label>
                            </div>

                            <div class="form-check form-switch col-md-12 d-flex align-items-center mb-3 mx-3">
                                <input class="form-check-input" type="checkbox" role="switch" name="status" id="status">
                                <label class="form-check-label ms-2" for="status">status</label>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center align-items-center px-4 pb-4 pt-3">
                        <button class="btn btn-cancel px-4" type="button" data-bs-dismiss="modal" aria-label="Close">
                            Cancel
                        </button>
                        <button class="btn btn-done px-4" type="button" id="editContactNow">Done</button>
                    </div>
                </form>
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
<script src="{{ asset('assets_admin/customjs/contact_us.js') }}"></script>
@endpush
