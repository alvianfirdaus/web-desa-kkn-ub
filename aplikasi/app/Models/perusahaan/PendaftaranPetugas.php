<?php

namespace App\Models\perusahaan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPetugas extends Model
{
    use HasFactory;
    
    protected $table = 'pendaftaran_petugas';
    protected $fillable = [
        'nama_lengkap',
        'nomor_hp',
        'nama_desa',
        'nik',
        'status'
    ];
}
