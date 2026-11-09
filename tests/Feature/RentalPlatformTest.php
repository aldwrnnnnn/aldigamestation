<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Game;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RentalPlatformTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_loads_successfully_with_aldigamestation_branding(): void
    {
        Game::factory()->create([
            'title' => 'Tekken 8',
            'platform' => 'PS5',
            'genre' => 'Fighting',
        ]);

        Game::factory()->create([
            'title' => 'Grand Theft Auto V',
            'platform' => 'PS4',
            'genre' => 'Action',
        ]);

        Game::factory()->create([
            'title' => 'PES 2013',
            'platform' => 'PS3',
            'genre' => 'Sports',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('aldigamestation');
        $response->assertSee('Tekken 8');
        $response->assertSee('Grand Theft Auto V');
        $response->assertSee('PES 2013');
        $response->assertSee('Booking Online');
        $response->assertSee('Cek Status');
    }

    public function test_api_games_returns_json_and_filters_by_platform(): void
    {
        Game::factory()->create([
            'title' => 'Gran Turismo 7',
            'platform' => 'PS5',
        ]);

        Game::factory()->create([
            'title' => 'Crash Team Racing',
            'platform' => 'PS4',
        ]);

        $response = $this->getJson('/api/games?platform=PS5');

        $response->assertStatus(200);
        $response->assertJsonPath('status', 'success');
        $response->assertJsonCount(1, 'data');
        $response->assertJsonPath('data.0.title', 'Gran Turismo 7');
    }

    public function test_user_can_submit_online_booking_successfully(): void
    {
        $payload = [
            'customer_name' => 'Fajar Nugraha',
            'customer_phone' => '081298765432',
            'booking_type' => 'on_site',
            'platform' => 'PS4',
            'booking_date' => now()->toDateString(),
            'booking_time' => '16:00',
            'duration' => 3,
            'notes' => 'Siapkan 2 stik dan game PES 2021',
        ];

        $response = $this->post('/booking', $payload);

        $response->assertRedirect();
        $response->assertSessionHas('booking_success', true);

        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'Fajar Nugraha',
            'customer_phone' => '081298765432',
            'platform' => 'PS4',
            'duration' => 3,
            'estimated_price' => 30000, // 3 jam * 10.000
            'status' => 'pending',
        ]);
    }

    public function test_user_can_submit_take_home_rental_booking(): void
    {
        $payload = [
            'customer_name' => 'Rian Hidayat',
            'customer_phone' => '081311223344',
            'booking_type' => 'take_home',
            'platform' => 'PS5',
            'booking_date' => now()->toDateString(),
            'booking_time' => '14:00',
            'duration' => 2, // 2 hari
            'notes' => 'Sewa akhir pekan',
        ];

        $response = $this->postJson('/booking', $payload);

        $response->assertStatus(200);
        $response->assertJsonPath('status', 'success');
        $response->assertJsonPath('data.estimated_price', 350000); // 2 hari * 175.000
        $this->assertStringContainsString('https://wa.me/', $response->json('whatsapp_url'));
    }

    public function test_booking_validation_requires_mandatory_fields(): void
    {
        $response = $this->post('/booking', []);

        $response->assertSessionHasErrors([
            'customer_name',
            'customer_phone',
            'booking_type',
            'platform',
            'booking_date',
            'booking_time',
            'duration',
        ]);
    }

    public function test_user_can_check_booking_status(): void
    {
        $booking = Booking::factory()->create([
            'booking_code' => 'ALDI-TEST-9999',
            'customer_name' => 'Siti Aisyah',
            'customer_phone' => '081555666777',
            'status' => 'confirmed',
        ]);

        $response = $this->post('/booking/status', [
            'search_query' => 'ALDI-TEST-9999',
        ]);

        $response->assertRedirect(route('home').'#cek-booking');
        $response->assertSessionHas('found_bookings');
        $response->assertSessionHas('search_performed', true);
    }
}
