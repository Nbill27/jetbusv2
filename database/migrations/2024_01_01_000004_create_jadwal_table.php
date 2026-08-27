<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->unsignedBigInteger('id_bus');
            $table->unsignedBigInteger('id_rute');
            $table->date('tanggal_berangkat');
            $table->time('waktu_berangkat');
            $table->timestamps();

            $table->foreign('id_bus')->references('id_bus')->on('bus')->onDelete('cascade');
            $table->foreign('id_rute')->references('id_rute')->on('rute')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
