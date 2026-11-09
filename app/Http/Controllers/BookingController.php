<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * aldigamestation Official WhatsApp contact number (format without + or dashes for wa.me).
     */
    protected function getAdminWhatsApp(): string
    {
        return (string) env('WHATSAPP_NUMBER', '6281529434240');
    }

    /**
     * Store a newly created rental booking.
     */
    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'min:2', 'max:100'],
            'customer_phone' => ['required', 'string', 'min:9', 'max:20', 'regex:/^[0-9+\s\-()]{9,20}$/'],
            'booking_type' => ['required', 'in:on_site,take_home'],
            'platform' => ['required', 'in:PS3,PS4,PS5'],
            'booking_date' => ['required', 'date', 'after_or_equal:today'],
            'booking_time' => ['required', 'string', 'max:20'],
            'duration' => ['required', 'integer', 'min:1', 'max:30'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        do {
            $bookingCode = 'ALDI-'.date('Ymd').'-'.strtoupper(Str::random(4));
        } while (Booking::where('booking_code', $bookingCode)->exists());

        $estimatedPrice = Booking::calculatePrice(
            $validated['booking_type'],
            $validated['platform'],
            (int) $validated['duration']
        );

        $booking = Booking::create([
            'booking_code' => $bookingCode,
            'customer_name' => $validated['customer_name'],
            'customer_phone' => $validated['customer_phone'],
            'booking_type' => $validated['booking_type'],
            'platform' => $validated['platform'],
            'booking_date' => $validated['booking_date'],
            'booking_time' => $validated['booking_time'],
            'duration' => (int) $validated['duration'],
            'estimated_price' => $estimatedPrice,
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
        ]);

        $typeName = $booking->booking_type === 'take_home' ? 'Sewa Bawa Pulang' : 'Main di Tempat';
        $durationUnit = $booking->booking_type === 'take_home' ? 'Hari' : 'Jam';
        $formattedPrice = 'Rp '.number_format($booking->estimated_price, 0, ',', '.');

        $waMessage = "Halo aldigamestation! Saya baru saja melakukan booking via website:\n\n"
            ."*Kode Booking:* {$booking->booking_code}\n"
            ."*Nama:* {$booking->customer_name}\n"
            ."*No. WhatsApp:* {$booking->customer_phone}\n"
            ."*Layanan:* {$typeName}\n"
            ."*Konsol:* {$booking->platform}\n"
            ."*Tanggal:* {$booking->booking_date->format('d M Y')}\n"
            ."*Waktu / Jam:* {$booking->booking_time}\n"
            ."*Durasi:* {$booking->duration} {$durationUnit}\n"
            ."*Estimasi Biaya:* {$formattedPrice}\n";

        if (! empty($booking->notes)) {
            $waMessage .= "*Catatan:* {$booking->notes}\n";
        }

        $waMessage .= "\nMohon konfirmasi ketersediaan unit dan slotnya ya kak. Terima kasih!";
        $whatsappUrl = 'https://wa.me/'.$this->getAdminWhatsApp().'?text='.rawurlencode($waMessage);

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Booking berhasil dibuat.',
                'data' => $booking,
                'whatsapp_url' => $whatsappUrl,
            ]);
        }

        return redirect()->to(route('home').'#booking-status')->with([
            'booking_success' => true,
            'booking' => $booking,
            'whatsapp_url' => $whatsappUrl,
        ]);
    }

    /**
     * Check status of a booking by code or phone number.
     */
    public function checkStatus(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'search_query' => ['required', 'string', 'min:3', 'max:50'],
        ]);

        $query = trim($validated['search_query']);

        $bookings = Booking::where('booking_code', $query)
            ->orWhere('customer_phone', $query)
            ->orderBy('id', 'desc')
            ->get();

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'status' => 'success',
                'count' => $bookings->count(),
                'data' => $bookings,
            ]);
        }

        return redirect()->to(route('home').'#cek-booking')->with([
            'searched_query' => $query,
            'found_bookings' => $bookings,
            'search_performed' => true,
        ]);
    }
}
