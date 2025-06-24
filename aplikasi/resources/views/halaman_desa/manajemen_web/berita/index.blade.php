@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Berita Index')

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
                        <div class="row">
                            <div class="col-sm-8">
                                <h2>Blog Berita </h2>
                            </div>
                            <div class="col-sm-8">
                                <a href="http://127.0.0.1:8000/desa/dashboard/manajemen_web/berita/create"
                                    class="btn btn-custom"> 
                                    Tambah Berita
                                </a>
                            </div>

                            <div class="col-sm-4">
                                <div class="search-box">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" placeholder="Cari Berita&hellip;">
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div>
                        <div class="col-sm-8">
                            <h4>Filter Berita </h4>
                        </div>

                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-primary">Semua</button>
                            <button type="button" class="btn btn-success">Pariwisata</button>
                            <button type="button" class="btn btn-secondary">Berita</button>
                            <button type="button" class="btn btn-danger">Pengumuman</button>
                        </div>
                    </div> --}}
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Isi</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>01-01-2002</td>
                                <td>Judul Blog</td>
                                <td>Isi Blog</td>
                                <td><img src="{{ asset('asset_halaman_desa/adminlte/dist/img/user2-160x160.jpg') }}"
                                        class="img-circle elevation-2" alt="User Image"></td>

                                <td>
                                    <a href="http://127.0.0.1:8000/desa/dashboard/manajemen_web/berita/show" class="view"
                                        title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                                    <a href="http://127.0.0.1:8000/desa/dashboard/manajemen_web/berita/update"
                                        class="edit" title="Edit" data-toggle="tooltip"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>01-01-2002</td>
                                <td>Judul Blog</td>
                                <td>Isi Blog</td>
                                <td><img src="{{ asset('asset_halaman_desa/adminlte/dist/img/user2-160x160.jpg') }}"
                                        class="img-circle elevation-2" alt="User Image"></td>

                                <td>
                                    <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                            class="material-icons">&#xE417;</i></a>
                                    <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>01-01-2002</td>
                                <td>Judul Blog</td>
                                <td>Isi Blog</td>
                                <td><img src="{{ asset('asset_halaman_desa/adminlte/dist/img/user2-160x160.jpg') }}"
                                        class="img-circle elevation-2" alt="User Image"></td>

                                <td>
                                    <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                            class="material-icons">&#xE417;</i></a>
                                    <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>01-01-2002</td>
                                <td>Judul Blog</td>
                                <td>Isi Blog</td>
                                <td><img src="{{ asset('asset_halaman_desa/adminlte/dist/img/user2-160x160.jpg') }}"
                                        class="img-circle elevation-2" alt="User Image"></td>

                                <td>
                                    <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                            class="material-icons">&#xE417;</i></a>
                                    <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>01-01-2002</td>
                                <td>Judul Blog</td>
                                <td>Isi Blog</td>
                                <td><img src="{{ asset('asset_halaman_desa/adminlte/dist/img/user2-160x160.jpg') }}"
                                        class="img-circle elevation-2" alt="User Image"></td>

                                <td>
                                    <a href="#" class="view" title="View" data-toggle="tooltip"><i
                                            class="material-icons">&#xE417;</i></a>
                                    <a href="#" class="edit" title="Edit" data-toggle="tooltip"><i
                                            class="material-icons">&#xE254;</i></a>
                                    <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                            class="material-icons">&#xE872;</i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="clearfix">
                        {{-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> --}}
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#"><i class="fa fa-angle-double-left"></i></a>
                            </li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">4</a></li>
                            <li class="page-item"><a href="#" class="page-link">5</a></li>
                            <li class="page-item"><a href="#" class="page-link"><i
                                        class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
