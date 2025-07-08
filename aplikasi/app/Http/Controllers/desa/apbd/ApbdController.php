<?php

namespace App\Http\Controllers\desa\apbd;

use App\Models\Apbd;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApbdController extends Controller
{
    // Tampilkan semua data APBD
    public function index()
    {
        $data = Apbd::all();
        return view('halaman_desa.manajemen_data.manajemen_apbd.index', compact('data'));
    }

    // Proses update data APBD
    public function update(Request $request, $id)
{
    $request->validate([
        'pendes' => 'required|integer',
        'beldes' => 'required|integer',
    ]);

    $apbd = Apbd::findOrFail($id);
    $apbd->pendes = $request->pendes;
    $apbd->beldes = $request->beldes;
    $apbd->save();

    return redirect()->back()->with('message', 'Data berhasil disimpan.');
}
}
