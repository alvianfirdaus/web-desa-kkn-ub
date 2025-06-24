@extends('layouts.perusahaan.adminlte.app')

@section('title', 'Manajemen Petugas Update')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Update Petugas</h3>
                        </div>
                        <form action="{{ route('pendaftaran.update', $pendaftaran->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                        id="nama_lengkap" name="nama_lengkap" placeholder="Nama"
                                        value="{{ old('nama_lengkap', $pendaftaran->nama_lengkap) }}">
                                    @error('nama_lengkap')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nomor_hp">Nomor Hp</label>
                                    <input type="text" class="form-control @error('nomor_hp') is-invalid @enderror"
                                        id="nomor_hp" name="nomor_hp" placeholder="Nomor HP"
                                        value="{{ old('nomor_hp', $pendaftaran->nomor_hp) }}">
                                    @error('nomor_hp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_desa">Nama Desa</label>
                                    <input type="text" class="form-control @error('nama_desa') is-invalid @enderror"
                                        id="nama_desa" name="nama_desa" placeholder="Nama Desa"
                                        value="{{ old('nama_desa', $pendaftaran->nama_desa) }}">
                                    @error('nama_desa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" placeholder="NIK"
                                        value="{{ old('nik', $pendaftaran->nik) }}">
                                    @error('nik')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control @error('status') is-invalid @enderror" id="status"
                                            name="status">
                                            <option value="pending"
                                                {{ old('status', $pendaftaran->status) == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="ditolak"
                                                {{ old('status', $pendaftaran->status) == 'ditolak' ? 'selected' : '' }}>
                                                Ditolak</option>
                                            <option value="disetujui"
                                                {{ old('status', $pendaftaran->status) == 'disetujui' ? 'selected' : '' }}>
                                                Disetujui</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    window.location.href = "{{ route('pendaftaran.index') }}";
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

            @if (session('error_nik'))
                Swal.fire({
                    icon: 'warning',
                    title: 'NIK Sudah Terdaftar!',
                    text: '{{ session('error_nik') }}',
                    confirmButtonColor: '#ffc107'
                });
            @endif

            @if (session('error_nomor_hp'))
                Swal.fire({
                    icon: 'warning',
                    title: 'Nomor HP Sudah Terdaftar!',
                    text: '{{ session('error_nomor_hp') }}',
                    confirmButtonColor: '#ffc107'
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
