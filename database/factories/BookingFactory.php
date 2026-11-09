<?php

namespace Database\Factories;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $platform = fake()->randomElement(['PS3', 'PS4', 'PS5']);
        $type = fake()->randomElement(['on_site', 'take_home']);
        $duration = fake()->numberBetween(1, 4);
        $price = Booking::calculatePrice($type, $platform, $duration);

        return [
            'booking_code' => 'ALDI-'.strtoupper(fake()->bothify('##??##')),
            'customer_name' => fake()->name(),
            'customer_phone' => '08'.fake()->numerify('##########'),
            'booking_type' => $type,
            'platform' => $platform,
            'booking_date' => fake()->dateTimeBetween('now', '+7 days')->format('Y-m-d'),
            'booking_time' => fake()->randomElement(['13:00', '15:00', '19:00', '21:00']),
            'duration' => $duration,
            'estimated_price' => $price,
            'notes' => fake()->optional()->sentence(),
            'status' => 'pending',
        ];
    }
}
