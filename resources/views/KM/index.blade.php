@extends('Template.Dashboard.layouts')

@section('main')
    <!-- ============================================================= -->
    <!-- Start Page Content -->
    <!-- ============================================================= -->
    <div class="row el-element-overlay">
        <div class="col-md-12">
            <h4>Ormawa</h4>
            <h6 class="card-subtitle mb-3 text-muted">
                Organisasi Mahasiswa
            </h6>
        </div>
        <div class="mb-2">
            <p class="d-inline">Pilih angkatan</p>
            <form action="" method="get">
                @foreach ($periods as $period)
                    <button type="submit" name="period" value="{{ $period }}"
                        class="btn btn-light-primary  text-primary font-weight-medium">
                        {{ $period }}
                    </button>
                @endforeach
            </form>
        </div>
        @foreach ($organizations as $org)
            <div class="col-lg-3 col-md-6">
                <div class="card overflow-hidden">
                    <div class="el-card-item pb-3">
                        <div class="el-card-avatar mb-3 el-overlay-1 w-100 overflow-hidden position-relative text-center">
                            <img src="{{ $org->organization_image ? asset('storage/' . $org->organization_image) : asset('assets/images/default_profile.png') }}"
                                alt="{{ $org->organization_name }}" class="d-block position-relative w-100" />
                            <div class="el-overlay w-100 overflow-hidden">
                                <ul class="list-style-none el-info text-white text-uppercase d-inline-block p-0">
                                    <li class="el-item d-inline-block my-0 mx-1">
                                        <a class="btn default btn-outline image-popup-vertical-fit el-link text-white border-white"
                                            href="{{ asset('storage/' . $org->organization_image) }}"><i
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
                            <h4 class="mb-0">{{ $org->organization_name }}</h4>
                            <span class="text-muted">{{ $org->organization_full_name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- ============================================================= -->
    <!-- End PAge Content -->
    <!-- ============================================================= -->
@endsection
