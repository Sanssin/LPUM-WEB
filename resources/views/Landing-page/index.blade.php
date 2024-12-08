<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>LPUMsite - Selamat Datang!</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.ico') }}" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('dist/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('dist/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@7.1.96/css/materialdesignicons.min.css">
    <link href="{{ asset('dist/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="{{ asset('dist/css/landingpage.min.css') }}" rel="stylesheet" />

</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a href="/" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/logo/Logo-lpum.png') }}" alt="" />
                <img src="{{ asset('assets/logo/logo-text-lpum.png') }}" alt="" />
            </a>

            <nav id="navbar" class="navbar">
                <i class="mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Digital Election - LPUM Poltek Nuklir</h1>
                    <div class="d-none d-md-block">
                        <h2 data-aos="fade-up" data-aos-delay="400">
                            Kami menghadirkan proses pemilihan secara efisien dan transparan
                            di Poltek Nuklir, bergabunglah dalam membangun dinamika
                            demokrasi yang lebih baik dan berkualitas!
                        </h2>
                    </div>
                    <div class="d-block d-md-none">
                        <h5 data-aos="fade-up" data-aos-delay="400">
                            Kami menghadirkan proses pemilihan secara efisien dan transparan
                            di Poltek Nuklir, bergabunglah dalam membangun dinamika
                            demokrasi yang lebih baik dan berkualitas!
                        </h5>
                    </div>
                    <div data-aos="fade-up" data-aos-delay="600">
                        <div class="text-center text-lg-start">
                            <a href="{{ route('pagu') }}"
                                class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                                <span>Masuk</span>
                                <i class="mdi mdi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="mt-4" data-aos="fade-up" data-aos-delay="600">
                        <img src="{{ asset('assets/logo/poltek-logo.svg') }}" alt="Logo poltek"
                            style="max-width: 50px" />
                        <img src="{{ asset('assets/logo/logo-brin.png') }}" alt="Logo BRIN" style="max-height: 50px"
                            class="rounded rounded-3 ms-3" />
                    </div>
                </div>
                <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{ asset('assets/images/background/hero-img.png') }}" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-lg-6 col-md-12 footer-info">
                        <a href="index.html" class="logo d-flex align-items-center">
                            <img src="{{ asset('assets/logo/Logo-lpum.png') }}" alt="" />
                            <img src="{{ asset('assets/logo/logo-text-lpum.png') }}" alt="" />
                        </a>
                        @if (isset($data['description']) && $data['description'])
                            <!-- Menampilkan konten jika description ada dan tidak kosong -->
                            {{ $data['description'] }}
                        @endif

                        <div class="social-links mt-3">
                            @if (isset($data['whatsapp']) && $data['whatsapp'])
                                <p>{{ $data['whatsapp'] }}</p>
                                <a href="https://api.whatsapp.com/send?phone=62{{ $data['whatsapp'] }}&text=Permisi.%20Bolehkah%20saya%20meminta%20informasi%20terkait%20LPUM%3F%F0%9F%91%8B"
                                    class="instagram"><i class="mdi mdi-whatsapp"></i></a>
                            @endif
                            @if (isset($data['instagram']) && $data['instagram'])
                                <p>{{ $data['instagram'] }}</p>
                                <a href="{{ $data['instagram_link'] ?? '#' }}" class="instagram"><i
                                        class="mdi mdi-instagram"></i></a>
                            @endif
                            @if (isset($data['email']) && $data['email'])
                                <p>{{ $data['email'] }}</p>
                                <a href="mailto:{{ $data['email'] }}" class="instagram"><i
                                        class="mdi mdi-email-outline"></i></a>
                            @endif
                            @if (isset($data['linkedin']) && $data['linkedin'])
                                <a href="{{ $data['linkedin_link'] ?? '#' }}" class="instagram"><i
                                        class="mdi mdi-linkedin"></i></a>
                            @endif
                            @if (isset($data['facebook']) && $data['facebook'])
                                <a href="{{ $data['facebook_link'] ?? '#' }}" class="instagram"><i
                                        class="mdi mdi-facebook"></i></a>
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                        <h4>Hubungi kami</h4>
                        <p>
                            <strong>Politeknik Teknologi Nuklir Indonesia</strong> <br />
                            Jl. Babarsari Kotak POB 6101/YKKB <br>
                            Ngentak, Caturtunggal, Kec. Depok <br>
                            Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281 <br>
                            @if (isset($data['whatsapp']) && $data['whatsapp'])
                                <strong>No. Telepon:</strong> +62{{ $data['whatsapp'] }}<br />
                            @endif
                            @if (isset($data['email']) && $data['email'])
                                <strong>Email:</strong> <a href="mailto:{{ $data['email'] }}">
                                    {{ $data['email'] }}</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright {{ date('Y') }} <strong><span>LPUM-Poltek Nuklir</span></strong>. All Rights
                Reserved
            </div>
            <div class="credits">
                Created by The Developers. <br />
                Designed by
                <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="mdi mdi-arrow-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('dist/aos/aos.js') }}"></script>
    <script src="{{ asset('dist/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('dist/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('dist/js/landingpage.min.js') }}"></script>
</body>

</html>
