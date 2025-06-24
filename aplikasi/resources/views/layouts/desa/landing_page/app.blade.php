<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>@yield('title', 'Main Page Desa - Index')</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="{{ asset('asset_halaman_desa/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('asset_halaman_desa/img/apple-touch-icon.png') }}" rel="apple-touch-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('asset_halaman_desa/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_halaman_desa/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('asset_halaman_desa/vendor/animate.css/animate.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_halaman_desa/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset_halaman_desa/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

    <!-- Main CSS File -->
    <link href="{{ asset('asset_halaman_desa/css/main.css') }}" rel="stylesheet" />

    <!-- Chart Js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
</head>

<body>

    <!-- Yield Header -->
    @include('layouts.desa.landing_page.header')<!-- Include Header -->
    <section class="new-hero-section" data-aos="fade-up">
        <!-- Carousel Background -->
        <div class="gambar-carousel-container">
            <div id="desaCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                <div class="carousel-inner h-100">
                    <!-- Slide 1 -->
                    <div class="carousel-item active h-100">
                        <img src="{{ asset('asset_halaman_desa/img/desa-1.jpg') }}"
                            class="carousel-image" alt="Desa Kedungwungu">
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item h-100">
                        <img src="{{ asset('asset_halaman_desa/img/desa-2.jpg') }}"
                            class="carousel-image" alt="Pemandangan Desa">
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item h-100">
                        <img src="{{ asset('asset_halaman_desa/img/desa-3.jpg') }}"
                            class="carousel-image" alt="Kegiatan Desa">
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Main Content -->
            <div class="main-content">
                <div class="title-digital-badge">DESA DIGITAL</div>
                <h1 class="new-hero-title">Desa Pencontohan</h1>
                <p class="hero-subtitle">Kecamatan Banyuwangi, Kabupaten Kebalenan, Provinsi<br>Jawa Timur</p>

                <div class="hero-links">
                    <a href="#profil"><i class="fas fa-user-circle me-2"></i>Profil Desa</a>
                    <a href="#layanan"><i class="fas fa-concierge-bell me-2"></i>Layanan Desa</a>
                </div>
            </div>

            <!-- Features Overlay -->
            <div class="features-overlay">
                <div class="features-container">
                    <h3 class="features-title">FITUR UNGGULAN</h3>

                    <div class="feature-list">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="feature-content">
                                <h4 class="feature-title">Layanan Persuratan Desa</h4>
                                <p class="feature-desc">Layanan penyuratan terpadu</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-globe-central-south-asia"></i>
                            </div>
                            <div class="feature-content">
                                <h4 class="feature-title">Infografis Desa</h4>
                                <p class="feature-desc">Informasi desa</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="bi bi-newspaper"></i>
                            </div>
                            <div class="feature-content">
                                <h4 class="feature-title">Blog Desa</h4>
                                <p class="feature-desc">Informasi terkini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Konten Utama -->
    <main>
        @yield('content')
    </main>

    @include('layouts.desa.landing_page.footer')<!-- Include Footer -->

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('asset_halaman_desa/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    {{-- <script src="{{ asset('asset_halaman_desa/vendor/php-email-form/validate.js') }}"></script> --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('asset_halaman_desa/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('asset_halaman_desa/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('asset_halaman_desa/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('asset_halaman_desa/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('asset_halaman_desa/js/main.js') }}"></script>

    @include('layouts.desa.landing_page.script')<!-- Include Script -->
</body>

</html>
