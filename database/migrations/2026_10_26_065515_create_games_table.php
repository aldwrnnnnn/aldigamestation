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
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('platform', ['PS3', 'PS4', 'PS5']);
            $table->string('genre');
            $table->string('player_count')->default('1 - 2 Pemain');
            $table->text('description')->nullable();
            $table->string('badge')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->string('release_year', 10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
