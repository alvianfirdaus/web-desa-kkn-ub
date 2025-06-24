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
                <header>Pengajuan Surat Keterangan Domisili</header>

                <!-- Form Pengajuan Surat -->
                <form action="{{ route('keterangan_domisili.store') }}" method="POST">
                    @csrf
                    <br>
                    <div> <!-- Isi Form -->                        
                        <div class="mb-3">
                            <label class="form-label">No KK</label>
                            <input type="text" class="form-control" name="no_kk" value="{{ old('no_kk') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Lama</label>
                            <input type="text" class="form-control" name="alamat_lama" value="{{ old('alamat_lama') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Baru</label>
                            <input type="text" class="form-control" name="alamat_baru" value="{{ old('alamat_baru') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alasan Permohonan</label>
                            <input type="text" class="form-control" name="alasan_permohonan" value="{{ old('alasan_permohonan') }}" required>
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
