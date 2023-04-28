@extends('Template.Dashboard.layouts')

@section('main')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="mb-0 text-white">Pilih Pemilu</h3>
                </div>
                <div class="card-body">
                    <p><span class="mdi mdi-information"></span> Klik pada judul pemilu.</p>
                    <h4 class="text-muted">Pemilu terbaru</h4>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="p-3 d-flex align-items-stretch h-100">
                                    <div class="row">
                                        <div class="col-4 col-xl-2 col-md-3 d-flex align-items-center">
                                            <img src="{{ asset('assets/images/naruto-sasuke.jpg') }}"
                                                class="rounded img-fluid">
                                        </div>
                                        <div class="col-8 col-xl-10 col-md-9 d-flex align-items-center">
                                            <div>
                                                <a href="javascript:void(0)"
                                                    class="font-weight-medium fs-4 link lh-sm">Pemilihan Ketua POSTER
                                                    2023</a>
                                                <h6 class="card-subtitle mt-2 mb-0 fw-normal">
                                                    23 september 2023 - 30 september 2023
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="p-3 d-flex align-items-stretch h-100">
                                    <div class="row">
                                        <div class="col-4 col-xl-2 col-md-3 d-flex align-items-center">
                                            <img src="{{ asset('assets/images/naruto-sasuke.jpg') }}"
                                                class="rounded img-fluid">
                                        </div>
                                        <div class="col-8 col-xl-10 col-md-9 d-flex align-items-center">
                                            <div>
                                                <a href="javascript:void(0)"
                                                    class="font-weight-medium fs-4 link lh-sm">Pemilihan Ketua POSTER
                                                    2023</a>
                                                <h6 class="card-subtitle mt-2 mb-0 fw-normal">
                                                    23 september 2023 - 30 september 2023
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h4 class="text-muted">Pemilu terdahulu</h4>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="p-3 d-flex align-items-stretch h-100">
                                    <div class="row">
                                        <div class="col-4 col-xl-2 col-md-3 d-flex align-items-center">
                                            <img src="{{ asset('assets/images/naruto-sasuke.jpg') }}"
                                                class="rounded img-fluid">
                                        </div>
                                        <div class="col-8 col-xl-10 col-md-9 d-flex align-items-center">
                                            <div>
                                                <a href="javascript:void(0)"
                                                    class="font-weight-medium fs-4 link lh-sm">Pemilihan Ketua POSTER
                                                    2023</a>
                                                <h6 class="card-subtitle mt-2 mb-0 fw-normal">
                                                    23 september 2023 - 30 september 2023
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
