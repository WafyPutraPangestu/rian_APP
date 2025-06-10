<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KamusBU extends Model
{
    use HasFactory;

    protected $fillable = ['nama_bu', 'id_izin', 'kbli', 'kode_bu'];

    // Relasi ke rekapan
    public function rekapanSatu()
    {
        return $this->hasMany(RekapanSatu::class, 'nama_bu', 'nama_bu');
    }

    public function rekapanDua()
    {
        return $this->hasMany(RekapanDua::class, 'nama_bu', 'nama_bu');
    }

    public function rekapanTiga()
    {
        return $this->hasMany(RekapanTiga::class, 'nama_bu', 'nama_bu');
    }
}
