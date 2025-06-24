@extends('layouts.warga.adminlte.app')

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
                        <form action="{{ route('profil_warga.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="card-body">
                                
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
                    window.location.href = "{{ route('dashboard_warga.index') }}";
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
