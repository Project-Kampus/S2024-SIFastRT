<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('datawargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique(); // Bisa diganti menjadi integer jika ingin menyimpan sebagai angka
            $table->date('tanggal_lahir');
            $table->enum('status', ['menikah', 'belum menikah']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('datawargas');
    }
};
