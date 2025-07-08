@extends('layouts.desa.ebook.app')

@section('content')
@php
    $pdfs = [
        ['title' => 'SURAT PERJANJIAN JUAL - BELI BARANG', 'file' => 'perjanjianjual.docx', 'image' => 'jualbeli.png'],
        ['title' => 'SURAT PERJANJIAN JUAL - BELI TANAH DAN BANGUNAN', 'file' => 'jualbeli.docx', 'image' => 'jualbelii.png'],
    ];
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

<style>
    .ebook-wrapper {
        background-color: rgba(24, 24, 36, 0.75);
        padding: 40px 0;
        min-height: 100vh;
    }

    .card-ebook {
        background: white;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
        cursor: pointer;
    }

    .card-ebook:hover {
        transform: translateY(-5px);
    }

    .card-ebook img {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-radius: 8px;
        margin-bottom: 15px;
        transition: 0.3s ease;
    }

    .card-ebook:hover img {
        transform: scale(1.02);
    }

    .card-title {
        font-weight: bold;
        font-size: 1.1rem;
        margin-bottom: 10px;
    }

    .download-btn {
        background: #003366;
        color: white;
        padding: 6px 14px;
        border-radius: 6px;
        text-decoration: none;
        display: inline-block;
    }
</style>

<div class="ebook-wrapper">
    <div class="container text-white text-center mb-5">
        <br>
        <br>
        <h2>Persuratan</h2>
    </div>
    <div class="container">
        <div class="row g-4">
            @foreach ($pdfs as $pdf)
            <div class="col-md-4">
                <div class="card-ebook">
                    <img src="{{ asset('asset_halaman_desa/img/ebook/' . $pdf['image']) }}" alt="cover">
                    <div class="card-title">{{ $pdf['title'] }}</div>
                    <a href="{{ asset('asset_halaman_desa/img/ebook/' . $pdf['file']) }}" class="download-btn" download>
                        ⬇️ Unduh DOCX
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
