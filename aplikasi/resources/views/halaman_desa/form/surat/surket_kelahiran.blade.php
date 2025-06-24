<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Surat Desa</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('asset_halaman_desa/css/form_penyuratan.css') }}">
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section class="container forms">
        <div class="form register">
            <div class="form-content">
                <header>Pengajuan Surat Keterangan Kelahiran</header>
                <form action="{{ route('keterangan_kelahiran.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div id="#"> <!-- Isi Form -->
                        <div class="mb-3">
                            <label class="form-label">Nama Bayi</label>
                            <input type="text" class="form-control" name="nama_bayi" value="{{ old('nama_bayi') }}" required>
                        </div>                        
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required>
                        </div>                        
                        <div class="mb-3">
                            <label class="form-label">Scan KK Orang Tua</label>
                            <input type="file" class="form-control" name="scan_kk_orang_tua" value="{{ old('scan_kk_orang_tua') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Scan KTP Orang Tua</label>
                            <input type="file" class="form-control" name="scan_ktp_orang_tua" value="{{ old('scan_ktp_orang_tua') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin Bayi</label>
                            <input type="text" class="form-control" name="jenis_kelamin" value="{{ old('jenis_kelamin') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pukul Kelahiran</label>
                            <input type="time" class="form-control" name="pukul_kelahiran" value="{{ old('pukul_kelahiran') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Anak Ke</label>
                            <input type="number" class="form-control" name="anak_ke" value="{{ old('anak_ke') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Berat Bayi (kg)</label>
                            <input type="number" step="0.1" class="form-control" placeholder="contoh: 10,1" name="berat_bayi" value="{{ old('berat_bayi') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Panjang Bayi (kg)</label>
                            <input type="number" step="0.1" class="form-control" placeholder="contoh: 10,1" name="panjang_bayi" value="{{ old('berat_bayi') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" name="nama_ayah" value="{{ old('nama_ayah') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK Ayah</label>
                            <input type="number" class="form-control" name="nik_ayah" value="{{ old('nik_ayah') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu" value="{{ old('nama_ibu') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK Ibu</label>
                            <input type="number" class="form-control" name="nik_ibu" value="{{ old('nik_ibu') }}" required>
                        </div>
                    </div> <!-- End -->
                
                    <button type="submit" class="btn-submit">Ajukan Surat</button>
                </form>
                
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
                    window.location.href = "{{ route('dashboard_warga.index') }}";
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
</body>

</html>
