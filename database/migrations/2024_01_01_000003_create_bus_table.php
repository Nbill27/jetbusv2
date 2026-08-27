<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bus', function (Blueprint $table) {
            $table->id('id_bus');
            $table->unsignedBigInteger('id_tipe');
            $table->string('no_plat')->unique();
            $table->timestamps();

            $table->foreign('id_tipe')->references('id_tipe')->on('tipe_bus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bus');
    }
};
