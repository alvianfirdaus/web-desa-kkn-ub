<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apbd extends Model
{
    use HasFactory;
    protected $table = 'apbd';

    protected $fillable = ['pendes', 'beldes'];

    public $timestamps = true; // karena Anda punya kolom `created_at` & `updated_at`
}
