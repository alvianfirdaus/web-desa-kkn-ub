<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfilControllerWarga extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('halaman_warga.auth.profil', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([                        
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',            
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_hp' => 'required|digits_between:10,15',
        ], [                        
            'email.unique' => 'Email sudah terdaftar, gunakan yang lain.',
            'password.min' => 'Password harus memiliki panjang minimal 6 karakter.',
            'foto.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'no_hp.required'=>'Nomor Hp Perlu Di isi!',
            'no_hp.digits_between' => 'Nomor HP harus memiliki panjang antara 10/15 digit',
        ]);

        try {
            // Simpan foto jika ada perubahan
            if ($request->hasFile('foto')) {
                if ($user->foto) {
                    Storage::disk('public')->delete($user->foto);
                }
                $fotoPath = $request->file('foto')->store('foto_user', 'public');
            } else {
                $fotoPath = $user->foto;
            }

            // Update data user
            $user->update([                                
                'email' => $request->email,              
                'no_hp' => $request->no_hp,  
                'foto' => $fotoPath,
            ]);

            // Update password jika diisi
            if ($request->filled('password')) {
                $user->update(['password' => Hash::make($request->password)]);
            }

            return redirect()->back()->with('success', 'Profil berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }
}
