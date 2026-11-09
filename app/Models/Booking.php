<?php

namespace App\Models;

use Database\Factories\BookingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /** @use HasFactory<BookingFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'booking_code',
        'customer_name',
        'customer_phone',
        'booking_type',
        'platform',
        'booking_date',
        'booking_time',
        'duration',
        'estimated_price',
        'notes',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'booking_date' => 'date',
            'duration' => 'integer',
            'estimated_price' => 'integer',
        ];
    }

    /**
     * Standard hourly rental rates for on-site studio play.
     *
     * @var array<string, int>
     */
    public const HOURLY_RATES = [
        'PS3' => 5000,
        'PS4' => 10000,
        'PS5' => 18000,
    ];

    /**
     * Standard daily rental rates for take-home rental (per 24 hours).
     *
     * @var array<string, int>
     */
    public const DAILY_RATES = [
        'PS3' => 50000,
        'PS4' => 90000,
        'PS5' => 175000,
    ];

    /**
     * Get all active rental rates grouped by service type.
     *
     * @return array{on_site: array<string, int>, take_home: array<string, int>}
     */
    public static function allRates(): array
    {
        return [
            'on_site' => self::HOURLY_RATES,
            'take_home' => self::DAILY_RATES,
        ];
    }

    /**
     * Calculate price based on type, platform, and duration.
     */
    public static function calculatePrice(string $type, string $platform, int $duration): int
    {
        if ($type === 'take_home') {
            $rate = self::DAILY_RATES[$platform] ?? 90000;

            return $rate * max(1, $duration);
        }

        $rate = self::HOURLY_RATES[$platform] ?? 10000;

        return $rate * max(1, $duration);
    }
}
