<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Perusahaan</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('asset_halaman_desa/css/form.css') }}">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    {{-- sweet alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <section class="container forms">
        <div class="form register">
            <div class="form-content">
                <header>Register Desa</header>

                <!-- Form Mengarah ke Route Pendaftaran -->
                <form action="{{ route('pendaftar.register') }}" method="POST">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div class="field input-field">
                        <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" class="input"
                            value="{{ old('nama_lengkap') }}" required>
                        @error('nama_lengkap')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Nomor HP -->
                    <div class="field input-field">
                        <input type="number" name="nomor_hp" placeholder="Nomor Hp" class="input"
                            value="{{ old('nomor_hp') }}" required>
                        @error('nomor_hp')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Nama Desa -->
                    <div class="field input-field">
                        <input type="text" name="nama_desa" placeholder="Nama Desa" class="input"
                            value="{{ old('nama_desa') }}" required>
                        @error('nama_desa')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- NIK -->
                    <div class="field input-field">
                        <input type="number" name="nik" placeholder="NIK" class="input"
                            value="{{ old('nik') }}" required>
                        @error('nik')
                            <small style="color: red;">{{ $message }}</small>
                        @enderror
                    </div>

                    <!-- Tombol Register -->
                    <div class="field button-field">
                        <button type="submit">Register</button>
                    </div>
                </form>

                <div class="form-link">
                    <a href="{{ route('petugas.login_form') }}" class="lupa-pass">Petugas?</a>
                </div>
                <div class="form-link">
                    <a href="{{ route('warga.login_form') }}" class="lupa-pass">Warga?</a>
                </div>
                <div class="form-link">
                    <a href="{{ route('admin.login_form') }}" class="lupa-pass">Super User?</a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
<script>
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
</script>
