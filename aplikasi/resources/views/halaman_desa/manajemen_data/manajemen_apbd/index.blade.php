@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Data APBD')

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
                            <h4>Manajemen Data APBD</h4>
                        </div>
                    </div>
                </div>

                {{-- Pesan sukses --}}
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
                            <th>Pendapatan Desa</th>
                            <th>Belanja Desa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $apbd)
                            <tr data-id="{{ $apbd->id }}">
                                <td>
                                    <input type="number" class="form-control form-control-sm pendes" value="{{ $apbd->pendes }}" disabled>
                                </td>
                                <td>
                                    <input type="number" class="form-control form-control-sm beldes" value="{{ $apbd->beldes }}" disabled>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('apbd.update', $apbd->id) }}" method="POST" class="d-inline form-update">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="pendes" class="input-pendes" value="{{ $apbd->pendes }}">
                                        <input type="hidden" name="beldes" class="input-beldes" value="{{ $apbd->beldes }}">
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
                                <td colspan="3" class="text-center">
                                    <div class="alert alert-warning mb-0">Tidak ada data APBD yang tersedia.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    {{-- jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Script Edit --}}
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
                const pendes = row.find('.pendes').val();
                const beldes = row.find('.beldes').val();

                row.find('.input-pendes').val(pendes);
                row.find('.input-beldes').val(beldes);
                row.find('form').submit();
            });
        });
    </script>
</body>
@endsection
