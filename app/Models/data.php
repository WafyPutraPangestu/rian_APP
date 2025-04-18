<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class data extends Model
{
    // Nama tabel
    protected $table = 'data';

    // Daftar atribut yang boleh diisi massal (fillable)
    protected $fillable = [
        'user_id',
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'foto_ktp',
        'nama_badan_usaha',
        'nib',
        'npwp',
        'alamat_kantor',
        'provinsi',
        'kabupaten',
        'kode_pos',
        'no_telepon',
        'email_perusahaan',
        'akte_pendirian',
        'siup',
        'tdp',
        'sertifikat_iso',
        'struktur_organisasi',
        'dokumen_pendukung_lain',
        'catatan',
    ];

    // Relasi ke model User
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Custom accessor untuk foto_ktp
    public function getFotoKtpAttribute($value): string
    {
        return asset('storage/images/' . $value);
    }
}
