<?php

namespace App\Models\desa\pengaduan;

use App\Models\perusahaan\Desa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class PengaduanMasyarakat extends Model
{
    use HasFactory;
    protected $table = 'pengaduan_masyarakat';
    protected $fillable = [
        'id_user',
        'judul',
        'pesan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }
}
