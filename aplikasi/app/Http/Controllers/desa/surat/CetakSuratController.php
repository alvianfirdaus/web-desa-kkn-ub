<?php

namespace App\Http\Controllers\desa\surat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\desa\surat\Surat;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakSuratController extends Controller
{
    public function cetak($id)
    {
        $surat = Surat::with(['suratable', 'user', 'desa'])->findOrFail($id);
        $jenis = class_basename($surat->suratable_type);

        switch ($jenis) {
            case 'SuratKeteranganDomisiliModel': //berdasarkan model surat
                $view = 'halaman_desa.pelayanan_desa.pdf_penyuratan.pdf_keterangan_domisili'; //view pdf yang akan di download
                $fileName = $surat->jenisSurat();//nama surat
                break;

            case 'SuratKeteranganKelahiranModel':
                $view = 'halaman_desa.pelayanan_desa.pdf_penyuratan.pdf_keterangan_kelahiran';
                $fileName = $surat->jenisSurat(); 
                break;
            default:
                abort(404, 'Template surat tidak ditemukan');
        }

        $data = [
            'surat' => $surat->suratable,
            'user' => $surat->user,
            'desa' => $surat->desa,
        ];

        $pdf = PDF::loadView($view, $data);
        return $pdf->download($fileName . '.pdf'); // nama surat + format PDF
    }
}
