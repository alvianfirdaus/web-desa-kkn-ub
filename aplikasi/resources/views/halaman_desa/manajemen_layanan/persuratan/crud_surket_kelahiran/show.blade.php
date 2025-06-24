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
                            <h3 class="card-title">Detail Surat Keterangan Kelahiran</h3>
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
                                    <label>Nama Bayi</label>
                                    <input type="text" class="form-control" value="{{ $surat->nama_bayi }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="{{ $surat->tanggal_lahir }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($surat->tempat_lahir) }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin Bayi</label>
                                    <input type="text" class="form-control" value="{{ $surat->jenis_kelamin }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pukul Kelahiran Bayi</label>
                                    <input type="time" class="form-control" value="{{ $surat->pukul_kelahiran }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Anak Ke</label>
                                    <input type="number" class="form-control" value="{{ $surat->anak_ke }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Berat Bayi</label>
                                    <input type="number" class="form-control" value="{{ $surat->berat_bayi }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Panjang Bayi</label>
                                    <input type="number" class="form-control" value="{{ $surat->berat_bayi }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ayah</label>
                                    <input type="text" class="form-control" value="{{ $surat->nama_ayah }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>NIK Ayah</label>
                                    <input type="numver" class="form-control" value="{{ $surat->nik_ayah }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Ibu</label>
                                    <input type="text" class="form-control" value="{{ $surat->nama_ibu }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>NIK Ibu</label>
                                    <input type="numver" class="form-control" value="{{ $surat->nik_ibu }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Scan KK Orang Tua</label>
                                    @if ($surat->scan_kk_orang_tua && file_exists(public_path('storage/' . $surat->scan_kk_orang_tua)))
                                        <img src="{{ asset('storage/' . $surat->scan_kk_orang_tua) }}" class="img-thumbnail"
                                            width="150">
                                    @else
                                        <img src="{{ asset('storage/default_image/default.png') }}" class="img-thumbnail"
                                            width="150">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Scan KTP Orang Tua</label>
                                    @if ($surat->scan_ktp_orang_tua && file_exists(public_path('storage/' . $surat->scan_ktp_orang_tua)))
                                        <img src="{{ asset('storage/' . $surat->scan_ktp_orang_tua) }}"
                                            class="img-thumbnail" width="150">
                                    @else
                                        <img src="{{ asset('storage/default_image/default.png') }}" class="img-thumbnail"
                                            width="150">
                                    @endif
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
