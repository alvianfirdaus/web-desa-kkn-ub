<?php

namespace App\Http\Controllers\auth\warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutentikasiControllerWarga extends Controller
{
    public function showLoginForm()
    {
        return view('halaman_warga.auth.login_form');
    }

    public function login(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|size:16',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['nik' => $request->nik, 'password' => $request->password])) {
            return redirect()->route('dashboard_warga.index');
        }

        return back()->withErrors(['nik' => 'NIK atau password salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('warga.login_form');
    }    

    // logika reset password 
    public function showForgotPasswordForm()
    {
        return view('halaman_warga.auth.form_lupa_password');
    }
}
