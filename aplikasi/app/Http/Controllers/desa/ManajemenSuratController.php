<?php

namespace App\Http\Controllers\desa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\desa\surat\SuratKeteranganDomisiliController;
use App\Http\Controllers\desa\surat\SuratKeteranganKelahiranController;
use Illuminate\Http\Request;
use App\Models\desa\surat\Surat;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ManajemenSuratController extends Controller
{
    public function index(Request $request)
    {
        // Cek apakah user adalah admin
        if (Auth::user()->level === 'admin') {
            $query = Surat::with(['user', 'suratable', 'desa']);
        } else {
            $query = Surat::where('id_desa', Auth::user()->id_desa)
                ->with(['user', 'suratable']);
        }

        // Filter berdasarkan status
        if ($request->has('status') && $request->status != 'semua') {
            $query->where('status', $request->status);
        }

        // 🔍 Filter berdasarkan ID surat
        if ($request->has('search') && !empty($request->search)) {
            $query->where('id', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan rentang tanggal (perbaikan)
        if (
            $request->has('tanggal_awal') && !empty($request->tanggal_awal) &&
            $request->has('tanggal_akhir') && !empty($request->tanggal_akhir)
        ) {

            // Konversi ke format Y-m-d dan tambahkan waktu untuk mencakup seluruh hari terakhir
            $tanggalAwal = Carbon::parse($request->tanggal_awal)->startOfDay();
            $tanggalAkhir = Carbon::parse($request->tanggal_akhir)->endOfDay();

            $query->whereBetween('created_at', [
                $tanggalAwal,
                $tanggalAkhir
            ]);
        }

        $surat = $query->paginate(10);

        return view('halaman_desa.manajemen_layanan.persuratan.index', compact('surat'));
    }

    public function show($id)
    {
        $surat = Surat::findOrFail($id);
        $jenis = class_basename($surat->suratable_type);

        // Arahkan ke controller surat spesifik
        switch ($jenis) {
            case 'SuratKeteranganDomisiliModel':
                return app(SuratKeteranganDomisiliController::class)->show($surat->suratable_id);

            case 'SuratKeteranganKelahiranModel':
                return app(SuratKeteranganKelahiranController::class)->show($surat->suratable_id);

            default:
                abort(404);
        }
    }

    public function edit($id)
    {
        $surat = Surat::findOrFail($id);
        $jenis = class_basename($surat->suratable_type);

        switch ($jenis) {
            case 'SuratKeteranganDomisiliModel':
                return app(SuratKeteranganDomisiliController::class)->edit($surat->suratable_id);

            case 'SuratKeteranganKelahiranModel':
                return app(SuratKeteranganKelahiranController::class)->edit($surat->suratable_id);

            default:
                abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $surat = Surat::findOrFail($id);
        $jenis = class_basename($surat->suratable_type);

        switch ($jenis) {
            case 'SuratKeteranganDomisiliModel':
                return app(SuratKeteranganDomisiliController::class)->update($request, $surat->suratable_id);

            case 'SuratKeteranganKelahiranModel':
                return app(SuratKeteranganKelahiranController::class)->update($request, $surat->suratable_id);

            default:
                abort(404);
        }
    }

    public function destroy($id)
    {
        $surat = Surat::findOrFail($id);
        $jenis = class_basename($surat->suratable_type);

        switch ($jenis) {
            case 'SuratKeteranganDomisiliModel':
                return app(SuratKeteranganDomisiliController::class)->destroy($surat->suratable_id);

            case 'SuratKeteranganKelahiranModel':
                return app(SuratKeteranganKelahiranController::class)->destroy($surat->suratable_id);

            default:
                abort(404);
        }
    }
}
