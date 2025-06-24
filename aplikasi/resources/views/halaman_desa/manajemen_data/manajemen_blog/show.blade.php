@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Blog Show')

@section('content')
<br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Show Blog</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control" value="{{ $blog->tanggal }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" class="form-control" value="{{ $blog->judul }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Isi</label>
                                    <div class="border p-2" style="min-height: 200px;">
                                        {!! $blog->isi !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kategori Blog</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($blog->kategori_blog) }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    @if ($blog->gambar && file_exists(public_path('storage/' . $blog->gambar)))
                                        <img src="{{ asset('storage/' . $blog->gambar) }}" class="img-thumbnail"
                                            width="150">
                                    @else
                                        <img src="{{ asset('storage/default_image/default.png') }}" class="img-thumbnail"
                                            width="150">
                                    @endif

                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection