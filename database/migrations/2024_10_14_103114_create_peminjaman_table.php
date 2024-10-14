<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('fasilitas', ['tenda', 'sound system', 'kursi']);
            $table->datetime('tanggal_peminjaman');
            $table->datetime('tanggal_pengembalian');
            $table->enum('status', ['sedang menunggu', 'dipinjam'])->default('sedang menunggu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('peminjaman');
    }
};
