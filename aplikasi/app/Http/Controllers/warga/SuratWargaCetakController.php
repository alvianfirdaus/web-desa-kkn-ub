<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\desa\surat\Surat;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SuratWargaCetakController extends Controller
{
    public function index(Request $request)
    {
        // Ambil surat milik user yang sedang login
        $query = Surat::where('id_user', Auth::id());

        // Filter berdasarkan status jika ada
        if ($request->has('status') && $request->status != 'semua') {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan rentang tanggal (perbaikan)
    if ($request->has('tanggal_awal') && !empty($request->tanggal_awal) &&
    $request->has('tanggal_akhir') && !empty($request->tanggal_akhir)) {

    // Konversi ke format Y-m-d dan tambahkan waktu untuk mencakup seluruh hari terakhir
    $tanggalAwal = Carbon::parse($request->tanggal_awal)->startOfDay();
    $tanggalAkhir = Carbon::parse($request->tanggal_akhir)->endOfDay();

    $query->whereBetween('created_at', [
        $tanggalAwal,
        $tanggalAkhir
    ]);
}

        // Muat semua relasi jenis surat dan ambil semua data
        $surat = $query->with(['user.desa', 'suratable'])->get();

        return view('halaman_warga.surat.index', compact('surat'));
    }
}
