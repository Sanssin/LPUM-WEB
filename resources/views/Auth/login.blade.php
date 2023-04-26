@extends('Template.Auth.layout')

@section('main')
    <div class="row auth-wrapper gx-0">

        {{-- Kolom kiri --}}
        <div class="col-lg-4 bg-primary auth-box-2 on-sidebar  animate__animated animate__fadeInLeft animate__delay-1s">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="row justify-content-center text-center">
                    <div class="col-md-7 col-lg-12 col-xl-9">
                        <div>
                            <span class="db"><img style="max-width: 80px" src="{{ asset('assets/images/logo-lpum.png') }}"
                                    alt="logo" /></span>
                        </div>
                        <h2 class="text-white mt-4 fw-light">
                            Web App LPUM <br>
                            <span class="font-weight-medium">Poltek Nuklir - BRIN</span>
                        </h2>
                        <p class="op-5 text-white fs-4 mt-4">
                            Lembaga Pemilihan Umum Mahasiswa <br> Politeknik Teknologi Nuklir Indonesia <br> Badan
                            Riset &
                            Inovasi Nasional
                        </p>
                        <div>
                            <img style="max-height: 60px" src="{{ asset('assets/images/logo-brin.png') }}" alt="logo"
                                class="rounded rounded-sm" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom kanan --}}
        <div class="col-lg-8 d-flex align-items-center justify-content-center">
            <div class="row justify-content-center w-100 mt-4 mt-lg-0">

                <div class="col-lg-6 col-md-6">
                    <div class="card shadow-lg animate__animated animate__fadeInRight" id="loginform">
                        <div class="card-body">
                            <h2>Selamat datang! &#128075;</h2>
                            <p class="text-muted fs-4">
                                Silakan masuk terlebih dahulu.
                            </p>
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible border-0 fade show" role="alert">
                                    <button type="button" class="btn-close btn-close-danger" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    Email / Kata sandi salah!
                                </div>
                            @endif
                            <form class="form-horizontal mt-2 pt-1 needs-validation" action="{{ route('authenticate') }}"
                                method="post" autocomplete="off">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" class="form-control form-input-bg" id="email"
                                        placeholder="email" value="{{ old('email') }}" required />
                                    <label for="email">Email</label>
                                    <div class="invalid-feedback">Email is required</div>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control form-input-bg" id="password"
                                        placeholder="*****" name="password" required />
                                    <label for="password">Password</label>
                                    <div class="invalid-feedback">Password is required</div>
                                </div>

                                <div class="d-flex align-items-center mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="r-me1" />
                                        <label class="form-check-label" for="r-me1">
                                            Ingat saya
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <p class="text-small">Kendala terkait login silakan tekan <a href="#">lini
                                        ini</a> </p>
                                <div class="d-flex align-items-stretch button-group">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">
                                        Masuk
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
