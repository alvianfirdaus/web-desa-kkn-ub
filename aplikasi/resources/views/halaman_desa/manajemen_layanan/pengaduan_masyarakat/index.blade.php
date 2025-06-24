@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Pengaduan')

@section('content')

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('asset_halaman_desa/css/crud.css') }}">
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
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
                                <form action="{{ route('manajemen_pengaduan.index') }}" method="GET" class="form-inline" title="Filter Berdasarkan Status">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-filter"></i></span>
                                        </div>
                                        <select name="status" class="form-control" onchange="this.form.submit()">
                                            <option value="semua"
                                                {{ request('status') == 'semua' || !request('status') ? 'selected' : '' }}>
                                                Semua Status
                                            </option>
                                            <option value="diajukan"
                                                {{ request('status') == 'diajukan' ? 'selected' : '' }}>
                                                Diajukan
                                            </option>
                                            <option value="diproses"
                                                {{ request('status') == 'diproses' ? 'selected' : '' }}>
                                                Diproses
                                            </option>
                                            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>
                                                Selesai
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr class="center">
                                <th>Nama Pengadu</th>
                                <th>Judul Pengaduan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pengaduan->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="alert alert-warning">
                                            <strong>Data tidak ditemukan!</strong> Tidak ada data pengaduan masyarakat.
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($pengaduan as $p)
                                    <tr>
                                        <td>{{ $p->user->nama_lengkap }}</td>
                                        <td>{{ $p->judul }}</td>
                                        <td>{{ $p->status }}</td>
                                        <td>
                                            <a href="{{ route('manajemen_pengaduan.show', $p->id) }}" class="view"
                                                title="View" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE417;</i></a>
                                            <a href="{{ route('manajemen_pengaduan.edit', $p->id) }}" class="edit"
                                                title="Edit" data-toggle="tooltip"><i
                                                    class="material-icons">&#xE254;</i></a>
                                            <form action="{{ route('manajemen_pengaduan.destroy', $p->id) }}"
                                                method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="delete-btn" title="Delete"
                                                    data-toggle="tooltip" data-id="{{ $p->id }}"
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
                        {{ $pengaduan->onEachSide(1)->links('pagination::bootstrap-4') }}
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

            });
            @if ($pengaduan->isEmpty())
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Kosong!',
                    text: 'Tidak ada data pengaduan yang ada.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    color: "#fff",
                    background: "#283a5ae6"
                });
            @endif
        </script>

    </body>
@endsection
