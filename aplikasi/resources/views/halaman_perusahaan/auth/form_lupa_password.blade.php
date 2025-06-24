<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubah Password</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('asset_halaman_perusahaan/css/form_perusahaan.css') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Rubah Password</header>
                <form id="loginForm" method="POST" action="{{ route('admin.send_reset_link') }}">
                    @csrf

                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Masukan Email Anda" class="email">
                    </div>

                    <div class="field button-field">
                        <button type="submit">Reset Password</button>
                    </div>
                </form>
            </div>
            <div class="form-link">
                <a href="{{ route('admin.login_form') }}" class="lupa-pass">Kembali Ke halaman login</a>
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
        $(document).ready(function() {
            $("#loginForm").validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    email: {
                        required: "Email wajib diisi",
                        email: "Harap masukkan email yang valid"
                    }
                },
                errorElement: "span",
                errorPlacement: function(error, element) {
                    error.addClass("error-message");
                    element.closest(".field").append(error);
                },
                highlight: function(element) {
                    $(element).addClass("is-invalid");
                },
                unhighlight: function(element) {
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
