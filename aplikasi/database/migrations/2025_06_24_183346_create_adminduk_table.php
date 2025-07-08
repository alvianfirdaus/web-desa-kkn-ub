<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdmindukTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adminduk', function (Blueprint $table) {
            $table->id(); // field id, otomatis primary key dan auto increment
            $table->integer('penduduk');
            $table->integer('laki_laki');
            $table->integer('wanita');
            $table->timestamps(); // opsional, untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adminduk');
    }
}
