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
        Schema::create('tradition_town', function (Blueprint $table) {
            $table->unsignedBigInteger('id_town');
            $table->unsignedBigInteger('id_tradition');

            $table->foreign('id_town')->references('id_town')->on('towns')->onDelete('cascade');
            $table->foreign('id_tradition')->references('id_tradition')->on('traditions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tradition_town');
    }
};
