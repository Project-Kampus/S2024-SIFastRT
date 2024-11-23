<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'isi', 'tanggal', 'tanggal_berlaku', 'lokasi', 'gambar', 'kontak', 'is_active'
    ];

    protected $casts = [
        'tanggal' => 'datetime',
        'tanggal_berlaku' => 'datetime',
    ];

    protected $table = 'pengumuman';
}
