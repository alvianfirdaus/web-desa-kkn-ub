@extends('layouts.desa.landing_page.app')

@section('title', 'Blog')

@section('content')
    <br>
    <main class="main">        

            <div class="container section-title" data-aos="fade-up">
                <h2>Berita</h2>
                <p>Menyajikan informasi Berita dari Desa Contoh<br /></p>
            </div>

            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section" data-aos="fade-up" data-aos-delay="100">

                <div class="container">
                    <div class="row gy-4">

                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-1.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>

                                <p class="post-category">Berita</p>

                                <h2 class="title">
                                    <a href="http://127.0.0.1:8000/desa/blog/detail">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>
                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-2.jpg') }}" alt=""
                                        class="img-fluid">

                                </div>

                                <p class="post-category">Berita</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                                </h2>
                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-6.jpg') }}" alt=""
                                        class="img-fluid">

                                </div>

                                <p class="post-category">Berita</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Distinctio provident quibusdam numquam aperiam aut</a>
                                </h2>

                            </article>
                        </div><!-- End post list item -->

                    </div>
                </div>
            </section><!-- /Blog Posts Section -->

            <div class="container section-title" data-aos="fade-up">
                <h2>Pengumuman</h2>
                <p>Menyajikan informasi Pengumuman dari Desa Contoh<br /></p>
            </div>

            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section" data-aos="fade-up" data-aos-delay="100">

                <div class="container">
                    <div class="row gy-4">

                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-1.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>

                                <p class="post-category">Pengumuman</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>
                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-2.jpg') }}" alt=""
                                        class="img-fluid">

                                </div>

                                <p class="post-category">Pengumuman</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                                </h2>
                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-6.jpg') }}" alt=""
                                        class="img-fluid">

                                </div>

                                <p class="post-category">Pengumuman</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Distinctio provident quibusdam numquam aperiam aut</a>
                                </h2>

                            </article>
                        </div><!-- End post list item -->

                    </div>
                </div>
            </section><!-- /Blog Posts Section -->

            <div class="container section-title" data-aos="fade-up">
                <h2>Parawisata</h2>
                <p>Menyajikan informasi Parawisata dari Desa Contoh<br /></p>
            </div>

            <!-- Blog Posts Section -->
            <section id="blog-posts" class="blog-posts section" data-aos="fade-up" data-aos-delay="100">

                <div class="container">
                    <div class="row gy-4">

                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-1.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>

                                <p class="post-category">Parawisata</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
                                </h2>
                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-2.jpg') }}" alt=""
                                        class="img-fluid">

                                </div>

                                <p class="post-category">Parawisata</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
                                </h2>
                            </article>
                        </div><!-- End post list item -->

                        <div class="col-lg-4">
                            <article>

                                <div class="post-img">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-6.jpg') }}" alt=""
                                        class="img-fluid">

                                </div>

                                <p class="post-category">Parawisata</p>

                                <h2 class="title">
                                    <a href="blog-details.html">Distinctio provident quibusdam numquam aperiam aut</a>
                                </h2>

                            </article>
                        </div><!-- End post list item -->

                    </div>
                </div>
            </section><!-- /Blog Posts Section -->

            <!-- Blog Pagination Section -->
            <section id="blog-pagination" class="blog-pagination section">

                <div class="container">
                    <div class="d-flex justify-content-center">
                        <ul>
                            <li><a href="#"><i class="bi bi-chevron-left"></i></a></li>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li>...</li>
                            <li><a href="#">10</a></li>
                            <li><a href="#"><i class="bi bi-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>

            </section><!-- /Blog Pagination Section -->

    </main>

@endsection
