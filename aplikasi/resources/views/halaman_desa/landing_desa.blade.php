@extends('layouts.desa.landing_page.app')

@section('title', 'Beranda')

@section('content')

    <main class="main">

        <!-- Hero Section -->

        <!-- Features Section -->
        <section id="about" class="features section">
            <div class="container">
                <ul class="nav nav-tabs row d-flex justify-content-center mb-5" data-aos="fade-up" data-aos-delay="100">
                    <li class="nav-item col-3">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <i class="bi bi-binoculars"></i>
                            <h4 class="d-none d-lg-block">Kata Sambutan Kepala Desa</h4>
                        </a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <i class="bi bi-box-seam"></i>
                            <h4 class="d-none d-lg-block">Tugas dan Fungsi Pemerintahan Desa</h4>
                        </a>
                    </li>
                </ul>
                <!-- End Tab Nav -->

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
                    <div class="tab-pane fade active show" id="features-tab-1">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>Kata Sambutan Kepala Desa, Fulan bin Fulan</h3>
                                <p class="fst-italic">Selamat datang di website resmi Desa Kami.</p>
                                <p>Sebagai Kepala Desa, saya sangat bangga dan senang dapat menyambut Anda di sini. Desa
                                    Kami merupakan desa yang dikenal dengan keramahan dan kebersamaan warga. Kami
                                    percaya bahwa dengan bekerja sama, kita dapat menciptakan desa yang lebih baik dan
                                    sejahtera bagi generasi masa depan.</p>
                                <p>Dengan adanya website ini, kami berharap dapat memberikan informasi yang berguna dan
                                    akurat bagi masyarakat, serta mempermudah akses bagi masyarakat untuk berinteraksi
                                    dan berkoordinasi dengan pemerintah desa.</p>
                                <p>Terima kasih atas kunjungan Anda dan semoga website ini dapat memberikan manfaat bagi
                                    Anda semua.</p>
                                <p>Salam hangat,</p>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="{{ asset('asset_halaman_desa/img/desa 1.jpeg') }}" alt=""
                                    class="img-fluid" />

                            </div>
                        </div>
                    </div>
                    <!-- End Tab Content Item -->

                    <div class="tab-pane fade" id="features-tab-2">
                        <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <div class="row mb-3">
                                    <div class="col-1"><i class="bi bi-check2-all"
                                            style="font-size: 30px; color: #fd7e14;"></i></div>
                                    <div class="col">
                                        <h5 style="font-weight: 800;">Penyelenggaraan Pemerintahan Desa</h5>
                                        <p>Pelaksanaan kegiatan dalam mewujudkan program pembangunan untuk meningkatkan
                                            kesejahteraan.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-1"><i class="bi bi-check2-all"
                                            style="font-size: 30px; color: #fd7e14;"></i></div>
                                    <div class="col">
                                        <h5 style="font-weight: 800;">Pelaksanaan Pembangunan Desa</h5>
                                        <p>Perencanaan, penganggaran, pelaksanaan proyek, pengawasan, serta evaluasi
                                            hasil pembangunan.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-1"><i class="bi bi-check2-all"
                                            style="font-size: 30px; color: #fd7e14;"></i></div>
                                    <div class="col">
                                        <h5 style="font-weight: 800;">Pembinaan Kemasyarakatan Desa</h5>
                                        <p>Memperkuat dan meningkatkan interaksi sosial, partisipasi masyarakat, serta
                                            pemberdayaan komunitas.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-1"><i class="bi bi-check2-all"
                                            style="font-size: 30px; color: #fd7e14;"></i></div>
                                    <div class="col">
                                        <h5 style="font-weight: 800;">Pemberdayaan Masyarakat Desa</h5>
                                        <p>Meningkatkan peran, kapasitas, dan kemandirian masyarakat desa.</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-1"><i class="bi bi-check2-all"
                                            style="font-size: 30px; color: #fd7e14;"></i></div>
                                    <div class="col">
                                        <h5 style="font-weight: 800;">Penanggulangan Bencana</h5>
                                        <p>Upaya yang dilakukan untuk mengurangi risiko, merespons, dan memulihkan
                                            dampak bencana di desa.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="{{ asset('asset_halaman_desa/img/working-2.jpg') }}" alt=""
                                    class="img-fluid" />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Features Section -->

        <!-- Services Section -->
        <section id="services" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>SOTK</h2>
                <p style="font-size: 20px;">Struktur Organisasi dan Tata Kerja</p>
            </div>
            <!-- End Section Title -->

            <section id="recent-posts" class="recent-posts section">

                <div class="container">
                    <div class="row gy-4">
                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <article>
                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/organisasi 1.jpeg') }}" alt=""
                                        class="img-fluid" />
                                </div>

                                <p class="post-category">Fulan Bin Fulan</p>

                                <h2 class="title">
                                    <a href="#">Kepala Desa</a>
                                </h2>

                            </article>
                        </div>
                        <!-- End post list item -->

                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <article>
                                <div class="post-img">
<center>
                                    <img src="{{ asset('asset_halaman_desa/img/organisasi 2.jpeg') }}" alt=""
                                        class="img-fluid" />
