@extends('layouts.perusahaan.adminlte.app')

@section('title', 'Profil User')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Update Profile</h3>
                        </div>
                        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="nama_lengkap">Nama User</label>
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
                                {{-- <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="admin" {{ $user->level == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                        <option value="petugas" {{ $user->level == 'petugas' ? 'selected' : '' }}>Petugas
                                        </option>
                                        <option value="warga" {{ $user->level == 'warga' ? 'selected' : '' }}>Warga
                                        </option>
                                    </select>
                                </div> --}}
                                <div class="form-group">
                                    <label for="no_hp">Nomor Hp</label>
                                    <input type="text" class="form-control" name="no_hp" value="{{ $user->no_hp }}"
                                        required>
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
