@php
$siteData=siteCommonData();
$siteLogo=@$siteData['settings']->logo;
@endphp
<nav class="navbar navbar-top navbar-expand px-3" id="navbarDefault">
    <div class="collapse navbar-collapse justify-content-between">

        <div class="navbar-logo d-flex align-items-center">
            <!-- Toggle button for Small Screen  -->
            <button class="navbar-toggler d-lg-none d-block" data-bs-toggle="collapse" href="#collapseExample"
                role="button" aria-expanded="false" aria-controls="collapseExample">
                <svg xmlns="http://www.w3.org/2000/svg" width="2em" height="2em" viewBox="0 0 20 20">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M3 5a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1m0 5a1 1 0 0 1 1-1h12a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1m0 5a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1"
                        clip-rule="evenodd" />
                </svg>
            </button>
            <div class="collapse collapse-for-toggle-icon" id="collapseExample">
                <div>
                    <ul class="nav flex-column">
                        <span class="pt-2 px-3">Apps</span>

                        <div class="dashboard">
                            <li class="nav-item ">
                                <a href="{{url('admin_dashboard')}}"
                                    class=" d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                    href="#">
                                    <span>DASHBOARD</span>
                                </a>
                            </li>
                        </div>

                        <li class="nav-item crm">
                            <a class="nav-link main-links-for-submenu" data-bs-toggle="collapse" href="#sidebar-crm"
                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <span class="dropdown-indicator-icon-wrapper">
                                        <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 256 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                            </path>
                                        </svg>
                                    </span>

                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 48 48">
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
                                    <span class="nav-link-text">EXAM</span>
                                </div>
                            </a>
                            <div class="collapse sidebar-inner-content" id="sidebar-crm">
                                <ul class="nav flex-column mx-3">
                                    <li class="nav-item active">
                                        <a href="{{url('exam_listing')}}"
                                            class=" d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Listing</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('exam_mode')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Mode</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('exam_catagory')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Catagory</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('exam_subCatagory')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Sub-Catagory</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- <div class="crm-dropdown border rounded-4 d-none">
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
                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4" href="apps/crm/analytics.html">Analytics</a></li>
                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4" href="apps/crm/deals.html">Deals</a></li>
                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4" href="apps/crm/deal-details.html">Deal details</a></li>
                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4" href="apps/crm/leads.html">Leads</a></li>
                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4" href="apps/crm/lead-details.html">Lead details</a></li>
                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4" href="apps/crm/reports.html">Reports</a></li>
                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4" href="apps/crm/report-details.html">Report details</a></li>
                    <li class="nav-item sidebar-dropdown-links-bg"><a class="nav-link px-4" href="apps/crm/add-contact.html">Add contact</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </div> -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-links-for-submenu" data-bs-toggle="collapse" href="#sidebar-faq"
                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <span class="dropdown-indicator-icon-wrapper">
                                        <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 256 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-clipboard">
                                            <path
                                                d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                            </path>
                                            <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                        </svg>
                                    </div>
                                    <span class="nav-link-text">NGN</span>
                                </div>
                            </a>
                            <div class="collapse sidebar-inner-content" id="sidebar-faq">
                                <ul class="nav flex-column mx-3">
                                    <li class="nav-item">
                                        <a href="{{url('exam_matrix_grid')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Exam Matrix Grid</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('exam_matrix_multiple')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Exam Matrix Multiple</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('bowtie')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Bowtie</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('drop_down_cloze')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Drop Down Cloze</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('drop_down_rational')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Drop Down Rational</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('drop_down_table')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Drop Down Table</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('drag_and_drop')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Drag and Drop</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('multiple_response_grouping')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Multiple response grouping</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('multiple_response_select')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Multiple response select</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('multiple_response_select_all')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Multiple response select all</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('highlight_text_items')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Highlight Text Items</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('highlight_table_items')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>Highlight Table Items</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-links-for-submenu" data-bs-toggle="collapse" href="#settings"
                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <span class="dropdown-indicator-icon-wrapper">
                                        <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 256 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5">
                                                <path d="M12 15a3 3 0 1 0 0-6a3 3 0 0 0 0 6" />
                                                <path
                                                    d="m19.622 10.395l-1.097-2.65L20 6l-2-2l-1.735 1.483l-2.707-1.113L12.935 2h-1.954l-.632 2.401l-2.645 1.115L6 4L4 6l1.453 1.789l-1.08 2.657L2 11v2l2.401.656L5.516 16.3L4 18l2 2l1.791-1.46l2.606 1.072L11 22h2l.604-2.387l2.651-1.098C16.697 18.832 18 20 18 20l2-2l-1.484-1.75l1.098-2.652l2.386-.62V11z" />
                                            </g>
                                        </svg>
                                    </div>
                                    <span class="nav-link-text">Settings</span>
                                </div>
                            </a>
                            <div class="collapse sidebar-inner-content" id="settings">
                                <ul class="nav flex-column mx-3">
                                    <li class="nav-item">
                                        <a href="{{url('website_settings')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>WEBSITE SETTINGS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('smtp_settings')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>SMTP SETTINGS</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('api_keyhandler')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>API KEY HANDLER</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-links-for-submenu" data-bs-toggle="collapse" href="#support"
                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <span class="dropdown-indicator-icon-wrapper">
                                        <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 256 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 28 28">
                                            <path fill="currentColor"
                                                d="M14 19a2 2 0 0 1-1.839-1.212a8 8 0 0 1-.951-.288l-.017-.006A8 8 0 0 1 8.708 16a8 8 0 1 1 13.257-6.75c.039.413-.3.75-.715.75c-.414 0-.745-.337-.793-.749A6.5 6.5 0 1 0 11.496 16l.04.017q.3.123.616.217a2 2 0 0 1 3.785 1.266A2 2 0 0 1 14 19m-7-1.5h1.169a9.6 9.6 0 0 1-1.518-1.48A3 3 0 0 0 4 19v.715C4 23.433 8.21 26 14 26s10-2.708 10-6.285V19a3 3 0 0 0-3-3h-3.645a3.5 3.5 0 0 1 .11 1.5H21l.145.007A1.5 1.5 0 0 1 22.5 19v.715l-.005.161c-.14 2.52-3.569 4.624-8.495 4.624c-5.111 0-8.5-2.111-8.5-4.785V19l.007-.145A1.5 1.5 0 0 1 7 17.5M19 10a5 5 0 0 1-2.644 4.411A3.5 3.5 0 0 0 14 13.5a3.5 3.5 0 1 0 0-7a3.5 3.5 0 0 0 0 7c-.908 0-1.734.346-2.355.912a5 5 0 0 1-1.932-1.838A5 5 0 1 1 19 10" />
                                        </svg>
                                    </div>
                                    <span class="nav-link-text">Support</span>
                                </div>
                            </a>
                            <div class="collapse sidebar-inner-content" id="support">
                                <ul class="nav flex-column mx-3">
                                    <li class="nav-item">
                                        <a href="{{url('contact_us')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>CONTACT US</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('ticket_list')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>TICKET LIST</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link main-links-for-submenu" data-bs-toggle="collapse" href="#question"
                                role="button" aria-expanded="false" aria-controls="collapseExample">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <span class="dropdown-indicator-icon-wrapper">
                                        <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon"
                                            aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="caret-right" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 256 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                            </path>
                                        </svg>
                                    </span>
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 256 256">
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
                                            <span>SIMPLE QUESTION</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('audio')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>AUDIO</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{url('ppt')}}"
                                            class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                            href="#">
                                            <span>PPT</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <span class="pt-2 px-3">Pages</span>
                        <li class="nav-item">
                            <a href="{{url('invoices_list')}}" class="nav-link main-links-for-submenu" role="button">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M5 3h14v18l-1.032-.884a2 2 0 0 0-2.603 0L14.333 21l-1.031-.884a2 2 0 0 0-2.604 0L9.667 21l-1.032-.884a2 2 0 0 0-2.603 0L5 21zm10 4H9m6 4H9m6 4h-4" />
                                        </svg>
                                    </div>
                                    <span class="nav-link-text">INOICES LIST</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('enrolled_students_with_exams')}}" class="nav-link main-links-for-submenu"
                                role="button">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 256 256">
                                            <path fill="currentColor"
                                                d="m225.9 58.31l-96-32a6 6 0 0 0-3.8 0l-96 32A6 6 0 0 0 26 64v80a6 6 0 0 0 12 0V72.32l38.68 12.9A62 62 0 0 0 99 174.75c-19.25 6.53-36 19.59-48 38a6 6 0 0 0 10 6.53C76.47 195.59 100.88 182 128 182s51.53 13.59 67 37.28a6 6 0 0 0 10-6.56c-12-18.38-28.73-31.44-48-38a62 62 0 0 0 22.27-89.53l46.63-15.5a6 6 0 0 0 0-11.38M178 120a50 50 0 1 1-89.37-30.8l37.47 12.49a6 6 0 0 0 3.8 0l37.47-12.49A49.78 49.78 0 0 1 178 120m-50-30.32L51 64l77-25.68L205 64Z" />
                                        </svg>
                                    </div>
                                    <span class="nav-link-text">ENROLLED STUDENTS</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('students_subscription')}}" class="nav-link main-links-for-submenu"
                                role="button">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 2048 2048">
                                            <path fill="currentColor"
                                                d="M1920 1276q1 2 1 29t1 69t0 97t0 111t-1 114t0 102t-1 79t0 43H0v-121q0-47-1-103t0-113t-1-112t0-96t0-70t2-29L383 128h385v128H475L134 1280h418l128 256h560l128-256h418L1445 256h-293V128h385zm-128 132h-344l-128 256H600l-128-256H128v384h1664zM896 933V0h128v933l294-293l90 90l-448 448l-448-448l90-90z" />
                                        </svg>
                                    </div>
                                    <span class="nav-link-text">STUDENTS SUBSCRIPTION</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('students_result')}}" class="nav-link main-links-for-submenu" role="button">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 24 24">
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
                        </li>
                        <li class="nav-item">
                            <a href="{{url('newsletter_listing')}}" class="nav-link main-links-for-submenu"
                                role="button">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="-2 -5 24 24">
                                            <path fill="currentColor"
                                                d="M2 0h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m0 2v10h16V2zm3 6h6a1 1 0 0 1 0 2H5a1 1 0 1 1 0-2m10-5h2v2h-2z" />
                                        </svg>
                                    </div>
                                    <span class="nav-link-text">NEWSLETTER LISTING</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('sub_admin')}}" class="nav-link main-links-for-submenu" role="button">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 36 36">
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
                        </li>
                        <li class="nav-item">
                            <a href="{{url('exam_plans')}}" class="nav-link main-links-for-submenu" role="button">
                                <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                                    <div class="nav-link-icon px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                            viewBox="0 0 48 48">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M30.507 36.163h-13.01m0-4.025h13.006m10.054 4.649h.835c.613 0 1.108-.491 1.108-1.104v-3.152c0-.61-.494-1.104-1.104-1.104h-.835m-3.893 8.58h2.786a1.1 1.1 0 0 0 1.103-1.103v-9.59a1.104 1.104 0 0 0-1.1-1.107h-2.785m-1.104-2.355H31.61c-.61 0-1.104.494-1.104 1.104v14.302a1.1 1.1 0 0 0 1.104 1.104h3.957a1.1 1.1 0 0 0 1.104-1.104V26.96a1.104 1.104 0 0 0-1.1-1.108zM7.439 36.791h-.831a1.104 1.104 0 0 1-1.108-1.1v-3.16c0-.612.491-1.104 1.108-1.104h.831m3.893 8.58h-2.79a1.103 1.103 0 0 1-1.103-1.103v-9.59c0-.612.491-1.107 1.104-1.107h2.782m1.107-2.355h3.954c.616 0 1.107.491 1.107 1.108v14.298a1.1 1.1 0 0 1-1.107 1.104h-3.95c-.61 0-1.104-.494-1.104-1.104V26.96c0-.613.492-1.108 1.104-1.108zm8.701 2.82h9.37m-13.01-1.078l1.531-1.538m2.11-4.94h13.25m-20.625-.159l1.41 1.414l3.855-3.874m2.11-4.94h13.25m-20.625-.16l1.41 1.414l3.855-3.87m11.48 28.5H17.496M9.374 28.206V7.849c0-1.225.98-2.211 2.193-2.211h24.87c1.217 0 2.196.983 2.196 2.211v20.358" />
                                        </svg>
                                    </div>
                                    <span class="nav-link-text">EXAM PLANS</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Toggle button for Small Screen End -->
            <a class="navbar-brand d-flex me-1 me-sm-3" href="{{ route('admin.dashboard') }}">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        <img src="{{ url('/').'/'.@$siteLogo }}" alt="phoenix" width="60">
                        <!-- <h5 class="logo-text ms-2 d-none d-sm-block">phoenix</h5> -->
                    </div>
                </div>
            </a>
        </div>
        <div class="search-box navbar-top-search-box d-none d-lg-block" style="width:25rem;">
            <form class="position-relative" data-bs-toggle="search" data-bs-display="static" aria-expanded="false">
                <input class="form-control search-input fuzzy-search rounded-pill shadow" type="search"
                    placeholder="Search..." aria-label="Search">
                <svg class="svg-inline--fa fa-magnifying-glass search-box-icon" aria-hidden="true" focusable="false"
                    data-prefix="fas" data-icon="magnifying-glass" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                    </path>
                </svg><!-- <span class="fas fa-search search-box-icon"></span> Font Awesome fontawesome.com -->
            </form>
            <!-- <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search"><button class="btn btn-link p-0" aria-label="Close"></button></div> -->
            <div class="dropdown-menu border start-0 py-0 overflow-hidden w-100">
                <div class="scrollbar-overlay" style="max-height: 30rem;" data-simplebar="init">
                    <div class="simplebar-wrapper" style="margin: 0px;">
                        <div class="simplebar-height-auto-observer-wrapper">
                            <div class="simplebar-height-auto-observer"></div>
                        </div>
                        <div class="simplebar-mask">
                            <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                    aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                    <div class="simplebar-content" style="padding: 0px;">
                                        <div class="list pb-3">
                                            <h6 class="dropdown-header text-body-highlight fs-10 py-2">24 <span
                                                    class="text-body-quaternary">results</span></h6>
                                            <hr class="my-0">
                                            <h6
                                                class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                                Recently Searched </h6>
                                            <div class="py-2"><a class="dropdown-item"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-normal text-body-highlight title"><svg
                                                                class="svg-inline--fa fa-clock-rotate-left"
                                                                data-fa-transform="shrink-2" aria-hidden="true"
                                                                focusable="false" data-prefix="fas"
                                                                data-icon="clock-rotate-left" role="img"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                                data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                                <g transform="translate(256 256)">
                                                                    <g
                                                                        transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                        <path fill="currentColor"
                                                                            d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z"
                                                                            transform="translate(-256 -256)"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <!-- <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                            Store Macbook</div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-normal text-body-highlight title"> <svg
                                                                class="svg-inline--fa fa-clock-rotate-left"
                                                                data-fa-transform="shrink-2" aria-hidden="true"
                                                                focusable="false" data-prefix="fas"
                                                                data-icon="clock-rotate-left" role="img"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                                data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                                <g transform="translate(256 256)">
                                                                    <g
                                                                        transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                        <path fill="currentColor"
                                                                            d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9V168c0 13.3 10.7 24 24 24H134.1c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24V256c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65V152c0-13.3-10.7-24-24-24z"
                                                                            transform="translate(-256 -256)"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <!-- <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                            MacBook Air - 13″</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr class="my-0">
                                            <h6
                                                class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                                Products</h6>
                                            <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="file-thumbnail me-2"><img
                                                            class="h-100 w-100 object-fit-cover rounded-3"
                                                            src="{{ asset('assets_admin/img/products/60x60/3.png') }}"
                                                            alt=""></div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 text-body-highlight title">MacBook Air - 13″
                                                        </h6>
                                                        <p class="fs-10 mb-0 d-flex text-body-tertiary"><span
                                                                class="fw-medium text-body-tertiary text-opactity-85">8GB
                                                                Memory - 1.6GHz - 128GB Storage</span></p>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item py-2 d-flex align-items-center"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="file-thumbnail me-2"><img class="img-fluid"
                                                            src="{{ asset('assets_admin/img/products/60x60/3.png') }}"
                                                            alt=""></div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 text-body-highlight title">MacBook Pro - 13″
                                                        </h6>
                                                        <p class="fs-10 mb-0 d-flex text-body-tertiary"><span
                                                                class="fw-medium text-body-tertiary text-opactity-85">30
                                                                Sep at 12:30 PM</span></p>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr class="my-0">
                                            <h6
                                                class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                                Quick Links</h6>
                                            <div class="py-2"><a class="dropdown-item"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-normal text-body-highlight title"><svg
                                                                class="svg-inline--fa fa-link text-body"
                                                                data-fa-transform="shrink-2" aria-hidden="true"
                                                                focusable="false" data-prefix="fas" data-icon="link"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 512" data-fa-i2svg=""
                                                                style="transform-origin: 0.625em 0.5em;">
                                                                <g transform="translate(320 256)">
                                                                    <g
                                                                        transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                        <path fill="currentColor"
                                                                            d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"
                                                                            transform="translate(-320 -256)"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <!-- <span class="fa-solid fa-link text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                            Support MacBook House</div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-normal text-body-highlight title"> <svg
                                                                class="svg-inline--fa fa-link text-body"
                                                                data-fa-transform="shrink-2" aria-hidden="true"
                                                                focusable="false" data-prefix="fas" data-icon="link"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 512" data-fa-i2svg=""
                                                                style="transform-origin: 0.625em 0.5em;">
                                                                <g transform="translate(320 256)">
                                                                    <g
                                                                        transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                        <path fill="currentColor"
                                                                            d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z"
                                                                            transform="translate(-320 -256)"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <!-- <span class="fa-solid fa-link text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                            Store MacBook″</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr class="my-0">
                                            <h6
                                                class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                                Files</h6>
                                            <div class="py-2"><a class="dropdown-item"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-normal text-body-highlight title"><svg
                                                                class="svg-inline--fa fa-file-zipper text-body"
                                                                data-fa-transform="shrink-2" aria-hidden="true"
                                                                focusable="false" data-prefix="fas"
                                                                data-icon="file-zipper" role="img"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                                                data-fa-i2svg=""
                                                                style="transform-origin: 0.375em 0.5em;">
                                                                <g transform="translate(192 256)">
                                                                    <g
                                                                        transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                        <path fill="currentColor"
                                                                            d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM96 48c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16zm-6.3 71.8c3.7-14 16.4-23.8 30.9-23.8h14.8c14.5 0 27.2 9.7 30.9 23.8l23.5 88.2c1.4 5.4 2.1 10.9 2.1 16.4c0 35.2-28.8 63.7-64 63.7s-64-28.5-64-63.7c0-5.5 .7-11.1 2.1-16.4l23.5-88.2zM112 336c-8.8 0-16 7.2-16 16s7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16H112z"
                                                                            transform="translate(-192 -256)"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <!-- <span class="fa-solid fa-file-zipper text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                            Library MacBook folder.rar</div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-normal text-body-highlight title"> <svg
                                                                class="svg-inline--fa fa-file-lines text-body"
                                                                data-fa-transform="shrink-2" aria-hidden="true"
                                                                focusable="false" data-prefix="fas"
                                                                data-icon="file-lines" role="img"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"
                                                                data-fa-i2svg=""
                                                                style="transform-origin: 0.375em 0.5em;">
                                                                <g transform="translate(192 256)">
                                                                    <g
                                                                        transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                        <path fill="currentColor"
                                                                            d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"
                                                                            transform="translate(-192 -256)"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <!-- <span class="fa-solid fa-file-lines text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                            Feature MacBook extensions.txt</div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-normal text-body-highlight title"> <svg
                                                                class="svg-inline--fa fa-image text-body"
                                                                data-fa-transform="shrink-2" aria-hidden="true"
                                                                focusable="false" data-prefix="fas" data-icon="image"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512" data-fa-i2svg=""
                                                                style="transform-origin: 0.5em 0.5em;">
                                                                <g transform="translate(256 256)">
                                                                    <g
                                                                        transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                        <path fill="currentColor"
                                                                            d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192a48 48 0 1 0 0-96 48 48 0 1 0 0 96z"
                                                                            transform="translate(-256 -256)"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <!-- <span class="fa-solid fa-image text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                            MacBook Pro_13.jpg</div>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr class="my-0">
                                            <h6
                                                class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                                Members</h6>
                                            <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                                    href="pages/members.html">
                                                    <div class="avatar avatar-l status-online  me-2 text-body">
                                                        <img class="rounded-circle "
                                                            src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                            alt="">
                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 text-body-highlight title">Carry Anna</h6>
                                                        <p class="fs-10 mb-0 d-flex text-body-tertiary">anna@technext.it
                                                        </p>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item py-2 d-flex align-items-center"
                                                    href="pages/members.html">
                                                    <div class="avatar avatar-l  me-2 text-body">
                                                        <img class="rounded-circle "
                                                            src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                            alt="">
                                                    </div>
                                                    <div class="flex-1">
                                                        <h6 class="mb-0 text-body-highlight title">John Smith</h6>
                                                        <p class="fs-10 mb-0 d-flex text-body-tertiary">
                                                            smith@technext.it</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <hr class="my-0">
                                            <h6
                                                class="dropdown-header text-body-highlight fs-9 border-bottom border-translucent py-2 lh-sm">
                                                Related Searches</h6>
                                            <div class="py-2"><a class="dropdown-item"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-normal text-body-highlight title"><svg
                                                                class="svg-inline--fa fa-firefox-browser text-body"
                                                                data-fa-transform="shrink-2" aria-hidden="true"
                                                                focusable="false" data-prefix="fab"
                                                                data-icon="firefox-browser" role="img"
                                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                                data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;">
                                                                <g transform="translate(256 256)">
                                                                    <g
                                                                        transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                        <path fill="currentColor"
                                                                            d="M130.22 127.548C130.38 127.558 130.3 127.558 130.22 127.548V127.548ZM481.64 172.898C471.03 147.398 449.56 119.898 432.7 111.168C446.42 138.058 454.37 165.048 457.4 185.168C457.405 185.306 457.422 185.443 457.45 185.578C429.87 116.828 383.098 89.1089 344.9 28.7479C329.908 5.05792 333.976 3.51792 331.82 4.08792L331.7 4.15792C284.99 30.1109 256.365 82.5289 249.12 126.898C232.503 127.771 216.219 131.895 201.19 139.035C199.838 139.649 198.736 140.706 198.066 142.031C197.396 143.356 197.199 144.87 197.506 146.323C197.7 147.162 198.068 147.951 198.586 148.639C199.103 149.327 199.76 149.899 200.512 150.318C201.264 150.737 202.096 150.993 202.954 151.071C203.811 151.148 204.676 151.045 205.491 150.768L206.011 150.558C221.511 143.255 238.408 139.393 255.541 139.238C318.369 138.669 352.698 183.262 363.161 201.528C350.161 192.378 326.811 183.338 304.341 187.248C392.081 231.108 368.541 381.784 246.951 376.448C187.487 373.838 149.881 325.467 146.421 285.648C146.421 285.648 157.671 243.698 227.041 243.698C234.541 243.698 255.971 222.778 256.371 216.698C256.281 214.698 213.836 197.822 197.281 181.518C188.434 172.805 184.229 168.611 180.511 165.458C178.499 163.75 176.392 162.158 174.201 160.688C168.638 141.231 168.399 120.638 173.51 101.058C148.45 112.468 128.96 130.508 114.8 146.428H114.68C105.01 134.178 105.68 93.7779 106.25 85.3479C106.13 84.8179 99.022 89.0159 98.1 89.6579C89.5342 95.7103 81.5528 102.55 74.26 110.088C57.969 126.688 30.128 160.242 18.76 211.318C14.224 231.701 12 255.739 12 263.618C12 398.318 121.21 507.508 255.92 507.508C376.56 507.508 478.939 420.281 496.35 304.888C507.922 228.192 481.64 173.82 481.64 172.898Z"
                                                                            transform="translate(-256 -256)"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <!-- <span class="fa-brands fa-firefox-browser text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                            Search in the Web MacBook</div>
                                                    </div>
                                                </a>
                                                <a class="dropdown-item"
                                                    href="apps/e-commerce/landing/product-details.html">
                                                    <div class="d-flex align-items-center">
                                                        <div class="fw-normal text-body-highlight title"> <svg
                                                                class="svg-inline--fa fa-chrome text-body"
                                                                data-fa-transform="shrink-2" aria-hidden="true"
                                                                focusable="false" data-prefix="fab" data-icon="chrome"
                                                                role="img" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 512 512" data-fa-i2svg=""
                                                                style="transform-origin: 0.5em 0.5em;">
                                                                <g transform="translate(256 256)">
                                                                    <g
                                                                        transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)">
                                                                        <path fill="currentColor"
                                                                            d="M0 256C0 209.4 12.47 165.6 34.27 127.1L144.1 318.3C166 357.5 207.9 384 256 384C270.3 384 283.1 381.7 296.8 377.4L220.5 509.6C95.9 492.3 0 385.3 0 256zM365.1 321.6C377.4 302.4 384 279.1 384 256C384 217.8 367.2 183.5 340.7 160H493.4C505.4 189.6 512 222.1 512 256C512 397.4 397.4 511.1 256 512L365.1 321.6zM477.8 128H256C193.1 128 142.3 172.1 130.5 230.7L54.19 98.47C101 38.53 174 0 256 0C350.8 0 433.5 51.48 477.8 128V128zM168 256C168 207.4 207.4 168 256 168C304.6 168 344 207.4 344 256C344 304.6 304.6 344 256 344C207.4 344 168 304.6 168 256z"
                                                                            transform="translate(-256 -256)"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <!-- <span class="fa-brands fa-chrome text-body" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com -->
                                                            Store MacBook″</div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <p class="fallback fw-bold fs-7 d-none">No Result Found.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                    </div>
                    <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                    </div>
                    <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                        <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                    </div>
                </div>
            </div>
        </div>
        <ul class="navbar-nav navbar-nav-icons flex-row align-items-center">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" style="min-width: 2.25rem" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span class="d-block"
                        style="height:20px;width:20px;"><svg xmlns="http://www.w3.org/2000/svg" width="16px"
                            height="16px" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"
                            style="height:20px;width:20px;">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg></span></a>
                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h6 class="text-body-emphasis mb-0">Notifications</h6>
                                <button class="btn btn-link p-0 fs-9 fw-normal mark-read" type="button">Mark all as
                                    read</button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="scrollbar-overlay" style="height: 27rem;" data-simplebar="init">
                                <div class="simplebar-wrapper" style="margin: 0px;">
                                    <div class="simplebar-height-auto-observer-wrapper">
                                        <div class="simplebar-height-auto-observer"></div>
                                    </div>
                                    <div class="simplebar-mask">
                                        <div class="simplebar-offset" style="right: 0px; bottom: 0px;">
                                            <div class="simplebar-content-wrapper" tabindex="0" role="region"
                                                aria-label="scrollable content" style="height: auto; overflow: hidden;">
                                                <div class="simplebar-content" style="padding: 0px;">
                                                    <div
                                                        class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                            <div class="d-flex">
                                                                <div class="avatar avatar-m status-online me-3"><img
                                                                        class="rounded-circle"
                                                                        src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                                        alt=""></div>
                                                                <div class="flex-1 me-sm-3">
                                                                    <h4 class="fs-9 text-body-emphasis">Jessie Samson
                                                                    </h4>
                                                                    <p
                                                                        class="fs-9 text-body-highlight mb-2 mb-sm-2 fw-normal">
                                                                        <span class="me-1 fs-10">💬</span>Mentioned you
                                                                        in a comment.<span
                                                                            class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span>
                                                                    </p>
                                                                    <p class="text-body-secondary fs-9 mb-0"><svg
                                                                            class="svg-inline--fa fa-clock me-1"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="clock"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                                            </path>
                                                                        </svg>
                                                                        <!-- <span class="me-1 fas fa-clock"></span> Font Awesome fontawesome.com --><span
                                                                            class="fw-bold">10:41 AM </span>August
                                                                        7,2021</p>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown notification-dropdown"><button
                                                                    class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    data-boundary="window" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    data-bs-reference="parent"><svg
                                                                        class="svg-inline--fa fa-ellipsis fs-10 text-body"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fas" data-icon="ellipsis"
                                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                                        </path>
                                                                    </svg>
                                                                    <!-- <span class="fas fa-ellipsis-h fs-10 text-body"></span> Font Awesome fontawesome.com --></button>
                                                                <div class="dropdown-menu mark-unread py-2"><a
                                                                        class="dropdown-item" href="#!">Mark as
                                                                        unread</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                            <div class="d-flex">
                                                                <div class="avatar avatar-m status-online me-3"><img
                                                                        class="rounded-circle"
                                                                        src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                                        alt=""></div>
                                                                <div class="flex-1 me-sm-3">
                                                                    <h4 class="fs-9 text-body-emphasis">Herman Carter
                                                                    </h4>
                                                                    <p
                                                                        class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal">
                                                                        <span class="me-1 fs-10">👤</span>Tagged you in
                                                                        a comment.<span
                                                                            class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span>
                                                                    </p>
                                                                    <p class="text-body-secondary fs-9 mb-0"><svg
                                                                            class="svg-inline--fa fa-clock me-1"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="clock"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                                            </path>
                                                                        </svg>
                                                                        <!-- <span class="me-1 fas fa-clock"></span> Font Awesome fontawesome.com --><span
                                                                            class="fw-bold">10:58 PM </span>August
                                                                        7,2021</p>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown notification-dropdown"><button
                                                                    class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    data-boundary="window" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    data-bs-reference="parent"><svg
                                                                        class="svg-inline--fa fa-ellipsis fs-10 text-body"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fas" data-icon="ellipsis"
                                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                                        </path>
                                                                    </svg>
                                                                    <!-- <span class="fas fa-ellipsis-h fs-10 text-body"></span> Font Awesome fontawesome.com --></button>
                                                                <div class="dropdown-menu py-2"><a class="dropdown-item"
                                                                        href="#!">Mark as unread</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                            <div class="d-flex">
                                                                <div class="avatar avatar-m status-online me-3"><img
                                                                        class="rounded-circle"
                                                                        src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                                        alt=""></div>
                                                                <div class="flex-1 me-sm-3">
                                                                    <h4 class="fs-9 text-body-emphasis">Benjamin Button
                                                                    </h4>
                                                                    <p
                                                                        class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal">
                                                                        <span class="me-1 fs-10">👍</span>Liked your
                                                                        comment.<span
                                                                            class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span>
                                                                    </p>
                                                                    <p class="text-body-secondary fs-9 mb-0"><svg
                                                                            class="svg-inline--fa fa-clock me-1"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="clock"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                                            </path>
                                                                        </svg>
                                                                        <!-- <span class="me-1 fas fa-clock"></span> Font Awesome fontawesome.com --><span
                                                                            class="fw-bold">10:18 AM </span>August
                                                                        7,2021</p>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown notification-dropdown"><button
                                                                    class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    data-boundary="window" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    data-bs-reference="parent"><svg
                                                                        class="svg-inline--fa fa-ellipsis fs-10 text-body"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fas" data-icon="ellipsis"
                                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                                        </path>
                                                                    </svg>
                                                                    <!-- <span class="fas fa-ellipsis-h fs-10 text-body"></span> Font Awesome fontawesome.com --></button>
                                                                <div class="dropdown-menu py-2"><a class="dropdown-item"
                                                                        href="#!">Mark as unread</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                            <div class="d-flex">
                                                                <div class="avatar avatar-m status-online me-3"><img
                                                                        class="rounded-circle"
                                                                        src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                                        alt=""></div>
                                                                <div class="flex-1 me-sm-3">
                                                                    <h4 class="fs-9 text-body-emphasis">Jessie Samson
                                                                    </h4>
                                                                    <p
                                                                        class="fs-9 text-body-highlight mb-2 mb-sm-2 fw-normal">
                                                                        <span class="me-1 fs-10">💬</span>Mentioned you
                                                                        in a comment.<span
                                                                            class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span>
                                                                    </p>
                                                                    <p class="text-body-secondary fs-9 mb-0"><svg
                                                                            class="svg-inline--fa fa-clock me-1"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="clock"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                                            </path>
                                                                        </svg>
                                                                        <!-- <span class="me-1 fas fa-clock"></span> Font Awesome fontawesome.com --><span
                                                                            class="fw-bold">10:41 AM </span>August
                                                                        7,2021</p>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown notification-dropdown"><button
                                                                    class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    data-boundary="window" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    data-bs-reference="parent"><svg
                                                                        class="svg-inline--fa fa-ellipsis fs-10 text-body"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fas" data-icon="ellipsis"
                                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                                        </path>
                                                                    </svg>
                                                                    <!-- <span class="fas fa-ellipsis-h fs-10 text-body"></span> Font Awesome fontawesome.com --></button>
                                                                <div class="dropdown-menu mark-unread py-2"><a
                                                                        class="dropdown-item" href="#!">Mark as
                                                                        unread</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                            <div class="d-flex">
                                                                <div class="avatar avatar-m status-online me-3"><img
                                                                        class="rounded-circle"
                                                                        src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                                        alt=""></div>
                                                                <div class="flex-1 me-sm-3">
                                                                    <h4 class="fs-9 text-body-emphasis">Jessie Samson
                                                                    </h4>
                                                                    <p
                                                                        class="fs-9 text-body-highlight mb-2 mb-sm-2 fw-normal">
                                                                        <span class="me-1 fs-10">💬</span>Mentioned you
                                                                        in a comment.<span
                                                                            class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span>
                                                                    </p>
                                                                    <p class="text-body-secondary fs-9 mb-0"><svg
                                                                            class="svg-inline--fa fa-clock me-1"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="clock"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                                            </path>
                                                                        </svg>
                                                                        <!-- <span class="me-1 fas fa-clock"></span> Font Awesome fontawesome.com --><span
                                                                            class="fw-bold">10:41 AM </span>August
                                                                        7,2021</p>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown notification-dropdown"><button
                                                                    class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    data-boundary="window" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    data-bs-reference="parent"><svg
                                                                        class="svg-inline--fa fa-ellipsis fs-10 text-body"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fas" data-icon="ellipsis"
                                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                                        </path>
                                                                    </svg>
                                                                    <!-- <span class="fas fa-ellipsis-h fs-10 text-body"></span> Font Awesome fontawesome.com --></button>
                                                                <div class="dropdown-menu mark-unread py-2"><a
                                                                        class="dropdown-item" href="#!">Mark as
                                                                        unread</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="px-2 px-sm-3 py-3 notification-card position-relative read border-bottom">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                            <div class="d-flex">
                                                                <div class="avatar avatar-m status-online me-3"><img
                                                                        class="rounded-circle"
                                                                        src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                                        alt=""></div>
                                                                <div class="flex-1 me-sm-3">
                                                                    <h4 class="fs-9 text-body-emphasis">Jessie Samson
                                                                    </h4>
                                                                    <p
                                                                        class="fs-9 text-body-highlight mb-2 mb-sm-2 fw-normal">
                                                                        <span class="me-1 fs-10">💬</span>Mentioned you
                                                                        in a comment.<span
                                                                            class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span>
                                                                    </p>
                                                                    <p class="text-body-secondary fs-9 mb-0"><svg
                                                                            class="svg-inline--fa fa-clock me-1"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="clock"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                                            </path>
                                                                        </svg>
                                                                        <!-- <span class="me-1 fas fa-clock"></span> Font Awesome fontawesome.com --><span
                                                                            class="fw-bold">10:41 AM </span>August
                                                                        7,2021</p>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown notification-dropdown"><button
                                                                    class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    data-boundary="window" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    data-bs-reference="parent"><svg
                                                                        class="svg-inline--fa fa-ellipsis fs-10 text-body"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fas" data-icon="ellipsis"
                                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                                        </path>
                                                                    </svg>
                                                                    <!-- <span class="fas fa-ellipsis-h fs-10 text-body"></span> Font Awesome fontawesome.com --></button>
                                                                <div class="dropdown-menu mark-unread py-2"><a
                                                                        class="dropdown-item" href="#!">Mark as
                                                                        unread</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="px-2 px-sm-3 py-3 notification-card position-relative unread border-bottom">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                            <div class="d-flex">
                                                                <div class="avatar avatar-m status-online me-3"><img
                                                                        class="rounded-circle"
                                                                        src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                                        alt=""></div>
                                                                <div class="flex-1 me-sm-3">
                                                                    <h4 class="fs-9 text-body-emphasis">Herman Carter
                                                                    </h4>
                                                                    <p
                                                                        class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal">
                                                                        <span class="me-1 fs-10">👤</span>Tagged you in
                                                                        a comment.<span
                                                                            class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span>
                                                                    </p>
                                                                    <p class="text-body-secondary fs-9 mb-0"><svg
                                                                            class="svg-inline--fa fa-clock me-1"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="clock"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                                            </path>
                                                                        </svg>
                                                                        <!-- <span class="me-1 fas fa-clock"></span> Font Awesome fontawesome.com --><span
                                                                            class="fw-bold">10:58 PM </span>August
                                                                        7,2021</p>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown notification-dropdown"><button
                                                                    class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    data-boundary="window" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    data-bs-reference="parent"><svg
                                                                        class="svg-inline--fa fa-ellipsis fs-10 text-body"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fas" data-icon="ellipsis"
                                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                                        </path>
                                                                    </svg>
                                                                    <!-- <span class="fas fa-ellipsis-h fs-10 text-body"></span> Font Awesome fontawesome.com --></button>
                                                                <div class="dropdown-menu py-2"><a class="dropdown-item"
                                                                        href="#!">Mark as unread</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="px-2 px-sm-3 py-3 notification-card position-relative read ">
                                                        <div
                                                            class="d-flex align-items-center justify-content-between position-relative">
                                                            <div class="d-flex">
                                                                <div class="avatar avatar-m status-online me-3"><img
                                                                        class="rounded-circle"
                                                                        src="https://prium.github.io/phoenix/v1.18.0/assets/img/team/40x40/57.webp"
                                                                        alt=""></div>
                                                                <div class="flex-1 me-sm-3">
                                                                    <h4 class="fs-9 text-body-emphasis">Benjamin Button
                                                                    </h4>
                                                                    <p
                                                                        class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal">
                                                                        <span class="me-1 fs-10">👍</span>Liked your
                                                                        comment.<span
                                                                            class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10"></span>
                                                                    </p>
                                                                    <p class="text-body-secondary fs-9 mb-0"><svg
                                                                            class="svg-inline--fa fa-clock me-1"
                                                                            aria-hidden="true" focusable="false"
                                                                            data-prefix="fas" data-icon="clock"
                                                                            role="img"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            viewBox="0 0 512 512" data-fa-i2svg="">
                                                                            <path fill="currentColor"
                                                                                d="M256 0a256 256 0 1 1 0 512A256 256 0 1 1 256 0zM232 120V256c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2V120c0-13.3-10.7-24-24-24s-24 10.7-24 24z">
                                                                            </path>
                                                                        </svg>
                                                                        <!-- <span class="me-1 fas fa-clock"></span> Font Awesome fontawesome.com --><span
                                                                            class="fw-bold">10:18 AM </span>August
                                                                        7,2021</p>
                                                                </div>
                                                            </div>
                                                            <div class="dropdown notification-dropdown"><button
                                                                    class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                                    type="button" data-bs-toggle="dropdown"
                                                                    data-boundary="window" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    data-bs-reference="parent"><svg
                                                                        class="svg-inline--fa fa-ellipsis fs-10 text-body"
                                                                        aria-hidden="true" focusable="false"
                                                                        data-prefix="fas" data-icon="ellipsis"
                                                                        role="img" xmlns="http://www.w3.org/2000/svg"
                                                                        viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor"
                                                                            d="M8 256a56 56 0 1 1 112 0A56 56 0 1 1 8 256zm160 0a56 56 0 1 1 112 0 56 56 0 1 1 -112 0zm216-56a56 56 0 1 1 0 112 56 56 0 1 1 0-112z">
                                                                        </path>
                                                                    </svg>
                                                                    <!-- <span class="fas fa-ellipsis-h fs-10 text-body"></span> Font Awesome fontawesome.com --></button>
                                                                <div class="dropdown-menu py-2"><a class="dropdown-item"
                                                                        href="#!">Mark as unread</a></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="simplebar-placeholder" style="width: 0px; height: 0px;"></div>
                                </div>
                                <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                                </div>
                                <div class="simplebar-track simplebar-vertical" style="visibility: hidden;">
                                    <div class="simplebar-scrollbar" style="height: 0px; display: none;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer p-0 border-top border-translucent border-0">
                            <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85">
                                <a class="fw-bolder notification-history" href="pages/notifications.html">Notification
                                    history</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <img class="rounded-circle " src="{{ asset('assets_admin/images/user-icon.webp') }}" alt="">
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center py-2">
                                <div class="avatar avatar-xl ">
                                    <img class="rounded-circle "
                                        src="{{ asset('assets_admin/images/user-icon-md.jpg') }}" alt="">
                                </div>
                                <h6 class="mt-2 text-body-emphasis">{{ auth()->user()->name }}</h6>
                            </div>
                        </div>
                        <div class="overflow-auto scrollbar">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3 d-block"
                                        href="{{ route('admin.profile') }}"> <svg xmlns="http://www.w3.org/2000/svg"
                                            width="16px" height="16px" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-user me-2 text-body align-bottom">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg><span>Profile</span></a></li>
                                <li class="nav-item"><a class="nav-link px-3 d-block"
                                        href="{{route('admin.dashboard')}}"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16px" height="16px" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="feather feather-pie-chart me-2 text-body align-bottom">
                                            <path d="M21.21 15.89A10 10 0 1 1 8 2.83"></path>
                                            <path d="M22 12A10 10 0 0 0 12 2v10z"></path>
                                        </svg>Dashboard</a></li>
                            </ul>
                        </div>
                        <div class="card-footer p-0 border-top border-translucent">
                            <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                    href="{{route('admin.logout')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-log-out me-2">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>Sign out</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
