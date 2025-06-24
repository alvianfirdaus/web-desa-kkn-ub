@extends('layouts.warga.adminlte.app')

@section('title', 'Daftar Surat Saya')

@section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row align-items-center">
                        <div class="col-md-8 pr-1 d-flex align-items-center">
                            <!-- Filter Status -->
                            <div class="mr-2">
                                <form action="{{ route('warga.surat.index') }}" method="GET" class="form-inline" title="Filter Berdasarkan Status">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-filter"></i></span>
                                        </div>
                                        <select name="status" class="form-control" onchange="this.form.submit()">
                                            <option value="semua"
                                                {{ request('status') == 'semua' || !request('status') ? 'selected' : '' }}>
                                                Semua Status</option>
                                            <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak
                                            </option>
                                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending
                                            </option>
                                            <option value="diproses" {{ request('status') == 'diproses' ? 'selected' : '' }}>Diproses
                                            </option>
                                            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai
                                            </option>
                                        </select>
                                    </div>
                                </form>
                            </div>

                            <!-- Filter Rentang Tanggal -->
                            <div class="ml-2">
                                <form method="GET" action="{{ route('warga.surat.index') }}" class="form-inline" title="Filter Berdasarkan Tanggal">
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
                                            <a href="{{ route('warga.surat.index') }}" class="btn btn-secondary">
                                                <i class="fas fa-sync-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Jenis Surat</th>
                            <th>Status Surat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surat as $key => $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->created_at->format('d-m-Y') }}</td>
                                <td>
                                    {{ $s->jenisSurat() }}
                                </td>
                                <td>{{ ucfirst($s->status) }}</td>
                                <td>
                                    @if ($s->status == 'selesai')
                                    <a href="{{ route('warga.surat.cetak', $s->id) }}"
                                       class="print"
                                       title="Cetak"
                                       data-toggle="tooltip">
                                       <i class="material-icons">&#xE8AD;</i>
                                    </a>
                                @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Tidak ada data surat</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

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
                text: 'Tidak ada data surat yang tersedia.',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK',
                color: "#fff",
                background: "#283a5ae6"
            });
        @endif
    </script>
@endsection
