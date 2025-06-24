@extends('layouts.perusahaan.adminlte.app')

@section('title', 'Manajemen Desa Index')

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
                                <a href="{{ route('desa.create') }}" class="btn btn-custom mr-3" title="Tambah Desa">
                                    <i class="fa-solid fa-house-medical"></i>
                                </a>

                            </div>

                            <!-- Kolom untuk Pencarian -->
                            <div class="col-md-4">
                                <form action="{{ route('desa.search') }}" method="GET">
                                    <div class="search-box">
                                        <i class="fas fa-search"></i>
                                        <input type="text" name="nama_desa" class="form-control"
                                            placeholder="Cari Desa&hellip;">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Desa</th>
                                <th>Alamat Desa</th>
                                <th>Logo Desa</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($desa->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="alert alert-warning">
                                            <strong>Data tidak ditemukan!</strong> Tidak ada data desa yang
                                            tersedia.
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($desa as $index => $data)
                                    <tr>
                                        <td>{{ ($desa->currentPage() - 1) * $desa->perPage() + $loop->iteration }}</td>
                                        <td>{{ $data->nama_desa }}</td>
                                        <td>{{ $data->alamat_desa }}</td>
                                        <td class="form-group">
                                            @if ($data->logo_desa && file_exists(public_path('storage/' . $data->logo_desa)))
                                                <img src="{{ asset('storage/' . $data->logo_desa) }}" class="img-thumbnail"
                                                    width="100">
                                            @else
                                                <img src="{{ asset('storage/default_image/default.png') }}"
                                                    class="img-thumbnail" width="100">
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ route('desa.show', $data->id) }}" class="view" title="View"
                                                data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                            <a href="{{ route('desa.edit', $data->id) }}" class="edit" title="Edit"
                                                data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                            <form action="{{ route('desa.destroy', $data->id) }}" method="POST"
                                                class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="delete-btn" title="Delete"
                                                    data-toggle="tooltip" data-id="{{ $data->id }}"
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
                        {{ $desa->onEachSide(1)->links('pagination::bootstrap-4') }}
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
        @if ($desa->isEmpty())
            Swal.fire({
                icon: 'warning',
                title: 'Data Kosong!',
                text: 'Tidak ada data desa yang tersedia.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                color: "#fff",
                background: "#283a5ae6"
            });
        @endif
    </script>

@endsection
