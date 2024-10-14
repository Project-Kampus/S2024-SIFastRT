<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'nama',
        'fasilitas',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status',
    ];

    protected $dates = [
        'tanggal_peminjaman',  // Ini akan otomatis menjadi Carbon instance
        'tanggal_pengembalian', // Ini akan otomatis menjadi Carbon instance
    ];
}
