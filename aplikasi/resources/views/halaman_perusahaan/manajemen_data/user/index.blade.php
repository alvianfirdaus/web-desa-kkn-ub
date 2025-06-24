@extends('layouts.perusahaan.adminlte.app')

@section('title', 'Manajemen Data User')

@section('content')

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('asset_halaman_perusahaan/css/crud.css') }}">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
                                <a href="{{ route('user.create') }}" class="btn btn-custom mr-3" title="Tambah User">
                                    <i class="fas fa-user-plus"></i>
                                </a>

                                <form action="{{ route('user.index') }}" method="GET" class="form-inline" title="Filter Berdasarkan Level">
                                    <div class="input-group">
                                        <select name="level" class="form-control" onchange="this.form.submit()">
                                            <option value="semua"
                                                {{ request('level') == 'semua' || !request('level') ? 'selected' : '' }}>
                                                Semua level</option>
                                            <option value="admin" {{ request('level') == 'admin' ? 'selected' : '' }}>
                                                Admin</option>
                                            <option value="petugas" {{ request('level') == 'petugas' ? 'selected' : '' }}>
                                                Petugas</option>
                                            <option value="warga" {{ request('level') == 'warga' ? 'selected' : '' }}>
                                                Warga</option>
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <!-- Kolom untuk Pencarian -->
                            <div class="col-md-4">
                                <form action="{{ route('user.search') }}" method="GET">
                                    <div class="search-box">
                                        <i class="material-icons">&#xE8B6;</i>
                                        <input type="text" name="nama_lengkap" class="form-control"
                                            placeholder="Cari User&hellip;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr class="center">
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Level</th>
                                <th>Desa</th>
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
                                @foreach ($users as $index => $user)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->nama_lengkap }}</td>
                                        <td>{{ ucfirst($user->level) }}</td>
                                        <td>{{ $user->desa->nama_desa ?? 'Belum terdaftar' }}</td>
                                        <td>
                                            <a href="{{ route('user.show', $user->id) }}" class="view" title="View"
                                                data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                            <a href="{{ route('user.edit', $user->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE254;</i></a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="delete-btn" title="Delete"
                                                    data-toggle="tooltip" data-id="{{ $user->id }}"
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
    </body>

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
            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'ERROR',
                    text: "{{ session('error') }}",
                    background: "#283a5ae6",
                    color: "#fff"
                });
            @endif
        });
        @if ($users->isEmpty())
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
@endsection
