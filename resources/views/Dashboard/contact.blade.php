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
                        @if ($data['instagram'])
                            <div class="col-lg-4 col-md-6">
                                <div class="card bg-purple text-white">
                                    <div class="card-body py-2">
                                        <div class="d-flex no-block align-items-center">
                                            <a href="{{ $data['instagram_link'] ?? 'JavaScript: void(0);' }}"><i
                                                    class="display-6 mdi mdi-instagram text-white"
                                                    title="Instagram"></i></a>
                                            <div class="ms-3 mt-2">
                                                <h4 class="font-weight-medium mb-0 text-white">
                                                    @ {{ $data['instagram'] }}
                                                </h4>
                                                <h5 class="text-white">Instagram</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- whatsapp --}}
                        @if ($data['whatsapp'])
                            <div class="col-lg-4 col-md-6">
                                <div class="card bg-success text-white">
                                    <div class="card-body py-2">
                                        <div class="d-flex no-block align-items-center">
                                            <a href="JavaScript: void(0);"><i class="display-6 mdi mdi-whatsapp text-white"
                                                    title="Whatsapp"></i></a>
                                            <div class="ms-3 mt-2">
                                                <h4 class="font-weight-medium mb-0 text-white">
                                                    +62 {{ $data['whatsapp'] }}
                                                </h4>
                                                <h5 class="text-white">Whatsapp</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- Linkedin --}}
                        @if ($data['linkedin'])
                            <div class="col-lg-4 col-md-6">
                                <div class="card bg-inverse text-white">
                                    <div class="card-body py-2">
                                        <div class="d-flex no-block align-items-center">
                                            <a href="{{ $data['linkedin_link'] ?? 'JavaScript: void(0);' }}"><i
                                                    class="display-6 mdi mdi-linkedin text-white" title="LinkedIn"></i></a>
                                            <div class="ms-3 mt-2">
                                                <h4 class="font-weight-medium mb-0 text-white">
                                                    {{ $data['linkedin'] }}
                                                </h4>
                                                <h5 class="text-white">LinkedIn</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- Facebook --}}
                        @if ($data['facebook'])
                            <div class="col-lg-4 col-md-6">
                                <div class="card bg-primary text-white">
                                    <div class="card-body py-2">
                                        <div class="d-flex no-block align-items-center">
                                            <a href="{{ $data['facebook_link'] ?? 'JavaScript: void(0);' }}"><i
                                                    class="display-6 mdi mdi-facebook text-white" title="Facebook"></i></a>
                                            <div class="ms-3 mt-2">
                                                <h4 class="font-weight-medium mb-0 text-white">
                                                    {{ $data['facebook'] }}
                                                </h4>
                                                <h5 class="text-white">Facebook</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
