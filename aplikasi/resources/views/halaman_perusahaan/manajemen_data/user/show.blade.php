@extends('layouts.perusahaan.adminlte.app')

@section('title', 'Manajemen User Show')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Detail User</h3>
                        </div>
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" class="form-control" value="{{ $user->nama_lengkap }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" class="form-control" value="{{ $user->nik }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nama Desa</label>
                                    <input type="text" class="form-control"
                                        value="{{ $user->desa->nama_desa ?? 'Tidak ada desa' }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="{{ $user->tanggal_lahir }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($user->jenis_kelamin) }}"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="{{ $user->alamat }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($user->agama) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <input type="text" class="form-control"
                                        value="{{ ucfirst(str_replace('_', ' ', $user->status_perkawinan)) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($user->level) }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Nomor Hp</label>
                                    <input type="text" class="form-control" value="{{ $user->no_hp }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>RFID KTP</label>
                                    <input type="text" class="form-control" value="{{ $user->id_ktp }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan</label>
                                    <input type="text" class="form-control" value="{{ $user->pendidikan }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" class="form-control" value="{{ $user->pekerjaan }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    @if ($user->foto && file_exists(public_path('storage/' . $user->foto)))
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
