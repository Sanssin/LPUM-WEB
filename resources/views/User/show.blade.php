@extends('Template.Dashboard.layouts')

@push('vendorStyle')
    @livewireStyles
@endpush

@section('main')
    <!-- ============================================================= -->
    <!-- Start Page Content -->
    <!-- ============================================================= -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="mt-4">
                        <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('assets/images/default_profile.png') }}"
                            class="rounded-circle object-fit-cover" width="150" height="150" />
                        <h4 class="mt-2">{{ $user->full_name }}</h4>
                        <h6 class="card-subtitle">{{ $user->study_program->study_program_name }}</h6>
                        <h6 class="card-subtitle">{{ $user->nim }}</h6>
                    </center>
                </div>
                <div class="card-body pt-0">
                    <small class="text-muted">Surat Elektronik</small>
                    <h6>{{ $user->email }}</h6>
                    @if ($user->show_phone)
                        <small class="text-muted pt-4 db">No HP</small>
                        <h6>{{ $user->phone }}</h6>
                    @endif
                    @if ($user->show_address)
                        <small class="text-muted pt-4 db">Alamat</small>
                        <h6>{{ $user->address }}</h6>
                    @endif
                    <hr class="text-secondary">
                    @if ($user->show_socmed)
                        <small class="text-muted pt-4 db">Instagram</small>
                        <h6>{{ $user->instagram ?? '-' }}</h6>
                        <small class="text-muted pt-4 db">linkedin</small>
                        <h6>{{ $user->linkedin ?? '-' }}</h6>
                        <small class="text-muted pt-4 db">Twitter</small>
                        <h6>{{ $user->twitter ?? '-' }}</h6>
                    @endif
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card overflow-hidden">
                <!-- Tabs -->
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-profile-tab" data-bs-toggle="pill" href="#last-month"
                            role="tab" aria-controls="pills-profile" aria-selected="false">Detail</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="last-month" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r">
                                    <strong>Nama Lengkap</strong>
                                    <br />
                                    <p class="text-muted">{{ $user->full_name }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r">
                                    <strong>Program Studi</strong>
                                    <br />
                                    <p class="text-muted">{{ $user->study_program->study_program_name }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r">
                                    <strong>Surel</strong>
                                    <br />
                                    <p class="text-muted">{{ $user->email }}</p>
                                </div>
                                <div class="col-md-3 col-xs-6">
                                    <strong>NIM</strong>
                                    <br />
                                    <p class="text-muted">{{ $user->nim }}</p>
                                </div>
                            </div>
                            <hr />
                            <p class="mt-4">
                                {{ $user->description ?? '' }}
                            </p>
                            {{-- <h4 class="font-weight-medium mt-4">Organisasi</h4> --}}
                            {{-- <hr /> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================= -->
    <!-- End PAge Content -->
    <!-- ============================================================= -->
@endsection

@push('vendorScript')
    @livewireScripts
@endpush
