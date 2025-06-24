@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Blog Create')

@section('content')
<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header card-header-custom">
                        <h3 class="card-title">Create Blog</h3>
                    </div>
                    <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control @error('tanggal') is-invalid @enderror"
                                    id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                    id="judul" name="judul" placeholder="judul" value="{{ old('judul') }}">
                                @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea class="form-control @error('isi') is-invalid @enderror"
                                    id="summernote" name="isi" placeholder="isi">{{ old('isi') }}</textarea>
                                @error('isi')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kategori Blog</label>
                                <select class="form-control @error('kategori_blog') is-invalid @enderror"
                                    name="kategori_blog">
                                    <option value="berita"
                                        {{ old('kategori_blog') == 'berita' ? 'selected' : '' }}>Berita</option>
                                    <option value="parawisata"
                                        {{ old('kategori_blog') == 'parawisata' ? 'selected' : '' }}>Parawisata</option>
                                    <option value="pengumuman"
                                        {{ old('kategori_blog') == 'pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                                </select>
                                @error('kategori_blog')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar"
                                            name="gambar">
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

        @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('
            error ') }}',
            confirmButtonColor: '#d33'
        });
        @endif

        @if($errors -> any())
        let errorMessages = "";
        @foreach($errors -> all() as $error)
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