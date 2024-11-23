<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi');
            $table->date('tanggal')->nullable();
            $table->date('tanggal_berlaku')->nullable();  // Tanggal berlaku
            $table->string('lokasi')->nullable();  // Lokasi acara
            $table->string('gambar')->nullable();  // Gambar opsional
            $table->string('kontak')->nullable();  // Kontak atau sumber informasi
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
