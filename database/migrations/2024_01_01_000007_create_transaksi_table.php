<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->foreignId('id_pengguna')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('id_jadwal');
            $table->integer('total');
            $table->enum('status', ['tertunda', 'dibayar', 'gagal', 'dibatalkan'])->default('tertunda');
            $table->datetime('tanggal_transaksi');
            $table->timestamps();

            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
