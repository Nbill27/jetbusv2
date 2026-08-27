<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bangku', function (Blueprint $table) {
            $table->id('id_bangku');
            $table->unsignedBigInteger('id_bus');
            $table->string('no_bangku');
            $table->enum('status', ['tersedia', 'dipesan'])->default('tersedia');
            $table->timestamps();

            $table->foreign('id_bus')->references('id_bus')->on('bus')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bangku');
    }
};
