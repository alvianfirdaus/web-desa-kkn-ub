@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Data Warga')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('asset_halaman_desa/css/crud.css') }}">
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row align-items-center">
                        <div class="col-md-8 d-flex align-items-center">
                            <a href="{{ route('petugas.create') }}" class="btn btn-custom mr-3" title="Tambah Warga">
                                <i class="fas fa-user-plus"></i>
                            </a>

                            <form action="{{ route('petugas.index') }}" method="GET" class="form-inline" title="Filter Berdasarkan Level">
                                <div class="input-group">
                                    
                                    
                                </div>
                            </form>
                        </div>

                        <!-- Kolom untuk Pencarian -->
                        <div class="col-md-4">
                            <div class="d-flex align-items-center">
                                <form action="{{ route('petugas.search') }}" method="GET" class="flex-grow-1 mr-2">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                                        </div>
                                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Cari Perangkat">
                                    </div>
                                </form>
                                <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#rfidModal" title="Scan RFID">
                                    <i class="fas fa-id-card"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Modal instruksi RFID -->
                        <div class="modal fade" id="rfidModal" tabindex="-1" role="dialog" aria-labelledby="rfidModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rfidModalLabel">Scan KTP RFID</h5>
                                    </div>
                                    <div class="modal-body text-center">
                                        <i class="fas fa-id-card fa-4x mb-3" style="color: #168d06;"></i>
                                        <p class="lead">Tempelkan KTP Anda pada reader RFID</p>
                                        <div class="spinner-border text-primary mt-3" role="status" id="rfidSpinner">
                                            <span class="sr-only">Menunggu scan...</span>
                                        </div>

                                        <!-- Form RFID yang sebenarnya (tersembunyi) -->
                                        <form id="rfidForm" action="{{ route('petugas.search-by-rfid') }}" method="GET" class="mt-3">
                                            <input type="text"
                                                name="id_ktp"
                                                id="rfidInput"
                                                class="form-control text-center"
                                                placeholder="Sedang menunggu scan..."
                                                autofocus>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr class="center">
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Pekerjaan</th>
                            <th>Nomor Hp</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($users->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center">
                                <div class="alert alert-warning">
                                    <strong>Data tidak ditemukan!</strong> Tidak ada data pendaftaran user yang
                                    tersedia.
                                </div>
                            </td>
                        </tr>
                        @else
                        @foreach ($users as $w)
                        <tr>
                            <td>
                                @if ($w->foto && file_exists(public_path('storage/' . $w->foto)))
                                <img src="{{ asset('storage/' . $w->foto) }}" class="img-thumbnail"
                                    width="150">
                                @else
                                <img src="{{ asset('storage/default_image/default.png') }}"
                                    class="img-thumbnail" width="150">
                                @endif
                            </td>
                            <td>{{ $w->nama_lengkap }}</td>
                            <td>{{ $w->pekerjaan }}</td>
                            <td>{{ $w->no_hp }}</td>
                            <td>
                                <a href="{{ route('petugas.show', $w->id) }}" class="view" title="View"
                                    data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                <a href="{{ route('petugas.edit', $w->id) }}" class="edit" title="Edit"
                                    data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                <form action="{{ route('petugas.destroy', $w->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="delete-btn" title="Delete"
                                        data-toggle="tooltip" data-id="{{ $w->id }}"
                                        style="border: none; background: none;">
                                        <i class="material-icons">&#xE872;</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    {{ $users->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // SweetAlert untuk konfirmasi penghapusan data
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    let form = this.closest('.delete-form');
                    Swal.fire({
                        title: "Apakah Anda yakin?",
                        text: "Data yang dihapus tidak dapat dikembalikan!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Ya, hapus!",
                        background: "#283a5ae6", // Warna background
                        color: "#fff" // Warna teks agar tetap terbaca
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit(); // Submit form jika dikonfirmasi
                        }
                    });
                });
            });

            // SweetAlert jika data pencarian tidak ditemukan
            @if(session('error'))
            Swal.fire({
                icon: 'error',
                title: 'ERROR',
                text: "{{ session('error') }}",
                background: "#283a5ae6",
                color: "#fff"
            });
            @endif
        });
        @if($users -> isEmpty())
        Swal.fire({
            icon: 'warning',
            title: 'Data Kosong!',
            text: 'Tidak ada data user yang tersedia.',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK',
            color: "#fff",
            background: "#283a5ae6"
        });
        @endif
    </script>

    <script>
        // Script untuk otomatis submit saat RFID terdeteksi
        document.addEventListener('DOMContentLoaded', function() {
            const rfidInput = document.getElementById('rfidInput');
            const rfidForm = document.getElementById('rfidForm');
            const rfidSpinner = document.getElementById('rfidSpinner');

            // Sembunyikan spinner awal
            rfidSpinner.style.display = 'none';

            rfidInput.addEventListener('input', function(e) {
                if (this.value.length > 0) {
                    // Tampilkan spinner saat proses scan
                    rfidSpinner.style.display = 'block';
                    // Submit form setelah 500ms (bisa disesuaikan)
                    setTimeout(function() {
                        rfidForm.submit();
                    }, 500);
                }
            });

            // Fokuskan input saat modal terbuka
            $('#rfidModal').on('shown.bs.modal', function() {
                $('#rfidInput').trigger('focus');
            });
        });
    </script>

</body>
@endsection