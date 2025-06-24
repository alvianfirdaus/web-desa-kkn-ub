@extends('layouts.desa.adminlte.app')

@section('title', 'Pengaduan Warga Show')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Detail Pengaduan Warga</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Warga</label>
                                    <input type="text" class="form-control" value="{{ $pengaduan->user->nama_lengkap }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Judul Pengaduan</label>
                                    <input type="text" class="form-control" value="{{ $pengaduan->judul }}" readonly>
                                </div>

                                @if (Auth::user()->level === 'admin')
                                    <div class="form-group">
                                        <label>Nama Desa</label>
                                        <input type="text" class="form-control"
                                            value="{{ $pengaduan->user->desa->nama_desa ?? 'Tidak ada desa' }}" readonly>
                                    </div>
                                @else
                                    <input type="hidden" name="level" value="warga">
                                @endif

                                <div class="form-group">
                                    <label>Isi Pengaduan</label>
                                    <input type="text" class="form-control" value="{{ $pengaduan->pesan }}" readonly>
                                </div>                                                                              
                                <div class="form-group">
                                    <label>Status</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($pengaduan->status) }}"
                                        readonly>
                                </div>                                                                

                                @if (Auth::user()->level === 'admin')
                                    <div class="form-group">
                                        <label>Level</label>
                                        <input type="text" class="form-control" value="{{ ucfirst($pengaduan->user->level) }}"
                                            readonly>
                                    </div>
                                @else
                                    <input type="hidden" name="level" value="warga">
                                @endif

                                <div class="form-group">
                                    <label>Nomor Hp</label>
                                    <input type="text" class="form-control" value="{{ $pengaduan->user->no_hp }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Watu Diajukan</label>
                                    <input type="timestamp" class="form-control" value="{{ $pengaduan->created_at }}" readonly>
                                </div>                  
                                <div class="form-group">
                                    <label>Foto</label>
                                    @if ($pengaduan->user->foto && file_exists(public_path('storage/' . $user->foto)))
                                        <img src="{{ asset('storage/' . $user->foto) }}" class="img-thumbnail"
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
