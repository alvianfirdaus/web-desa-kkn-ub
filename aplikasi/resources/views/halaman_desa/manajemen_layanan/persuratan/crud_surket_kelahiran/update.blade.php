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
                            <h3 class="card-title">Update Surat Keterangan Kelahiran</h3>
                        </div>
                        <form action="{{ route('manajemen_surat.update', $surat->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="nama_bayi">Nama Bayi</label>
                                    <input type="text" class="form-control" name="nama_bayi"
                                        value="{{ $surat->nama_bayi }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir"
                                        value="{{ $surat->tanggal_lahir }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="tempat_lahir"
                                        value="{{ $surat->tempat_lahir }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin Bayi</label>
                                    <input type="text" class="form-control" name="jenis_kelamin"
                                        value="{{ $surat->jenis_kelamin }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="pukul_kelahiran">Pukul Kelahiran Bayi</label>
                                    <input type="time" class="form-control" name="pukul_kelahiran"
                                    value="{{ \Carbon\Carbon::parse($surat->pukul_kelahiran)->format('H:i') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="anak_ke">Anak Ke</label>
                                    <input type="text" class="form-control" name="anak_ke" value="{{ $surat->anak_ke }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="berat_bayi">Berat Bayi</label>
                                    <input type="number" step="0.1" class="form-control" name="berat_bayi"
                                        value="{{ $surat->berat_bayi }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="panjang_bayi">Panjang Bayi</label>
                                    <input type="number" step="0.1" class="form-control" name="panjang_bayi"
                                        value="{{ $surat->panjang_bayi }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ayah</label>
                                    <input type="text" class="form-control" name="nama_ayah"
                                        value="{{ $surat->nama_ayah }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik_ayah">NIK Ayah</label>
                                    <input type="number" class="form-control" name="nik_ayah"
                                        value="{{ $surat->nik_ayah }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nama_ayah">Nama Ibu</label>
                                    <input type="text" class="form-control" name="nama_ibu"
                                        value="{{ $surat->nama_ibu }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik_ibu">NIK Ibu</label>
                                    <input type="number" class="form-control" name="nik_ibu" value="{{ $surat->nik_ibu }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="scan_kk_orang_tua">Scan KK Orang Tua Saat Ini</label>
                                    <br>
                                    @if ($surat->scan_kk_orang_tua)
                                        <img src="{{ asset('storage/' . $surat->scan_kk_orang_tua) }}" alt="Logo Desa"
                                            class="img-thumbnail" width="150">
                                    @else
                                        <p>Tidak ada foto</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="scan_kk_orang_tua">Ganti Scan KK Orang Tua</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="scan_kk_orang_tua"
                                                name="scan_kk_orang_tua">
                                            <label class="custom-file-label" for="scan_kk_orang_tua">Pilih Gambar</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="scan_ktp_orang_tua">Scan KTP Orang Tua Saat Ini</label>
                                    <br>
                                    @if ($surat->scan_ktp_orang_tua)
                                        <img src="{{ asset('storage/' . $surat->scan_ktp_orang_tua) }}" alt="Logo Desa"
                                            class="img-thumbnail" width="150">
                                    @else
                                        <p>Tidak ada foto</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="scan_ktp_orang_tua">Ganti Scan KTP Orang Tua</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="scan_ktp_orang_tua"
                                                name="scan_ktp_orang_tua">
                                            <label class="custom-file-label" for="scan_ktp_orang_tua">Pilih Gambar</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status Surat</label>
                                    <select name="status" class="form-control" required>
                                        <option value="pending"
                                            {{ $surat->surat->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="ditolak"
                                            {{ $surat->surat->status == 'ditolak' ? 'selected' : '' }}>
                                            Ditolak</option>
                                        <option value="diproses"
                                            {{ $surat->surat->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                        <option value="selesai"
                                            {{ $surat->surat->status == 'selesai' ? 'selected' : '' }}>
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
        document.getElementById('scan_kk_orang_tua').addEventListener('change', function(event) {
            var fileName = event.target.files[0] ? event.target.files[0].name : "Pilih Gambar";
            this.nextElementSibling.innerText = fileName;
        });
        document.getElementById('scan_ktp_orang_tua').addEventListener('change', function(event) {
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
