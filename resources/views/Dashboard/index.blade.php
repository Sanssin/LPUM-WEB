@extends('Template.Dashboard.layouts')


@section('main')
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-6">
            <div class="card welcome-card overflow-hidden bg-light-info border-0">
                <div class="card-body">
                    <h3 class="text-primary position-relative">
                        Selamat datang! Segera cek info pemilu
                    </h3>
                    <a href="#" class="btn btn-info mt-3 position-relative">Download</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6 d-flex align-items-stretch">
                    <!-- earnings card -->
                    <div class="card bg-primary w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title text-white">Earnings</h4>
                                <div class="ms-auto">
                                    <span
                                        class="
                              btn btn-lg btn-info btn-circle
                              d-flex
                              align-items-center
                              justify-content-center
                            ">
                                        <i data-feather="dollar-sign"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <h2 class="fs-8 text-white mb-0">$93,438.78</h2>
                                <span class="text-white op-5">Monthly revenue</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-stretch">
                    <!-- monthly sales card -->
                    <div class="card w-100 overflow-hidden">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="fw-normal mb-0 text-muted">
                                        Monthly Sales
                                    </h5>
                                    <h2 class="mb-0">3246</h2>
                                </div>
                                <div class="ms-auto">
                                    <span
                                        class="
                              btn btn-lg btn-warning btn-circle
                              d-flex
                              align-items-center
                              justify-content-center
                            ">
                                        <i data-feather="shopping-bag"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- chart -->
                        <div id="monthly-sales"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h3 class="card-title">Sales Overview</h3>
                            <h6 class="card-subtitle">Ample admin Vs Pixel admin</h6>
                        </div>
                        <div class="ms-auto">
                            <ul class="list-style-none">
                                <li class="list-inline-item text-primary">
                                    <i class="ri-checkbox-blank-circle-fill fs-1 me-1"></i>
                                    Ample
                                </li>
                                <li class="list-inline-item text-info">
                                    <i class="ri-checkbox-blank-circle-fill fs-1 me-1"></i>Pixel Admin
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div id="sales-overview" class="mt-4"></div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center pb-3 border-bottom">
                        <div>
                            <h3 class="card-title">Total Sales</h3>
                            <h6 class="card-subtitle mb-0">Overview of Years</h6>
                        </div>
                        <div class="ms-auto">
                            <select class="form-select theme-select border-0" aria-label="Default select example">
                                <option value="1">March 2023</option>
                                <option value="2">March 2023</option>
                                <option value="3">March 2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mt-4">
                        <h5 class="text-muted fw-normal mb-0">Sales Yearly</h5>
                        <div class="ms-auto">
                            <h2 class="fw-bold mb-0">8,364,398</h2>
                        </div>
                    </div>
                    <div class="position-relative">
                        <div id="total-sales" class="mt-4 pt-2"></div>
                        <i data-feather="shopping-cart" class="total-sales-icon text-muted-lite feather-xl"></i>
                    </div>
                    <ul class="list-style-none d-flex justify-content-between mt-5">
                        <li class="list-inline-item">
                            <i
                                class="
                          ri-checkbox-blank-circle-fill
                          text-info
                          fs-1
                          me-1
                        "></i>
                            2023
                        </li>
                        <li class="list-inline-item">
                            <i
                                class="
                          ri-checkbox-blank-circle-fill
                          text-primary
                          fs-1
                          me-1
                        "></i>2023
                        </li>
                        <li class="list-inline-item">
                            <i
                                class="
                          ri-checkbox-blank-circle-fill
                          text-warning
                          fs-1
                          me-1
                        "></i>2019
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-md-flex align-items-center">
                        <div>
                            <h3 class="card-title">Products Performance</h3>
                            <h6 class="card-subtitle mb-0">
                                Ample Admin Vs Pixel Admin
                            </h6>
                        </div>
                        <div class="ms-auto mt-3 mt-md-0">
                            <select class="form-select theme-select border-0" aria-label="Default select example">
                                <option value="1">March 2023</option>
                                <option value="2">March 2023</option>
                                <option value="3">March 2023</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive mt-4">
                        <table
                            class="
                        table
                        mb-0
                        text-nowrap
                        varient-table
                        align-middle
                        fs-3
                      ">
                            <thead>
                                <tr>
                                    <th scope="col" class="px-0 text-muted">Assigned</th>
                                    <th scope="col" class="px-0 text-muted">Name</th>
                                    <th scope="col" class="px-0 text-muted">Priority</th>
                                    <th scope="col" class="px-0 text-muted text-end">
                                        Budget
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="../../assets/images/users/1.jpg" class="rounded-circle" width="35"
                                                alt="flexy" />
                                            <div class="ms-3">
                                                <h6 class="mb-0 fw-bold">Sunil Joshi</h6>
                                                <span class="text-muted fs-9">Web Designer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-0">Elite Admin</td>
                                    <td class="px-0">
                                        <span class="badge bg-info">Low</span>
                                    </td>
                                    <td class="px-0 text-dark font-weight-medium text-end">
                                        $3.9K
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="../../assets/images/users/2.jpg" class="rounded-circle"
                                                width="35" alt="flexy" />
                                            <div class="ms-3">
                                                <h6 class="mb-0 fw-bold">Andrew McDownland</h6>
                                                <span class="text-muted fs-9">Project Manager</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-0">Real Homes WP Theme</td>
                                    <td class="px-0">
                                        <span class="badge bg-primary">Medium</span>
                                    </td>
                                    <td class="px-0 text-dark font-weight-medium text-end">
                                        $24.5K
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="../../assets/images/users/3.jpg" class="rounded-circle"
                                                width="35" alt="flexy" />
                                            <div class="ms-3">
                                                <h6 class="mb-0 fw-bold">Christopher Jamil</h6>
                                                <span class="text-muted fs-9">SEO Manager</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-0">MedicalPro WP Theme</td>
                                    <td class="px-0">
                                        <span class="badge bg-warning">Hight</span>
                                    </td>
                                    <td class="px-0 text-dark font-weight-medium text-end">
                                        $12.8K
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="../../assets/images/users/4.jpg" class="rounded-circle"
                                                width="35" alt="flexy" />
                                            <div class="ms-3">
                                                <h6 class="mb-0 fw-bold">Nirav Joshi</h6>
                                                <span class="text-muted fs-9">Frontend Engineer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-0">Hosting Press HTML</td>
                                    <td class="px-0">
                                        <span class="badge bg-danger">Low</span>
                                    </td>
                                    <td class="px-0 text-dark font-weight-medium text-end">
                                        $2.4K
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-0">
                                        <div class="d-flex align-items-center">
                                            <img src="../../assets/images/users/5.jpg" class="rounded-circle"
                                                width="35" alt="flexy" />
                                            <div class="ms-3">
                                                <h6 class="mb-0 fw-bold">Micheal Doe</h6>
                                                <span class="text-muted fs-9">Content Writer</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-0">Helping Hands WP Theme</td>
                                    <td class="px-0">
                                        <span class="badge bg-success">Low</span>
                                    </td>
                                    <td class="px-0 text-dark font-weight-medium text-end">
                                        $9.3K
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <img src="../../assets/images/background/blog-bg.jpg" class="card-img-top blog-img" alt="..." />
                <div class="card-body">
                    <div class="d-flex align-items-center text-muted-lite">
                        <i data-feather="clock" class="feather-lg me-1"></i>
                        22 March, 2023
                    </div>
                    <h3 class="card-title mt-4">
                        Super awesome, Angular 12 is coming soon!
                    </h3>
                    <ul class="list-style-none mt-3 pt-1 pb-4">
                        <li class="list-inline-item">
                            <span class="badge bg-primary">Medium</span>
                        </li>
                        <li class="list-inline-item">
                            <span class="badge bg-danger">Low</span>
                        </li>
                    </ul>
                    <div class="border-top pt-4 d-flex align-items-center">
                        <div class="d-flex align-items-center">
                            <a href="#" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="John Deo">
                                <img src="../../assets/images/users/1.jpg" class="rounded-circle" width="35"
                                    alt="flexy" />
                            </a>
                            <a href="#" class="me-1" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Micheal Doe">
                                <img src="../../assets/images/users/2.jpg" class="rounded-circle" width="35"
                                    alt="flexy" />
                            </a>
                            <a href="#"
                                class="
                          me-1
                          round-md
                          rounded-circle
                          d-flex
                          align-items-center
                          justify-content-center
                          bg-light-success
                          text-success
                        "
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Add new"><i data-feather="plus"
                                    class="feather-sm"></i></a>
                        </div>
                        <div class="ms-auto">
                            <a href="javascript:void(0)" class="text-muted-lite">
                                <i data-feather="message-circle" class=""></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100 overflow-hidden">
                <div class="card-body pb-0">
                    <div class="d-flex align-items-start">
                        <div>
                            <h3 class="card-title">Weekly Stats</h3>
                            <h6 class="card-subtitle mb-0">Average sales</h6>
                        </div>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a href="#" class="text-muted-lite" id="year1-dropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i data-feather="more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="year1-dropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 pb-3 d-flex align-items-center">
                        <span class="btn btn-primary btn-circle">
                            <i data-feather="shopping-cart"></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Top Sales</h5>
                            <span class="text-muted fs-9">Johnathan Doe</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light-secondary text-muted">+68%</span>
                        </div>
                    </div>
                    <div class="py-3 d-flex align-items-center">
                        <span class="btn btn-warning btn-circle">
                            <i data-feather="star"></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Best Seller</h5>
                            <span class="text-muted fs-9">MaterialPro Admin</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light-secondary text-muted">+68%</span>
                        </div>
                    </div>
                    <div class="pt-3 d-flex align-items-center">
                        <span class="btn btn-success btn-circle">
                            <i data-feather="message-square"></i>
                        </span>
                        <div class="ms-3">
                            <h5 class="mb-0 fw-bold">Most Commented</h5>
                            <span class="text-muted fs-9">Ample Admin</span>
                        </div>
                        <div class="ms-auto">
                            <span class="badge bg-light-secondary text-muted">+68%</span>
                        </div>
                    </div>
                </div>
                <div id="weekly-stats"></div>
            </div>
        </div>
        <!-- column -->
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div>
                            <h3 class="card-title">Daily Activities</h3>
                            <h6 class="card-subtitle mb-0">Overview of Years</h6>
                        </div>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a href="#" class="text-muted-lite" id="year2-dropdown" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i data-feather="more-horizontal"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="year2-dropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- timeline -->
                    <div class="position-relative mt-5 scrollable" style="height: 300px">
                        <ul class="timeline-widget">
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span
                                    class="
                            timeline-badge
                            me-3
                            badge-primary
                            flex-shrink-0
                          "></span>
                                <div class="timeline-desc fs-3 text-muted mt-n1">
                                    Payment received from John Doe of $385.90
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span class="timeline-badge me-3 badge-info flex-shrink-0"></span>
                                <div class="timeline-desc fs-3 text-dark fw-bold mt-n1">
                                    Project Meeting
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span
                                    class="
                            timeline-badge
                            me-3
                            badge-warning
                            flex-shrink-0
                          "></span>
                                <div class="timeline-desc fs-3 text-dark fw-bold mt-n1">
                                    New Sale recorded
                                    <a href="javascript:void(0)" class="text-info">#ML-3467</a>
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span class="timeline-badge me-3 badge-danger flex-shrink-0"></span>
                                <div class="timeline-desc fs-3 text-muted mt-n1">
                                    Payment was made of $64.95 to Michael Anderson
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span
                                    class="
                            timeline-badge
                            me-3
                            badge-success
                            flex-shrink-0
                          "></span>
                                <div class="timeline-desc fs-3 text-muted mt-n1">
                                    New payment receipt created for Alphanso Golvo
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span
                                    class="
                            timeline-badge
                            me-3
                            badge-primary
                            flex-shrink-0
                          "></span>
                                <div class="timeline-desc fs-3 text-dark fw-bold mt-n1">
                                    New Sale recorded
                                    <a href="javascript:void(0)" class="text-info">#ML-3467</a>
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span class="timeline-badge me-3 badge-info flex-shrink-0"></span>
                                <div class="timeline-desc fs-3 text-dark fw-bold mt-n1">
                                    Project Meeting
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span
                                    class="
                            timeline-badge
                            me-3
                            badge-primary
                            flex-shrink-0
                          "></span>
                                <div class="timeline-desc fs-3 text-muted mt-n1">
                                    Payment received from John Doe of $385.90
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span class="timeline-badge me-3 badge-info flex-shrink-0"></span>
                                <div class="timeline-desc fs-3 text-dark fw-bold mt-n1">
                                    Project Meeting
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span
                                    class="
                            timeline-badge
                            me-3
                            badge-warning
                            flex-shrink-0
                          "></span>
                                <div class="timeline-desc fs-3 text-dark fw-bold mt-n1">
                                    New Sale recorded
                                    <a href="javascript:void(0)" class="text-info">#ML-3467</a>
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span class="timeline-badge me-3 badge-danger flex-shrink-0"></span>
                                <div class="timeline-desc fs-3 text-muted mt-n1">
                                    Payment was made of $64.95 to Michael Anderson
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span
                                    class="
                            timeline-badge
                            me-3
                            badge-success
                            flex-shrink-0
                          "></span>
                                <div class="timeline-desc fs-3 text-muted mt-n1">
                                    New payment receipt created for Alphanso Golvo
                                </div>
                            </li>
                            <li class="timeline-item mb-4">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span
                                    class="
                            timeline-badge
                            me-3
                            badge-primary
                            flex-shrink-0
                          "></span>
                                <div class="timeline-desc fs-3 text-dark fw-bold mt-n1">
                                    New Sale recorded
                                    <a href="javascript:void(0)" class="text-info">#ML-3467</a>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-time fw-bold text-dark fs-2 mt-n1">
                                    09.46
                                </div>
                                <span class="timeline-badge me-3 badge-info flex-shrink-0"></span>
                                <div class="timeline-desc fs-3 text-dark fw-bold mt-n1">
                                    Project Meeting
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Row -->
@endsection
