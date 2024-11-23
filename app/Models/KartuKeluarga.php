<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuKeluarga extends Model
{
    use HasFactory;
    
    protected $table = 'kartu_keluarga'; 

    protected $fillable = [
        'nomor_kk',
        'alamat',
        'rt_rw',
        'desa_kelurahan',
        'kecamatan',
        'kabupaten_kota',
        'kode_pos',
        'provinsi',
        'kepala_keluarga',
    ];

    public function kepalaKeluarga()
    {
        return $this->belongsTo(DataWarga::class, 'kepala_keluarga');
    }

    public function anggotaKeluarga()
    {
        return $this->belongsToMany(DataWarga::class, 'kartu_keluarga_datawarga', 'kartu_keluarga_id', 'datawarga_id');
    }
}

