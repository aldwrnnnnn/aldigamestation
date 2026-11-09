<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleBookings = [
            [
                'booking_code' => 'ALDI-SAMPLE-01',
                'customer_name' => 'Budi Santoso',
                'customer_phone' => '081234567890',
                'booking_type' => 'on_site',
                'platform' => 'PS5',
                'booking_date' => now()->toDateString(),
                'booking_time' => '16:00',
                'duration' => 2,
                'estimated_price' => 36000,
                'notes' => 'Request stik 2 buah dan game FC 24 sudah siap.',
                'status' => 'confirmed',
            ],
            [
                'booking_code' => 'ALDI-SAMPLE-02',
                'customer_name' => 'Dimas Pratama',
                'customer_phone' => '082198765432',
                'booking_type' => 'take_home',
                'platform' => 'PS4',
                'booking_date' => now()->addDay()->toDateString(),
                'booking_time' => '11:00',
                'duration' => 2,
                'estimated_price' => 180000,
                'notes' => 'Sewa 2 hari untuk acara kumpul keluarga akhir pekan.',
                'status' => 'pending',
            ],
        ];

        foreach ($sampleBookings as $booking) {
            Booking::updateOrCreate(
                ['booking_code' => $booking['booking_code']],
                $booking
            );
        }
    }
}
