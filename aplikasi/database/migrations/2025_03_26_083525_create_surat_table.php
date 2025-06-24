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
        Schema::create('surat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('id_desa')->constrained('desa')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            
            // Polymorphic fields dengan UUID
            $table->string('suratable_type');
            $table->uuid('suratable_id');

            $table->enum('status', ['pending', 'ditolak', 'diproses', 'selesai'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
