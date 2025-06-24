<?php

namespace App\Http\Controllers\desa\pengaduan;

use App\Http\Controllers\Controller;
use App\Models\desa\pengaduan\PengaduanMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class PengaduanMasyarakatController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->level == 'admin') {
            // Admin lihat semua pengaduan
            $query = PengaduanMasyarakat::with('user');
        } elseif ($user->level == 'petugas') {
            // Petugas hanya lihat pengaduan dari warga di desa yang sama
            $query = PengaduanMasyarakat::whereHas('user', function ($query) use ($user) {
                $query->where('id_desa', $user->id_desa);
            })->with('user');
        } else {
            // Kalau bukan admin atau petugas, redirect atau batasi
            abort(403, 'Tidak diizinkan.');
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != 'semua') {
            $query->where('status', $request->status);
        }

        $pengaduan = $query->latest()->paginate(10);

        return view('halaman_desa.manajemen_layanan.pengaduan_masyarakat.index', compact('pengaduan'));
    }


    public function show($id)
    {
        // Ambil data pengaduan beserta relasi user dan desa
        $pengaduan = PengaduanMasyarakat::with([
            'user',
            'user.desa' // asumsi ada relasi antara user dan desa
        ])->findOrFail($id);

        // Authorization check
        $user = auth()->user();

        // Admin bisa lihat semua pengaduan
        if ($user->level == 'admin') {
            // Lanjutkan
        }
        // Petugas hanya bisa lihat pengaduan dari desanya
        elseif ($user->level == 'petugas') {
            if ($pengaduan->user->id_desa != $user->id_desa) {
                abort(403, 'Anda tidak memiliki akses ke pengaduan ini.');
            }
        } else {
            abort(403, 'Akses ditolak.');
        }

        return view('halaman_desa.manajemen_layanan.pengaduan_masyarakat.show', compact('pengaduan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'pesan' => 'required|string|max:255',
        ], [
            'judul.required' => 'Apa yang ingin anda adukan?',
            'pesan.required' => 'Masukkan pesan pengaduan anda',
        ]);

        try {
            PengaduanMasyarakat::create([
                'id_user' => Auth::id(),
                'judul' => $request->judul,
                'pesan' => $request->pesan,
            ]);

            return redirect()->back()->with('success', 'Data pengaduan dikirim!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $pengaduan = PengaduanMasyarakat::findOrFail($id);        
        return view('halaman_desa.manajemen_layanan.pengaduan_masyarakat.update', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $pengaduan = PengaduanMasyarakat::findOrFail($id);        

        $request->validate([
            'judul' => 'required|string|max:255',
            'pesan' => 'required|string|max:255',
        ], [
            'judul.required' => 'Apa yang ingin anda adukan?',
            'pesan.required' => 'Masukkan pesan pengaduan anda',
        ]);

        try {
            $pengaduan->update([
                'judul' => $request->judul,
                'pesan' => $request->pesan,
            ]);

            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        $pengaduan = PengaduanMasyarakat::findOrFail($id);

        if (Auth::user()->level !== 'admin' && $pengaduan->id_desa != Auth::user()->id_desa) {
            abort(403, 'Tidak diizinkan.');
        }

        $pengaduan->delete();

        return redirect()->back()->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
