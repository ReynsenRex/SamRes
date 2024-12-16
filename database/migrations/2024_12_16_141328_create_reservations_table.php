<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('restaurant_id')->constrained('restaurants')->onDelete('cascade');
            $table->unsignedBigInteger('seat_id')->nullable(); // Define seat_id as nullable
            $table->date('reservation_date');
            $table->time('reservation_time');
            $table->enum('status', ['Pending', 'Confirmed', 'Completed', 'Cancelled'])->default('Pending');
            $table->timestamps();
        });

        // Add the foreign key constraint in a separate statement
        Schema::table('reservations', function (Blueprint $table) {
            $table->foreign('seat_id')
                  ->references('id')
                  ->on('seats')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
