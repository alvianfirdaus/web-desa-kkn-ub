@extends('layouts.desa.adminlte.app')

@section('title', 'Pengaduan Warga Update')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Update Pengaduan Warga</h3>
                        </div>
                        <form action="{{ route('manajemen_pengaduan.update', $pengaduan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">                                

                                <div class="form-group">
                                    <label for="judul">Judul Pengaduan</label>
                                    <input type="text" class="form-control" name="judul"
                                        value="{{ $pengaduan->judul }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="pesan">Pesan Pengaduan</label>
                                    <input type="text" class="form-control" name="pesan"
                                        value="{{ $pengaduan->pesan }}" required>
                                </div>
                                                                
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="diajukan"
                                            {{ $pengaduan->status == 'diajukan' ? 'selected' : '' }}>Diajukan
                                        </option>
                                        <option value="diproses"
                                            {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses
                                        </option>
                                        <option value="selesai"
                                            {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai
                                        </option>
                                    </select>
                                </div>                                                            

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-custom">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>        
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    window.location.href = "{{ route('manajemen_pengaduan.index') }}";
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
