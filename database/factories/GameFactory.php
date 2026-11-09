<?php

namespace Database\Factories;

use App\Models\Game;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Game>
 */
class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(3, true),
            'platform' => fake()->randomElement(['PS3', 'PS4', 'PS5']),
            'genre' => fake()->randomElement(['Sports', 'Action', 'Fighting', 'Racing', 'Adventure']),
            'player_count' => '1 - 2 Pemain',
            'description' => fake()->sentence(),
            'badge' => fake()->randomElement(['Favorit', '4K 60FPS', null]),
            'image_url' => 'images/'.fake()->randomElement(['fc24.jpg', 'gtav.jpg', 'tekken8.jpg']),
            'is_popular' => fake()->boolean(40),
            'release_year' => (string) fake()->numberBetween(2010, 2024),
        ];
    }
}
