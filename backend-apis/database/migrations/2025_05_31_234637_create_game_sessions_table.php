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
        Schema::create('game_sessions', function (Blueprint $table) {
            $table->id('session_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('word_set_id');
            $table->unsignedBigInteger('vocab_id');
            $table->timestamp('play_date')->useCurrent();
            $table->bigInteger('play_duration')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->unsignedBigInteger('game_mode_id');
            $table->tinyInteger('game_theme')->default(1)->comment('1: dark, 2: light');
            $table->tinyInteger('game_outine')->default(1)->comment('1: không, 2: có');
            $table->tinyInteger('game_music')->default(1)->comment('1: không, 2: có');
            $table->integer('score')->default(0)->check('score >= 0');

            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('word_set_id')->references('word_set_id')->on('word_sets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('vocab_id')->references('vocab_id')->on('vocabularies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('game_mode_id')->references('game_mode_id')->on('game_modes')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_sessions');
    }
};
