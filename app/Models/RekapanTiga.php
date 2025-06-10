<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapanTiga extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_bu',
        'nama_bu',
        'id_izin',
        'nib',
        'kab_kota',
        'kua',
        'kbli',
        'tgl_oss',
        'tgl_lsbu',
        'admin',
        'kode_ttp',
        'tim_tinjauan',
        'tgl_penunjukan',
        'catatan'
    ];

    public function kamus()
    {
        return $this->belongsTo(KamusBU::class, 'kode_bu', 'kode_bu');
    }
}
