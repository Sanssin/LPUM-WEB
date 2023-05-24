@extends('Template.Auth.layout')

@section('main')
    <div class="row auth-wrapper gx-0">

        {{-- Kolom kiri --}}
        <div class="col-lg-4 bg-primary auth-box-2 on-sidebar  animate__animated animate__fadeInLeft animate__delay-1s">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="row justify-content-center text-center">
                    <div class="col-md-7 col-lg-12 col-xl-9">
                        <div
                            class="d-flex align-items-center justify-content-center animate__animated animate__bounce animate__infinite">
                            <span class="db"><img style="max-width: 60px" src="{{ asset('assets/logo/Logo-lpum.png') }}"
                                    alt="logo" /></span>
                            <span class="db"><img style="max-height:40px"
                                    src="{{ asset('assets/images/logo-text-lpum-light.png') }}" alt="logo" /></span>
                        </div>
                        <h2 class="text-white mt-4 fw-light">
                            Web App LPUM <br>
                            <span class="font-weight-medium">Poltek Nuklir - BRIN</span>
                        </h2>
                        <div class="d-none d-md-block">
                            <p class="op-5 text-white fs-4 mt-4">
                                Lembaga Pemilihan Umum Mahasiswa <br> Politeknik Teknologi Nuklir Indonesia <br> Badan
                                Riset &
                                Inovasi Nasional
                            </p>
                            <div>

                                <img src="{{ asset('assets/logo/poltek-logo.svg') }}" style="max-height: 60px"
                                    alt="poltek" class="bg-white p-2 rounded-2">

                                <img style="max-height: 60px" src="{{ asset('assets/logo/logo-brin.png') }}" alt="logo"
                                    class="rounded rounded-sm" />
                            </div>
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

                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
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
                                        <input class="form-check-input" name="remember_me" type="checkbox" value="1"
                                            id="r-me1" />
                                        <label class="form-check-label" for="r-me1">
                                            Ingat saya
                                        </label>
                                        <div class="invalid-feedback">
                                            You must agree before submitting.
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-stretch button-group">
                                    <button type="submit" class="btn btn-primary btn-lg px-4">
                                        Masuk
                                    </button>
                                </div>
                            </form>
                            <p class="text-small"><a href="{{ route('forgot') }}">Lupa password ?</a> </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row bg-primary d-md-none">
        <div class="col text-center">

            <p class="op-5 text-white fs-4 mt-4">
                LPUM-Poltek - {{ date('Y') }}
            </p>
            <p class="op-5 text-white fs-4 mt-4">
                Lembaga Pemilihan Umum Mahasiswa <br> Politeknik Teknologi Nuklir Indonesia <br> Badan
                Riset &
                Inovasi Nasional
            </p>
            <div class="mb-4">

                <img src="{{ asset('assets/logo/poltek-logo.svg') }}" style="max-height: 60px" alt="poltek"
                    class="bg-white p-2 rounded-2">

                <img style="max-height: 60px" src="{{ asset('assets/logo/logo-brin.png') }}" alt="logo"
                    class="rounded rounded-sm" />
            </div>
        </div>
    </div>
@endsection
