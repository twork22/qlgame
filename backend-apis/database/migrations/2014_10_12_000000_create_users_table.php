<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id'); // Auto increment primary key
            $table->string('username', 50)->unique(); // Unique username
            $table->string('password', 100); // Password with 100 character length
            $table->string('email', 100); // Email
            $table->string('fullname', 100)->nullable(); // Full name (optional)
            $table->string('phone_number', 20)->nullable(); // Phone number (optional)
            $table->string('avatar', 255)->nullable(); // Avatar (optional)
            $table->text('description')->nullable(); // Description (optional)
            $table->date('birthdate')->nullable(); // Birthdate (optional)
            $table->timestamp('registration_date')->useCurrent(); // Registration date, defaults to current timestamp
            $table->tinyInteger('user_type')->default(1); // User type, defaults to 1
            $table->timestamps();
        });

        // Add the CHECK constraints using raw SQL
        DB::statement("ALTER TABLE users ADD CONSTRAINT check_password_length CHECK (CHAR_LENGTH(password) >= 8)");
        DB::statement("ALTER TABLE users ADD CONSTRAINT check_email_format CHECK (email LIKE '%@%')");
        DB::statement("ALTER TABLE users ADD CONSTRAINT check_phone_number_format CHECK (phone_number REGEXP '^\\\\+[0-9]{6,}$')");
        DB::statement("ALTER TABLE users ADD CONSTRAINT check_user_type CHECK (user_type IN (1, 2))");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the CHECK constraints first
        DB::statement("ALTER TABLE users DROP CONSTRAINT IF EXISTS check_password_length");
        DB::statement("ALTER TABLE users DROP CONSTRAINT IF EXISTS check_email_format");
        DB::statement("ALTER TABLE users DROP CONSTRAINT IF EXISTS check_phone_number_format");
        DB::statement("ALTER TABLE users DROP CONSTRAINT IF EXISTS check_user_type");

        Schema::dropIfExists('users');
    }
};
