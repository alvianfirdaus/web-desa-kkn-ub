@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Layanan Persuratan Index')

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
                            <!-- Combined Filter Section -->
                            <div class="col-md-8 pr-1 d-flex align-items-center">
                                <!-- Filter Status -->
                                <div class="mr-2">
                                    <form action="{{ route('manajemen_surat.index') }}" method="GET" class="form-inline" title="Filter Berdasarkan Status">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-filter"></i></span>
                                            </div>
                                            <select name="status" class="form-control" onchange="this.form.submit()">
                                                <option value="semua" {{ request('status') == 'semua' || !request('status') ? 'selected' : '' }}>Semua Status</option>
                                                <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                                <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>

                                <!-- Filter Rentang Tanggal -->
                                <div class="ml-2">
                                    <form method="GET" action="{{ route('manajemen_surat.index') }}" class="form-inline" title="Filter Berdasarkan Tanggal">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" name="tanggal_awal" class="form-control"
                                                   value="{{ request('tanggal_awal') }}" placeholder="Tanggal Awal">
                                            <div class="input-group-prepend input-group-append">
                                                <span class="input-group-text bg-white">-</span>
                                            </div>
                                            <input type="date" name="tanggal_akhir" class="form-control"
                                                   value="{{ request('tanggal_akhir') }}" placeholder="Tanggal Akhir">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                                <a href="{{ route('manajemen_surat.index') }}" class="btn btn-secondary">
                                                    <i class="fas fa-sync-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <!-- Pencarian Nomor Surat -->
                            <div class="col-md-4">
                                <form method="GET" action="{{ route('manajemen_surat.index') }}">
                                    <div class="search-box">
                                        <i class="material-icons">&#xE8B6;</i>
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari Nomor Surat &hellip;" value="{{ request('search') }}">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Jenis Surat</th>
                                <th>Nama Pemohon</th>
                                <th>Status Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($surat->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <div class="alert alert-warning">
                                            <strong>Data tidak ditemukan!</strong> Tidak ada data surat yang
                                            ada.
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @forelse ($surat as $key => $s)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $s->created_at->format('d-m-Y') }}</td>
                                        <td>{{ $s->jenisSurat() }}</td>
                                        <td>{{ $s->user->nama_lengkap ?? 'Tidak Diketahui' }}</td>
                                        <td>{{ ucfirst($s->status) }}</td>
                                        <td>
                                            <div class="d-flex justify-content-between" style="min-width: 120px;">
                                                <!-- View Button -->
                                                <a href="{{ route('manajemen_surat.show', ['id' => $s->id]) }}"
                                                    class="view" title="Lihat Detail" data-toggle="tooltip">
                                                    <i class="material-icons">&#xE417;</i>
                                                </a>

                                                <!-- Edit Button -->
                                                <a href="{{ route('manajemen_surat.edit', ['id' => $s->id]) }}"
                                                    class="edit" title="Edit" data-toggle="tooltip">
                                                    <i class="material-icons">&#xE254;</i>
                                                </a>

                                                <!-- Print Button -->
                                                <a href="{{ route('warga.surat.cetak', ['id' => $s->id]) }}" class="print"
                                                    title="Cetak" data-toggle="tooltip">
                                                    <i class="material-icons">&#xE8AD;</i>
                                                </a>

                                                <!-- Delete Button -->
                                                <form action="{{ route('manajemen_surat.destroy', ['id' => $s->id]) }}"
                                                    method="POST" class="d-inline delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="delete-btn" title="Delete"
                                                        data-toggle="tooltip"
                                                        style="border: none; background: none; padding: 0;">
                                                        <i class="material-icons">&#xE872;</i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Belum ada surat</td>
                                    </tr>
                                @endforelse
                            @endif
                        </tbody>

                    </table>
                    <div class="d-flex justify-content-center">
                        {{ $surat->onEachSide(10)->links('pagination::bootstrap-4') }}
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
            @if ($surat->isEmpty())
                Swal.fire({
                    icon: 'warning',
                    title: 'Data Kosong!',
                    text: 'Tidak ada data surat yang ada.',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK',
                    color: "#fff",
                    background: "#283a5ae6"
                });
            @endif
        </script>

    </body>

@endsection
