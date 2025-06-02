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
        Schema::create('word_sets', function (Blueprint $table) {
            $table->id('word_set_id'); // Auto increment primary key
            $table->string('title', 100)->default('Untitled'); // Title with default value
            $table->text('description')->default('Nothing'); // Description with default value
            $table->timestamp('created_date')->useCurrent(); // Created date, defaults to current timestamp
            $table->integer('view_count')->default(0); // View count, defaults to 0
            $table->tinyInteger('is_hidden')->default(2); // Hidden status, defaults to 2 (visible)
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade'); // Foreign key to User table
            $table->timestamps();
        });

        // Add the CHECK constraint using raw SQL
        DB::statement("ALTER TABLE word_sets ADD CONSTRAINT check_is_hidden CHECK (is_hidden IN (1, 2))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the CHECK constraint first
        DB::statement("ALTER TABLE word_sets DROP CONSTRAINT IF EXISTS check_is_hidden");

        // Drop the word_sets table
        Schema::dropIfExists('word_sets');
    }
};
