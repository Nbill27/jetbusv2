<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->id('id_tiket');
            $table->unsignedBigInteger('id_rute');
            $table->unsignedBigInteger('id_tipe');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_rute')->references('id_rute')->on('rute')->onDelete('cascade');
            $table->foreign('id_tipe')->references('id_tipe')->on('tipe_bus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
