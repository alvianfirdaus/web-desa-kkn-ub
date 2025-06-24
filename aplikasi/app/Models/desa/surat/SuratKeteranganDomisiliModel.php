<?php

namespace App\Models\desa\surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\desa\surat\Surat;

class SuratKeteranganDomisiliModel extends Model
{

    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'surat_keterangan_domisili';
    protected $fillable = [
        'id',
        'nama',
        'nik',
        'no_kk',
        'alamat_lama',
        'alamat_baru',
        'alasan_permohonan',
        'nama_surat'
    ];

    //polymorph ke model master (surat)
    public function surat()
    {
        return $this->morphOne(Surat::class, 'suratable');
    }
}
