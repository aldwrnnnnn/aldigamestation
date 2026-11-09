<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Game;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the aldigamestation rental homepage.
     */
    public function index(Request $request): View
    {
        $selectedPlatform = $request->query('platform', 'all');
        $search = $request->query('q');

        $query = Game::query();

        if ($selectedPlatform && in_array($selectedPlatform, ['PS3', 'PS4', 'PS5'])) {
            $query->where('platform', $selectedPlatform);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('genre', 'like', "%{$search}%");
            });
        }

        $games = $query->orderBy('is_popular', 'desc')->orderBy('title', 'asc')->get();

        $platformCounts = [
            'all' => Game::count(),
            'PS5' => Game::where('platform', 'PS5')->count(),
            'PS4' => Game::where('platform', 'PS4')->count(),
            'PS3' => Game::where('platform', 'PS3')->count(),
        ];

        $rates = Booking::allRates();

        $pricingPlans = [
            'on_site' => [
                'name' => 'Main di Tempat (Rental Studio)',
                'subtitle' => 'Ruangan ber-AC dingin, sofa empuk, TV layar lebar, dan stick orisinal prima.',
                'units' => 'jam',
                'items' => [
                    [
                        'platform' => 'PS3',
                        'price' => $rates['on_site']['PS3'],
                        'highlight' => 'Hemat Nostalgia',
                        'features' => ['TV LED Full HD', '2 Stik Wireless', 'Game Klasik & PES 2013 Patch Baru', 'Ruangan Ber-AC'],
                    ],
                    [
                        'platform' => 'PS4',
                        'price' => $rates['on_site']['PS4'],
                        'highlight' => 'Paling Populer',
                        'popular' => true,
                        'features' => ['TV 43 Inch Full HD', '2 Stik DualShock 4 Ori', 'Game FIFA/FC 24 & PES Patch Terbaru', 'Ruangan Ber-AC & Sofa Nyaman'],
                    ],
                    [
                        'platform' => 'PS5',
                        'price' => $rates['on_site']['PS5'],
                        'highlight' => 'Next-Gen Experience',
                        'features' => ['TV 50 Inch 4K HDR 60fps', '2 Stik DualSense Haptic Feedback', 'Game Eksklusif Terbaru & Loading Cepat', 'VIP Sofa & Ruangan Dingin'],
                    ],
                ],
            ],
            'take_home' => [
                'name' => 'Sewa Bawa Pulang (Rental Harian)',
                'subtitle' => 'Bawa konsol ke rumah atau kosan untuk main maraton seharian bareng teman.',
                'units' => 'hari (24 jam)',
                'items' => [
                    [
                        'platform' => 'PS3',
                        'price' => $rates['take_home']['PS3'],
                        'highlight' => 'Hemat Seharian',
                        'features' => ['Unit PS3 Slim Terawat', '2 Stik Wireless + Kabel Charger', 'Kabel HDMI & Kabel Power', 'Full Game Siap Main'],
                    ],
                    [
                        'platform' => 'PS4',
                        'price' => $rates['take_home']['PS4'],
                        'highlight' => 'Favorit Weekend',
                        'popular' => true,
                        'features' => ['Unit PS4 Slim / Pro', '2 Stik DualShock 4 Wireless', 'Kabel HDMI High Speed & Power', 'Belasan Game Populer Terinstall'],
                    ],
                    [
                        'platform' => 'PS5',
                        'price' => $rates['take_home']['PS5'],
                        'highlight' => 'Grafis 4K Puas',
                        'features' => ['Unit PlayStation 5 Resmi', '2 Stik DualSense Original', 'Kabel Ultra High Speed HDMI', 'Koleksi Game PS5 Terbaru'],
                    ],
                ],
            ],
        ];

        return view('home', compact('games', 'platformCounts', 'pricingPlans', 'rates', 'selectedPlatform', 'search'));
    }

    /**
     * Provide JSON endpoint for fast game search and filtering.
     */
    public function apiGames(Request $request): JsonResponse
    {
        $platform = $request->query('platform', 'all');
        $search = $request->query('q');

        $query = Game::query();

        if ($platform && in_array($platform, ['PS3', 'PS4', 'PS5'])) {
            $query->where('platform', $platform);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('genre', 'like', "%{$search}%");
            });
        }

        $games = $query->orderBy('is_popular', 'desc')->orderBy('title', 'asc')->get();

        return response()->json([
            'status' => 'success',
            'count' => $games->count(),
            'data' => $games,
        ]);
    }
}