</center>
                                </div>

                                <p class="post-category">Fulan Bin Fulan</p>

                                <h2 class="title">
                                    <a href="#">Kepala Desa</a>
                                </h2>

                            </article>
                        </div>
                        <!-- End post list item -->

                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <article>
                                <div class="post-img">
<center>                                    
                                    <img src="{{ asset('asset_halaman_desa/img/organisasi 3.jpeg') }}" alt=""
                                        class="img-fluid" />
</center>
                                </div>

                                <p class="post-category">Fulan Bin Fulan</p>

                                <h2 class="title">
                                    <a href="#">Kepala Desa</a>
                                </h2>

                            </article>
                        </div>

                        <!-- End post list item -->
                    </div>
                    <a href="#" class="btn-sotk">Lihat Lebih Detail</a>

                    <!-- End recent posts list -->
                </div>
            </section>

            <div class="container">
                <!-- Section Title -->
                <div class="container section-title" id="administrasi" data-aos="fade-up">
                    <h2>Administrasi Penduduk</h2>
                    <p style="font-size: 20px;">Sistem digital yang berfungsi mempermudah pengelolaan data dan informasi terkait dengan kependudukan dan pendayagunaannya untuk pelayanan publik yang efektif dan efisien</p>
                </div>
                <!-- End Section Title -->

                <div class="row gy-4">
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-person-fill" style="color: #0dcaf0"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Penduduk</h3>
                            </a>
                            <h3 class="count-number" data-target="1111">0 Jiwa</h3>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-gender-male" style="color: #fd7e14"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Laki-Laki</h3>
                            </a>
                            <h3 class="count-number" data-target="686">0 Jiwa</h3>
                        </div>
                    </div>
                    <!-- End Service Item -->

                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="service-item position-relative">
                            <div class="icon">
                                <i class="bi bi-chat-text" style="color: #20c997"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>Wanita</h3>
                            </a>
                            <h3 class="count-number" data-target="425">0 Jiwa</h3>
                        </div>
                    </div>
                    <!-- End Service Item -->
                </div>
                <a href="#" class="btn-sotk">Lihat Lebih Detail</a>
            </div>
        </section>
        <!-- /Services Section -->

        <!-- Portfolio Section -->
        <section id="apb-desa" class="features section" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-6 text-center">
                        <img src="{{ asset('asset_halaman_desa/img/apbn.png') }}" alt="APB Desa"
                            class="img-fluid" />
                    </div>

                    <div class="col-lg-6">
                        <h3 class="fw-bold text-dark">APB DESA 2024</h3>
                        <p class="text-muted">Akses cepat dan transparan terhadap APB Desa serta proyek pembangunan</p>

                        <div class="bg-light p-3 rounded shadow-sm mb-3">
                            <p class="mb-1 text-secondary">Pendapatan Desa</p>
                            <h4 class="fw-bold text-dark" id="pendapatan">Rp0</h4>
                        </div>

                        <div class="bg-light p-3 rounded shadow-sm">
                            <p class="mb-1 text-secondary">Belanja Desa</p>
                            <h4 class="fw-bold text-dark" id="belanja">Rp0</h4>
                        </div>

                        <a href="#" class="btn-sotk">Lihat Lebih Detail</a>
                    </div>
                </div>
            </div>
        </section>


        <!-- Recent Posts Section -->
        <section id="recent-posts" class="recent-posts section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Blog</h2>
                <p>Menyajikan informasi terbaru dari Desa Contoh<br /></p>
            </div>
            <!-- End Section Title -->

            <div class="container">
                <div class="row gy-4">
                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <article>
                            <div class="post-img">
                                <img src="{{ asset('asset_halaman_desa/img/blog/blog-1.jpg') }}" alt=""
                                    class="img-fluid" />

                            </div>

                            <p class="post-category">Berita</p>

                            <h2 class="title">
                                <a href="#">Dolorum optio tempore voluptas dignissimos</a>
                            </h2>
                        </article>
                    </div>
                    <!-- End post list item -->

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <article>
                            <div class="post-img">
                                <img src="{{ asset('asset_halaman_desa/img/blog/blog-2.jpg') }}" alt=""
                                    class="img-fluid" />

                            </div>

                            <p class="post-category">Pengumuman</p>

                            <h2 class="title">
                                <a href="#">Nisi magni odit consequatur autem nulla dolorem</a>
                            </h2>
                        </article>
                    </div>
                    <!-- End post list item -->

                    <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <article>
                            <div class="post-img">
                                <img src="{{ asset('asset_halaman_desa/img/blog/blog-3.jpg') }}" alt=""
                                    class="img-fluid" />

                            </div>

                            <p class="post-category">Parawisata</p>

                            <h2 class="title">
                                <a href="#">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
                            </h2>

                        </article>
                    </div>
                    <!-- End post list item -->
                </div>
                <!-- End recent posts list -->
            </div>
        </section>
        <!-- /Recent Posts Section -->

        <!-- Contact Section -->
        
        <!-- /Contact Section -->
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    window.location.href = "{{ route('landing') }}";
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33'
                });
            @endif

            @if ($errors->any())
                let errorMessages = "";
                @foreach ($errors->all() as $error)
                    errorMessages += "{{ $error }}\n";
                @endforeach

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessages,
                    confirmButtonColor: '#d33'
                });
            @endif
        });
    </script>
@endsection
