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
        Schema::create('kamus_b_u_s', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bu')->unique();
            $table->string('id_izin')->unique();
            $table->string('kbli');
            $table->string('kode_bu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kamus_b_u_s');
    }
};
