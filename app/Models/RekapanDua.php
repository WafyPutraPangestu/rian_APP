<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapanDua extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bu',
        'id_izin',
        'kbli',
        'pemutus_1',
        'pemutus_2',
        'pemutus_3',
        'tgl_penunjukan',
        'catatan'
    ];

    public function kamus()
    {
        return $this->belongsTo(KamusBU::class, 'nama_bu', 'nama_bu');
    }
}
