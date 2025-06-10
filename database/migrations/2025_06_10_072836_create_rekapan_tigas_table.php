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
        Schema::create('rekapan_tigas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bu');
            $table->string('nama_bu');
            $table->string('id_izin')->nullable();
            $table->string('nib')->nullable();
            $table->string('kab_kota')->nullable();
            $table->string('kua')->nullable();
            $table->string('kbli')->nullable();
            $table->date('tgl_oss')->nullable();
            $table->date('tgl_lsbu')->nullable();
            $table->string('admin')->nullable();
            $table->string('kode_ttp')->nullable();
            $table->string('tim_tinjauan')->nullable();
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
        Schema::dropIfExists('rekapan_tigas');
    }
};
