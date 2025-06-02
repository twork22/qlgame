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
        Schema::create('game_modes', function (Blueprint $table) {
            $table->id('game_mode_id');
            $table->unsignedBigInteger('game_id');
            $table->string('grid_size');
            $table->integer('min_words');
            $table->integer('max_words');

            $table->foreign('game_id')->references('game_id')->on('games')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_modes');
    }
};
