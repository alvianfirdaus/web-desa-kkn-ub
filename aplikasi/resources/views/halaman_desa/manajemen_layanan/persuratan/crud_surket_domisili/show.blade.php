@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Surat Show')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Detail Surat Keterangan Domisili</h3>
                        </div>
                        <form>
                            <div class="card-body">

                                @if (Auth::user()->level === 'admin')
                                    <div class="form-group">
                                        <label>Asal Desa</label>
                                        <input type="text" class="form-control"
                                            value="{{ $surat->surat->desa->nama_desa ?? 'Tidak ada desa' }}" readonly>
                                    </div>
                                @endif

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="{{ $surat->nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" value="{{ $surat->nik }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>No KK</label>
                                    <input type="text" class="form-control" value="{{ $surat->no_kk }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Lama</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($surat->alamat_lama) }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Baru</label>
                                    <input type="text" class="form-control" value="{{ $surat->alamat_baru }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alasan Permohonan</label>
                                    <input type="text" class="form-control"
                                        value="{{ ucfirst($surat->alasan_permohonan) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Diajukan Pada</label>
                                    <input type="text" class="form-control"
                                        value="{{ ucfirst(str_replace('_', ' ', $surat->created_at)) }}" readonly>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
