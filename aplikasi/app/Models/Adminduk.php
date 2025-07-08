<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adminduk extends Model
{
    use HasFactory;

    protected $table = 'adminduk';

    protected $fillable = ['penduduk', 'laki_laki', 'wanita'];
    public $timestamps = true; // karena Anda punya kolom `created_at` & `updated_at`
}