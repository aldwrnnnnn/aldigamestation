<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GameSeeder::class);

        // Only seed mock booking reservations in local and testing environments
        if (app()->environment('local', 'testing')) {
            $this->call(BookingSeeder::class);
        }
    }
}
