<?php

namespace App\Http\Controllers\desa\surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\desa\surat\SuratKeteranganDomisiliModel;
use App\Models\desa\surat\Surat;
use Illuminate\Support\Str;

class SuratKeteranganDomisiliController extends Controller
{
    public function ShowForm()
    {
        return view('halaman_desa.form.surat.surket_domisili');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|size:16',
            'alamat_lama' => 'required|max:255',
            'alamat_baru' => 'required|max:255',
            'alasan_permohonan' => 'required|max:255',
        ], [
            'no_kk.size' => 'No KK harus memiliki panjang 16 karakter.',
        ]);
        
        $uuid = (string) Str::uuid();

        // Buat surat domisili
        $domisili = SuratKeteranganDomisiliModel::create([
            'id' => $uuid,
            'nama' => Auth::user()->nama_lengkap,
            'nik' => Auth::user()->nik,
            'no_kk' => $request->no_kk,
            'alamat_lama' => $request->alamat_lama,
            'alamat_baru' => $request->alamat_baru,
            'alasan_permohonan' => $request->alasan_permohonan
        ]);

        // Buat surat utama dan hubungkan
        $surat = new Surat([
            'id' => $uuid,
            'id_desa' => Auth::user()->id_desa,
            'id_user' => Auth::id(),
            'status' => 'pending'
        ]);

        $domisili->surat()->save($surat);

        return back()->with('success', 'Pengajuan surat berhasil.');
    }

    public function show($id)
    {
        $surat = SuratKeteranganDomisiliModel::with('surat')->findOrFail($id);
        return view('halaman_desa.manajemen_layanan.persuratan.crud_surket_domisili.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = SuratKeteranganDomisiliModel::with('surat')->findOrFail($id);
        return view('halaman_desa.manajemen_layanan.persuratan.crud_surket_domisili.update', compact('surat'));
    }

    public function update(Request $request, $id)
{
    $surat = SuratKeteranganDomisiliModel::findOrFail($id); // Pastikan model yang sesuai dipilih

    $rules = [
        'nama' => 'required|string|max:255',
        'nik' => 'required|numeric|digits:16',
        'no_kk' => 'required|numeric|digits:16',
        'alamat_lama' => 'required|string|max:255',
        'alamat_baru' => 'required|string|max:255',
        'alasan_permohonan' => 'required|string|max:255',
        'status' => 'required|in:pending,diproses,ditolak,selesai'
    ];

    // Validasi khusus untuk SuratKeteranganDomisiliModel
    $request->validate($rules,[
        'no_kk.size' => 'No KK harus memiliki panjang 16 karakter.',
    ]);

    try {
        // Update data domisili
        $surat->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_kk' => $request->no_kk,
            'alamat_lama' => $request->alamat_lama,
            'alamat_baru' => $request->alamat_baru,
            'alasan_permohonan' => $request->alasan_permohonan,
        ]);

        // Update status di tabel surat
        $surat->surat->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
    }
}

    public function destroy($id)
    {
        $surat = SuratKeteranganDomisiliModel::findOrFail($id);

        // Hapus juga data di tabel `surat`
        $surat->surat()->delete();
        $surat->delete();

        return redirect()->route('manajemen_surat.index')->with('success', 'Surat domisili berhasil dihapus.');
    }
}