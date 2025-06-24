<?php

namespace App\Models\desa\surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\desa\surat\Surat;

class SuratKeteranganKelahiranModel extends Model
{

    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'surat_keterangan_kelahiran';
    protected $fillable = [
        'id',
        'nama_bayi',
        'tanggal_lahir',
        'tempat_lahir',        
        'scan_kk_orang_tua',
        'scan_ktp_orang_tua',
        'jenis_kelamin',
        'pukul_kelahiran',
        'anak_ke',
        'berat_bayi',
        'panjang_bayi',
        'nama_ayah',
        'nik_ayah',
        'nama_ibu',
        'nik_ibu',
    ];

    //polymorph ke model master (surat)
    public function surat()
    {
        return $this->morphOne(Surat::class, 'suratable');
    }
}
