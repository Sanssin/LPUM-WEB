<!-- ============================================================= -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================= -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="nav-small-line"></i>
                    <span class="hide-menu">Pagu</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('pagu') }}"
                        aria-expanded="false">
                        <i data-feather="pie-chart"></i><span class="hide-menu">Utama</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index2.html"
                        aria-expanded="false">
                        <i data-feather="shopping-bag"></i><span class="hide-menu">Profil</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)"
                        aria-expanded="false"><i class="mdi mdi-security"></i><span class="hide-menu">Menu Admin
                        </span></a>
                    <ul aria-expanded="false" class="collapse first-level">
                        <li class="sidebar-item">
                            <a href="{{ route('admin.manageUser') }}" class="sidebar-link"><i
                                    class="mdi mdi-table-account"></i><span class="hide-menu"> Kelola User</span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inbox-email-detail.html" class="sidebar-link"><i
                                    class="mdi mdi-account-group-outline"></i><span class="hide-menu"> Kelola Organisasi
                                </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a href="inbox-email-detail.html" class="sidebar-link"><i
                                    class="mdi mdi-account-group-outline"></i><span class="hide-menu"> Kelola Postingan
                                </span></a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="app-calendar.html"><i class="mdi mdi-vote"></i><span
                                    class="hide-menu text-primary font-weight-medium">Kelola
                                    pemilu </span></a>
                        </li>
                    </ul>
                </li>

                <li class="nav-small-cap">
                    <i class="nav-small-line"></i>
                    <span class="hide-menu">Pemilu</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('election.coblos') }}"
                        aria-expanded="false"><i data-feather="calendar"></i><span class="hide-menu">Coblosan</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('election.result.index') }}" aria-expanded="false"><i
                            data-feather="message-circle"></i><span class="hide-menu">Hasil
                            Pemilu</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('election.index') }}"
                        aria-expanded="false"><i data-feather="phone"></i><span class="hide-menu">Semua
                            Pemilu</span></a>
                </li>
                <li class="nav-small-cap">
                    <i class="nav-small-line"></i>
                    <span class="hide-menu">Penting</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-invoice.html"
                        aria-expanded="false"><i data-feather="file-text"></i><span
                            class="hide-menu">Postingan</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-notes.html"
                        aria-expanded="false"><i data-feather="copy"></i><span class="hide-menu">Info KM</span></a>
                </li>

                <li class="nav-small-cap">
                    <i class="nav-small-line"></i>
                    <span class="hide-menu">Lainnya</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-todo.html"
                        aria-expanded="false"><i data-feather="trello"></i><span class="hide-menu">Bantuan</span></a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="app-taskboard.html"
                        aria-expanded="false"><i data-feather="check-square"></i><span class="hide-menu">Kontak
                            Kami</span></a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
