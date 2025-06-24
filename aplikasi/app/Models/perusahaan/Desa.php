<?php

namespace App\Models\perusahaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\desa\blog\Blog;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';
    protected $fillable = [
        'nama_desa',
        'alamat_desa',
        'kode_pos',
        'logo_desa',
        'kabupaten',
        'kecamatan',
        'ttd_kades',
        'no_hp',
        'nama_kades',
        'nip_kades',
        'kelurahan'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id_desa');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }
}
