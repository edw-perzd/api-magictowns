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
        Schema::create('traditions', function (Blueprint $table) {
            $table->id('id_tradition');
            $table->date('date_tradition');
            $table->text('description_tradition');
            $table->string('origin_tradition');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traditions');
    }
};
