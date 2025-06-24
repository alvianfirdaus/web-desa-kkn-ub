<?php

namespace App\Http\Controllers\warga;

use App\Http\Controllers\Controller;
use App\Models\desa\pengaduan\PengaduanMasyarakat;
use Illuminate\Http\Request;

class PengaduanWargaController extends Controller
{
    public function index(Request $request)
{
    $query = PengaduanMasyarakat::select('judul', 'pesan' ,'status')
                ->where('id_user', $request->user()->id);

    // Filter berdasarkan status
    if ($request->has('status') && $request->status != 'semua') {
        $query->where('status', $request->status);
    }

    $pengaduan = $query->latest()->paginate(10);
    
    return view('halaman_warga.pengaduan.index', compact('pengaduan'));
}
}