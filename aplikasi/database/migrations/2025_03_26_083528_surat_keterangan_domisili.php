<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat_keterangan_domisili', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->char('nik', 16);
            $table->string('no_kk');
            $table->string('alamat_lama');
            $table->string('alamat_baru');
            $table->string('alasan_permohonan');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_domisili');
    }
};
