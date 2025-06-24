<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\perusahaan\Desa;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Filter berdasarkan level
        if ($request->has('level') && $request->level != 'semua') {
            $query->where('level', $request->level);
        }

        $users = $query->paginate(10);
        return view('halaman_perusahaan.manajemen_data.user.index', compact('users'));
    }

    public function create()
    {
        $desas = Desa::all(); // Ambil semua desa untuk dropdown
        return view('halaman_perusahaan.manajemen_data.user.create', compact('desas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_desa' => 'required|exists:desa,id',
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users,nik',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required|string|max:255',
            'agama' => 'required|in:islam,kristen,hindu,budha,konghucu,lainnya',
            'status_perkawinan' => 'required|in:belum_menikah,menikah,cerai_hidup,cerai_mati',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'level' => 'required|in:admin,petugas,warga',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_hp' => 'required|digits_between:10,15',
            'id_ktp' => 'nullable',
            'pendidikan' => 'required',
            'pekerjaan' => 'required'
        ], [
            'nik.size' => 'NIK harus memiliki panjang 16 karakter.',
            'nik.unique' => 'Nik ini sudah ada, gunakan yang lain.',
            'email.unique' => 'Email sudah terdaftar, gunakan yang lain.',
            'password.min' => 'Password harus memiliki panjang minimal 6 karakter.',
            'foto.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'password.required' => 'Pasword perlu di isi!',
            'no_hp.required' => 'Nomor Hp Perlu Di isi!',
            'no_hp.digits_between' => 'Nomor HP harus memiliki panjang antara 10/15 digit',
        ]);

        try {
            // Simpan gambar jika ada
            $fotoPath = $request->hasFile('foto') ? $request->file('foto')->store('foto_user', 'public') : null;

            // Simpan user
            User::create([
                'id_desa' => $request->id_desa,
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => $request->level,
                'foto' => $fotoPath,
                'no_hp' => $request->no_hp,
                'id_ktp' => $request->id_ktp,
                'pendidikan' => $request->pendidikan,
                'pekerjaan' => $request->pekerjaan,
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $desas = Desa::all(); // Ambil semua desa untuk dropdown
        return view('halaman_perusahaan.manajemen_data.user.update', compact('user', 'desas'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'id_desa' => 'required|exists:desa,id',
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users,nik,' . $id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required|string|max:255',
            'agama' => 'required|in:islam,kristen,hindu,budha,konghucu,lainnya',
            'status_perkawinan' => 'required|in:belum_menikah,menikah,cerai_hidup,cerai_mati',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'level' => 'required|in:admin,petugas,warga',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_hp' => 'required|digits_between:10,15',
            'id_ktp' => 'nullable',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
        ], [
            'nik.size' => 'NIK harus memiliki panjang 16 karakter.',
            'nik.unique' => 'Nik sudah terdaftar, gunakan yang lain.',
            'email.unique' => 'Email sudah terdaftar, gunakan yang lain.',
            'password.min' => 'Password harus memiliki panjang minimal 6 karakter.',
            'foto.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'no_hp.digits_between' => 'Nomor HP harus memiliki panjang 10/15 digit',
            'no_hp.required' => 'Nomor Hp Perlu Di isi!',
            'no_hp.digits_between' => 'Nomor HP harus memiliki panjang antara 10/15 digit',
        ]);

        try {
            // Jika ada foto baru, simpan dan hapus yang lama
            if ($request->hasFile('foto')) {
                if ($user->foto) {
                    Storage::disk('public')->delete($user->foto);
                }
                $fotoPath = $request->file('foto')->store('foto_user', 'public');
            } else {
                $fotoPath = $user->foto;
            }

            // Update user
            $user->update([
                'id_desa' => $request->id_desa,
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'email' => $request->email,
                'level' => $request->level,
                'foto' => $fotoPath,
                'no_hp' => $request->no_hp,
                'id_ktp' => $request->id_ktp,
                'pendidikan' => $request->pendidikan,
                'pekerjaan' => $request->pekerjaan,
            ]);

            // Update password jika diisi
            if ($request->filled('password')) {
                $user->update(['password' => Hash::make($request->password)]);
            }

            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function show($id)
    {
        $user = User::with('desa')->findOrFail($id); //desa ini dari fungsi model
        return view('halaman_perusahaan.manajemen_data.user.show', compact('user'));
    }

    public function destroy($id)
    {
        // Mengecek apakah pengguna yang sedang login mencoba menghapus dirinya sendiri
        if ($id == auth()->user()->id) {
            return redirect()->route('user.index')->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user = User::findOrFail($id);

        // Hapus foto jika ada
        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $nama_lengkap = $request->input('nama_lengkap');
        $users = User::where('nama_lengkap', 'like', '%' . $nama_lengkap . '%')->paginate(10);

        if ($users->isEmpty()) {
            return redirect()->route('user.index')->with('error', 'Data User tidak ditemukan!');
        }

        return view('halaman_perusahaan.manajemen_data.user.index', compact('users'));
    }
}
