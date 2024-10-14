<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'tanggal']; // Menambahkan fillable

    protected $casts = [
        'tanggal' => 'datetime', // Memastikan tanggal diperlakukan sebagai objek Carbon
    ];
}
