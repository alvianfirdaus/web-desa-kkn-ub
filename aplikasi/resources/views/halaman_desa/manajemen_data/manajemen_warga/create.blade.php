@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Warga Create')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Tambah Data Perangkat Desa</h3>
                        </div>
                        <form method="POST" action="{{ route('petugas.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">

                                <div class="form-group">
                                    @if (Auth::user()->level === 'admin')
                                        <div class="form-group">
                                            <label>Nama Desa</label>
                                            <select class="form-control @error('id_desa') is-invalid @enderror"
                                                name="id_desa">
                                                @foreach ($desa as $d)
                                                    <option value="{{ $d->id }}"
                                                        {{ old('id_desa') == $d->id ? 'selected' : '' }}>
                                                        {{ $d->nama_desa }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('id_desa')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                        id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap"
                                        value="{{ old('nama_lengkap') }}">
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <select class="form-control @error('status_perkawinan') is-invalid @enderror"
                                        name="status_perkawinan">
                                        <option value="belum_menikah"
                                            {{ old('status_perkawinan') == 'belum_menikah' ? 'selected' : '' }}>Belum
                                            Menikah</option>
                                        <option value="menikah"
                                            {{ old('status_perkawinan') == 'menikah' ? 'selected' : '' }}>Menikah</option>
                                        <option value="cerai_hidup"
                                            {{ old('status_perkawinan') == 'cerai_hidup' ? 'selected' : '' }}>Cerai Hidup
                                        </option>
                                        <option value="cerai_mati"
                                            {{ old('status_perkawinan') == 'cerai_mati' ? 'selected' : '' }}>Cerai Mati
                                        </option>
                                    </select>
                                    @error('status_perkawinan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" placeholder="NIK" value="{{ old('nik') }}">
                                    @error('nik')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
                                    @error('tanggal_lahir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control @error('jenis_kelamin') is-invalid @enderror"
                                        name="jenis_kelamin">
                                        <option value="laki-laki"
                                            {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="perempuan"
                                            {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                        id="alamat" name="alamat" placeholder="Alamat" value="{{ old('alamat') }}">
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control @error('agama') is-invalid @enderror" name="agama">
                                        <option value="islam" {{ old('agama') == 'islam' ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="kristen" {{ old('agama') == 'kristen' ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="hindu" {{ old('agama') == 'hindu' ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="budha" {{ old('agama') == 'budha' ? 'selected' : '' }}>Budha
                                        </option>
                                        <option value="konghucu" {{ old('agama') == 'konghucu' ? 'selected' : '' }}>
                                            Konghucu</option>
                                        <option value="lainnya" {{ old('agama') == 'lainnya' ? 'selected' : '' }}>Lainnya
                                        </option>
                                    </select>
                                    @error('agama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                @if (Auth::user()->level === 'admin')
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control @error('level') is-invalid @enderror" name="level">
                                            <option value="petugas" {{ old('level') == 'petugas' ? 'selected' : '' }}>
                                                Petugas</option>
                                            <option value="warga" {{ old('level') == 'warga' ? 'selected' : '' }}>Warga
                                            </option>
                                        </select>
                                        @error('level')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                @else
                                    <input type="hidden" name="level" value="warga">
                                @endif

                                <div class="form-group">
                                    <label for="foto">Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto"
                                                name="foto">
                                            <label class="custom-file-label" for="foto">Pilih Gambar</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Hp</label>
                                    <input type="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                                        id="no_hp" name="no_hp" placeholder="Nomor Hp"
                                        value="{{ old('no_hp') }}">
                                    @error('no_hp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>pendidikan</label>
                                    <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan">
                                        <option value="belum_sekolah" {{ old('pendidikan') == 'belum_sekolah' ? 'selected' : '' }}>Belum Sekolah/Tidak Tamat
                                        </option>
                                        <option value="sd" {{ old('pendidikan') == 'sd' ? 'selected' : '' }}>SD Sederajat
                                        </option>
                                        <option value="sltp" {{ old('pendidikan') == 'sltp' ? 'selected' : '' }}>SLTP Sederajat
                                        </option>
                                        <option value="slta" {{ old('pendidikan') == 'slta' ? 'selected' : '' }}>SLTA Sederajat
                                        </option>
                                        <option value="diploma" {{ old('pendidikan') == 'diploma' ? 'selected' : '' }}>Diploma
                                        </option>
                                        <option value="sarjana" {{ old('pendidikan') == 'sarjana' ? 'selected' : '' }}>Sarjana
                                        </option>
                                    </select>
                                    @error('pendidikan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <select class="form-control select2 @error('pekerjaan') is-invalid @enderror" name="pekerjaan" style="width: 100%;">

                                        <option value="">-- Pilih Pekerjaan --</option>
                                            <option value="Kepala Desa">Super Admin</option>
                                            <option value="Kepala Desa">Kepala Desa</option>
                                            <option value="Kepala Dusun Bumirejo">Kepala Dusun Bumirejo</option>
                                            <option value="Ketua RW 12">Ketua RW 12</option>
                                            <option value="RT 01 RW 12">RT 01 RW 12</option>
                                            <option value="RT 02 RW 12">RT 02 RW 12</option>
                                            <option value="RT 03 RW 12">RT 03 RW 12</option>
                                            <option value="RT 04 RW 12">RT 04 RW 12</option>
                                            <option value="RT 05 RW 12">RT 05 RW 12</option>
                                            <option value="Ketua RW 13">Ketua RW 13</option>
                                            <option value="RT 01 RW 13">RT 01 RW 13</option>
                                            <option value="RT 02 RW 13">RT 02 RW 13</option>
                                            <option value="RT 03 RW 13">RT 03 RW 13</option>
                                            <option value="RT 04 RW 13">RT 04 RW 13</option>
                                            <option value="Ketua RW 14">Ketua RW 14</option>
                                            <option value="RT 01 RW 14">RT 01 RW 14</option>
                                            <option value="RT 02 RW 14">RT 02 RW 14</option>
                                            <option value="RT 03 RW 14">RT 03 RW 14</option>
                                            <option value="RT 04 RW 14">RT 04 RW 14</option>
                                            <option value="Ketua RW 15">Ketua RW 15</option>
                                            <option value="RT 01 RW 15">RT 01 RW 15</option>
                                            <option value="RT 02 RW 15">RT 02 RW 15</option>
                                            <option value="RT 03 RW 15">RT 03 RW 15</option>
                                    </select>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_ktp">RFID KTP</label>
                                    <input type="text" class="form-control @error('id_ktp') is-invalid @enderror"
                                        id="id_ktp" name="id_ktp" placeholder="Opsional" value="{{ old('id_ktp') }}"
                                        >
                                    @error('id_ktp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-custom">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('foto').addEventListener('change', function(event) {
            var fileName = event.target.files[0] ? event.target.files[0].name : "Pilih Gambar";
            this.nextElementSibling.innerText = fileName;
        });

        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    window.location.href = "{{ route('petugas.index') }}";
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33'
                });
            @endif

            @if ($errors->any())
                let errorMessages = "";
                @foreach ($errors->all() as $error)
                    errorMessages += "{{ $error }}\n";
                @endforeach

                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: errorMessages,
                    confirmButtonColor: '#d33'
                });
            @endif
        });
    </script>
@endsection
