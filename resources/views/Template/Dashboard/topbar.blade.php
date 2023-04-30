<!-- ============================================================== -->
<!-- Topbar header - style you can find in pages.scss -->
<!-- ============================================================== -->
<header class="topbar">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                    class="ri-close-line mdi mdi-menu fs-6"></i></a>

            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="{{ route('pagu') }}">
                {{-- Loog icon --}}
                <b class="logo-icon">
                    <img src="{{ asset('assets/images/logo-lpum.png') }}" style="max-width: 25px" alt="homepage"
                        class="dark-logo" />
                </b>

                <!-- Logo text -->
                <span class="logo-text">
                    <img style="max-height: 35px" src="{{ asset('assets/images/logo-text-lpum.png') }}" alt="homepage"
                        class="dark-logo" />
                </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="mdi mdi-menu fs-6"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->

        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav me-auto">
                <!-- This is  -->
                <li class="nav-item">
                    <a class="nav-link sidebartoggler d-none d-md-block" href="javascript:void(0)"><i
                            data-feather="menu"></i></a>
                </li>
                <!-- search -->
                <li class="nav-item search-box">
                    <a class="nav-link" href="javascript:void(0)">
                        <i data-feather="search"></i>
                    </a>
                    <form class="app-search position-absolute">
                        <input type="text" class="form-control border-0" placeholder="Search &amp; enter" />
                        <a class="srh-btn"><i data-feather="x-circle" class="feather-sm text-muted"></i></a>
                    </form>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link nav-sidebar" href="javascript:void(0)">
                        <i data-feather="shopping-cart"></i>
                    </a>
                </li>
                <!-- ============================================================== -->
                <!-- Messages -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="2" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i data-feather="message-square"></i>
                        <div class="notify">
                            <span class="point bg-warning"></span>
                        </div>
                    </a>
                    <div class="
                    dropdown-menu
                    mailbox
                    dropdown-menu-end dropdown-menu-animate-up
                  "
                        aria-labelledby="2">
                        <ul class="list-style-none">
                            <li>
                                <div class="rounded-top p-30 pb-2 d-flex align-items-center">
                                    <h3 class="card-title mb-0">Messages</h3>
                                    <span class="badge bg-primary ms-3">5 new</span>
                                </div>
                            </li>
                            <li class="p-30 pt-0">
                                <div class="message-center message-body position-relative">
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                        <span class="user-img position-relative d-inline-block">
                                            <img src="../../assets/images/users/1.jpg" alt="user"
                                                class="rounded-circle w-100" />
                                            <span class="profile-status rounded-circle online"></span>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5 class="message-title mb-0 mt-1 fs-4 font-weight-medium">
                                                Roman Joined the Team!
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Congratulate
                                                him</span>
                                            <span
                                                class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                        <span class="user-img position-relative d-inline-block">
                                            <img src="../../assets/images/users/2.jpg" alt="user"
                                                class="rounded-circle w-100" />
                                            <span class="profile-status rounded-circle busy"></span>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5
                                                class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                New message received
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Salma
                                                sent you new message</span>
                                            <span
                                                class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                        <span class="user-img position-relative d-inline-block">
                                            <img src="../../assets/images/users/4.jpg" alt="user"
                                                class="rounded-circle w-100" />
                                            <span class="profile-status rounded-circle busy"></span>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5
                                                class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                New Payment received
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Check
                                                your earnings</span>
                                            <span
                                                class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
                                        <span class="user-img position-relative d-inline-block">
                                            <img src="../../assets/images/users/5.jpg" alt="user"
                                                class="rounded-circle w-100" />
                                            <span class="profile-status rounded-circle away"></span>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5
                                                class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                Jolly completed tasks
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Assign
                                                her new tasks</span>
                                            <span
                                                class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                AM</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
                                        <span class="user-img position-relative d-inline-block">
                                            <img src="../../assets/images/users/1.jpg" alt="user"
                                                class="rounded-circle w-100" />
                                            <span class="profile-status rounded-circle online"></span>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5
                                                class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                Payment deducted
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">$230
                                                deducted from account</span>
                                            <span
                                                class="
                                fs-2
                                text-nowrap
                                d-block
                                subtext
                                text-muted
                              ">9:08
                                                AM</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="mt-4">
                                    <a class="btn btn-info text-white" href="javascript:void(0);">
                                        See all messages
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Messages -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell"></i>
                        <div class="notify">
                            <span class="point bg-primary"></span>
                        </div>
                    </a>
                    <div
                        class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    dropdown-menu-animate-up
                  ">
                        <ul class="list-style-none">
                            <li>
                                <div class="rounded-top p-30 pb-2 d-flex align-items-center">
                                    <h3 class="card-title mb-0">Notifications</h3>
                                    <span class="badge bg-warning ms-3">5 new</span>
                                </div>
                            </li>
                            <li class="p-30 pt-0">
                                <div class="message-center message-body position-relative">
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                        <span class="user-img position-relative d-inline-block">
                                            <img src="../../assets/images/users/1.jpg" alt="user"
                                                class="rounded-circle w-100" /></span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5
                                                class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                Roman Joined the Team!
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Congratulate
                                                him</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                        <span class="user-img position-relative d-inline-block">
                                            <img src="../../assets/images/users/2.jpg" alt="user"
                                                class="rounded-circle w-100" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5
                                                class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                New message received
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Salma
                                                sent you new message</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            border-bottom
                            py-3
                          ">
                                        <span class="btn btn-light-info text-info btn-circle">
                                            <i data-feather="dollar-sign" class="feather-sm fill-white"></i>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5
                                                class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                New Payment received
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Check
                                                your earnings</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
                                        <span class="user-img position-relative d-inline-block">
                                            <img src="../../assets/images/users/4.jpg" alt="user"
                                                class="rounded-circle w-100" />
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5
                                                class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                Jolly completed tasks
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">Assign
                                                her new tasks</span>
                                        </div>
                                    </a>
                                    <!-- Message -->
                                    <a href="javascript:void(0)"
                                        class="
                            message-item
                            px-2
                            d-flex
                            align-items-center
                            py-3
                          ">
                                        <span class="btn btn-light-danger text-danger btn-circle">
                                            <i data-feather="credit-card" class="feather-sm fill-white"></i>
                                        </span>
                                        <div class="w-75 d-inline-block v-middle ps-3 ms-1">
                                            <h5
                                                class="
                                message-title
                                mb-0
                                mt-1
                                fs-4
                                font-weight-medium
                              ">
                                                Payment deducted
                                            </h5>
                                            <span
                                                class="
                                fs-3
                                text-nowrap
                                d-block
                                time
                                text-truncate
                                fw-normal
                                mt-1
                                text-muted
                              ">$230
                                                deducted from account</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="mt-4">
                                    <a class="btn btn-info text-white" href="javascript:void(0);">
                                        See all notifications
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown profile-dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/images/default_profile.png') }}" alt="user" width="30"
                            class="profile-pic rounded-circle" />
                        <div class="d-none d-md-flex">
                            <span class="ms-2">Hai,
                                <span class="text-dark fw-bold">{{ auth()->user()->first_name }}</span></span>
                            <span>
                                <i data-feather="chevron-down" class="feather-sm"></i>
                            </span>
                        </div>
                    </a>
                    <div
                        class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    dropdown-menu-animate-up
                  ">
                        <ul class="list-style-none">
                            <li class="p-30 pb-2">
                                <div class="rounded-top d-flex align-items-center">
                                    <h3 class="card-title mb-0">Profil Kamu</h3>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0)" class="link py-0">
                                            <i data-feather="x-circle"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center mt-4 pt-3 pb-4 border-bottom">
                                    <img src="{{ asset('assets/images/default_profile.png') }}" alt="user"
                                        width="90" class="rounded-circle" />
                                    <div class="ms-4">
                                        <h4 class="mb-0">
                                            {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h4>
                                        <span class="text-muted">Administrator</span>
                                        <p class="text-muted mb-0 mt-1">
                                            <i data-feather="mail" class="feather-sm me-1"></i>
                                            {{ auth()->user()->email }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="p-30 pt-0">
                                <div class="message-center message-body position-relative" style="height: 150px">

                                    <div class="mt-1">
                                        <a href="{{ route('profile') }}"
                                            class="text-dark fs-3 font-weight-medium hover-primary">
                                            Pengaturan Akun
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="text-dark fs-3 font-weight-medium hover-primary">
                                            Bantuan
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="text-dark fs-3 font-weight-medium hover-primary">
                                            Kontak LPUM
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-0 d-flex justify-content-center">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-info text-white"><i
                                                class="fas fa-solid fa-right-from-bracket"></i>
                                            Logout!</button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<!-- ============================================================= -->
<!-- End Topbar header -->
<!-- ============================================================= -->
