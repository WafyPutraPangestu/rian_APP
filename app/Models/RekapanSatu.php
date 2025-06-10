<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapanSatu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bu',
        'asosiasi',
        'kota_kab',
        'tanggal_pembayaran',
        'id_izin',
        'nama_ttp',
        'nama_abu_1',
        'nama_abu_2',
        'nama_pemutus_1',
        'nama_pemutus_2',
        'nama_pemutus_3',
        'kbli',
        'kua',
        'mtd_byr',
        'jumlah_biaya',
        'potongan_admin',
        'status_terbit'
    ];

    public function kamus()
    {
        return $this->belongsTo(KamusBU::class, 'nama_bu', 'nama_bu');
    }
}
