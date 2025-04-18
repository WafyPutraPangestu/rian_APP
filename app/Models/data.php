<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $fillable = [
        'user_id',
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'foto_ktp',
    ];
    protected $table = 'data';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getFotoKtpAttribute($value)
    {
        return asset('storage/images/' . $value);
    }
}
