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
                    <img src="{{ asset('assets/logo/Logo-lpum.png') }}" style="max-width: 25px" alt="homepage"
                        class="dark-logo" />
                </b>

                <!-- Logo text -->
                <span class="logo-text">
                    <img style="max-height: 35px" src="{{ asset('assets/logo/logo-text-lpum.png') }}" alt="homepage"
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
                    class="mdi mdi-account-circle fs-6"></i></a>
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

            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">

                <!-- ============================================================== -->
                <!-- Comment -->
                <!-- ============================================================== -->
                {{-- Dihilanhkan --}}
                <!-- ============================================================== -->
                <!-- End Comment -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- Profile -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown profile-dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('assets/images/default_profile.png') }}"
                            alt="user" width="30" class="profile-pic rounded-circle object-fit-cover" />
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
                                    <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('assets/images/default_profile.png') }}"
                                        alt="user" width="90" class="rounded-circle object-fit-cover" />
                                    <div class="ms-4">
                                        <h4 class="mb-0">
                                            {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</h4>
                                        @role('Admin')
                                            <span class="text-muted">Administrator</span>
                                        @endrole
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
                                        <a href="{{ route('contact') }}"
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
