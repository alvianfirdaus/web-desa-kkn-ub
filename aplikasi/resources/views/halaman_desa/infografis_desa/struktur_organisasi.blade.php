@extends('layouts.desa.landing_page.app')

@section('title', 'Struktur Organisasi')

@section('content')
    <br>

    <div class="container section-title" id="administrasi" data-aos="fade-up">
        <p style="font-size: 20px;">Struktur Organisasi Desa</p>
    </div>
    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">
                            <article class="article">
                                <div class="post-img" data-aos="fade-up">
                                    <img src="{{ asset('asset_halaman_desa/img/blog/blog-1.jpg') }}" alt=""
                                        class="img-fluid">
                                </div>
                        </div>
                        </article>
                </div>
                </section>
            </div>
        </div>

        <div class="container section-title" id="administrasi" data-aos="fade-up">
            <p style="font-size: 20px;">Aparat Pemerintahan Desa</p>
        </div>

        <div class="container mt-5">
            <div class="row" data-aos="fade-up">
                
                <div class="col-md-3 text-center">
                    <img src="{{ asset('asset_halaman_desa/img/icon/oi.jpg') }}" class="img-fluid rounded" alt="Foto 1">
                    <p class="mt-2">Nama Petugas 1</p>
                </div>
                
                <div class="col-md-3 text-center">
                    <img src="{{ asset('asset_halaman_desa/img/icon/oi.jpg') }}" class="img-fluid rounded" alt="Foto 2">
                    <p class="mt-2">Nama Petugas 2</p>
                </div>
                
                <div class="col-md-3 text-center">
                    <img src="{{ asset('asset_halaman_desa/img/icon/oi.jpg') }}" class="img-fluid rounded" alt="Foto 3">
                    <p class="mt-2">Nama Petugas 3</p>
                </div>
                
                <div class="col-md-3 text-center">
                    <img src="{{ asset('asset_halaman_desa/img/icon/oi.jpg') }}" class="img-fluid rounded" alt="Foto 4">
                    <p class="mt-2">Nama Petugas 4</p>
                </div>
            </div>
        </div>
    </main>

@endsection
