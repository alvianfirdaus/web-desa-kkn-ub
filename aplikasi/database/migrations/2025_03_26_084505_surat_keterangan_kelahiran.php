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
        Schema::create('surat_keterangan_kelahiran', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_bayi');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');            
            $table->string('scan_kk_orang_tua')->nullable();
            $table->string('scan_ktp_orang_tua')->nullable();
            $table->string('jenis_kelamin');
            $table->time('pukul_kelahiran');
            $table->string('anak_ke');
            $table->decimal('berat_bayi', 5, 1);
            $table->decimal('panjang_bayi', 5, 1);
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('nama_ibu');
            $table->string('nik_ibu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_keterangan_kelahiran');
    }
};
