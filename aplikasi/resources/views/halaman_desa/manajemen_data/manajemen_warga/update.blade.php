@extends('layouts.desa.adminlte.app')

@section('title', 'Manajemen Warga Update')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Update Data Pegawai</h3>
                        </div>
                        <form action="{{ route('petugas.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                <div class="form-group">
                                    @if (Auth::user()->level === 'admin')
                                        <label for="id_desa">Nama Desa</label>
                                        <select name="id_desa" class="form-control">
                                            @foreach ($desas as $desa)
                                                <option value="{{ $desa->id }}"
                                                    {{ $user->id_desa == $desa->id ? 'selected' : '' }}>
                                                    {{ $desa->nama_desa }}
                                                </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label for="nama_lengkap">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap"
                                        value="{{ $user->nama_lengkap }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="number" class="form-control" name="nik" value="{{ $user->nik }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir"
                                        value="{{ $user->tanggal_lahir }}" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="laki-laki"
                                            {{ $user->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-Laki</option>
                                        <option value="perempuan"
                                            {{ $user->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="{{ $user->alamat }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select name="agama" class="form-control">
                                        <option value="islam" {{ $user->agama == 'islam' ? 'selected' : '' }}>Islam
                                        </option>
                                        <option value="kristen" {{ $user->agama == 'kristen' ? 'selected' : '' }}>Kristen
                                        </option>
                                        <option value="hindu" {{ $user->agama == 'hindu' ? 'selected' : '' }}>Hindu
                                        </option>
                                        <option value="budha" {{ $user->agama == 'budha' ? 'selected' : '' }}>Buddha
                                        </option>
                                        <option value="konghucu" {{ $user->agama == 'konghucu' ? 'selected' : '' }}>
                                            Konghuchu</option>
                                        <option value="lainnya" {{ $user->agama == 'lainnya' ? 'selected' : '' }}>Lainnya
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <select name="status_perkawinan" class="form-control">
                                        <option value="belum_menikah"
                                            {{ $user->status_perkawinan == 'belum_menikah' ? 'selected' : '' }}>Belum
                                            Menikah</option>
                                        <option value="menikah"
                                            {{ $user->status_perkawinan == 'menikah' ? 'selected' : '' }}>Menikah</option>
                                        <option value="cerai_hidup"
                                            {{ $user->status_perkawinan == 'cerai_hidup' ? 'selected' : '' }}>Cerai Hidup
                                        </option>
                                        <option value="cerai_mati"
                                            {{ $user->status_perkawinan == 'cerai_mati' ? 'selected' : '' }}>Cerai Mati
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ $user->email }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password (Kosongkan jika tidak ingin mengubah)</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="form-group">
                                    @if (Auth::user()->level === 'admin')
                                        <label>Level</label>
                                        <select name="level" class="form-control">
                                            <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin
                                            </option>
                                            <option value="petugas" {{ $user->level == 'petugas' ? 'selected' : '' }}>
                                                Petugas
                                            </option>
                                            <option value="warga" {{ $user->level == 'warga' ? 'selected' : '' }}>Warga
                                            </option>
                                        </select>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">Nomor Hp</label>
                                    <input type="text" class="form-control" name="no_hp" value="{{ $user->no_hp }}"
                                        required>
                                </div>
                                <div class="form-group">
                                    <label>pendidikan</label>
                                    <select class="form-control @error('pendidikan') is-invalid @enderror" name="pendidikan">
                                        <option value="belum_sekolah" {{ $user->pendidikan == 'belum_sekolah' ? 'selected' : '' }}>Belum Sekolah/Tidak Tamat
                                        </option>
                                        <option value="sd" {{ $user->pendidikan == 'sd' ? 'selected' : '' }}>SD Sederajat
                                        </option>
                                        <option value="sltp" {{ $user->pendidikan == 'sltp' ? 'selected' : '' }}>SLTP Sederajat
                                        </option>
                                        <option value="slta" {{ $user->pendidikan == 'slta' ? 'selected' : '' }}>SLTA Sederajat
                                        </option>
                                        <option value="diploma" {{ $user->pendidikan == 'diploma' ? 'selected' : '' }}>Diploma
                                        </option>
                                        <option value="sarjana" {{ $user->pendidikan == 'sarjana' ? 'selected' : '' }}>Sarjana
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
                                        <option value="Kepala Desa" {{ $user->pekerjaan == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                                            <option value="Kepala Desa" {{ $user->pekerjaan == 'Kepala Desa' ? 'selected' : '' }}>Kepala Desa</option>
                                            <option value="Kepala Dusun Bumirejo" {{ $user->pekerjaan == 'Kepala Dusun Bumirejo' ? 'selected' : '' }}>Kepala Dusun Bumirejo</option>
                                            <option value="Ketua RW 12" {{ $user->pekerjaan == 'Ketua RW 12' ? 'selected' : '' }}>Ketua RW 12</option>
                                            <option value="RT 01 RW 12" {{ $user->pekerjaan == 'RT 01 RW 12' ? 'selected' : '' }}>RT 01 RW 12</option>
                                            <option value="RT 02 RW 12" {{ $user->pekerjaan == 'RT 02 RW 12' ? 'selected' : '' }}>RT 02 RW 12</option>
                                            <option value="RT 03 RW 12" {{ $user->pekerjaan == 'RT 03 RW 12' ? 'selected' : '' }}>RT 03 RW 12</option>
                                            <option value="RT 04 RW 12" {{ $user->pekerjaan == 'RT 04 RW 12' ? 'selected' : '' }}>RT 04 RW 12</option>
                                            <option value="RT 05 RW 12" {{ $user->pekerjaan == 'RT 05 RW 12' ? 'selected' : '' }}>RT 05 RW 12</option>
                                            <option value="Ketua RW 13" {{ $user->pekerjaan == 'Ketua RW 13' ? 'selected' : '' }}>Ketua RW 13</option>
                                            <option value="RT 01 RW 13" {{ $user->pekerjaan == 'RT 01 RW 13' ? 'selected' : '' }}>RT 01 RW 13</option>
                                            <option value="RT 02 RW 13" {{ $user->pekerjaan == 'RT 02 RW 13' ? 'selected' : '' }}>RT 02 RW 13</option>
                                            <option value="RT 03 RW 13" {{ $user->pekerjaan == 'RT 03 RW 13' ? 'selected' : '' }}>RT 03 RW 13</option>
                                            <option value="RT 04 RW 13" {{ $user->pekerjaan == 'RT 04 RW 13' ? 'selected' : '' }}>RT 04 RW 13</option>
                                            <option value="Ketua RW 14" {{ $user->pekerjaan == 'Ketua RW 14' ? 'selected' : '' }}>Ketua RW 14</option>
                                            <option value="RT 01 RW 14" {{ $user->pekerjaan == 'RT 01 RW 14' ? 'selected' : '' }}>RT 01 RW 14</option>
                                            <option value="RT 02 RW 14" {{ $user->pekerjaan == 'RT 02 RW 14' ? 'selected' : '' }}>RT 02 RW 14</option>
                                            <option value="RT 03 RW 14" {{ $user->pekerjaan == 'RT 03 RW 14' ? 'selected' : '' }}>RT 03 RW 14</option>
                                            <option value="RT 04 RW 14" {{ $user->pekerjaan == 'RT 04 RW 14' ? 'selected' : '' }}>RT 04 RW 14</option>
                                            <option value="Ketua RW 15" {{ $user->pekerjaan == 'Ketua RW 15' ? 'selected' : '' }}>Ketua RW 15</option>
                                            <option value="RT 01 RW 15" {{ $user->pekerjaan == 'RT 01 RW 15' ? 'selected' : '' }}>RT 01 RW 15</option>
                                            <option value="RT 02 RW 15" {{ $user->pekerjaan == 'RT 02 RW 15' ? 'selected' : '' }}>RT 02 RW 15</option>
                                            <option value="RT 03 RW 15" {{ $user->pekerjaan == 'RT 03 RW 15' ? 'selected' : '' }}>RT 03 RW 15</option>
                                    </select>
                                    @error('pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="id_ktp">RFID KTP</label>
                                    <input type="text" class="form-control" name="id_ktp" value="{{ $user->id_ktp }}"
                                        >
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto Saat Ini</label>
                                    <br>
                                    @if ($user->foto)
                                        <img src="{{ asset('storage/' . $user->foto) }}" alt="Foto User"
                                            class="img-thumbnail" width="150">
                                    @else
                                        <p>Tidak ada foto</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="foto">Ganti Foto</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="foto" name="foto">
                                            <label class="custom-file-label" for="foto">Pilih Gambar</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-custom">Update</button>
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
