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
        Schema::create('word_set_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('word_set_id');
            $table->unsignedBigInteger('tag_id');
            $table->primary(['word_set_id', 'tag_id']);

            $table->foreign('word_set_id')->references('word_set_id')->on('word_sets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tag_id')->references('tag_id')->on('tags')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('word_set_tag');
    }
};
