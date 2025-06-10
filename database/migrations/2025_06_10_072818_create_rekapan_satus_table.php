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
        Schema::create('rekapan_satus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bu'); // relasi ke kamus
            $table->string('asosiasi')->nullable();
            $table->string('kota_kab')->nullable();
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('id_izin')->nullable();
            $table->string('nama_ttp')->nullable();
            $table->string('nama_abu_1')->nullable();
            $table->string('nama_abu_2')->nullable();
            $table->string('nama_pemutus_1')->nullable();
            $table->string('nama_pemutus_2')->nullable();
            $table->string('nama_pemutus_3')->nullable();
            $table->string('kbli')->nullable();
            $table->string('kua')->nullable();
            $table->string('mtd_byr')->nullable();
            $table->decimal('jumlah_biaya', 12, 2)->nullable();
            $table->decimal('potongan_admin', 12, 2)->nullable();
            $table->string('status_terbit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekapan_satus');
    }
};
