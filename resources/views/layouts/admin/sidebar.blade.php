<style>
    .nav-link.active {
        background-color: rgb(202, 206, 218);
        /* or any color */
        color: #fff;
    }
</style>

<div class="sidebar border-end d-lg-block d-none">
    <div>
        <ul class="nav flex-column">
            <div class="dashboard">
                <li class="nav-item ">
                    <a href="{{url('admin/dashboard')}}"
                        class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                        href="#" id="dashboard-link">

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
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M16 17v2H2v-2s0-4 7-4s7 4 7 4m-3.5-9.5A3.5 3.5 0 1 0 9 11a3.5 3.5 0 0 0 3.5-3.5m3.44 5.5A5.32 5.32 0 0 1 18 17v2h4v-2s0-3.63-6.06-4M15 4a3.4 3.4 0 0 0-1.93.59a5 5 0 0 1 0 5.82A3.4 3.4 0 0 0 15 11a3.5 3.5 0 0 0 0-7" />
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
                                href="#" id="admin-link">
                                <span>Admin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.listing')}}"
                                class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5"
                                href="#" id="user-link">
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
                <a href="{{ route('admin.site.settings') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.site.settings') ? 'active' : '' }}"
                    role="button" onclick="handleNavClick(this)">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        {{-- <span class="dropdown-indicator-icon-wrapper">
                            <svg class="svg-inline--fa fa-caret-right dropdown-indicator-icon" aria-hidden="true"
                                focusable="false" data-prefix="fas" data-icon="caret-right" role="img"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M246.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-9.2-9.2-22.9-11.9-34.9-6.9s-19.8 16.6-19.8 29.6l0 256c0 12.9 7.8 24.6 19.8 29.6s25.7 2.2 34.9-6.9l128-128z">
                                </path>
                            </svg>
                        </span> --}}
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m10.135 21l-.362-2.892q-.479-.145-1.035-.454q-.557-.31-.947-.664l-2.668 1.135l-1.865-3.25l2.306-1.739q-.045-.27-.073-.558q-.03-.288-.03-.559q0-.252.03-.53q.028-.278.073-.626L3.258 9.126l1.865-3.212L7.771 7.03q.448-.373.97-.673q.52-.3 1.013-.464L10.134 3h3.732l.361 2.912q.575.202 1.016.463t.909.654l2.725-1.115l1.865 3.211l-2.382 1.796q.082.31.092.569t.01.51q0 .233-.02.491q-.019.259-.088.626l2.344 1.758l-1.865 3.25l-2.681-1.154q-.467.393-.94.673t-.985.445L13.866 21zm1.838-6.5q1.046 0 1.773-.727T14.473 12t-.727-1.773t-1.773-.727q-1.052 0-1.776.727T9.473 12t.724 1.773t1.776.727" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Site Settings</span>
                    </div>
                </a>
                <div class="collapse sidebar-inner-content" id="sidebar-faq">
                    <ul class="nav flex-column mx-3">
                        <li class="nav-item">
                            <a href="{{route('admin.site.settings')}}"
                                class="d-flex align-items-center justify-content-start text-start nav-link sidebar-sub-links-bg rounded-2 px-5 {{ request()->routeIs('admin.site.settings') ? 'active' : '' }}"
                                href="#">
                                <span>General Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.category.get')}}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.category.get') ? 'active' : '' }}"
                    role="button" onclick="handleNavClick(this)">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2">
                                    <circle cx="17" cy="7" r="3" />
                                    <circle cx="7" cy="17" r="3" />
                                    <path
                                        d="M14 14h6v5a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zM4 4h6v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1z" />
                                </g>
                            </svg>
                        </div>
                        <span class="nav-link-text">Category</span>
                    </div>
                </a>
            </li>
            {{-- --- --}}


            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.products.index') ? 'active' : '' }}"
                    role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="1.5"
                                    d="M6 4a2 2 0 1 1-4 0a2 2 0 0 1 4 0m16 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0m0 16a2 2 0 1 1-4 0a2 2 0 0 1 4 0M6 20a2 2 0 1 1-4 0a2 2 0 0 1 4 0M16.5 9c0-.466 0-.699-.076-.883a1 1 0 0 0-.541-.54C15.699 7.5 15.466 7.5 15 7.5H9c-.466 0-.699 0-.883.076a1 1 0 0 0-.54.541C7.5 8.301 7.5 8.534 7.5 9s0 .699.076.883a1 1 0 0 0 .541.54c.184.077.417.077.883.077h6c.466 0 .699 0 .883-.076a1 1 0 0 0 .54-.541c.077-.184.077-.417.077-.883m0 6c0-.466 0-.699-.076-.883a1 1 0 0 0-.541-.54c-.184-.077-.417-.077-.883-.077H9c-.466 0-.699 0-.883.076a1 1 0 0 0-.54.541c-.077.184-.077.417-.077.883s0 .699.076.883a1 1 0 0 0 .541.54c.184.077.417.077.883.077h6c.466 0 .699 0 .883-.076a1 1 0 0 0 .54-.541c.077-.184.077-.417.077-.883"
                                    color="currentColor" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Products</span>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.order') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.order') ? 'active' : '' }}"
                    role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                    d="M24 21v2h1.748A11.96 11.96 0 0 1 16 28C9.383 28 4 22.617 4 16H2c0 7.72 6.28 14 14 14c4.355 0 8.374-2.001 11-5.345V26h2v-5z" />
                                <path fill="currentColor"
                                    d="m22.505 11.637l-5.989-3.5a1 1 0 0 0-1.008-.001l-6.011 3.5A1 1 0 0 0 9 12.5v7a1 1 0 0 0 .497.864l6.011 3.5A.96.96 0 0 0 16 24c.174 0 .36-.045.516-.137l5.989-3.5A1 1 0 0 0 23 19.5v-7a1 1 0 0 0-.495-.863m-6.494-1.48l4.007 2.343l-4.007 2.342l-4.023-2.342zM11 14.24l4 2.33v4.685l-4-2.33zm6 7.025v-4.683l4-2.338v4.683z" />
                                <path fill="currentColor"
                                    d="M16 2A13.95 13.95 0 0 0 5 7.345V6H3v5h5V9H6.252A11.96 11.96 0 0 1 16 4c6.617 0 12 5.383 12 12h2c0-7.72-6.28-14-14-14" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Order</span>
                    </div>
                </a>
            </li>

            {{-- ---- --}}


            <li class="nav-item">
                <a href="{{ route('admin.refund') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.refund') ? 'active' : '' }}"
                    role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M5 2a2 2 0 0 0-2 2v14l3.5-2l3.5 2l3.5-2l3.5 2V4a2 2 0 0 0-2-2zm4.707 3.707a1 1 0 0 0-1.414-1.414l-3 3a1 1 0 0 0 0 1.414l3 3a1 1 0 0 0 1.414-1.414L8.414 9H10a3 3 0 0 1 3 3v1a1 1 0 1 0 2 0v-1a5 5 0 0 0-5-5H8.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Refund</span>
                    </div>
                </a>
            </li>
            {{-- ____ --}}
            <li class="nav-item">
                <a href="{{ route('admin.contactus.index') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.contactus.index') ? 'active' : '' }}"
                    role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M2 3h22v11h-2V5H2v14h12v2H0V3zm8 4H6v4h4zm-6 6h8v4H4zm16-6h-6v2h6zm-6 4h6v2h-6zm3 4h-3v2h3zm4 6v3h-2v-3h-3v-2h3v-3h2v3h3v2z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Contact us</span>
                    </div>
                </a>
            </li>
            {{-- ___ --}}

            <li class="nav-item">
                <a href="{{ route('admin.newsletter.index') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.newsletter.index') ? 'active' : '' }}"
                    role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M3 3a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1zm3 4h6v6H6zm2 2v2h2V9zm10 0h-4V7h4zm-4 4v-2h4v2zm-8 4v-2h12v2z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">NewsLetter</span>
                    </div>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.testimonials') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.testimonials') ? 'active' : '' }}"
                    role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 20 20">
                                <path fill="currentColor"
                                    d="M4 3h12c.55 0 1.02.2 1.41.59S18 4.45 18 5v7c0 .55-.2 1.02-.59 1.41S16.55 14 16 14h-1l-5 5v-5H4c-.55 0-1.02-.2-1.41-.59S2 12.55 2 12V5c0-.55.2-1.02.59-1.41S3.45 3 4 3m11 2H4v1h11zm1 3H4v1h12zm-3 3H4v1h9z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Testimonials</span>
                    </div>
                </a>
            </li>

            {{-- ___ --}}
            <li class="nav-item">
                <a href="{{ route('admin.paymentIndex') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.paymentIndex') ? 'active' : '' }}"
                    role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M12 2.75a9.25 9.25 0 1 0 0 18.5a9.25 9.25 0 0 0 0-18.5M1.25 12C1.25 6.063 6.063 1.25 12 1.25S22.75 6.063 22.75 12S17.937 22.75 12 22.75S1.25 17.937 1.25 12M12 5.25a.75.75 0 0 1 .75.75v.317c1.63.292 3 1.517 3 3.183a.75.75 0 0 1-1.5 0c0-.678-.564-1.397-1.5-1.653v3.47c1.63.292 3 1.517 3 3.183s-1.37 2.891-3 3.183V18a.75.75 0 0 1-1.5 0v-.317c-1.63-.292-3-1.517-3-3.183a.75.75 0 0 1 1.5 0c0 .678.564 1.397 1.5 1.652v-3.469c-1.63-.292-3-1.517-3-3.183s1.37-2.891 3-3.183V6a.75.75 0 0 1 .75-.75m-.75 2.597c-.936.256-1.5.975-1.5 1.653s.564 1.397 1.5 1.652zm1.5 5v3.306c.936-.256 1.5-.974 1.5-1.653c0-.678-.564-1.397-1.5-1.652"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Payments</span>
                    </div>
                </a>
            </li>
            {{-- ____ --}}
            <li class="nav-item">
                <a href="{{ route('admin.enquiryIndex') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.enquiryIndex') ? 'active' : '' }}"
                    role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 36 36">
                                <path fill="currentColor"
                                    d="M8 19v-8H5a3 3 0 0 0-3 3v18a1 1 0 0 0 .56.89a1 1 0 0 0 1-.1L8.71 29h13.44A2.77 2.77 0 0 0 25 26.13V25H14a6 6 0 0 1-6-6"
                                    class="clr-i-solid clr-i-solid-path-1" />
                                <path fill="currentColor"
                                    d="M31 4H14a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h13.55l4.78 3.71a1 1 0 0 0 1 .11a1 1 0 0 0 .57-.9V7A3 3 0 0 0 31 4"
                                    class="clr-i-solid clr-i-solid-path-2" />
                                <path fill="none" d="M0 0h36v36H0z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Enquiries</span>
                    </div>
                </a>
            </li>
            {{-- ___ --}}

            <li class="nav-item">
                <a href="{{ route('admin.reviewsIndex') }}"
                    class="nav-link main-links-for-submenu {{ request()->routeIs('admin.reviewsIndex') ? 'active' : '' }}"
                    role="button">
                    <div class="sidebar-links-bg rounded-2 d-flex align-items-center py-1 px-3">
                        <div class="nav-link-icon px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M2 22V4q0-.825.588-1.412T4 2h16q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18H6zm7.075-7.75L12 12.475l2.925 1.775l-.775-3.325l2.6-2.25l-3.425-.275L12 5.25L10.675 8.4l-3.425.275l2.6 2.25z" />
                            </svg>
                        </div>
                        <span class="nav-link-text">Reviews & Ratings</span>
                    </div>
                </a>
            </li>
            {{-- _____ --}}

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

<script>
    document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll('.nav-link');
    const localStorageKey = 'activeSidebarLink';

    // Highlight the active link based on localStorage data
    const activeLinkId = localStorage.getItem(localStorageKey);

    if (activeLinkId) {
        const activeLink = document.getElementById(activeLinkId);
        if (activeLink) {
            activeLink.classList.add('active');
            // Open the parent collapse if it's part of a dropdown
            const collapseElement = activeLink.closest('.collapse');
            if (collapseElement) {
                const collapseInstance = new bootstrap.Collapse(collapseElement, { toggle: false });
                collapseInstance.show();
            }
        }
    }

    // Add event listeners to each link to handle clicks
    navLinks.forEach((link) => {
        link.addEventListener("click", function (event) {
            // Remove 'active' from all links and add it to the clicked link
            navLinks.forEach((lnk) => lnk.classList.remove("active"));
            this.classList.add("active");

            // Store the active link ID in localStorage
            localStorage.setItem(localStorageKey, this.id);

            // Check if the clicked link has a collapse toggle, prevent default to reload if needed
            if (!this.getAttribute('data-bs-toggle')) {
                event.preventDefault();
                location.href = this.href; // Redirect to trigger page reload
            }
        });
    });
});
</script>
