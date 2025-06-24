@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Warga Update')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Update Warga</h3>
                        </div>
                        <form action="{{ route('manajemen_surat.update', $surat->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $surat->nama }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control" name="nik" value="{{ $surat->nik }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="no_kk">No KK</label>
                                    <input type="number" class="form-control" name="no_kk" value="{{ $surat->no_kk }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_lama">Alamat Lama</label>
                                    <input type="text" class="form-control" name="alamat_lama"
                                        value="{{ $surat->alamat_lama }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat_baru">Alamat Baru</label>
                                    <input type="text" class="form-control" name="alamat_baru"
                                        value="{{ $surat->alamat_baru }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="alasan_permohonan">Alasan Permohonan</label>
                                    <input type="text" class="form-control" name="alasan_permohonan"
                                        value="{{ $surat->alasan_permohonan }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status Surat</label>
                                    <select name="status" class="form-control" required>
                                        <option value="pending" {{ $surat->surat->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="ditolak" {{ $surat->surat->status == 'ditolak' ? 'selected' : '' }}>
                                            Ditolak</option>
                                        <option value="diproses"
                                            {{ $surat->surat->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="selesai" {{ $surat->surat->status == 'selesai' ? 'selected' : '' }}>
                                            Selesai</option>
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
                    window.location.href = "{{ route('manajemen_surat.index') }}";
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
