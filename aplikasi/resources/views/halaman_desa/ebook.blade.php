@extends('layouts.desa.ebook.app')

@section('content')
@php
    $pdfs = [
        ['title' => 'E-Book Panduan Visual Splitsing SHM', 'file' => 'tes1.pdf', 'image' => 'cover1.png'],
        ['title' => 'E-Book Alur Mudah Bayar Pajak Bumi & Bangunan (PBB)', 'file' => 'tes2.pdf', 'image' => 'cover2.png'],
        ['title' => 'E-Book Hukum', 'file' => 'tes3.pdf', 'image' => 'cover3.png'],
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

    .modal-content {
        background-color: #fefefe;
        padding: 20px;
        border-radius: 10px;
        max-width: 90vw;
    }

    #pdf-canvas {
        width: 100%;
        height: auto;
        border: 1px solid #ccc;
    }

    .close {
        float: right;
        font-size: 24px;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<div class="ebook-wrapper">
    <div class="container text-white text-center mb-5">
        <br>
        <br>
        <h2>eBook Hukum - Infografis</h2>
    </div>
    <div class="container">
        <div class="row g-4">
            @foreach ($pdfs as $index => $pdf)
            <div class="col-md-4">
                <div class="card-ebook" onclick="openModal('{{ asset('asset_halaman_desa/img/ebook/'.$pdf['file']) }}')">
                    <img src="{{ asset('asset_halaman_desa/img/ebook/'.$pdf['image']) }}" alt="cover">
                    <div class="card-title">{{ $pdf['title'] }}</div>
                    <a href="javascript:void(0)" class="download-btn" onclick="event.stopPropagation(); openModal('{{ asset('asset_halaman_desa/img/ebook/'.$pdf['file']) }}')">
                        📖 Baca Sekarang
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal -->
<div id="pdfModal" class="modal d-none position-fixed top-0 start-0 w-100 h-100 d-flex justify-content-center align-items-center" style="background: rgba(0,0,0,0.6); z-index: 9999;">
    <div class="modal-content position-relative" style="width: 80%; max-width: 600px; background: #fff; border-radius: 10px; overflow: hidden; padding-top: 40px;">
        <!-- Close icon -->
        <button onclick="closeModal()" style="position: absolute; top: 10px; right: 15px; border: none; background: transparent; font-size: 24px; font-weight: bold; cursor: pointer; z-index: 10;">
            &times;
        </button>

        <!-- Navigasi PDF -->
        <div id="navigation" class="my-2 d-flex justify-content-between align-items-center px-3" style="z-index: 5;">
            <button onclick="prevPage()" class="btn btn-sm btn-outline-primary">
                <i class="fas fa-chevron-left"></i> Sebelumnya
            </button>
            <span>Halaman <span id="page_num"></span> dari <span id="page_count"></span></span>
            <button onclick="nextPage()" class="btn btn-sm btn-outline-primary">
                Selanjutnya <i class="fas fa-chevron-right"></i>
            </button>
        </div>

        <!-- Kontainer canvas -->
        <div class="px-3 pb-3" style="max-height: 70vh; overflow-y: auto;">
            <canvas id="pdf-canvas"></canvas>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script>
    let pdfDoc = null,
        pageNum = 1,
        pageRendering = false,
        pageNumPending = null,
        scale = 1.5,
        canvas = document.getElementById('pdf-canvas'),
        ctx = canvas.getContext('2d');

    function openModal(pdfUrl) {
        document.getElementById('pdfModal').classList.remove('d-none');

        pdfjsLib.getDocument(pdfUrl).promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            pageNum = 1;
            document.getElementById('page_count').textContent = pdfDoc.numPages;
            renderPage(pageNum);
        });
    }

    function closeModal() {
        document.getElementById('pdfModal').classList.add('d-none');
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

    function renderPage(num) {
        pageRendering = true;
        pdfDoc.getPage(num).then(function(page) {
            const viewport = page.getViewport({ scale: scale });
            canvas.height = viewport.height;
            canvas.width = viewport.width;

            const renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            const renderTask = page.render(renderContext);
            renderTask.promise.then(function () {
                pageRendering = false;
                document.getElementById('page_num').textContent = pageNum;

                if (pageNumPending !== null) {
                    renderPage(pageNumPending);
                    pageNumPending = null;
                }
            });
        });
    }

    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
        }
    }

    function prevPage() {
        if (pageNum <= 1) return;
        pageNum--;
        queueRenderPage(pageNum);
    }

    function nextPage() {
        if (pageNum >= pdfDoc.numPages) return;
        pageNum++;
        queueRenderPage(pageNum);
    }
</script>
@endsection
