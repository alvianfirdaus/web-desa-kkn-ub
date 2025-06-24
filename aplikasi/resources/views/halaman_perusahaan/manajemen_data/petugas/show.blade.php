@extends('layouts.perusahaan.adminlte.app')

@section('title', 'Detail Petugas')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Detail Data Pendaftaran Petugas</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaran->nama_lengkap }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Nomor Hp</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaran->nomor_hp }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Nama Desa</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaran->nama_desa }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaran->nik }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaran->status }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Mendaftar</label>
                                    <input type="text" class="form-control" value="{{ $pendaftaran->created_at }}" readonly>
                                </div>
                            </div>
                        </form>
                        <div class="card-footer">
                            <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
