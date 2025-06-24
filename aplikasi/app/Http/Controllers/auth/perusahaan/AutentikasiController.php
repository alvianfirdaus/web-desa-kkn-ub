<?php

namespace App\Http\Controllers\auth\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


class AutentikasiController extends Controller
{
    public function showLoginForm()
    {
        return view('halaman_perusahaan.auth.login_form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16',
            'password' => 'required|string',
        ], [
            'nik.required' => 'Nik perlu di isi. ',
            'password.required' => 'Password perlu di isi. ',
            'nik.size' => 'NIK harus memiliki panjang 16 karakter.',
        ]);

        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password, 'level' => 'admin'])) {
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors(['nik' => 'NIK atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login_form');
    }

    // logika reset password 
    public function showForgotPasswordForm()
    {
        return view('halaman_perusahaan.auth.form_lupa_password');
    }

    // Mengirim link reset password ke email
    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $status = Password::sendResetLink($request->only('email'));

        return $status === Password::RESET_LINK_SENT
            ? back()->with('status', 'Link reset password telah dikirim ke email Anda.')
            : back()->withErrors(['email' => 'Terjadi kesalahan, coba lagi.']);
    }

    public function showResetPasswordForm($token)
    {
        return view('halaman_perusahaan.auth.form_reset_password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
            'token' => 'required'
        ], [
            'email.required' => 'Email harus diisi! ',
            'email.email' => 'Format email tidak valid! ',
            'email.exists' => 'Gunakan Email Yang Anda Gunakan Untuk Reset Password tadi! ',
            'password.required' => 'Password perlu diisi! ',
            'password.min' => 'Panjang minimal password adalah 6 karakter ',
            'password.confirmed' => 'Konfirmasi password tidak cocok! ',
            'token.required' => 'Token diperlukan! '
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? back()->with('success', 'Password berhasil direset.')
            : back()->withErrors(['email' => 'Waktu Reset Password Sudah Habis, Kirim ulang email anda.']);
    }
}

// public function login(Request $request)
// {
//     $request->validate([
//         'nik' => 'required|string|size:16',
//         'password' => 'required|string',
//     ], [
//         'nik.required' => 'Nik perlu di isi.',
//         'password.required' => 'Password perlu di isi.',
//         'nik.size' => 'NIK harus memiliki panjang 16 karakter.',
//     ]);

//     $credentials = ['nik' => $request->nik, 'password' => $request->password];

//     if (Auth::attempt($credentials)) {
//         // Cek apakah level pengguna adalah admin
//         if (Auth::user()->level === 'admin') {
//             return redirect()->route('dashboard.index');
//         } else {
//             Auth::logout(); // Logout jika level tidak sesuai
//             return back()->withErrors(['nik' => 'Akses ditolak. Anda tidak memiliki hak sebagai admin.']);
//         }
//     }

//     return back()->withErrors(['nik' => 'NIK atau password salah.']);
// }