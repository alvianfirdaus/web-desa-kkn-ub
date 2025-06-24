<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-green: #00b478;
            --dark-green: #006341;
        }        

        .new-hero-section {
            position: relative;
            min-height: 100vh;
            overflow: hidden;
            color: white;
        }

        .gambar-carousel-container {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .carousel-item {
            height: 100%;
        }

        .carousel-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .content-wrapper {
            position: relative;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .main-content {
            width: 100%;
            padding: 80px 8% 40px;
            display: flex;
            flex-direction: column;
            z-index: 10;
        }

        .features-overlay {
            width: 100%;
            background: rgba(0, 0, 0, 0.7);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            padding: 40px 8%;
            z-index: 10;
            flex-grow: 1;
        }

        .title-digital-badge {
            background-color: rgba(18, 177, 66, 0.507);
            padding: 6px 12px;
            border-radius: 30px;
            font-size: 0.9rem;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 25px;
            width: fit-content;
        }

        .new-hero-title {
            font-size: 2.2rem;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero-subtitle {
            font-size: 1.1rem;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            line-height: 1.6;
        }        

        .hero-links {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .hero-links a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            padding: 10px 20px;
            border: 2px solid white;
            border-radius: 30px;
            transition: all 0.3s;
        }

        .hero-links a:hover {
            background-color: white;
            color: #333;
        }

        .features-container {
            width: 100%;
        }

        .features-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 25px;
            color: white;
            position: relative;
            padding-bottom: 10px;
            text-align: left;
        }

        .features-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 60px;
            height: 3px;
            background: var(--primary-green);
        }

        .feature-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .feature-item {
            display: flex;
            gap: 15px;
            align-items: flex-start;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .feature-item:last-child {
            border-bottom: none;
        }

        .feature-icon {
            font-size: 1.3rem;
            color: var(--primary-green);
            min-width: 30px;
            padding-top: 3px;
        }

        .feature-content {
            flex: 1;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: bold;
            margin-bottom: 8px;
            color: white;
        }

        .feature-desc {
            color: #ddd;
            line-height: 1.5;
            font-size: 0.95rem;
        }        

        /* Desktop Styles */
        @media (min-width: 992px) {
            .content-wrapper {
                flex-direction: row;
                min-height: 100vh;
            }

            .main-content {
                width: 60%;
                padding: 0 5%;
                justify-content: center;
                height: 100vh;
            }

            .features-overlay {
                width: 40%;
                padding: 0 40px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                height: 100vh;
            }

            .new-hero-title {
                font-size: 3rem;
            }

            .hero-subtitle {
                font-size: 1.2rem;
            }                        
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    <section class="new-hero-section">
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
                                <i class="fas fa-hands-helping"></i>
                            </div>
                            <div class="feature-content">
                                <h4 class="feature-title">Layanan Persuratan Desa</h4>
                                <p class="feature-desc">Layanan penyuratan terpadu</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-store"></i>
                            </div>
                            <div class="feature-content">
                                <h4 class="feature-title">Infografis Desa</h4>
                                <p class="feature-desc">Informasi desa</p>
                            </div>
                        </div>

                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-newspaper"></i>
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

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
