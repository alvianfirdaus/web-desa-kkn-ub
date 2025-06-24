<?php

namespace App\Http\Controllers\desa\surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\desa\surat\SuratKeteranganKelahiranModel;
use Illuminate\Support\Facades\Auth;
use App\Models\desa\surat\Surat;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SuratKeteranganKelahiranController extends Controller
{

    public function ShowForm()
    {
        return view('halaman_desa.form.surat.surket_kelahiran');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bayi' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|max:255',
            'scan_kk_orang_tua' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'scan_ktp_orang_tua' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'jenis_kelamin' => 'required|max:255',
            'pukul_kelahiran' => 'required|date_format:H:i',
            'anak_ke' => 'required|numeric|min:1|max:20',
            'berat_bayi' => 'required|numeric|min:0.1|max:999.9',
            'panjang_bayi' => 'required|numeric|min:10|max:99.9',
            'nama_ayah' => 'required|max:255',
            'nik_ayah' => 'required|digits:16',
            'nama_ibu' => 'required|max:255',
            'nik_ibu' => 'required|digits:16',
        ], [
            'nama_bayi.required' => 'Nama Bayi Perlu Di Isi.',
            'scan_kk_orang_tua.mimes' => 'File KK harus berupa gambar (jpg, jpeg, png) atau PDF.',
            'scan_ktp_orang_tua.mimes' => 'File KTP harus berupa gambar (jpg, jpeg, png) atau PDF.',
            'scan_kk_orang_tua.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'scan_ktp_orang_tua.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        try {
            $uuid = (string) Str::uuid();
            // Menyimpan file scan KK ke folder yang sesuai
            $ScanKK = $request->hasFile('scan_kk_orang_tua') ? $request->file('scan_kk_orang_tua')->store('scan_dokumen/kk', 'public') : null;

            // Menyimpan file scan KTP ke folder yang sesuai
            $ScanKtp = $request->hasFile('scan_ktp_orang_tua') ? $request->file('scan_ktp_orang_tua')->store('scan_dokumen/ktp', 'public') : null;

            // Menyimpan data ke database
            $kelahiran = SuratKeteranganKelahiranModel::create([
                'id' => $uuid,
                'nama_bayi' => $request->nama_bayi,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'scan_kk_orang_tua' => $ScanKK,
                'scan_ktp_orang_tua' => $ScanKtp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pukul_kelahiran' => $request->pukul_kelahiran,
                'anak_ke' => $request->anak_ke,
                'berat_bayi' => $request->berat_bayi,
                'panjang_bayi' => $request->panjang_bayi,
                'nama_ayah' => $request->nama_ayah,
                'nik_ayah' => $request->nik_ayah,
                'nama_ibu' => $request->nama_ibu,
                'nik_ibu' => $request->nik_ibu,
            ]);
            $surat = new Surat([
                'id' => $uuid,
                'id_desa' => Auth::user()->id_desa,
                'id_user' => Auth::id(),
                'status' => 'pending'
            ]);

            $kelahiran->surat()->save($surat);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function show($id)
    {
        $surat = SuratKeteranganKelahiranModel::with('surat')->findOrFail($id);
        return view('halaman_desa.manajemen_layanan.persuratan.crud_surket_kelahiran.show', compact('surat'));
    }

    public function edit($id)
    {
        $surat = SuratKeteranganKelahiranModel::with('surat')->findOrFail($id);
        return view('halaman_desa.manajemen_layanan.persuratan.crud_surket_kelahiran.update', compact('surat'));
    }

    public function update(Request $request, $id)
    {
        $surat = SuratKeteranganKelahiranModel::findOrFail($id);
        $rules = [
            'nama_bayi' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|max:255',
            'scan_kk_orang_tua' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'scan_ktp_orang_tua' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'jenis_kelamin' => 'required|max:255',
            'pukul_kelahiran' => 'required|date_format:H:i',
            'anak_ke' => 'required|numeric|min:1|max:20',
            'berat_bayi' => 'required|numeric|min:0.1|max:999.9',
            'panjang_bayi' => 'required|numeric|min:10|max:99.9',
            'nama_ayah' => 'required|max:255',
            'nik_ayah' => 'required|digits:16',
            'nama_ibu' => 'required|max:255',
            'nik_ibu' => 'required|digits:16',
        ];

        $request->validate($rules, [
            'nama_bayi.required' => 'Nama Bayi Perlu Di Isi.',
            'scan_kk_orang_tua.mimes' => 'File KK harus berupa gambar (jpg, jpeg, png) atau PDF.',
            'scan_ktp_orang_tua.mimes' => 'File KTP harus berupa gambar (jpg, jpeg, png) atau PDF.',
            'scan_kk_orang_tua.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'scan_ktp_orang_tua.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        try {
            $ScanKK = $surat->scan_kk_orang_tua;
            if ($request->hasFile('scan_kk_orang_tua')) {
                if ($surat->scan_kk_orang_tua) {
                    Storage::disk('public')->delete($surat->scan_kk_orang_tua);
                }
                $ScanKK = $request->file('scan_kk_orang_tua')->store('scan_dokumen/kk', 'public');
            }

            $ScanKtp = $surat->scan_ktp_orang_tua;
            if ($request->hasFile('scan_ktp_orang_tua')) {
                if ($surat->scan_ktp_orang_tua) {
                    Storage::disk('public')->delete($surat->scan_ktp_orang_tua);
                }
                $ScanKtp = $request->file('scan_ktp_orang_tua')->store('scan_dokumen/ktp', 'public');
            }

            // Menyimpan data ke database
            $surat->update([                
                'nama_bayi' => $request->nama_bayi,
                'tanggal_lahir' => $request->tanggal_lahir,
                'tempat_lahir' => $request->tempat_lahir,
                'scan_kk_orang_tua' => $ScanKK,
                'scan_ktp_orang_tua' => $ScanKtp,
                'jenis_kelamin' => $request->jenis_kelamin,
                'pukul_kelahiran' => $request->pukul_kelahiran,
                'anak_ke' => $request->anak_ke,
                'berat_bayi' => $request->berat_bayi,
                'panjang_bayi' => $request->panjang_bayi,
                'nama_ayah' => $request->nama_ayah,
                'nik_ayah' => $request->nik_ayah,
                'nama_ibu' => $request->nama_ibu,
                'nik_ibu' => $request->nik_ibu,
            ]);
            $surat->surat->update([
                'status' => $request->status
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        $surat = SuratKeteranganKelahiranModel::findOrFail($id);

        // Menghapus file scan KK jika ada
        if ($surat->scan_kk_orang_tua) {
            Storage::disk('public')->delete($surat->scan_kk_orang_tua);
        }

        // Menghapus file scan KTP jika ada
        if ($surat->scan_ktp_orang_tua) {
            Storage::disk('public')->delete($surat->scan_ktp_orang_tua);
        }

        // Menghapus data surat dan surat terkait
        $surat->surat()->delete();
        $surat->delete();

        return redirect()->route('manajemen_surat.index')->with('success', 'Surat kelahiran berhasil dihapus.');
    }
}
