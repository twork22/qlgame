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
        Schema::create('reported_sets', function (Blueprint $table) {
            $table->id('report_id'); // AUTO_INCREMENT is the default for an ID
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('word_set_id');
            $table->tinyInteger('report_status')->default(0); // Default value 0
            $table->text('reason')->nullable(); // Make reason nullable if it isn't always provided
            $table->timestamp('reported_date')->useCurrent(); // Use CURRENT_TIMESTAMP as default

            $table->foreign('user_id')->references('user_id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('word_set_id')->references('word_set_id')->on('word_sets')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reported_sets');
    }
};
