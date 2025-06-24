@extends('layouts.perusahaan.adminlte.app')

@section('title', 'Manajemen Desa Show')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Show Desa</h3>
                        </div>
                        <form>
                            <div class="card-body">                                
                                <div class="form-group">
                                    <label for="#">Nama</label>
                                    <input type="text" class="form-control" value="{{ $desa->nama_desa }}"  placeholder="Nama Desa" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="#">Alamat</label>
                                    <input type="text" class="form-control" value="{{ $desa->alamat_desa }}" placeholder="Alamat Desa" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="#">Kode Pos</label>
                                    <input type="text" class="form-control" value="{{ $desa->kode_pos }}" placeholder="Kode Pos Desa" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="#">Kabupaten</label>
                                    <input type="text" class="form-control" value="{{ $desa->kabupaten }}" placeholder="Kabupaten Desa" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="#">Kecamatan</label>
                                    <input type="text" class="form-control" value="{{ $desa->kecamatan }}" placeholder="Kecamatan Desa" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="#">Kelurahan</label>
                                    <input type="text" class="form-control" value="{{ $desa->kelurahan }}" placeholder="Kelurahan Desa" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="#">No Hp Desa</label>
                                    <input type="text" class="form-control" value="{{ $desa->no_hp }}" placeholder="Nomor Hp Desa" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="#">Nama Kepala Desa</label>
                                    <input type="text" class="form-control" value="{{ $desa->nama_kades }}" placeholder="Nama Desa" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="#">NIP Kepala Desa</label>
                                    <input type="text" class="form-control" value="{{ $desa->nip_kades }}" placeholder="NIP Desa" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="#">Tanggal Desa Didaftarkan</label>
                                    <input type="text" class="form-control" value="{{ $desa->created_at }}" placeholder="Tanggal Desa Didaftarkan" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Logo Desa</label>
                                    @if ($desa->logo_desa && file_exists(public_path('storage/' . $desa->logo_desa)))
                                        <img src="{{ asset('storage/' . $desa->logo_desa) }}" class="img-thumbnail"
                                            width="150">
                                    @else
                                        <img src="{{ asset('storage/default_image/default.png') }}" class="img-thumbnail"
                                            width="150">
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>TTD Kepala Desa</label>
                                    @if ($desa->ttd_kades && file_exists(public_path('storage/' . $desa->ttd_kades)))
                                        <img src="{{ asset('storage/' . $desa->ttd_kades) }}" class="img-thumbnail"
                                            width="150">
                                    @else
                                        <img src="{{ asset('storage/default_image/default.png') }}" class="img-thumbnail"
                                            width="150">
                                    @endif
                                </div>
                                                                
                            </div>                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

