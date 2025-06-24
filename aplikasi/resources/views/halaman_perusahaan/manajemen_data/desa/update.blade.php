@extends('layouts.perusahaan.adminlte.app')

@section('title', 'Manajemen Desa Update')

@section('content')
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header card-header-custom">
                            <h3 class="card-title">Update Desa</h3>
                        </div>
                        <form action="{{ route('desa.update', $desa->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_desa">Nama Desa</label>
                                    <input type="text" class="form-control @error('nama_desa') is-invalid @enderror"
                                        id="nama_desa" name="nama_desa" placeholder="Nama Desa"
                                        value="{{ old('nama_desa', $desa->nama_desa) }}">
                                    @error('nama_desa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat_desa">Alamat Desa</label>
                                    <input type="text" class="form-control @error('alamat_desa') is-invalid @enderror"
                                        id="alamat_desa" name="alamat_desa" placeholder="Alamat Desa"
                                        value="{{ old('alamat_desa', $desa->alamat_desa) }}">
                                    @error('alamat_desa')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kode_pos">Kode Pos</label>
                                    <input type="text" class="form-control @error('kode_pos') is-invalid @enderror"
                                        id="kode_pos" name="kode_pos" placeholder="Kode Pos"
                                        value="{{ old('kode_pos', $desa->kode_pos) }}">
                                    @error('kode_pos')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kabupaten">Kabupaten</label>
                                    <input type="text" class="form-control @error('kabupaten') is-invalid @enderror"
                                        id="kabupaten" name="kabupaten" placeholder="Kabupaten Desa"
                                        value="{{ old('kabupaten', $desa->kabupaten) }}">
                                    @error('kabupaten')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan</label>
                                    <input type="text" class="form-control @error('kecamatan') is-invalid @enderror"
                                        id="kecamatan" name="kecamatan" placeholder="Kecamatan Desa"
                                        value="{{ old('kecamatan', $desa->kecamatan) }}">
                                    @error('kecamatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan</label>
                                    <input type="text" class="form-control @error('kelurahan') is-invalid @enderror"
                                        id="kelurahan" name="kelurahan" placeholder="Kelurahan Desa"
                                        value="{{ old('kelurahan', $desa->kelurahan) }}">
                                    @error('kelurahan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_hp">No Hp Desa</label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                        id="no_hp" name="no_hp" placeholder="Alamat Desa"
                                        value="{{ old('no_hp', $desa->no_hp) }}">
                                    @error('no_hp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nama_kades">Nama Kepala Desa</label>
                                    <input type="text" class="form-control @error('nama_kades') is-invalid @enderror"
                                        id="nama_kades" name="nama_kades" placeholder="Nama Kepala Desa"
                                        value="{{ old('nama_kades', $desa->nama_kades) }}">
                                    @error('nama_kades')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="nip_kades">NIP Kepala Desa</label>
                                    <input type="text" class="form-control @error('nip_kades') is-invalid @enderror"
                                        id="nip_kades" name="nip_kades" placeholder="NIP Kepala Desa"
                                        value="{{ old('nip_kades', $desa->nip_kades) }}">
                                    @error('nip_kades')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="logo_desa">Logo Desa Saat Ini</label>
                                    <br>
                                    @if ($desa->logo_desa)
                                        <img src="{{ asset('storage/' . $desa->logo_desa) }}" alt="Logo Desa"
                                            class="img-thumbnail" width="150">
                                    @else
                                        <p>Tidak ada foto</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="logo_desa">Ganti Logo Desa</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="logo_desa" name="logo_desa">
                                            <label class="custom-file-label" for="logo_desa">Pilih Gambar</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="ttd_kades">TTD Lurah Desa Saat Ini</label>
                                    <br>
                                    @if ($desa->ttd_kades)
                                        <img src="{{ asset('storage/' . $desa->ttd_kades) }}" alt="Logo Desa"
                                            class="img-thumbnail" width="150">
                                    @else
                                        <p>Tidak ada foto</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="ttd_kades">Ganti TTD Lurah</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="ttd_kades" name="ttd_kades">
                                            <label class="custom-file-label" for="ttd_kades">Pilih Gambar</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
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
        document.getElementById('logo_desa').addEventListener('change', function(event) {
            var fileName = event.target.files[0] ? event.target.files[0].name : "Pilih Gambar";
            this.nextElementSibling.innerText = fileName;
        });

        document.getElementById('ttd_kades').addEventListener('change', function(event) {
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
                    window.location.href = "{{ route('desa.index') }}";
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

            @if (session('error_nama_desa'))
                Swal.fire({
                    icon: 'warning',
                    title: 'Nama Desa Sudah Ada!',
                    text: '{{ session('error_nama_desa') }}',
                    confirmButtonColor: '#ffc107'
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
