<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, FlexileDash bootstrap dashboard admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, material design, FlexileDash bootstrap 5 dashboard template" />
    <meta name="description" content="FlexileDash bootstrap dashboard is powerful and clean admin dashboard template" />
    <meta name="robots" content="noindex,nofollow" />
    <title>LPUM - {{ $title }}</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.ico') }}" />
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css') }}" rel="stylesheet" />

    {{-- Vendor Style --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        body {
            overscroll-behavior-y: contain;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================= -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================= -->
        <div class="preloader">
            <?xml version="1.0" encoding="utf-8"?>
            <svg class="lds-ripple" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                style="margin: auto; background: rgb(255, 255, 255); display: block; shape-rendering: auto;"
                width="191px" height="191px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                <path fill="none" stroke="#e90c59" stroke-width="8"
                    stroke-dasharray="42.76482137044271 42.76482137044271"
                    d="M24.3 30C11.4 30 5 43.3 5 50s6.4 20 19.3 20c19.3 0 32.1-40 51.4-40 C88.6 30 95 43.3 95 50s-6.4 20-19.3 20C56.4 70 43.6 30 24.3 30z"
                    stroke-linecap="round" style="transform:scale(0.8);transform-origin:50px 50px">
                    <animate attributeName="stroke-dashoffset" repeatCount="indefinite" dur="1s" keyTimes="0;1"
                        values="0;256.58892822265625"></animate>
                </path>
            </svg>
        </div>
        <!-- ============================================================= -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================= -->
        <!-- ============================================================= -->
        <!-- Login box.scss -->
        <!-- ============================================================= -->
        @yield('main')
        <!-- ============================================================= -->
        <!-- Login box.scss -->
        <!-- ============================================================= -->
    </div>
    <!-- ============================================================= -->
    <!-- All Required js -->
    <!-- ============================================================= -->
    <script src="{{ asset('dist/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('dist/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(".preloader").fadeOut();
    </script>
</body>

</html>
