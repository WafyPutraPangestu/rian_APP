<?php

use App\Models\User;
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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade');

            // Identitas pribadi/penanggung jawab
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->string('agama')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('foto_ktp')->nullable();

            // Informasi Badan Usaha
            $table->string('nama_badan_usaha');
            $table->string('nib'); // Nomor Induk Berusaha
            $table->string('npwp')->nullable();
            $table->string('alamat_kantor');
            $table->string('provinsi');
            $table->string('kabupaten');
            $table->string('kode_pos')->nullable();
            $table->string('no_telepon')->nullable();
            $table->string('email_perusahaan')->nullable();

            // Dokumen Pendukung
            $table->string('akte_pendirian')->nullable();
            $table->string('siup')->nullable();
            $table->string('tdp')->nullable();
            $table->string('sertifikat_iso')->nullable();
            $table->string('struktur_organisasi')->nullable();
            $table->string('dokumen_pendukung_lain')->nullable();

            // Keterangan tambahan
            $table->text('catatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
