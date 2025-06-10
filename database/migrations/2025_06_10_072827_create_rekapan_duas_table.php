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
        Schema::create('rekapan_duas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bu');
            $table->string('id_izin')->nullable();
            $table->string('kbli')->nullable();
            $table->string('pemutus_1')->nullable();
            $table->string('pemutus_2')->nullable();
            $table->string('pemutus_3')->nullable();
            $table->date('tgl_penunjukan')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekapan_duas');
    }
};
