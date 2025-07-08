<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('adjacent_towns', function (Blueprint $table) {
            $table->unsignedBigInteger('id_town');
            $table->unsignedBigInteger('id_adjacentTown');

            $table->foreign('id_town')->references('id_town')->on('towns')->onDelete('cascade');
            $table->foreign('id_adjacentTown')->references('id_town')->on('towns')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adjacent_towns');
    }
};
