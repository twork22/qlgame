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
        Schema::create('notification_admins', function (Blueprint $table) {
            $table->id('notification_id'); // AUTO_INCREMENT is the default for an ID
            $table->unsignedBigInteger('report_id');
            $table->unsignedBigInteger('user_sent');
            $table->unsignedBigInteger('admin_received');
            $table->string('title');
            $table->text('message');
            $table->timestamp('created_date')->useCurrent(); // Use CURRENT_TIMESTAMP as default
            $table->tinyInteger('notification_status')->default(1); // Default value 1

            $table->foreign('report_id')->references('report_id')->on('reported_sets')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('user_sent')->references('user_id')->on('users')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('admin_received')->references('user_id')->on('users')
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
        Schema::dropIfExists('notification_admins');
    }
};

