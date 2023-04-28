@extends('Template.Dashboard.layouts')

@section('main')
    <!-- ============================================================= -->
    <!-- Start Page Content -->
    <!-- ============================================================= -->
    <div class="row el-element-overlay">
        <div class="col-md-12">
            <h4>Ormawa</h4>
            <h6 class="card-subtitle mb-3 text-muted">
                Besar
            </h6>
        </div>
        @for ($i = 0; $i < 4; $i++)
            <div class="col-lg-3 col-md-6">
                <div class="card overflow-hidden">
                    <div class="el-card-item pb-3">
                        <div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center">
                            <img src="{{ asset('assets/images/default_profile.png') }}" alt="user"
                                class="d-block position-relative w-100" />

                            <div class="el-overlay w-100 overflow-hidden">
                                <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                    <li class="el-item d-inline-block my-0 mx-1">
                                        <a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white"
                                            href="{{ asset('assets/images/default_profile.png') }}"><i
                                                class="mdi mdi-cog fs-6"></i></a>
                                    </li>
                                    <li class="el-item d-inline-block my-0 mx-1">
                                        <a class="btn default btn-outline el-link text-white border-white"
                                            href="javascript:void(0);"><i class="mdi mdi-link fs-6"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="el-card-content text-center">
                            <h4 class="mb-0">BEM</h4>
                            <span class="text-muted">Badan Eksekutif Mahasiswa</span>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <div class="row el-element-overlay">
        <div class="col-md-12">
            <h4>HIMA</h4>
            <h6 class="card-subtitle mb-3 text-muted">
                Himpunan Mahasiswa
            </h6>
        </div>
        @for ($i = 0; $i < 4; $i++)
            <div class="col-lg-3 col-md-6">
                <div class="card overflow-hidden">
                    <div class="el-card-item pb-3">
                        <div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center">
                            <img src="{{ asset('assets/images/default_profile.png') }}" alt="user"
                                class="d-block position-relative w-100" />

                            <div class="el-overlay w-100 overflow-hidden">
                                <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                    <li class="el-item d-inline-block my-0 mx-1">
                                        <a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white"
                                            href="{{ asset('assets/images/default_profile.png') }}"><i
                                                class="mdi mdi-cog fs-6"></i></a>
                                    </li>
                                    <li class="el-item d-inline-block my-0 mx-1">
                                        <a class="btn default btn-outline el-link text-white border-white"
                                            href="javascript:void(0);"><i class="mdi mdi-link fs-6"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="el-card-content text-center">
                            <h4 class="mb-0">BEM</h4>
                            <span class="text-muted">Badan Eksekutif Mahasiswa</span>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <div class="row el-element-overlay">
        <div class="col-md-12">
            <h4>Ormawa</h4>
            <h6 class="card-subtitle mb-3 text-muted">
                Besar
            </h6>
        </div>
        @for ($i = 0; $i < 17; $i++)
            <div class="col-lg-3 col-md-6">
                <div class="card overflow-hidden">
                    <div class="el-card-item pb-3">
                        <div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center">
                            <img src="{{ asset('assets/images/default_profile.png') }}" alt="user"
                                class="d-block position-relative w-100" />

                            <div class="el-overlay w-100 overflow-hidden">
                                <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                    <li class="el-item d-inline-block my-0 mx-1">
                                        <a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white"
                                            href="{{ asset('assets/images/default_profile.png') }}"><i
                                                class="mdi mdi-cog fs-6"></i></a>
                                    </li>
                                    <li class="el-item d-inline-block my-0 mx-1">
                                        <a class="btn default btn-outline el-link text-white border-white"
                                            href="javascript:void(0);"><i class="mdi mdi-link fs-6"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="el-card-content text-center">
                            <h4 class="mb-0">BEM</h4>
                            <span class="text-muted">Badan Eksekutif Mahasiswa</span>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <!-- ============================================================= -->
    <!-- End PAge Content -->
    <!-- ============================================================= -->
@endsection
