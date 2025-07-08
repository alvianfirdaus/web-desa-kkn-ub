@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Berita Update')

@section('content')
<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header card-header-custom">
                        <h3 class="card-title">Update Galeri</h3>
                    </div>
                    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal"
                                    value="{{ $blog->tanggal }}" required>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Blog</label>
                                <input type="text" class="form-control" name="judul"
                                    value="{{ $blog->judul }}" required>
                            </div>

                            <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea class="form-control" id="summernote" name="isi" placeholder="isi">
                                {{ old('isi', $blog->isi ?? '') }}
                                </textarea>
                                @if($errors->has('isi'))
                                <div class="text-danger">{{ $errors->first('isi') }}</div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategori_blog" class="form-control">
                                    <option value="galery"
                                        {{ $blog->kategori_blog == 'galery' ? 'selected' : '' }}>galery</option>
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar Saat Ini</label>
                                <br>
                                @if ($blog->gambar)
                                <img src="{{ asset('storage/' . $blog->gambar) }}" alt="Gambar Blog"
                                    class="img-thumbnail" width="150">
                                @else
                                <p>Tidak ada Gambar</p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="gambar">Ganti Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-custom">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
        document.getElementById('gambar').addEventListener('change', function(event) {
            var fileName = event.target.files[0] ? event.target.files[0].name : "Pilih Gambar";
            this.nextElementSibling.innerText = fileName;
        });
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    window.location.href = "{{ route('blog.index') }}";
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