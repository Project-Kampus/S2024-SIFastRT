<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datawarga extends Model
{
    protected $table = 'datawargas'; // Nama tabel di database

    protected $fillable = ['nama', 'nik', 'tanggal_lahir', 'status'];
}
