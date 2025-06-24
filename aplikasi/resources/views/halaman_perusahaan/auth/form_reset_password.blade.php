<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Baru</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('asset_halaman_perusahaan/css/form_perusahaan.css') }}">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
</head>

<body>
    <section class="container forms">
        <div class="form login">
            <div class="form-content">
                <header>Masukkan Password Baru</header>
                <form id="resetForm" method="POST" action="{{ route('admin.reset_password') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Masukkan Email Anda" class="email" required
                            value="{{ old('email') }}">
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Masukkan Password Baru Anda"
                            class="password" required minlength="6">
                        <i class="bx bx-show eye-icon" onclick="togglePassword(this)"></i>
                    </div>

                    <div class="field input-field">
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password Baru Anda"
                            class="password" required minlength="6">
                        <i class="bx bx-show eye-icon" onclick="togglePassword(this)"></i>
                    </div>

                    <div class="field button-field">
                        <button type="submit">Reset Password</button>
                    </div>
                </form>
            </div>
            <div class="form-link">
                <a href="{{ route('admin.login_form') }}" class="lupa-pass">Kembali Ke Halaman Login</a>
            </div>
        </div>
    </section>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Fungsi untuk toggle password visibility
        function togglePassword(element) {
            let inputField = element.previousElementSibling;
            if (inputField.type === "password") {
                inputField.type = "text";
                element.classList.replace("bx-show", "bx-hide");
            } else {
                inputField.type = "password";
                element.classList.replace("bx-hide", "bx-show");
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6'
                }).then(() => {
                    window.location.href = "{{ route('pendaftar.form') }}";
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

    <style>
        .error-message {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        .is-invalid {
            border-color: red;
        }

        .input-field {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: gray;
        }
    </style>

</body>

</html>
