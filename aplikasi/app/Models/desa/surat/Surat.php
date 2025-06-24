<?php

namespace App\Models\desa\surat;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\models\perusahaan\Desa;
use App\Notifications\notifikasi\SuratNotification;
use Illuminate\Support\Facades\Log;

class Surat extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $keyType = 'string';

    protected $table = 'surat';
    protected $fillable = ['id', 'id_desa', 'jenis', 'id_user', 'status', 'suratable_id', 'suratable_type'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa');
    }

    // Polymorphic relation
    public function suratable()
    {
        return $this->morphTo();
    }

    // Mendapatkan jenis surat / nama surat untuk di panggil di index petugas
    public function jenisSurat()
    {
        return match (class_basename($this->suratable)) {
            'SuratKeteranganDomisiliModel' => 'Surat Keterangan Domisili',
            'SuratKeteranganKelahiranModel' => 'Surat Keterangan Kelahiran',
            default => 'Jenis Surat Tidak Dikenal',
        };
    }

    //digunakan untuk memanggil/merelasikan notifikasi
    protected static function booted()
    {
        static::created(function ($surat) {
            try {
                // Hanya ambil petugas dari desa yang sama dengan surat
                $petugas = User::where('level', 'petugas')
                    ->where('id_desa', $surat->id_desa)
                    ->get();

                foreach ($petugas as $user) {
                    $user->notify(new SuratNotification($surat));
                }
            } catch (\Exception $e) {
                Log::error("Error dalam proses notifikasi surat: " . $e->getMessage());
            }
        });
    }
}
