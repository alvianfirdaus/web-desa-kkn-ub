<?php

namespace App\Http\Controllers\desa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\perusahaan\Desa;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Process\Process;

class PetugasController extends Controller
{
    public function index(Request $request)
    {
        // Mendapatkan user yang sedang login
        $user = auth()->user();

        // Ambil filter level dari request, defaultnya null (menampilkan semua)
        $level = $request->query('level');

        $query = User::query();

        if ($user->level === 'admin') {
            // Admin bisa melihat semua data user
            $query->whereIn('level', ['admin', 'petugas', 'warga']);
        } else {
            // Petugas hanya melihat data di desanya sendiri
            $query->whereIn('level', ['petugas', 'warga'])
                ->where('id_desa', $user->id_desa);
        }

        // Filter berdasarkan level jika ada
        if ($level) {
            $query->where('level', $level);
        }

        $users = $query->paginate(10);

        return view('halaman_desa.manajemen_data.manajemen_warga.index', compact('users', 'level'));
    }

    public function create()
    {
        $desa = Auth::user()->level === 'admin' ? Desa::all() : collect([]);

        return view('halaman_desa.manajemen_data.manajemen_warga.create', compact('desa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users,nik',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required|string|max:255',
            'agama' => 'required|in:islam,kristen,hindu,budha,konghucu,lainnya',
            'status_perkawinan' => 'required|in:belum_menikah,menikah,cerai_hidup,cerai_mati',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
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
            'password.required' => 'Password perlu diisi!',
            'no_hp.required' => 'Nomor HP perlu diisi!',
            'no_hp.digits_between' => 'Nomor HP harus memiliki panjang antara 10-15 digit',
        ]);

        try {
            $fotoPath = $request->hasFile('foto') ? $request->file('foto')->store('foto_user', 'public') : null;

            User::create([
                'id_desa' => Auth::user()->level === 'admin' ? $request->id_desa : Auth::user()->id_desa,
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level' => Auth::user()->level === 'admin' ? $request->level : 'petugas',
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
        $desas = Desa::all();
        return view('halaman_desa.manajemen_data.manajemen_warga.update', compact('user', 'desas'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|string|size:16|unique:users,nik,' . $id,
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'alamat' => 'required|string|max:255',
            'agama' => 'required|in:islam,kristen,hindu,budha,konghucu,lainnya',
            'status_perkawinan' => 'required|in:belum_menikah,menikah,cerai_hidup,cerai_mati',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_hp' => 'required|digits_between:10,15',
            'id_ktp' => 'nullable',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
        ], [
            'nik.size' => 'NIK harus memiliki panjang 16 karakter.',
            'nik.unique' => 'NIK ini sudah digunakan, gunakan yang lain.',
            'email.unique' => 'Email ini sudah terdaftar, gunakan yang lain.',
            'password.min' => 'Password harus minimal 6 karakter.',
            'foto.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'no_hp.digits_between' => 'Nomor HP harus memiliki panjang antara 10-15 digit',
        ]);

        try {
            if ($request->hasFile('foto')) {
                if ($user->foto) {
                    Storage::disk('public')->delete($user->foto);
                }
                $fotoPath = $request->file('foto')->store('foto_user', 'public');
            } else {
                $fotoPath = $user->foto;
            }

            $data = [
                'id_desa' => Auth::user()->level === 'admin' ? $request->id_desa : Auth::user()->id_desa,
                'nama_lengkap' => $request->nama_lengkap,
                'nik' => $request->nik,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'agama' => $request->agama,
                'status_perkawinan' => $request->status_perkawinan,
                'email' => $request->email,
                'level' => Auth::user()->level === 'admin' ? $request->level : (Auth::user()->level === 'petugas' ? 'petugas' : 'warga'),
                'foto' => $fotoPath,
                'no_hp' => $request->no_hp,
                'id_ktp' => $request->id_ktp,
                'pendidikan' => $request->pendidikan,
                'pekerjaan' => $request->pekerjaan,
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);

            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function show($id)
    {
        $user = User::with('desa')->findOrFail($id);

        // Cek apakah pengguna yang login adalah admin atau petugas di desa yang sama
        if (Auth::user()->level !== 'admin' && Auth::user()->id_desa !== $user->id_desa) {
            abort(403, 'Anda tidak memiliki akses.');
        }

        return view('halaman_desa.manajemen_data.manajemen_warga.show', compact('user'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Cek apakah yang menghapus adalah admin atau petugas desa
        if (Auth::user()->level === 'admin') {
            // Admin bisa menghapus semua data
            try {
                // Menghapus foto jika ada
                if ($user->foto) {
                    Storage::disk('public')->delete($user->foto);
                }

                // Menghapus data user
                $user->delete();

                return redirect()->route('petugas.index')->with('success', 'Data berhasil dihapus!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        } elseif (Auth::user()->level === 'petugas' ) {
            // Petugas hanya bisa menghapus data warga di desanya sendiri
            try {
                // Menghapus foto jika ada
                if ($user->foto) {
                    Storage::disk('public')->delete($user->foto);
                }

                // Menghapus data user
                $user->delete();

                return redirect()->route('petugas.index')->with('success', 'Data warga berhasil dihapus!');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data.');
            }
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki hak akses untuk menghapus data ini.');
        }
    }

    public function search(Request $request)
    {
        $nama_lengkap = $request->input('nama_lengkap');

        // Cari berdasarkan nama lengkap
        $users = User::where('nama_lengkap', 'like', '%' . $nama_lengkap . '%')->paginate(10);

        // Cek jika hasil pencarian kosong
        if ($users->isEmpty()) {
            return redirect()->route('petugas.index')->with('error', 'Data User tidak ditemukan!');
        }

        // Kembalikan hasil pencarian ke view
        return view('halaman_desa.manajemen_data.manajemen_warga.index', compact('users'));
    }

    //fungsi search rfid
    public function searchByRFID(Request $request)
    {
        // Terima id_ktp dari RFID (contoh: dikirim via form/AJAX)
        $id_ktp = $request->input('id_ktp');

        // Cari data warga berdasarkan id_ktp
        $user = User::where('id_ktp', $id_ktp)->first();

        if (!$user) {
            return redirect()->route('petugas.index')
                ->with('error', 'Data warga tidak ditemukan!');
        }

        // Redirect ke halaman detail
        return redirect()->route('petugas.show', $user->id);
    }
}
