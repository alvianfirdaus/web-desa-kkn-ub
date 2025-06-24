<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

use App\Models\perusahaan\Desa;
use App\Models\desa\blog\Blog;
use App\Models\desa\pengaduan\PengaduanMasyarakat;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';
    protected $fillable = [
        'id_desa',
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'agama',
        'status_perkawinan',
        'email',
        'password',
        'level',
        'foto',
        'no_hp',
        'id_ktp',
        'pendidikan',
        'pekerjaan',        
    ];

    // Scope untuk memfilter petugas sesuai desa mereka
    public function scopePetugasDesa($query)
    {
        if (Auth::user()->level === 'petugas') {
            return $query->where('id_desa', Auth::user()->id_desa);
        }
        return $query;
    }

    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    public function pengaduan()
    {
        return $this->hasMany(PengaduanMasyarakat::class, 'id_user');
    }
}
