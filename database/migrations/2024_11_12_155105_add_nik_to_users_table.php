<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('nik')->unique()->nullable(); // NIK harus unik dan bisa null sementara
        $table->timestamp('nik_verified_at')->nullable(); // Waktu verifikasi NIK
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn(['nik', 'nik_verified_at']);
    });
}

};
