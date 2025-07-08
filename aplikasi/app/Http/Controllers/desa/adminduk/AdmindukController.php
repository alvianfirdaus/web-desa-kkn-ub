<?php

namespace App\Http\Controllers\desa\adminduk;

use App\Models\Adminduk;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdmindukController extends Controller
{
    // Tampilkan semua data APBD
    public function index()
    {
        $data = Adminduk::all();
        return view('halaman_desa.manajemen_data.manajemen_adminduk.index', compact('data'));
    }

    // Proses update data APBD
    public function update(Request $request, $id)
{
    $request->validate([
        'penduduk' => 'required|integer',
        'laki_laki' => 'required|integer',
        'wanita' => 'required|integer',
    ]);

    $adminduk = Adminduk::findOrFail($id);
    $adminduk->penduduk = $request->penduduk;
    $adminduk->laki_laki = $request->laki_laki;
    $adminduk->wanita = $request->wanita;
    $adminduk->save();

    return redirect()->back()->with('message', 'Data berhasil disimpan.');
}
}
