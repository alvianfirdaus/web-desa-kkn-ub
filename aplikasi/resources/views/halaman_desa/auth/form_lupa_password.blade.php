<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubah Password</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('asset_halaman_desa/css/form.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Rubah Password</header>
                <form id="resetForm" method="POST" action="{{ route('desa.form_lupa_password') }}">
                    @csrf

                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Masukkan Email Anda"
                            class="email @error('email') is-invalid @enderror" value="{{ old('email') }}" required>
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password Baru"
                            class="@error('password') is-invalid @enderror" required>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password Baru"
                            required>
                    </div>

                    <div class="field button-field">
                        <button type="submit">Reset Password</button>
                    </div>
                </form>
            </div>
            <div class="form-link">
                <a href="{{ route('petugas.login') }}" class="lupa-pass">Kembali ke Halaman Login</a>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="{{ asset('asset_halaman_desa/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset_halaman_desa/adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            $("#resetForm").validate({
                rules: {
                    email: { required: true, email: true },
                    password: { required: true, minlength: 8 },
                    password_confirmation: { equalTo: "[name='password']" }
                },
                messages: {
                    email: { required: "Email wajib diisi", email: "Email tidak valid" },
                    password: { required: "Password wajib diisi", minlength: "Minimal 8 karakter" },
                    password_confirmation: { equalTo: "Konfirmasi password tidak cocok" }
                },
                errorElement: "span",
                errorPlacement: function (error, element) {
                    error.addClass("error-message");
                    element.closest(".field").append(error);
                },
                highlight: function (element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function (element) {
                    $(element).removeClass("is-invalid");
                }
            });
        });

        @if (session('status'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('status') }}",
                confirmButtonColor: '#28a745'
            });
        @endif

        @if ($errors->any())
            let errorMessages = "";
            @foreach ($errors->all() as $error)
                errorMessages += "{{ $error }}\n";
            @endforeach

            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: errorMessages,
                confirmButtonColor: '#d33'
            });
        @endif
    </script>

    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .is-invalid {
            border-color: red;
        }
    </style>
</body>

</html>
