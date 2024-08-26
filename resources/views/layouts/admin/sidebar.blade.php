<div class="sidebar border-end d-lg-block d-none">
    <div>
        <ul class="nav flex-column">


            <div class="dashboard">
                <li class="nav-item ">
                    <a href="{{url('admin/dashboard')}}"
                        class=" d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                        href="#">
                        <span>DASHBOARD</span>
                    </a>
                </li>
            </div>

            <li class="nav-item crm">
                <a class="nav-link main-links-for-submenu" data-bs-toggle="collapse" href="#sidebar-crm" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <span class="dropdown-indicator-icon-wrapper">
                            <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                </path>
                            </svg>
                        </span>

                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 48 48">
                                <g fill="none">
                                    <path d="M0 0h48v48H0z" />
                                    <path fill="currentColor"
                                        d="M20 15a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2h-8a1 1 0 0 1-1-1m1 3a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2zm-1 10a1 1 0 0 1 1-1h8a1 1 0 1 1 0 2h-8a1 1 0 0 1-1-1m1 3a1 1 0 1 0 0 2h8a1 1 0 1 0 0-2z" />
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M10 27a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1zm2 1v3h3v-3z"
                                        clip-rule="evenodd" />
                                    <path fill="currentColor"
                                        d="M17.707 15.707a1 1 0 0 0-1.414-1.414L13 17.586l-1.293-1.293a1 1 0 0 0-1.414 1.414L13 20.414z" />
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M10 6a4 4 0 0 0-4 4v28a4 4 0 0 0 4 4h20a4 4 0 0 0 4-4V10a4 4 0 0 0-4-4zm-2 4a2 2 0 0 1 2-2h20a2 2 0 0 1 2 2v28a2 2 0 0 1-2 2H10a2 2 0 0 1-2-2zm28 6a3 3 0 1 1 6 0v20.303l-3 4.5l-3-4.5zm3-1a1 1 0 0 0-1 1v2h2v-2a1 1 0 0 0-1-1m0 22.197l-1-1.5V20h2v15.697z"
                                        clip-rule="evenodd" />
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text">Users</span>
                    </div>
                </a>

                <div class="collapse sidebar-inner-content" id="sidebar-crm">
                    <ul class="nav flex-column mx-3">
                        <li class="nav-item active">
                            <a href="{{route('admin.listing')}}"
                                class=" d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                href="#">
                                <span>Admin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.listing')}}"
                                class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                href="#">
                                <span>User</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="crm-dropdown border rounded-4 d-none">
                    <ul class="navbar-nav">
                        <li class="nav-item-wrapper">
                            <a class="nav-link px-4 pt-3" href="#">
                                <div class="d-flex align-items-center">
                                    CRM
                                </div>
                            </a>
                            <hr>
                            <div class="parent-wrapper label-1 mb-2">
                                <ul class="nav flex-column">
                                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4"
                                            href="apps/crm/analytics.html">Analytics</a></li>
                                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4"
                                            href="apps/crm/deals.html">Deals</a></li>
                                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4"
                                            href="apps/crm/deal-details.html">Deal details</a></li>
                                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4"
                                            href="apps/crm/leads.html">Leads</a></li>
                                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4"
                                            href="apps/crm/lead-details.html">Lead details</a></li>
                                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4"
                                            href="apps/crm/reports.html">Reports</a></li>
                                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4"
                                            href="apps/crm/report-details.html">Report details</a></li>
                                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4"
                                            href="apps/crm/add-contact.html">Add contact</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>



            <li class="nav-item">
                <a class="nav-link main-links-for-submenu" data-bs-toggle="collapse" href="#sidebar-faq" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <span class="dropdown-indicator-icon-wrapper">
                            <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                </path>
                            </svg>
                        </span>
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-clipboard">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                </path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                        </div>
                        <span class="nav-link-text">Site Settings</span>
                    </div>
                </a>
                <div class="collapse sidebar-inner-content" id="sidebar-faq">
                    <ul class="nav flex-column mx-3">
                        <li class="nav-item">
                            <a href="{{route('admin.site.settings')}}"
                                class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                href="#">
                                <span>General Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>





            <li class="nav-item">
                <a href="{{route('admin.category.get')}}" class="nav-link main-links-for-submenu" role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 2048 2048">
                                <path fill="currentColor"
                                    d="M1920 1276q1 2 1 29t1 69t0 97t0 111t-1 114t0 102t-1 79t0 43H0v-121q0-47-1-103t0-113t-1-112t0-96t0-70t2-29L383 128h385v128H475L134 1280h418l128 256h560l128-256h418L1445 256h-293V128h385zm-128 132h-344l-128 256H600l-128-256H128v384h1664zM896 933V0h128v933l294-293l90 90l-448 448l-448-448l90-90z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Category</span>
                    </div>
                </a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link main-links-for-submenu" data-bs-toggle="collapse" href="#support" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <span class="dropdown-indicator-icon-wrapper">
                            <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                </path>
                            </svg>
                        </span>
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 28 28">
                                <path fill="currentColor"
                                    d="M14 19a2 2 0 0 1-1.839-1.212a8 8 0 0 1-.951-.288l-.017-.006A8 8 0 0 1 8.708 16a8 8 0 1 1 13.257-6.75c.039.413-.3.75-.715.75c-.414 0-.745-.337-.793-.749A6.5 6.5 0 1 0 11.496 16l.04.017q.3.123.616.217a2 2 0 0 1 3.785 1.266A2 2 0 0 1 14 19m-7-1.5h1.169a9.6 9.6 0 0 1-1.518-1.48A3 3 0 0 0 4 19v.715C4 23.433 8.21 26 14 26s10-2.708 10-6.285V19a3 3 0 0 0-3-3h-3.645a3.5 3.5 0 0 1 .11 1.5H21l.145.007A1.5 1.5 0 0 1 22.5 19v.715l-.005.161c-.14 2.52-3.569 4.624-8.495 4.624c-5.111 0-8.5-2.111-8.5-4.785V19l.007-.145A1.5 1.5 0 0 1 7 17.5M19 10a5 5 0 0 1-2.644 4.411A3.5 3.5 0 0 0 14 13.5a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7c-.908 0-1.734.346-2.355.912a5 5 0 0 1-1.932-1.838A5 5 0 1 1 19 10" />
                            </svg>
                        </div>
                        <span class="nav-link-text">SUPPORT</span>
                    </div>
                </a>
                <div class="collapse sidebar-inner-content" id="support">
                    <ul class="nav flex-column mx-3">
                        <li class="nav-item">
                            <a href="{{url('contact_us')}}"
                                class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                href="#">
                                <span>Contact Us</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('ticket_list')}}"
                                class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                href="#">
                                <span>Tickets List</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}



            {{-- <li class="nav-item">
                <a class="nav-link main-links-for-submenu" data-bs-toggle="collapse" href="#question" role="button"
                    aria-expanded="false" aria-controls="collapseExample">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <span class="dropdown-indicator-icon-wrapper">
                            <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                </path>
                            </svg>
                        </span>
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M138 180a10 10 0 1 1-10-10a10 10 0 0 1 10 10M128 74c-21 0-38 15.25-38 34v4a6 6 0 0 0 12 0v-4c0-12.13 11.66-22 26-22s26 9.87 26 22s-11.66 22-26 22a6 6 0 0 0-6 6v8a6 6 0 0 0 12 0v-2.42c18.11-2.58 32-16.66 32-33.58c0-18.75-17-34-38-34m102 54A102 102 0 1 1 128 26a102.12 102.12 0 0 1 102 102m-12 0a90 90 0 1 0-90 90a90.1 90.1 0 0 0 90-90" />
                            </svg>
                        </div>
                        <span class="nav-link-text">QUESTION</span>
                    </div>
                </a>
                <div class="collapse sidebar-inner-content" id="question">
                    <ul class="nav flex-column mx-3">
                        <li class="nav-item">
                            <a href="{{url('simple_question')}}"
                                class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                href="#">
                                <span>Simple Questions</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{url('audio')}}"
                                class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                href="#">
                                <span>Audio</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('ppt')}}"
                                class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                href="#">
                                <span>Audio & PPT</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li> --}}

            {{-- <span class="pt-2 px-3">Pages</span> --}}
            {{-- <li class="nav-item">
                <a href="{{url('invoices_list')}}" class="nav-link main-links-for-submenu" role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    d="M5 3h14v18l-1.032-.884a2 2 0 0 0-2.603 0L14.333 21l-1.031-.884a2 2 0 0 0-2.604 0L9.667 21l-1.032-.884a2 2 0 0 0-2.603 0L5 21zm10 4H9m6 4H9m6 4h-4" />
                            </svg>
                        </div>
                        <span class="nav-link-text">INOICES LIST</span>
                    </div>
                </a>
            </li> --}}


            {{-- <li class="nav-item">
                <a href="{{url('enrolled_students_with_exams')}}" class="nav-link main-links-for-submenu" role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="m225.9 58.31l-96-32a6 6 0 0 0-3.8 0l-96 32A6 6 0 0 0 26 64v80a6 6 0 0 0 12 0V72.32l38.68 12.9A62 62 0 0 0 99 174.75c-19.25 6.53-36 19.59-48 38a6 6 0 0 0 10 6.53C76.47 195.59 100.88 182 128 182s51.53 13.59 67 37.28a6 6 0 0 0 10-6.56c-12-18.38-28.73-31.44-48-38a62 62 0 0 0 22.27-89.53l46.63-15.5a6 6 0 0 0 0-11.38M178 120a50 50 0 1 1-89.37-30.8l37.47 12.49a6 6 0 0 0 3.8 0l37.47-12.49A49.78 49.78 0 0 1 178 120m-50-30.32L51 64l77-25.68L205 64Z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">ENROLLED STUDENTS</span>
                    </div>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="{{url('students_subscription')}}" class="nav-link main-links-for-submenu" role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 2048 2048">
                                <path fill="currentColor"
                                    d="M1920 1276q1 2 1 29t1 69t0 97t0 111t-1 114t0 102t-1 79t0 43H0v-121q0-47-1-103t0-113t-1-112t0-96t0-70t2-29L383 128h385v128H475L134 1280h418l128 256h560l128-256h418L1445 256h-293V128h385zm-128 132h-344l-128 256H600l-128-256H128v384h1664zM896 933V0h128v933l294-293l90 90l-448 448l-448-448l90-90z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">STUDENTS SUBSCRIPTION</span>
                    </div>
                </a>
            </li> --}}


            {{-- <li class="nav-item">
                <a href="{{url('students_result')}}" class="nav-link main-links-for-submenu" role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round"
                                        d="M16 22v-9c0-1.414 0-2.121-.44-2.56C15.122 10 14.415 10 13 10h-2c-1.414 0-2.121 0-2.56.44C8 10.878 8 11.585 8 13v9" />
                                    <path stroke-linecap="round"
                                        d="M8 22c0-1.414 0-2.121-.44-2.56C7.122 19 6.415 19 5 19c-1.414 0-2.121 0-2.56.44C2 19.878 2 20.585 2 22m20 0v-3c0-1.414 0-2.121-.44-2.56C21.122 16 20.415 16 19 16c-1.414 0-2.121 0-2.56.44C16 16.878 16 17.585 16 19v3"
                                        opacity="0.5" />
                                    <path
                                        d="M11.146 3.023C11.526 2.34 11.716 2 12 2c.284 0 .474.34.854 1.023l.098.176c.108.194.162.29.246.354c.085.064.19.088.4.135l.19.044c.738.167 1.107.25 1.195.532c.088.283-.164.577-.667 1.165l-.13.152c-.143.167-.215.25-.247.354c-.032.104-.021.215 0 .438l.02.203c.076.785.114 1.178-.115 1.352c-.23.175-.576.015-1.267-.303l-.178-.082c-.197-.09-.295-.136-.399-.136c-.104 0-.202.046-.399.136l-.178.082c-.691.318-1.037.478-1.267.303c-.23-.174-.191-.567-.115-1.352l.02-.203c.021-.223.032-.334 0-.438c-.032-.103-.104-.187-.247-.354l-.13-.152c-.503-.588-.755-.882-.667-1.165c.088-.282.457-.365 1.195-.532l.19-.044c.21-.047.315-.07.4-.135c.084-.064.138-.16.246-.354z" />
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text">STUDENTS RESULT</span>
                    </div>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a href="{{url('newsletter_listing')}}" class="nav-link main-links-for-submenu" role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="-2 -5 24 24">
                                <path fill="currentColor"
                                    d="M2 0h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m0 2v10h16V2zm3 6h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2m10-5h2v2h-2z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">NEWSLETTER LISTING</span>
                    </div>
                </a>
            </li> --}}


            {{-- <li class="nav-item">
                <a href="{{url('sub_admin')}}" class="nav-link main-links-for-submenu" role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 36 36">
                                <path fill="currentColor"
                                    d="M14.68 14.81a6.76 6.76 0 1 1 6.76-6.75a6.77 6.77 0 0 1-6.76 6.75m0-11.51a4.76 4.76 0 1 0 4.76 4.76a4.76 4.76 0 0 0-4.76-4.76"
                                    class="clr-i-outline clr-i-outline-path-1" />
                                <path fill="currentColor"
                                    d="M16.42 31.68A2.14 2.14 0 0 1 15.8 30H4v-5.78a14.8 14.8 0 0 1 11.09-4.68h.72a2.2 2.2 0 0 1 .62-1.85l.12-.11c-.47 0-1-.06-1.46-.06A16.47 16.47 0 0 0 2.2 23.26a1 1 0 0 0-.2.6V30a2 2 0 0 0 2 2h12.7Z"
                                    class="clr-i-outline clr-i-outline-path-2" />
                                <path fill="currentColor" d="M26.87 16.29a.4.4 0 0 1 .15 0a.4.4 0 0 0-.15 0"
                                    class="clr-i-outline clr-i-outline-path-3" />
                                <path fill="currentColor"
                                    d="m33.68 23.32l-2-.61a7.2 7.2 0 0 0-.58-1.41l1-1.86A.38.38 0 0 0 32 19l-1.45-1.45a.36.36 0 0 0-.44-.07l-1.84 1a7 7 0 0 0-1.43-.61l-.61-2a.36.36 0 0 0-.36-.24h-2.05a.36.36 0 0 0-.35.26l-.61 2a7 7 0 0 0-1.44.6l-1.82-1a.35.35 0 0 0-.43.07L17.69 19a.38.38 0 0 0-.06.44l1 1.82a6.8 6.8 0 0 0-.63 1.43l-2 .6a.36.36 0 0 0-.26.35v2.05A.35.35 0 0 0 16 26l2 .61a7 7 0 0 0 .6 1.41l-1 1.91a.36.36 0 0 0 .06.43l1.45 1.45a.38.38 0 0 0 .44.07l1.87-1a7 7 0 0 0 1.4.57l.6 2a.38.38 0 0 0 .35.26h2.05a.37.37 0 0 0 .35-.26l.61-2.05a7 7 0 0 0 1.38-.57l1.89 1a.36.36 0 0 0 .43-.07L32 30.4a.35.35 0 0 0 0-.4l-1-1.88a7 7 0 0 0 .58-1.39l2-.61a.36.36 0 0 0 .26-.35v-2.1a.36.36 0 0 0-.16-.35M24.85 28a3.34 3.34 0 1 1 3.33-3.33A3.34 3.34 0 0 1 24.85 28"
                                    class="clr-i-outline clr-i-outline-path-4" />
                                <path fill="none" d="M0 0h36v36H0z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">SUB-ADMIN</span>
                    </div>
                </a>
            </li> --}}


            {{-- <li class="nav-item">
                <a href="{{url('exam_plans')}}" class="nav-link main-links-for-submenu" role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 48 48">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    d="M30.507 36.163h-13.01m0-4.025h13.006m10.054 4.649h.835c.613 0 1.108-.491 1.108-1.104v-3.152c0-.61-.494-1.104-1.104-1.104h-.835m-3.893 8.58h2.786a1.1 1.1 0 0 0 1.103-1.103v-9.59a1.104 1.104 0 0 0-1.1-1.107h-2.785m-1.104-2.355H31.61c-.61 0-1.104.494-1.104 1.104v14.302a1.1 1.1 0 0 0 1.104 1.104h3.957a1.1 1.1 0 0 0 1.104-1.104V26.96a1.104 1.104 0 0 0-1.1-1.108zM7.439 36.791h-.831a1.104 1.104 0 0 1-1.108-1.1v-3.16c0-.612.491-1.104 1.108-1.104h.831m3.893 8.58h-2.79a1.103 1.103 0 0 1-1.103-1.103v-9.59c0-.612.491-1.107 1.104-1.107h2.782m1.107-2.355h3.954c.616 0 1.107.491 1.107 1.108v14.298a1.1 1.1 0 0 1-1.107 1.104h-3.95c-.61 0-1.104-.494-1.104-1.104V26.96c0-.613.492-1.108 1.104-1.108zm8.701 2.82h9.37m-13.01-1.078l1.531-1.538m2.11-4.94h13.25m-20.625-.159l1.41 1.414l3.855-3.874m2.11-4.94h13.25m-20.625-.16l1.41 1.414l3.855-3.87m11.48 28.5H17.496M9.374 28.206V7.849c0-1.225.98-2.211 2.193-2.211h24.87c1.217 0 2.196.983 2.196 2.211v20.358" />
                            </svg>
                        </div>
                        <span class="nav-link-text">EXAM PLANS</span>
                    </div>
                </a>
            </li> --}}


        </ul>
    </div>


    <div class="sidebar-footer border-end border-top toggle-button p-3" id="toggleSidebar">
        <div class="sidebar-collapse-button">
            <svg class="sidebar-back-icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                viewBox="0 0 16 16">
                <path fill="currentColor"
                    d="M5.854 2.146a.5.5 0 0 1 0 .708L3.707 5h2.336c1.468 0 2.905 0 4.226.396c1.365.41 2.585 1.234 3.647 2.827a.5.5 0 0 1-.832.554c-.938-1.407-1.968-2.083-3.103-2.423C8.815 6.004 7.517 6 6 6H3.707l2.147 2.146a.5.5 0 1 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0M8 14a2 2 0 1 0 0-4a2 2 0 0 0 0 4m0-1a1 1 0 1 1 0-2a1 1 0 0 1 0 2" />
            </svg>
            <span>Collapsed View</span>
        </div>
        <svg class="sidebar-forward-icon" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
            viewBox="0 0 24 24">
            <path fill="currentColor"
                d="m19.587 9.5l-2.963-2.963a.75.75 0 0 1 .977-1.133l.084.073l4.243 4.242a.75.75 0 0 1 .072.977l-.073.084l-4.242 4.243a.75.75 0 0 1-1.133-.977l.072-.084L19.587 11h-5.69a7.75 7.75 0 0 1-7.746-7.504l-.004-.246a.75.75 0 1 1 1.5 0a6.25 6.25 0 0 0 6.021 6.246l.23.004zM5.317 12h4.828a.5.5 0 0 1 .436.745L8.751 16h1.495a.75.75 0 0 1 .564 1.244l-4.823 5.508c-.505.576-1.443.085-1.258-.657L5.5 19H2.498a.5.5 0 0 1-.453-.713l2.82-6A.5.5 0 0 1 5.318 12" />
        </svg>

    </div>
</div>