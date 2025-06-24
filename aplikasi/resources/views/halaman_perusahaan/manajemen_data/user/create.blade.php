@extends('layouts.perusahaan.adminlte.app')

@section('title', 'Manajemen User Create')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Create User</h3>
                        </div>
                        <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Desa</label>
                                    <select class="form-control @error('id_desa') is-invalid @enderror" name="id_desa">
                                        @foreach ($desas as $d)
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
                                <div class="form-group">
                                    <label for="nama_lengkap">Nama User</label>
                                    <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                        id="nama_lengkap" name="nama_lengkap" placeholder="Nama User"
                                        value="{{ old('nama_lengkap') }}">
                                    @error('nama_lengkap')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" placeholder="NIK" value="{{ old('nik') }}"
                                        >
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
                                    <label>Level</label>
                                    <select class="form-control @error('level') is-invalid @enderror" name="level">
                                        <option value="admin" {{ old('level') == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="petugas" {{ old('level') == 'petugas' ? 'selected' : '' }}>Petugas
                                        </option>
                                        <option value="warga" {{ old('level') == 'warga' ? 'selected' : '' }}>Warga
                                        </option>
                                    </select>
                                    @error('level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
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
                                <div class="form-group">
                                    <label for="no_hp">Nomor Hp</label>
                                    <input type="no_hp" class="form-control @error('no_hp') is-invalid @enderror"
                                        id="no_hp" name="no_hp" placeholder="Nomor Hp" value="{{ old('no_hp') }}">
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

                                        <option value="petani" {{ old('pekerjaan') == 'petani' ? 'selected' : '' }}>Petani
                                        </option>
                                        <option value="pedagang" {{ old('pekerjaan') == 'pedagang' ? 'selected' : '' }}>Pedagang
                                        </option>
                                        <option value="guru" {{ old('pekerjaan') == 'guru' ? 'selected' : '' }}>Guru
                                        </option>
                                        <option value="pns" {{ old('pekerjaan') == 'pns' ? 'selected' : '' }}>PNS
                                        </option>
                                        <option value="bidan/dokter" {{ old('pekerjaan') == 'bidan/dokter' ? 'selected' : '' }}>Bidan/Dokter
                                        </option>
                                        <option value="angkutan_umum" {{ old('pekerjaan') == 'angkutan_umum' ? 'selected' : '' }}>Angkutan Umum
                                        </option>
                                        <option value="peternak" {{ old('pekerjaan') == 'peternak' ? 'selected' : '' }}>Peternak
                                        </option>
                                        <option value="tukang_bangunan" {{ old('pekerjaan') == 'tukang_bangunan' ? 'selected' : '' }}>Tukang Bangunan
                                        </option>
                                        <option value="wiraswasta" {{ old('pekerjaan') == 'wiraswasta' ? 'selected' : '' }}>Wiraswasta
                                        </option>
                                        <option value="buruh" {{ old('pekerjaan') == 'buruh' ? 'selected' : '' }}>Buruh
                                        </option>
                                        <option value="pelajar" {{ old('pekerjaan') == 'pelajar' ? 'selected' : '' }}>Pelajar
                                        </option>
                                        <option value="lainnya" {{ old('pekerjaan') == 'lainnya' ? 'selected' : '' }}>Lainnya
                                        </option>
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
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-custom">Submit</button>
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
        
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function() {
                var imgElement = document.getElementById("preview");
                imgElement.src = reader.result;
            }
            reader.readAsDataURL(input.files[0]);
        }

        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    window.location.href = "{{ route('user.index') }}";
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
