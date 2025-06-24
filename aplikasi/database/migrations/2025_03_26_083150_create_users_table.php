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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_desa')->constrained('desa')->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->string('nik', 16)->unique();
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('alamat');
            $table->enum('agama', ['islam', 'kristen', 'hindu', 'budha', 'konghucu', 'lainnya']);
            $table->enum('status_perkawinan', ['belum_menikah', 'menikah', 'cerai_hidup', 'cerai_mati']);
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('level', ['admin', 'petugas', 'warga']);
            $table->string('foto')->nullable();
            $table->string('no_hp');
            $table->string('id_ktp')->nullable()->unique();
            $table->enum('pendidikan', ['belum_sekolah', 'sd','sltp', 'slta', 'diploma', 'sarjana']);
            $table->enum('pekerjaan', ['petani', 'pedagang', 'guru', 'pns', 'bidan/dokter', 'angkutan_umum', 'peternak', 'tukang_bangunan', 'wiraswasta', 'buruh', 'pelajar', 'lainnya']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
