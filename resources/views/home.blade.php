@extends('layouts.app')

@section('title', 'aldigamestation - Rental PlayStation 3, 4, 5')

@section('content')

    <!-- Flash Notifikasi Sukses Booking -->
    @if(session('booking_success') && session('booking'))
        @php
            $booked = session('booking');
            $waUrl = session('whatsapp_url');
        @endphp
        <div id="booking-status" class="bg-emerald-50 border-b border-emerald-200 py-6 px-4">
            <div class="max-w-3xl mx-auto bg-white rounded-2xl p-6 shadow-sm border border-emerald-200">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-xl bg-emerald-100 text-emerald-700 flex items-center justify-center shrink-0">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <span class="text-xs font-bold uppercase tracking-wider text-emerald-700">Booking Berhasil Dicatat</span>
                        <h2 class="text-xl font-bold text-slate-900 font-heading">
                            Kode: <span class="font-mono text-blue-700">{{ $booked->booking_code }}</span>
                        </h2>
                        <p class="text-xs text-slate-600 mt-0.5">
                            {{ $booked->customer_name }} | {{ $booked->platform }} ({{ $booked->booking_type === 'take_home' ? 'Bawa Pulang' : 'Main di Studio' }}) | {{ $booked->duration }} {{ $booked->booking_type === 'take_home' ? 'Hari' : 'Jam' }} | Total: <strong>Rp {{ number_format($booked->estimated_price, 0, ',', '.') }}</strong>
                        </p>
                    </div>
                </div>

                <div class="mt-4 pt-4 border-t border-slate-100 flex flex-col sm:flex-row gap-3">
                    <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-emerald-600 text-white font-bold text-sm hover:bg-emerald-700 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0012.04 2zm0 18.15c-1.49 0-2.95-.4-4.22-1.15l-.3-.18-3.13.82.83-3.05-.2-.31a8.16 8.16 0 01-1.25-4.38c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.82 2.42a8.18 8.18 0 012.41 5.83c0 4.54-3.69 8.24-8.24 8.24zm4.51-6.17c-.25-.12-1.47-.72-1.7-.81-.23-.08-.39-.12-.56.12-.17.25-.64.81-.79.97-.14.17-.29.19-.54.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43.12-.15.17-.25.25-.42.08-.17.04-.31-.02-.44-.06-.12-.56-1.35-.77-1.85-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.44.06-.67.31-.23.25-.88.86-.88 2.1 0 1.24.9 2.44 1.03 2.61.12.17 1.77 2.71 4.3 3.79.6.26 1.07.41 1.44.53.61.19 1.16.17 1.6.1.49-.07 1.47-.6 1.68-1.18.21-.58.21-1.07.15-1.18-.06-.11-.23-.17-.48-.3z"/>
                        </svg>
                        Lanjut Kirim ke WhatsApp Kasir
                    </a>
                    <a href="#katalog-game" class="inline-flex items-center justify-center px-5 py-3 rounded-xl border border-slate-300 text-slate-700 font-semibold text-xs hover:bg-slate-50 transition">
                        Tutup & Lihat Game Lain
                    </a>
                </div>
            </div>
        </div>
    @endif

    <!-- 1. KATEGORI PLAYSTATION (Visual Selector) -->
    <section class="pt-8 pb-10 bg-gradient-to-b from-blue-50/70 via-white to-slate-50 border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header Ringkas -->
            <div class="text-center max-w-xl mx-auto mb-8">
                <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-extrabold uppercase tracking-wider mb-2">
                    aldigamestation
                </span>
                <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight font-heading">
                    Pilih Kategori PlayStation
                </h1>
                <p class="text-sm text-slate-600 mt-1">
                    Pilih konsol untuk melihat daftar game dan memesan slot rental.
                </p>
            </div>

            <!-- 3 Kartu Visual Kategori Konsol -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <!-- Kategori PS5 -->
                <button
                    type="button"
                    class="category-hero-card group text-left p-6 rounded-2xl bg-slate-900 text-white border-2 border-slate-800 hover:border-blue-500 shadow-md transition-all transform hover:-translate-y-1 focus-visible:ring-2 focus-visible:ring-blue-500"
                    data-platform="PS5"
                >
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-2xl sm:text-3xl font-black font-mono tracking-wider text-blue-400">PS5</span>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-blue-600 text-white">4K 60FPS</span>
                    </div>
                    <h2 class="text-xl font-bold font-heading group-hover:text-blue-300 transition-colors">PlayStation 5</h2>
                    <p class="text-xs text-slate-400 mt-1">Grafis generasi terbaru, TV 4K HDR, DualSense Haptic.</p>
                    <div class="mt-6 pt-4 border-t border-slate-800 flex items-center justify-between">
                        <span class="text-xs text-slate-400">Tarif Studio:</span>
                        <span class="text-base font-extrabold text-blue-400">Rp {{ number_format($rates['on_site']['PS5'] ?? 18000, 0, ',', '.') }}<span class="text-xs font-normal text-slate-400">/jam</span></span>
                    </div>
                </button>

                <!-- Kategori PS4 -->
                <button
                    type="button"
                    class="category-hero-card group text-left p-6 rounded-2xl bg-blue-900 text-white border-2 border-blue-800 hover:border-sky-400 shadow-md transition-all transform hover:-translate-y-1 focus-visible:ring-2 focus-visible:ring-sky-400"
                    data-platform="PS4"
                >
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-2xl sm:text-3xl font-black font-mono tracking-wider text-sky-300">PS4</span>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-sky-500 text-slate-950">Favorit Mabar</span>
                    </div>
                    <h2 class="text-xl font-bold font-heading group-hover:text-sky-200 transition-colors">PlayStation 4</h2>
                    <p class="text-xs text-blue-200 mt-1">Layar Full HD, turnamen bola PES & FC 24, stik DualShock.</p>
                    <div class="mt-6 pt-4 border-t border-blue-800/80 flex items-center justify-between">
                        <span class="text-xs text-blue-200">Tarif Studio:</span>
                        <span class="text-base font-extrabold text-sky-300">Rp {{ number_format($rates['on_site']['PS4'] ?? 10000, 0, ',', '.') }}<span class="text-xs font-normal text-blue-200">/jam</span></span>
                    </div>
                </button>

                <!-- Kategori PS3 -->
                <button
                    type="button"
                    class="category-hero-card group text-left p-6 rounded-2xl bg-slate-800 text-white border-2 border-slate-700 hover:border-amber-400 shadow-md transition-all transform hover:-translate-y-1 focus-visible:ring-2 focus-visible:ring-amber-400"
                    data-platform="PS3"
                >
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-2xl sm:text-3xl font-black font-mono tracking-wider text-amber-300">PS3</span>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-500 text-slate-950">Nostalgia</span>
                    </div>
                    <h2 class="text-xl font-bold font-heading group-hover:text-amber-200 transition-colors">PlayStation 3</h2>
                    <p class="text-xs text-slate-300 mt-1">Koleksi game klasik: PES 2013, Downhill, GTA San Andreas.</p>
                    <div class="mt-6 pt-4 border-t border-slate-700 flex items-center justify-between">
                        <span class="text-xs text-slate-400">Tarif Studio:</span>
                        <span class="text-base font-extrabold text-amber-300">Rp {{ number_format($rates['on_site']['PS3'] ?? 5000, 0, ',', '.') }}<span class="text-xs font-normal text-slate-400">/jam</span></span>
                    </div>
                </button>
            </div>
        </div>
    </section>

    <!-- 2. LIST GAME PER KATEGORI (Fokus Visual & Cover Art) -->
    <section id="katalog-game" class="py-12 sm:py-16 bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Filter Bar & Search -->
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 mb-8">
                <!-- Tab Kategori -->
                <div class="flex items-center gap-2 overflow-x-auto w-full sm:w-auto pb-1" role="tablist">
                    <button
                        type="button"
                        class="filter-tab px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all focus-visible:ring-2 focus-visible:ring-blue-600 bg-blue-600 text-white shadow-sm"
                        data-platform="all"
                        role="tab"
                    >
                        Semua Game ({{ $platformCounts['all'] }})
                    </button>
                    <button
                        type="button"
                        class="filter-tab px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-all focus-visible:ring-2 focus-visible:ring-blue-600"
                        data-platform="PS5"
                        role="tab"
                    >
                        PlayStation 5 ({{ $platformCounts['PS5'] }})
                    </button>
                    <button
                        type="button"
                        class="filter-tab px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-all focus-visible:ring-2 focus-visible:ring-blue-600"
                        data-platform="PS4"
                        role="tab"
                    >
                        PlayStation 4 ({{ $platformCounts['PS4'] }})
                    </button>
                    <button
                        type="button"
                        class="filter-tab px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold text-slate-600 hover:text-slate-900 hover:bg-slate-100 transition-all focus-visible:ring-2 focus-visible:ring-blue-600"
                        data-platform="PS3"
                        role="tab"
                    >
                        PlayStation 3 ({{ $platformCounts['PS3'] }})
                    </button>
                </div>

                <!-- Input Pencarian Cepat -->
                <div class="w-full sm:w-72">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input
                            type="text"
                            id="game-search-input"
                            placeholder="Cari judul game..."
                            class="w-full pl-10 pr-3 py-2 rounded-xl border border-slate-300 text-xs sm:text-sm focus-visible:ring-2 focus-visible:ring-blue-600 outline-none"
                        >
                    </div>
                </div>
            </div>

            <!-- Grid Game Card (Visual Dominant) -->
            <div id="games-container" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
                @foreach($games as $game)
                    <div
                        class="game-card group bg-white rounded-2xl border border-slate-200 hover:border-blue-400 shadow-sm hover:shadow-md transition-all overflow-hidden flex flex-col justify-between"
                        data-platform="{{ $game->platform }}"
                        data-title="{{ strtolower($game->title) }}"
                        data-genre="{{ strtolower($game->genre) }}"
                    >
                        <div>
                            <!-- Cover Art Gambar Asli (Diambil dari public/images) -->
                            <div class="relative w-full aspect-[16/10] bg-slate-900 overflow-hidden">
                                @php
                                    $imgSrc = !empty($game->image_url) ? asset('images/' . basename($game->image_url)) : null;
                                @endphp
                                @if($imgSrc)
                                    <img
                                        src="{{ $imgSrc }}"
                                        alt="{{ $game->title }}"
                                        loading="lazy"
                                        class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105"
                                    >
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-slate-800 text-slate-400 text-xs font-bold p-2 text-center">
                                        {{ $game->title }}
                                    </div>
                                @endif

                                <!-- Badge Konsol di Atas Gambar -->
                                <div class="absolute top-2 left-2">
                                    <span class="px-2 py-0.5 rounded text-[11px] font-black font-mono shadow-md {{ $game->platform === 'PS5' ? 'bg-slate-950/90 text-white' : ($game->platform === 'PS4' ? 'bg-blue-600 text-white' : 'bg-slate-700 text-white') }}">
                                        {{ $game->platform }}
                                    </span>
                                </div>

                                @if($game->badge)
                                    <div class="absolute top-2 right-2">
                                        <span class="px-1.5 py-0.5 rounded text-[10px] font-extrabold bg-amber-400 text-slate-950 shadow-md">
                                            {{ $game->badge }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <!-- Judul & Info Pemain (Minimal Teks) -->
                            <div class="p-3 sm:p-4">
                                <h3 class="text-sm sm:text-base font-bold text-slate-900 font-heading leading-tight truncate" title="{{ $game->title }}">
                                    {{ $game->title }}
                                </h3>
                                <div class="flex items-center justify-between text-[11px] text-slate-500 mt-2">
                                    <span class="truncate max-w-[110px]">{{ $game->genre }}</span>
                                    <span class="font-semibold text-slate-700 shrink-0">{{ $game->player_count }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Booking Cepat Game Ini (Tanpa Panah) -->
                        <div class="px-3 pb-3 sm:px-4 sm:pb-4 pt-1">
                            <button
                                type="button"
                                class="select-game-btn w-full py-2.5 rounded-xl bg-slate-100 hover:bg-blue-600 hover:text-white text-slate-800 text-xs font-bold transition-colors focus-visible:ring-2 focus-visible:ring-blue-600 flex items-center justify-center"
                                data-platform="{{ $game->platform }}"
                                data-title="{{ $game->title }}"
                            >
                                <span>Pilih Game</span>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Empty State Jika Game Tidak Ditemukan -->
            <div id="games-empty-state" class="hidden text-center py-10 px-4 rounded-2xl bg-slate-50 border border-slate-200 mt-6">
                <p class="font-bold text-sm text-slate-800">Tidak ada game yang cocok dengan pencarian.</p>
                <button type="button" id="reset-filter-btn" class="mt-3 px-4 py-2 rounded-xl bg-blue-600 text-white text-xs font-bold hover:bg-blue-700">
                    Tampilkan Semua Game
                </button>
            </div>
        </div>
    </section>

    <!-- 3. HARGA RENTAL (Tabel Visual & Jelas) -->
    <section id="tarif-sewa" class="py-12 sm:py-16 bg-slate-50 border-b border-slate-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-md mx-auto mb-8">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading">
                    Daftar Harga Rental
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 mt-1">
                    Tarif transparan untuk main di tempat maupun sewa harian bawa pulang.
                </p>
            </div>

            <!-- Kartu Tarif Per Kategori (PS3, PS4, PS5) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Harga PS3 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-2.5 py-1 rounded-md text-xs font-mono font-extrabold bg-slate-700 text-white">PS3</span>
                            <span class="text-xs font-bold text-amber-600">Nostalgia</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 font-heading">PlayStation 3</h3>

                        <!-- Harga Main di Tempat -->
                        <div class="mt-5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-[11px] font-bold text-slate-500 uppercase block">Main di Studio</span>
                            <div class="text-2xl font-black text-slate-900 mt-0.5">
                                Rp {{ number_format($rates['on_site']['PS3'] ?? 5000, 0, ',', '.') }} <span class="text-xs font-normal text-slate-500">/ jam</span>
                            </div>
                        </div>

                        <!-- Harga Bawa Pulang -->
                        <div class="mt-3 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-[11px] font-bold text-slate-500 uppercase block">Sewa Bawa Pulang</span>
                            <div class="text-2xl font-black text-slate-900 mt-0.5">
                                Rp {{ number_format($rates['take_home']['PS3'] ?? 50000, 0, ',', '.') }} <span class="text-xs font-normal text-slate-500">/ 24 jam</span>
                            </div>
                        </div>

                        <ul class="space-y-2 text-xs text-slate-600 mt-5 pt-4 border-t border-slate-100">
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>2 Stik Wireless + TV Full HD</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>Full Game: PES 2013, GTA SA, Downhill</span>
                            </li>
                        </ul>
                    </div>

                    <button
                        type="button"
                        class="quick-book-btn mt-6 w-full py-2.5 rounded-xl bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold transition focus-visible:ring-2 focus-visible:ring-slate-800"
                        data-platform="PS3"
                        data-type="on_site"
                    >
                        Booking PS3
                    </button>
                </div>

                <!-- Harga PS4 (Favorit) -->
                <div class="bg-white rounded-2xl p-6 border-2 border-blue-600 shadow-lg relative flex flex-col justify-between">
                    <div class="absolute -top-3 left-1/2 -translate-x-1/2 px-3 py-0.5 rounded-full bg-blue-600 text-white text-[11px] font-extrabold uppercase tracking-wider">
                        Paling Laris
                    </div>
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-2.5 py-1 rounded-md text-xs font-mono font-extrabold bg-blue-600 text-white">PS4</span>
                            <span class="text-xs font-bold text-blue-600">Terfavorit</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 font-heading">PlayStation 4</h3>

                        <!-- Harga Main di Tempat -->
                        <div class="mt-5 p-3.5 rounded-xl bg-blue-50/60 border border-blue-100">
                            <span class="text-[11px] font-bold text-blue-700 uppercase block">Main di Studio</span>
                            <div class="text-2xl font-black text-blue-700 mt-0.5">
                                Rp {{ number_format($rates['on_site']['PS4'] ?? 10000, 0, ',', '.') }} <span class="text-xs font-normal text-slate-500">/ jam</span>
                            </div>
                        </div>

                        <!-- Harga Bawa Pulang -->
                        <div class="mt-3 p-3.5 rounded-xl bg-blue-50/60 border border-blue-100">
                            <span class="text-[11px] font-bold text-blue-700 uppercase block">Sewa Bawa Pulang</span>
                            <div class="text-2xl font-black text-blue-700 mt-0.5">
                                Rp {{ number_format($rates['take_home']['PS4'] ?? 90000, 0, ',', '.') }} <span class="text-xs font-normal text-slate-500">/ 24 jam</span>
                            </div>
                        </div>

                        <ul class="space-y-2 text-xs text-slate-600 mt-5 pt-4 border-t border-slate-100">
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>2 Stik DualShock 4 Ori + TV 43 Inch</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>FC 24, PES 2021 Update 2024, GTA V</span>
                            </li>
                        </ul>
                    </div>

                    <button
                        type="button"
                        class="quick-book-btn mt-6 w-full py-2.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold transition focus-visible:ring-2 focus-visible:ring-blue-600"
                        data-platform="PS4"
                        data-type="on_site"
                    >
                        Booking PS4
                    </button>
                </div>

                <!-- Harga PS5 -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <span class="px-2.5 py-1 rounded-md text-xs font-mono font-extrabold bg-slate-900 text-white">PS5</span>
                            <span class="text-xs font-bold text-slate-900">Next-Gen</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 font-heading">PlayStation 5</h3>

                        <!-- Harga Main di Tempat -->
                        <div class="mt-5 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-[11px] font-bold text-slate-500 uppercase block">Main di Studio</span>
                            <div class="text-2xl font-black text-slate-900 mt-0.5">
                                Rp {{ number_format($rates['on_site']['PS5'] ?? 18000, 0, ',', '.') }} <span class="text-xs font-normal text-slate-500">/ jam</span>
                            </div>
                        </div>

                        <!-- Harga Bawa Pulang -->
                        <div class="mt-3 p-3.5 rounded-xl bg-slate-50 border border-slate-100">
                            <span class="text-[11px] font-bold text-slate-500 uppercase block">Sewa Bawa Pulang</span>
                            <div class="text-2xl font-black text-slate-900 mt-0.5">
                                Rp {{ number_format($rates['take_home']['PS5'] ?? 175000, 0, ',', '.') }} <span class="text-xs font-normal text-slate-500">/ 24 jam</span>
                            </div>
                        </div>

                        <ul class="space-y-2 text-xs text-slate-600 mt-5 pt-4 border-t border-slate-100">
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>2 Stik DualSense Ori + TV 50 Inch 4K</span>
                            </li>
                            <li class="flex items-center gap-2">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                <span>Spider-Man 2, Tekken 8, God of War</span>
                            </li>
                        </ul>
                    </div>

                    <button
                        type="button"
                        class="quick-book-btn mt-6 w-full py-2.5 rounded-xl bg-slate-800 hover:bg-slate-900 text-white text-xs font-bold transition focus-visible:ring-2 focus-visible:ring-slate-800"
                        data-platform="PS5"
                        data-type="on_site"
                    >
                        Booking PS5
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. BOOKING ONLINE SUPER SIMPEL -->
    <section id="booking-form" class="py-12 sm:py-16 bg-white border-b border-slate-200">
        <div class="max-w-2xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-8">
                <span class="inline-block px-3 py-1 rounded-full bg-emerald-100 text-emerald-800 text-xs font-extrabold uppercase tracking-wider mb-2">
                    Reservasi Praktis
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading">
                    Form Booking Online
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 mt-1">
                    Cukup pilih konsol, waktu, dan nama Anda. Tanpa ribet.
                </p>
            </div>

            <!-- Error Validation -->
            @if ($errors->any())
                <div class="mb-6 p-4 rounded-xl bg-red-50 border border-red-200 text-red-800 text-xs">
                    <p class="font-bold mb-1">Mohon lengkapi formulir berikut:</p>
                    <ul class="list-disc list-inside space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form Card -->
            <div class="bg-slate-50 rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm">
                <form action="{{ route('booking.store') }}" method="POST" id="simplified-booking-form">
                    @csrf

                    <!-- 1. Pilih Konsol (Visual Buttons) -->
                    <div class="mb-5">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Pilih Konsol
                        </label>
                        <div class="grid grid-cols-3 gap-3">
                            <label class="console-card-btn flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl border-2 border-slate-200 bg-white cursor-pointer transition text-center hover:border-blue-400 focus-within:ring-2 focus-within:ring-blue-600 focus-within:border-blue-600">
                                <input type="radio" name="platform" value="PS3" class="sr-only">
                                <span class="text-base font-black font-mono text-slate-700">PS3</span>
                                <span class="text-[11px] text-slate-500 console-rate-display">Rp 5.000/jam</span>
                            </label>
                            <label class="console-card-btn flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl border-2 border-blue-600 bg-blue-50/60 cursor-pointer transition text-center focus-within:ring-2 focus-within:ring-blue-600 focus-within:border-blue-600">
                                <input type="radio" name="platform" value="PS4" class="sr-only" checked>
                                <span class="text-base font-black font-mono text-blue-700">PS4</span>
                                <span class="text-[11px] font-semibold text-blue-600 console-rate-display">Rp 10.000/jam</span>
                            </label>
                            <label class="console-card-btn flex flex-col items-center justify-center p-3 sm:p-4 rounded-xl border-2 border-slate-200 bg-white cursor-pointer transition text-center hover:border-blue-400 focus-within:ring-2 focus-within:ring-blue-600 focus-within:border-blue-600">
                                <input type="radio" name="platform" value="PS5" class="sr-only">
                                <span class="text-base font-black font-mono text-slate-700">PS5</span>
                                <span class="text-[11px] text-slate-500 console-rate-display">Rp 18.000/jam</span>
                            </label>
                        </div>
                    </div>

                    <!-- 2. Pilih Layanan (Main di Studio / Bawa Pulang) -->
                    <div class="mb-5">
                        <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">
                            Layanan
                        </label>
                        <div class="grid grid-cols-2 gap-3">
                            <label class="service-type-btn flex items-center justify-center gap-2 p-3 rounded-xl border-2 border-blue-600 bg-blue-50/50 cursor-pointer text-xs font-bold text-slate-900 transition focus-within:ring-2 focus-within:ring-blue-600 focus-within:border-blue-600">
                                <input type="radio" name="booking_type" value="on_site" class="text-blue-600" checked>
                                <span>Main di Tempat</span>
                            </label>
                            <label class="service-type-btn flex items-center justify-center gap-2 p-3 rounded-xl border-2 border-slate-200 bg-white cursor-pointer text-xs font-semibold text-slate-700 hover:border-slate-300 transition focus-within:ring-2 focus-within:ring-blue-600 focus-within:border-blue-600">
                                <input type="radio" name="booking_type" value="take_home" class="text-blue-600">
                                <span>Sewa Bawa Pulang</span>
                            </label>
                        </div>
                    </div>

                    <!-- 3. Jadwal & Durasi -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-5">
                        <div>
                            <label for="booking_date" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Tanggal
                            </label>
                            <input
                                type="date"
                                id="booking_date"
                                name="booking_date"
                                value="{{ old('booking_date', date('Y-m-d')) }}"
                                min="{{ date('Y-m-d') }}"
                                class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs sm:text-sm focus-visible:ring-2 focus-visible:ring-blue-600 outline-none bg-white"
                                required
                            >
                        </div>

                        <div>
                            <label for="booking_time" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Jam Mulai
                            </label>
                            <select
                                id="booking_time"
                                name="booking_time"
                                class="w-full px-3 py-2 rounded-xl border border-slate-300 text-xs sm:text-sm focus-visible:ring-2 focus-visible:ring-blue-600 outline-none bg-white"
                                required
                            >
                                <option value="10:00">10:00 WIB</option>
                                <option value="12:00">12:00 WIB</option>
                                <option value="14:00" selected>14:00 WIB</option>
                                <option value="16:00">16:00 WIB</option>
                                <option value="18:30">18:30 WIB</option>
                                <option value="20:00">20:00 WIB</option>
                                <option value="21:30">21:30 WIB</option>
                            </select>
                        </div>

                        <div>
                            <label for="duration" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Durasi (<span id="unit-text">Jam</span>)
                            </label>
                            <div class="flex items-center">
                                <button type="button" id="btn-minus" class="w-9 h-[38px] rounded-l-xl bg-slate-200 text-slate-800 font-bold hover:bg-slate-300">-</button>
                                <input
                                    type="number"
                                    id="duration"
                                    name="duration"
                                    value="{{ old('duration', 2) }}"
                                    min="1"
                                    max="24"
                                    class="w-full h-[38px] text-center border-y border-slate-300 font-bold text-sm outline-none bg-white"
                                    required
                                >
                                <button type="button" id="btn-plus" class="w-9 h-[38px] rounded-r-xl bg-slate-200 text-slate-800 font-bold hover:bg-slate-300">+</button>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Data Pemesan Ringkas -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mb-5">
                        <div>
                            <label for="customer_name" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                Nama Anda
                            </label>
                            <input
                                type="text"
                                id="customer_name"
                                name="customer_name"
                                value="{{ old('customer_name') }}"
                                placeholder="Nama pemesan"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs sm:text-sm focus-visible:ring-2 focus-visible:ring-blue-600 outline-none bg-white"
                                required
                            >
                        </div>

                        <div>
                            <label for="customer_phone" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                                No. WhatsApp
                            </label>
                            <input
                                type="tel"
                                id="customer_phone"
                                name="customer_phone"
                                value="{{ old('customer_phone') }}"
                                placeholder="08xxxxxxxxxx"
                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 text-xs sm:text-sm focus-visible:ring-2 focus-visible:ring-blue-600 outline-none bg-white"
                                required
                            >
                        </div>
                    </div>

                    <!-- Catatan Singkat -->
                    <div class="mb-5">
                        <label for="notes" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-1">
                            Request Game (Opsional)
                        </label>
                        <input
                            type="text"
                            id="notes"
                            name="notes"
                            value="{{ old('notes') }}"
                            placeholder="Contoh: Mau main PES 2021 berdua"
                            class="w-full px-3.5 py-2 rounded-xl border border-slate-300 text-xs sm:text-sm focus-visible:ring-2 focus-visible:ring-blue-600 outline-none bg-white"
                        >
                    </div>

                    <!-- Total Estimasi Harga Otomatis -->
                    <div class="p-4 rounded-2xl bg-white border border-slate-200 mb-6 flex items-center justify-between shadow-sm">
                        <div>
                            <span class="text-[11px] font-bold text-slate-500 uppercase block">Estimasi Biaya</span>
                            <span id="booking-total-display" class="text-2xl sm:text-3xl font-black text-blue-600 font-heading">
                                Rp 20.000
                            </span>
                        </div>
                        <div class="text-right text-xs text-slate-500">
                            <span id="booking-sub-display" class="block font-semibold text-slate-700">PS4 &bull; 2 Jam</span>
                            <span class="text-[10px] text-slate-400">Bayar di kasir / QRIS</span>
                        </div>
                    </div>

                    <!-- Tombol Submit -->
                    <button
                        type="submit"
                        class="w-full py-3.5 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-extrabold text-sm sm:text-base transition-all shadow-md shadow-blue-500/20 focus-visible:ring-2 focus-visible:ring-blue-600"
                    >
                        Booking Sekarang & Lanjut WhatsApp
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- 5. CEK STATUS RESERVASI (Pelacak Booking Real-Time) -->
    <section id="cek-booking" class="py-12 sm:py-16 bg-slate-100/70 border-b border-slate-200">
        <div class="max-w-3xl mx-auto px-4 sm:px-6">
            <div class="text-center mb-8">
                <span class="inline-block px-3 py-1 rounded-full bg-blue-100 text-blue-800 text-xs font-extrabold uppercase tracking-wider mb-2">
                    Pelacak Reservasi
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 font-heading">
                    Cek Status Booking
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 mt-1">
                    Ketikkan Kode Booking Anda atau Nomor WhatsApp untuk melihat status reservasi.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200 shadow-sm">
                <!-- Form Pencarian Status -->
                <form action="{{ route('booking.status') }}" method="POST">
                    @csrf
                    <div class="flex flex-col sm:flex-row gap-3">
                        <div class="relative flex-grow">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                </svg>
                            </div>
                            <input
                                type="text"
                                name="search_query"
                                value="{{ session('searched_query') }}"
                                placeholder="Contoh: ALDI-20261029-XXXX atau 08xxxxxxxxxx"
                                class="w-full pl-11 pr-4 py-3 rounded-xl border border-slate-300 text-xs sm:text-sm focus-visible:ring-2 focus-visible:ring-blue-600 outline-none bg-slate-50 focus:bg-white transition"
                                required
                            >
                        </div>
                        <button
                            type="submit"
                            class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs sm:text-sm transition shadow-sm focus-visible:ring-2 focus-visible:ring-blue-600 shrink-0"
                        >
                            Cari Status
                        </button>
                    </div>
                </form>

                <!-- Hasil Pencarian -->
                @if(session('search_performed'))
                    @php
                        $foundBookings = session('found_bookings', collect());
                    @endphp

                    <div class="mt-8 pt-6 border-t border-slate-200">
                        @if($foundBookings->count() > 0)
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xs sm:text-sm font-bold text-slate-900">
                                    Ditemukan {{ $foundBookings->count() }} reservasi untuk: <span class="font-mono text-blue-600">"{{ session('searched_query') }}"</span>
                                </h3>
                            </div>

                            <div class="space-y-4">
                                @foreach($foundBookings as $b)
                                    @php
                                        $statusMap = [
                                            'pending' => ['bg' => 'bg-amber-50', 'border' => 'border-amber-200', 'badge' => 'bg-amber-100 text-amber-800', 'label' => 'Menunggu Konfirmasi Kasir'],
                                            'confirmed' => ['bg' => 'bg-emerald-50', 'border' => 'border-emerald-200', 'badge' => 'bg-emerald-100 text-emerald-800', 'label' => 'Terkonfirmasi / Siap Main'],
                                            'completed' => ['bg' => 'bg-blue-50', 'border' => 'border-blue-200', 'badge' => 'bg-blue-100 text-blue-800', 'label' => 'Rental Selesai'],
                                            'cancelled' => ['bg' => 'bg-rose-50', 'border' => 'border-rose-200', 'badge' => 'bg-rose-100 text-rose-800', 'label' => 'Dibatalkan'],
                                        ];
                                        $currentStatus = $statusMap[$b->status] ?? $statusMap['pending'];
                                        $phoneLen = strlen($b->customer_phone);
                                        $maskedPhone = $phoneLen > 7 
                                            ? substr($b->customer_phone, 0, 4) . '****' . substr($b->customer_phone, -3)
                                            : $b->customer_phone;
                                        $adminWa = env('WHATSAPP_NUMBER', '6281529434240');
                                        $chatWaUrl = 'https://wa.me/' . $adminWa . '?text=' . rawurlencode("Halo kasir aldigamestation! Saya ingin konfirmasi status reservasi dengan Kode Booking: {$b->booking_code}");
                                    @endphp

                                    <div class="p-5 rounded-2xl border {{ $currentStatus['bg'] }} {{ $currentStatus['border'] }} shadow-sm">
                                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-3">
                                            <div>
                                                <span class="text-[10px] font-bold text-slate-500 uppercase tracking-wider block">Kode Booking</span>
                                                <span class="text-base sm:text-lg font-black font-mono text-slate-900">{{ $b->booking_code }}</span>
                                            </div>
                                            <div>
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-bold {{ $currentStatus['badge'] }}">
                                                    {{ $currentStatus['label'] }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 py-3 border-y border-slate-200/70 text-xs">
                                            <div>
                                                <span class="text-slate-500 block">Pemesan</span>
                                                <span class="font-bold text-slate-800">{{ $b->customer_name }}</span>
                                            </div>
                                            <div>
                                                <span class="text-slate-500 block">Konsol & Layanan</span>
                                                <span class="font-bold text-slate-800">{{ $b->platform }} &bull; {{ $b->booking_type === 'take_home' ? 'Bawa Pulang' : 'Studio' }}</span>
                                            </div>
                                            <div>
                                                <span class="text-slate-500 block">Jadwal</span>
                                                <span class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($b->booking_date)->format('d M Y') }} ({{ $b->booking_time }})</span>
                                            </div>
                                            <div>
                                                <span class="text-slate-500 block">Total Estimasi</span>
                                                <span class="font-extrabold text-blue-600">Rp {{ number_format($b->estimated_price, 0, ',', '.') }}</span>
                                            </div>
                                        </div>

                                        <div class="mt-3 flex items-center justify-between text-xs">
                                            <span class="text-slate-500">Kontak: {{ $maskedPhone }}</span>
                                            <a href="{{ $chatWaUrl }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-1.5 font-bold text-emerald-700 hover:text-emerald-800">
                                                <span>Chat Kasir</span>
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-6">
                                <div class="w-12 h-12 rounded-full bg-slate-100 text-slate-400 mx-auto flex items-center justify-center mb-3">
                                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h4 class="text-sm font-bold text-slate-800">Booking Tidak Ditemukan</h4>
                                <p class="text-xs text-slate-500 mt-1 max-w-sm mx-auto">
                                    Tidak ada reservasi yang cocok dengan kata kunci <span class="font-mono text-slate-700 font-semibold">"{{ session('searched_query') }}"</span>. Pastikan kode booking atau nomor WhatsApp Anda sudah benar.
                                </p>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // --- 1. Filter Game Tab & Search ---
        const searchInput = document.getElementById('game-search-input');
        const filterTabs = document.querySelectorAll('.filter-tab');
        const gameCards = document.querySelectorAll('.game-card');
        const emptyState = document.getElementById('games-empty-state');
        const resetFilterBtn = document.getElementById('reset-filter-btn');

        let activePlatform = 'all';
        let searchQuery = '';

        function runGameFilter() {
            let matches = 0;
            gameCards.forEach(card => {
                const platform = card.getAttribute('data-platform');
                const title = card.getAttribute('data-title') || '';
                const genre = card.getAttribute('data-genre') || '';

                const matchesPlatform = (activePlatform === 'all' || platform === activePlatform);
                const matchesSearch = (!searchQuery || title.includes(searchQuery) || genre.includes(searchQuery));

                if (matchesPlatform && matchesSearch) {
                    card.classList.remove('hidden');
                    matches++;
                } else {
                    card.classList.add('hidden');
                }
            });

            if (emptyState) {
                if (matches === 0) {
                    emptyState.classList.remove('hidden');
                } else {
                    emptyState.classList.add('hidden');
                }
            }
        }

        filterTabs.forEach(tab => {
            tab.addEventListener('click', function () {
                filterTabs.forEach(t => {
                    t.classList.remove('bg-blue-600', 'text-white', 'shadow-sm');
                    t.classList.add('text-slate-600', 'hover:text-slate-900', 'hover:bg-slate-100');
                });
                this.classList.add('bg-blue-600', 'text-white', 'shadow-sm');
                this.classList.remove('text-slate-600', 'hover:text-slate-900', 'hover:bg-slate-100');

                activePlatform = this.getAttribute('data-platform');
                runGameFilter();
            });
        });

        // Klik Hero Kategori Card langsung filter ke kategori tersebut
        const categoryHeroCards = document.querySelectorAll('.category-hero-card');
        categoryHeroCards.forEach(card => {
            card.addEventListener('click', function () {
                const plat = this.getAttribute('data-platform');
                const matchingTab = document.querySelector(`.filter-tab[data-platform="${plat}"]`);
                if (matchingTab) {
                    matchingTab.click();
                }
                const catalogSection = document.getElementById('katalog-game');
                if (catalogSection) {
                    catalogSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                searchQuery = this.value.trim().toLowerCase();
                runGameFilter();
            });
        }

        if (resetFilterBtn) {
            resetFilterBtn.addEventListener('click', function () {
                if (searchInput) searchInput.value = '';
                searchQuery = '';
                if (filterTabs.length > 0) filterTabs[0].click();
            });
        }

        // --- 2. Pilih Game langsung isi ke Form Booking ---
        const selectGameButtons = document.querySelectorAll('.select-game-btn');
        selectGameButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const platform = this.getAttribute('data-platform');
                const title = this.getAttribute('data-title');

                // Pilih platform di form
                const platformRadio = document.querySelector(`input[name="platform"][value="${platform}"]`);
                if (platformRadio) {
                    platformRadio.checked = true;
                    platformRadio.dispatchEvent(new Event('change'));
                }

                // Isi request game
                const notesInput = document.getElementById('notes');
                if (notesInput) {
                    notesInput.value = `Main ${title}`;
                }

                const bookingFormSection = document.getElementById('booking-form');
                if (bookingFormSection) {
                    bookingFormSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Quick book dari tabel tarif
        const quickBookBtns = document.querySelectorAll('.quick-book-btn');
        quickBookBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                const plat = this.getAttribute('data-platform');
                const type = this.getAttribute('data-type');

                const platRadio = document.querySelector(`input[name="platform"][value="${plat}"]`);
                if (platRadio) {
                    platRadio.checked = true;
                    platRadio.dispatchEvent(new Event('change'));
                }

                const typeRadio = document.querySelector(`input[name="booking_type"][value="${type}"]`);
                if (typeRadio) {
                    typeRadio.checked = true;
                    typeRadio.dispatchEvent(new Event('change'));
                }

                const bookingFormSection = document.getElementById('booking-form');
                if (bookingFormSection) {
                    bookingFormSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // --- 3. Kalkulator Otomatis Form Booking (Single Source of Truth) ---
        const rates = @json($rates ?? \App\Models\Booking::allRates());

        const platformCards = document.querySelectorAll('.console-card-btn');
        const serviceButtons = document.querySelectorAll('.service-type-btn');
        const durationInput = document.getElementById('duration');
        const btnMinus = document.getElementById('btn-minus');
        const btnPlus = document.getElementById('btn-plus');
        const unitText = document.getElementById('unit-text');
        const totalDisplay = document.getElementById('booking-total-display');
        const subDisplay = document.getElementById('booking-sub-display');

        function updateFormCalc() {
            const selectedType = document.querySelector('input[name="booking_type"]:checked')?.value || 'on_site';
            const selectedPlatform = document.querySelector('input[name="platform"]:checked')?.value || 'PS4';
            let dur = parseInt(durationInput.value, 10);
            if (isNaN(dur) || dur < 1) dur = 1;

            const unitRate = rates[selectedType][selectedPlatform] || 10000;
            const total = unitRate * dur;
            const unitLabel = selectedType === 'take_home' ? 'Hari' : 'Jam';

            if (unitText) unitText.textContent = unitLabel;
            if (totalDisplay) totalDisplay.textContent = `Rp ${total.toLocaleString('id-ID')}`;
            if (subDisplay) subDisplay.textContent = `${selectedPlatform} \u2022 ${dur} ${unitLabel}`;

            // Update teks tarif di tombol konsol
            platformCards.forEach(card => {
                const rad = card.querySelector('input[type="radio"]');
                const rateSpan = card.querySelector('.console-rate-display');
                if (rad && rateSpan) {
                    const r = rates[selectedType][rad.value] || 0;
                    rateSpan.textContent = `Rp ${r.toLocaleString('id-ID')}/${selectedType === 'take_home' ? 'hari' : 'jam'}`;
                }

                if (rad && rad.checked) {
                    card.classList.add('border-blue-600', 'bg-blue-50/60');
                    card.classList.remove('border-slate-200', 'bg-white');
                    const textSpan = card.querySelector('span:first-of-type');
                    if (textSpan) textSpan.classList.add('text-blue-700');
                } else {
                    card.classList.remove('border-blue-600', 'bg-blue-50/60');
                    card.classList.add('border-slate-200', 'bg-white');
                    const textSpan = card.querySelector('span:first-of-type');
                    if (textSpan) textSpan.classList.remove('text-blue-700');
                }
            });

            // Update style tombol layanan
            serviceButtons.forEach(btn => {
                const rad = btn.querySelector('input[type="radio"]');
                if (rad && rad.checked) {
                    btn.classList.add('border-blue-600', 'bg-blue-50/50');
                    btn.classList.remove('border-slate-200', 'bg-white');
                } else {
                    btn.classList.remove('border-blue-600', 'bg-blue-50/50');
                    btn.classList.add('border-slate-200', 'bg-white');
                }
            });
        }

        document.querySelectorAll('input[name="platform"]').forEach(r => r.addEventListener('change', updateFormCalc));
        document.querySelectorAll('input[name="booking_type"]').forEach(r => r.addEventListener('change', updateFormCalc));

        if (durationInput) durationInput.addEventListener('input', updateFormCalc);

        if (btnMinus) {
            btnMinus.addEventListener('click', function () {
                let v = parseInt(durationInput.value, 10) || 1;
                if (v > 1) {
                    durationInput.value = v - 1;
                    updateFormCalc();
                }
            });
        }

        if (btnPlus) {
            btnPlus.addEventListener('click', function () {
                let v = parseInt(durationInput.value, 10) || 1;
                if (v < 24) {
                    durationInput.value = v + 1;
                    updateFormCalc();
                }
            });
        }

        updateFormCalc();
    });
</script>
@endpush
