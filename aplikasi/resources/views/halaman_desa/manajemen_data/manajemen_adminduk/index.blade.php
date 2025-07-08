@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Data Adminduk')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('asset_halaman_desa/css/crud.css') }}">
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4>Manajemen Data Adminduk</h4>
                        </div>
                    </div>
                </div>

                @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>Penduduk</th>
                            <th>Laki-laki</th>
                            <th>Wanita</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $adminduk)
                            <tr data-id="{{ $adminduk->id }}">
                                <td>
                                    <input type="number" class="form-control form-control-sm penduduk" value="{{ $adminduk->penduduk }}" disabled>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm laki" value="{{ $adminduk->laki_laki }}" disabled>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm wanita" value="{{ $adminduk->wanita }}" disabled>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('adminduk.update', $adminduk->id) }}" method="POST" class="d-inline form-update">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="penduduk" class="input-penduduk" value="{{ $adminduk->penduduk }}">
                                        <input type="hidden" name="laki_laki" class="input-laki" value="{{ $adminduk->laki_laki }}">
                                        <input type="hidden" name="wanita" class="input-wanita" value="{{ $adminduk->wanita }}">
                                        <button type="button" class="btn btn-warning btn-sm btn-edit" title="Edit">
                                            <i class="material-icons">&#xE254;</i>
                                        </button>
                                        <button type="submit" class="btn btn-success btn-sm btn-save d-none" title="Simpan">
                                            <i class="material-icons">&#xE161;</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <div class="alert alert-warning mb-0">Tidak ada data kependudukan yang tersedia.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(function () {
            $('.btn-edit').on('click', function () {
                const row = $(this).closest('tr');
                row.find('input[type=number]').prop('disabled', false);
                row.find('.btn-edit').addClass('d-none');
                row.find('.btn-save').removeClass('d-none');
            });

            $('.btn-save').on('click', function () {
                const row = $(this).closest('tr');
                const penduduk = row.find('.penduduk').val();
                const laki = row.find('.laki').val();
                const wanita = row.find('.wanita').val();

                row.find('.input-penduduk').val(penduduk);
                row.find('.input-laki').val(laki);
                row.find('.input-wanita').val(wanita);
                row.find('form').submit();
            });
        });
    </script>
</body>
@endsection
