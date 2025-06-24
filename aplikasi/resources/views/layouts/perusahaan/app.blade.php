<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'Main Page Perusahaan - Index')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('asset_halaman_perusahaan/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('asset_halaman_perusahaan/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset_halaman_perusahaan/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_halaman_perusahaan/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_halaman_perusahaan/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_halaman_perusahaan/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_halaman_perusahaan/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_halaman_perusahaan/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('asset_halaman_perusahaan/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('asset_halaman_perusahaan/css/style.css') }}" rel="stylesheet">
</head>
<body>

    <!-- Header -->
    @include('layouts.perusahaan.header')

    <!-- Konten Utama -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('layouts.perusahaan.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset_halaman_perusahaan/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('asset_halaman_perusahaan/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('asset_halaman_perusahaan/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset_halaman_perusahaan/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('asset_halaman_perusahaan/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('asset_halaman_perusahaan/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('asset_halaman_perusahaan/vendor/waypoints/noframework.waypoints.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('asset_halaman_perusahaan/js/main.js') }}"></script>

</body>

</html>
