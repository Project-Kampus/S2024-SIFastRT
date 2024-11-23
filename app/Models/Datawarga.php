<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datawarga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nik',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'nik_verified',
        'nik_verified_at',
    ];

    public function kartuKeluarga()
    {
        return $this->belongsToMany(KartuKeluarga::class, 'kartu_keluarga_datawarga', 'datawarga_id', 'kartu_keluarga_id');
    }
}

