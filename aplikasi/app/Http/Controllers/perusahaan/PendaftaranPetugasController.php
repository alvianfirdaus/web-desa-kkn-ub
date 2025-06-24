<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\perusahaan\PendaftaranPetugas;

class PendaftaranPetugasController extends Controller
{
    // Menampilkan semua data pendaftaran
    public function index(Request $request)
    {
        $query = PendaftaranPetugas::query();

        // Filter berdasarkan status jika parameter ada
        if ($request->has('status') && $request->status != 'semua') {
            $query->where('status', $request->status);
        }

        $pendaftaran = $query->paginate(10);
        return view('halaman_perusahaan.manajemen_data.petugas.index', compact('pendaftaran'));
    }

    public function show($id)
    {
        $pendaftaran = PendaftaranPetugas::findOrFail($id);
        return view('halaman_perusahaan.manajemen_data.petugas.show', compact('pendaftaran'));
    }

    // Menampilkan form tambah pendaftaran
    public function create()
    {
        return view('halaman_perusahaan.manajemen_data.petugas.create');
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_hp' => 'required|numeric|unique:pendaftaran_petugas,nomor_hp|digits_between:10,15',            
            'nama_desa' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:pendaftaran_petugas,nik|digits:16',            
            'status' => 'nullable|in:pending,disetujui,ditolak',
        ], [
            'nomor_hp.unique' => 'Nomor HP sudah terdaftar, gunakan yang lain.',
            'nomor_hp.numeric' => 'Nomor HP harus menggunakan angka',
            'nomor_hp.digits_between' => 'Nomor HP harus memiliki panjang 10/15 digit',
            'nik.unique' => 'NIK sudah terdaftar, gunakan yang lain.',
            'nik.numeric' => 'NIK harus menggunakan angka',
            'nik.digits' => 'NIK harus memiliki panjang 16 digit',
        ]);

        try {
            PendaftaranPetugas::create([
                'nama_lengkap' => $request->nama_lengkap,
                'nomor_hp' => $request->nomor_hp,
                'nama_desa' => $request->nama_desa,
                'nik' => $request->nik,
                'status' => $request->status
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    // Menampilkan form edit pendaftaran
    public function edit($id)
    {
        $pendaftaran = PendaftaranPetugas::findOrFail($id);
        return view('halaman_perusahaan.manajemen_data.petugas.update', compact('pendaftaran'));
    }

    // Memperbarui data pendaftaran
    public function update(Request $request, $id)
    {
        // Ambil data lama
        $pendaftaran = PendaftaranPetugas::findOrFail($id);

        // Buat aturan validasi dasar
        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'nama_desa' => 'required|string|max:255',
            'status' => 'required|in:pending,disetujui,ditolak',
            'nomor_hp' => 'required|numeric|digits_between:10,15',
            'nik' => 'required|numeric|digits:16',
        ];

        // Jika nomor HP berubah, tambahkan validasi unique
        if ($request->nomor_hp !== $pendaftaran->nomor_hp) {
            $rules['nomor_hp'] .= '|unique:pendaftaran_petugas,nomor_hp';
        }

        // Jika NIK berubah, tambahkan validasi unique
        if ($request->nik !== $pendaftaran->nik) {
            $rules['nik'] .= '|unique:pendaftaran_petugas,nik';
        }

        // Lakukan validasi
        $request->validate($rules, [
            'nomor_hp.unique' => 'Nomor HP sudah terdaftar, gunakan yang lain.',
            'nomor_hp.numeric' => 'Nomor HP harus menggunakan angka.',
            'nomor_hp.digits_between' => 'Nomor HP harus memiliki panjang 10-15 digit.',
            'nik.unique' => 'NIK sudah terdaftar, gunakan yang lain.',
            'nik.numeric' => 'NIK harus menggunakan angka.',
            'nik.digits' => 'NIK harus memiliki panjang 16 digit.',
        ]);

        try {
            // Update data
            $pendaftaran->update([
                'nama_lengkap' => $request->nama_lengkap,
                'nomor_hp' => $request->nomor_hp,
                'nama_desa' => $request->nama_desa,
                'nik' => $request->nik,
                'status' => $request->status
            ]);

            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    // Menghapus data pendaftaran
    public function destroy($id)
    {
        $pendaftaran = PendaftaranPetugas::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->route('pendaftaran.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $nik = $request->input('nik');
        $pendaftaran = PendaftaranPetugas::where('nik', 'like', '%' . $nik . '%')->paginate(10);

        if ($pendaftaran->isEmpty()) {
            return redirect()->route('pendaftaran.index')->with('error', 'Data NIK tidak ditemukan!');
        }

        return view('halaman_perusahaan.manajemen_data.petugas.index', compact('pendaftaran'));
    }

    public function register()
    {
        return view('halaman_perusahaan.auth.register_form');
    }

    public function daftar(Request $request)
    {
        // Cek apakah NIK dan Nomor HP sudah terdaftar di database
        $existingPendaftaran = PendaftaranPetugas::where('nik', $request->nik)
            ->where('nomor_hp', $request->nomor_hp)
            ->first();
    
        // Jika sudah terdaftar, arahkan ke halaman pendaftaran.status
        if ($existingPendaftaran) {
            return redirect()->route('pendaftar.status', ['id' => $existingPendaftaran->id])
                ->with('info', 'Anda sudah terdaftar, silakan cek status pendaftaran Anda.');
        }
    
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_hp' => 'required|numeric|digits_between:10,15|unique:pendaftaran_petugas,nomor_hp',
            'nama_desa' => 'required|string|max:255',
            'nik' => 'required|numeric|unique:pendaftaran_petugas,nik|digits:16',            
        ], [
            'nomor_hp.numeric' => 'Nomor HP harus menggunakan angka',
            'nomor_hp.unique' => 'Nomor HP sudah terdaftar, gunakan nomor yang lain.',
            'nomor_hp.digits_between' => 'Nomor HP harus memiliki panjang 10-15 digit',
            'nik.unique' => 'NIK sudah terdaftar, gunakan NIK yang lain.',
            'nik.numeric' => 'NIK harus menggunakan angka',
            'nik.digits' => 'NIK harus memiliki panjang 16 digit',
        ]);
    
        // Jika belum ada, buat pendaftaran baru dengan status pending
        $pendaftaran = PendaftaranPetugas::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nomor_hp' => $request->nomor_hp,
            'nama_desa' => $request->nama_desa,
            'nik' => $request->nik,
            'status' => 'pending'
        ]);
    
        return redirect()->route('pendaftar.status', ['id' => $pendaftaran->id])
            ->with('success', 'Pendaftaran berhasil! Silakan tunggu proses seleksi.');
    }
    

    // Fungsi untuk menampilkan status pendaftaran
    public function status($id)
    {
        $pendaftaran = PendaftaranPetugas::findOrFail($id);
        return view('halaman_perusahaan.auth.status', compact('pendaftaran'));
    }
}
