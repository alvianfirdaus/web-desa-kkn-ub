<?php

namespace App\Models\desa\blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\perusahaan\Desa;
use App\Models\User;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';
    protected $fillable = [    
        'id_user',
        'id_desa',
        'tanggal',
        'judul',
        'isi',
        'kategori_blog',
        'gambar'
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
