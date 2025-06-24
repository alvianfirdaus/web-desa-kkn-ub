<?php

namespace App\Http\Controllers\perusahaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\perusahaan\Desa;
use Illuminate\Support\Facades\Storage;

class DesaController extends Controller
{
    public function index()
    {
        $desa = Desa::paginate(10);
        return view('halaman_perusahaan.manajemen_data.desa.index', compact('desa'));
    }

    public function show($id)
    {
        $desa = Desa::findOrFail($id);
        return view('halaman_perusahaan.manajemen_data.desa.show', compact('desa'));
    }

    public function create()
    {
        return view('halaman_perusahaan.manajemen_data.desa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_desa' => 'required|string|max:255|unique:desa,nama_desa',
            'alamat_desa' => 'required|string|max:255',
            'kode_pos' => 'required|numeric',
            'logo_desa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'ttd_kades' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'no_hp' => 'required|numeric|unique:desa,no_hp',
            'nama_kades' => 'required|string|max:255',
            'nip_kades' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',
        ], [
            'nama_desa.unique' => 'Nama desa sudah ada, gunakan yang lain.',
            'no_hp.unique' => 'Nomor Hp ini sudah digunakan desa lain, gunakan yang lain.',
            'no_hp.numeric' => 'No Hp harus menggunakan angka',
            'kode_pos.numeric' => 'Kode pos harus menggunakan angka',
            'logo_desa.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'logo_desa.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'ttd_kades.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'ttd_kades.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
        ]);

        try {
            $fotoPath = $request->hasFile('logo_desa') ? $request->file('logo_desa')->store('logo_desa', 'public') : null;
            $ttdPath = $request->hasFile('ttd_kades') ? $request->file('ttd_kades')->store('ttd_kades', 'public') : null;

            Desa::create([
                'nama_desa' => $request->nama_desa,
                'alamat_desa' => $request->alamat_desa,
                'kode_pos' => $request->kode_pos,
                'logo_desa' => $fotoPath,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'ttd_kades' => $ttdPath,
                'no_hp' => $request->no_hp,
                'nama_kades' => $request->nama_kades,
                'nip_kades' => $request->nip_kades,
                'kelurahan' => $request->kelurahan,
            ]);

            return redirect()->back()->with('success', 'Data berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        $desa = Desa::findOrFail($id);
        return view('halaman_perusahaan.manajemen_data.desa.update', compact('desa'));
    }

    public function update(Request $request, $id)
    {
        $desa = Desa::findOrFail($id);

        $rules = [
            'nama_desa' => 'required|string|max:255',
            'alamat_desa' => 'required|string|max:255',
            'kode_pos' => 'required|numeric',
            'logo_desa' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'ttd_kades' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',            
            'no_hp' => 'required|string|max:255',            
            'nama_kades' => 'required|string|max:255',
            'nip_kades' => 'required|string|max:255',
            'kelurahan' => 'required|string|max:255',            
        ];

        if ($request->nama_desa !== $desa->nama_desa) {
            $rules['nama_desa'] .= '|unique:desa,nama_desa';
        }

        if ($request->no_hp !== $desa->no_hp) {
            $rules['no_hp'] .= '|unique:desa,no_hp';
        }

        $request->validate($rules, [
            'nama_desa.unique' => 'Nama desa sudah ada, gunakan yang lain.',
            'no_hp.unique' => 'Nomor Hp ini sudah digunakan desa lain, gunakan yang lain.',
            'kode_pos.numeric' => 'Kode pos harus menggunakan angka',
            'foto.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'ttd_kades.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'ttd_kades.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
        ]);

        try {
            $fotoPath = $desa->logo_desa;
            if ($request->hasFile('logo_desa')) {
                if ($desa->logo_desa) {
                    Storage::disk('public')->delete($desa->logo_desa);
                }
                $fotoPath = $request->file('logo_desa')->store('logo_desa', 'public');
            }

            $ttdPath = $desa->ttd_kades;
            if ($request->hasFile('ttd_kades')) {
                if ($desa->ttd_kades) {
                    Storage::disk('public')->delete($desa->ttd_kades);
                }
                $ttdPath = $request->file('ttd_kades')->store('ttd_kades', 'public');
            }

            $desa->update([
                'nama_desa' => $request->nama_desa,
                'alamat_desa' => $request->alamat_desa,
                'kode_pos' => $request->kode_pos,
                'logo_desa' => $fotoPath,
                'kabupaten' => $request->kabupaten,
                'kecamatan' => $request->kecamatan,
                'ttd_kades' => $ttdPath,
                'no_hp' => $request->no_hp,
                'nama_kades' => $request->nama_kades,
                'nip_kades' => $request->nip_kades,
                'kelurahan' => $request->kelurahan,
            ]);
            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        $desa = Desa::findOrFail($id);
        $desa->delete();

        return redirect()->route('desa.index')->with('success', 'Pendaftaran berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $nama_desa = $request->input('nama_desa');
        $desa = Desa::where('nama_desa', 'like', '%' . $nama_desa . '%')->paginate(10);

        if ($desa->isEmpty()) {
            return redirect()->route('desa.index')->with('error', 'Data nama desa tidak ditemukan!');
        }

        return view('halaman_perusahaan.manajemen_data.desa.index', compact('desa'));
    }
}
