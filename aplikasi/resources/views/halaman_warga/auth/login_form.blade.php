<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Warga Desa</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('asset_halaman_desa/css/form.css') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Login Warga Desa</header>
                <form method="POST" action="{{ route('warga.login') }}">
                    @csrf
                    <div class="field input-field">
                        <input type="number" name="nik" placeholder="Nik" class="input">
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Password" class="password">
                        <i class='bx bx-hide eye-icon'></i>
                    </div>

                    <div class="field button-field">
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
            <div class="form-link">
                <a href="{{ route('warga.lupa_password') }}" class="lupa-pass">Lupa/Ingin Merubah Password?</a>
            </div>
            <div class="form-link">
                <a href="{{ route('pendaftar.form') }}" class="lupa-pass">Halaman Register?</a>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="{{ asset('asset_halaman_desa/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery Validation -->
    <script src="{{ asset('asset_halaman_desa/adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            $("#loginForm").validate({
                rules: {
                    nik: {
                        required: true,
                        minlength: 16
                    },
                    password: {
                        required: true,
                        minlength: 5
                    }
                },
                messages: {
                    nik: {
                        required: "NIK wajib diisi",
                        minlength: "NIK harus minimal 16 digit"
                    },
                    password: {
                        required: "Password wajib diisi",
                        minlength: "Password minimal 5 karakter"
                    }
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
