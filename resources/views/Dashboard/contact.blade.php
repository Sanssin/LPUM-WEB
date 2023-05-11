@extends('Template.Dashboard.layouts')


@section('main')
    <div class="page-titles">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-12 align-self-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item">
                            <a href="{{ route('pagu') }}" class="link"><i class="mdi mdi-home fs-5"></i></a>
                        </li>
                        <li class="breadcrumb-item">Contact</li>
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Hubungi Kami</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card w-100">
                <div class="card-body">
                    <p> Jangan ragu untuk menghubungi kami jika kamu membutuhkan bantuan atau ingin memberikan kritik dan
                        saran yang berharga. Kami tersedia melalui media sosial berikut ini untuk memudahkan kamu dalam
                        berkomunikasi dengan kami. Terima kasih atas dukunganmu!</p>
                    <div class="row">
                        {{-- Instagram --}}
                        <div class="col-lg-4 col-md-6">
                            <div class="card bg-purple text-white">
                                <div class="card-body py-2">
                                    <div class="d-flex no-block align-items-center">
                                        <a href="JavaScript: void(0);"><i class="display-6 mdi mdi-instagram text-white"
                                                title="Instagram"></i></a>
                                        <div class="ms-3 mt-2">
                                            <h4 class="font-weight-medium mb-0 text-white">
                                                @ lpumpolteknuklir
                                            </h4>
                                            <h5 class="text-white">Instagram</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Instagram --}}
                        <div class="col-lg-4 col-md-6">
                            <div class="card bg-success text-white">
                                <div class="card-body py-2">
                                    <div class="d-flex no-block align-items-center">
                                        <a href="JavaScript: void(0);"><i class="display-6 mdi mdi-whatsapp text-white"
                                                title="Whatsapp"></i></a>
                                        <div class="ms-3 mt-2">
                                            <h4 class="font-weight-medium mb-0 text-white">
                                                087733547844
                                            </h4>
                                            <h5 class="text-white">Whatsapp</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Linkedin --}}
                        <div class="col-lg-4 col-md-6">
                            <div class="card bg-inverse text-white">
                                <div class="card-body py-2">
                                    <div class="d-flex no-block align-items-center">
                                        <a href="JavaScript: void(0);"><i class="display-6 mdi mdi-linkedin text-white"
                                                title="LinkedIn"></i></a>
                                        <div class="ms-3 mt-2">
                                            <h4 class="font-weight-medium mb-0 text-white">
                                                087733547844
                                            </h4>
                                            <h5 class="text-white">LinkedIn</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Facebook --}}
                        <div class="col-lg-4 col-md-6">
                            <div class="card bg-primary text-white">
                                <div class="card-body py-2">
                                    <div class="d-flex no-block align-items-center">
                                        <a href="JavaScript: void(0);"><i class="display-6 mdi mdi-facebook text-white"
                                                title="Facebook"></i></a>
                                        <div class="ms-3 mt-2">
                                            <h4 class="font-weight-medium mb-0 text-white">
                                                087733547844
                                            </h4>
                                            <h5 class="text-white">Facebook</h5>
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
