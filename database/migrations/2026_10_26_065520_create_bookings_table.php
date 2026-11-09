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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code')->unique();
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->enum('booking_type', ['on_site', 'take_home'])->default('on_site');
            $table->enum('platform', ['PS3', 'PS4', 'PS5']);
            $table->date('booking_date');
            $table->string('booking_time', 20);
            $table->unsignedInteger('duration')->default(1);
            $table->unsignedInteger('estimated_price')->default(0);
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
