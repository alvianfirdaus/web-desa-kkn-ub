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
</head>

<body>
    <section class="container forms">
        <div class="form register">
            <div class="form-content">
                <header>Pengajuan Surat Pengantar KTP & KK</header>
                <form action="#" method="#">
                    <br>
                    <div id="#"> <!-- Isi Form -->
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" name="nik" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No KK</label>
                            <input type="text" class="form-control" name="nokk" required>
                        </div>                    
                        <div class="mb-3">
                            <label class="form-label">Jenis Perubahan</label>
                            <input type="text" class="form-control" name="jenis_perubahan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dokumen Pendukung</label>
                            <input type="file" class="form-control" name="scan_dokumen_pendukung" required>
                        </div>
                    </div> <!-- End -->

                    <button type="submit" class="btn-submit">Ajukan Surat</button>
                </form>
            </div>
        </div>
    </section>

</body>

</html>