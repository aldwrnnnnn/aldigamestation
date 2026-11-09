<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'aldigamestation - Rental PlayStation 3, 4, 5')</title>
    <meta name="description" content="Rental PlayStation santai, bersih, dan lengkap di aldigamestation. Tersedia PS3, PS4, dan PS5 untuk main di tempat atau sewa bawa pulang. Booking online mudah sekarang.">

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- OpenGraph & Social Media -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="aldigamestation - Rental PlayStation 3, 4, 5">
    <meta property="og:description" content="Rental PlayStation santai, bersih, dan lengkap di aldigamestation. Tersedia PS3, PS4, dan PS5 untuk main di tempat atau sewa bawa pulang. Booking online mudah sekarang.">
    <meta property="og:image" content="{{ asset('images/fc24.jpg') }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="aldigamestation - Rental PlayStation 3, 4, 5">
    <meta name="twitter:description" content="Rental PlayStation santai, bersih, dan lengkap di aldigamestation. Tersedia PS3, PS4, dan PS5 untuk main di tempat atau sewa bawa pulang.">
    <meta name="twitter:image" content="{{ asset('images/fc24.jpg') }}">

    <!-- Fonts: Plus Jakarta Sans & Outfit (Google Fonts) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased min-h-screen flex flex-col font-sans selection:bg-blue-600 selection:text-white">

    <!-- Navbar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">
                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-3 group focus-visible:ring-2 focus-visible:ring-blue-600 rounded-lg p-1">
                    <div class="w-10 h-10 rounded-xl bg-blue-600 text-white flex items-center justify-center shadow-md shadow-blue-500/20 group-hover:bg-blue-700 transition-colors">
                        <!-- Gamepad Icon -->
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="6" y1="12" x2="10" y2="12"></line>
                            <line x1="8" y1="10" x2="8" y2="14"></line>
                            <line x1="15" y1="13" x2="15.01" y2="13"></line>
                            <line x1="18" y1="11" x2="18.01" y2="11"></line>
                            <rect x="2" y="6" width="20" height="12" rx="6"></rect>
                        </svg>
                    </div>
                    <div>
                        <span class="text-xl sm:text-2xl font-extrabold tracking-tight text-slate-900 font-heading">
                            aldi<span class="text-blue-600">gamestation</span>
                        </span>
                        <span class="block text-xs font-medium text-slate-500 -mt-1">Rental PS3, PS4 & PS5</span>
                    </div>
                </a>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center gap-7 text-sm font-semibold text-slate-600">
                    <a href="#katalog-game" class="hover:text-blue-600 transition-colors py-2 focus-visible:ring-2 focus-visible:ring-blue-600 rounded">Game PS</a>
                    <a href="#tarif-sewa" class="hover:text-blue-600 transition-colors py-2 focus-visible:ring-2 focus-visible:ring-blue-600 rounded">Harga Rental</a>
                    <a href="#booking-form" class="hover:text-blue-600 transition-colors py-2 focus-visible:ring-2 focus-visible:ring-blue-600 rounded">Booking Online</a>
                    <a href="#cek-booking" class="hover:text-blue-600 transition-colors py-2 focus-visible:ring-2 focus-visible:ring-blue-600 rounded">Cek Status</a>
                </nav>

                <!-- Action Button -->
                <div class="hidden md:flex items-center gap-3">
                    <a href="#booking-form" class="inline-flex items-center justify-center px-5 py-2.5 rounded-xl bg-blue-600 text-white font-semibold text-sm hover:bg-blue-700 transition-colors shadow-sm focus-visible:ring-2 focus-visible:ring-blue-600 focus-visible:ring-offset-2">
                        Booking Sekarang
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button type="button" id="mobile-menu-btn" aria-expanded="false" aria-controls="mobile-menu" aria-label="Buka menu navigasi" class="md:hidden inline-flex items-center justify-center p-2.5 rounded-lg text-slate-600 hover:text-slate-900 hover:bg-slate-100 focus-visible:ring-2 focus-visible:ring-blue-600">
                    <svg id="hamburger-icon" class="w-6 h-6 block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-slate-200 bg-white px-4 pt-3 pb-6 space-y-3">
            <a href="#katalog-game" class="mobile-link block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100 hover:text-blue-600">Game PS</a>
            <a href="#tarif-sewa" class="mobile-link block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100 hover:text-blue-600">Harga Rental</a>
            <a href="#booking-form" class="mobile-link block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100 hover:text-blue-600">Booking Online</a>
            <a href="#cek-booking" class="mobile-link block px-3 py-2.5 rounded-lg text-base font-semibold text-slate-700 hover:bg-slate-100 hover:text-blue-600">Cek Status Booking</a>
            <div class="pt-2">
                <a href="#booking-form" class="mobile-link block text-center w-full py-3 rounded-xl bg-blue-600 text-white font-semibold text-base hover:bg-blue-700">Booking Sekarang</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                <!-- Col 1: About -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-9 h-9 rounded-lg bg-blue-600 text-white flex items-center justify-center font-bold">
                            PS
                        </div>
                        <span class="text-xl font-bold text-white tracking-tight font-heading">
                            aldi<span class="text-blue-400">gamestation</span>
                        </span>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed mb-4">
                        Rental PlayStation santai dan bersahabat. Menyediakan konsol PS3, PS4, dan PS5 dalam kondisi terawat, stik orisinal, serta pilihan game terlengkap untuk main di studio atau rental bawa pulang.
                    </p>
                    <div class="flex items-center gap-2 text-xs text-emerald-400 font-medium">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Buka Setiap Hari: 10.00 s/d 24.00 WIB
                    </div>
                </div>

                <!-- Col 2: Navigation Links -->
                <div>
                    <h2 class="text-white font-bold text-base mb-4 font-heading">Menu Cepat</h2>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#katalog-game" class="hover:text-blue-400 transition-colors">Daftar Game PS3, PS4 & PS5</a></li>
                        <li><a href="#tarif-sewa" class="hover:text-blue-400 transition-colors">Harga Rental Studio & Bawa Pulang</a></li>
                        <li><a href="#booking-form" class="hover:text-blue-400 transition-colors">Formulir Booking Online</a></li>
                        <li><a href="#cek-booking" class="hover:text-blue-400 transition-colors">Cek Status Reservasi</a></li>
                    </ul>
                </div>

                <!-- Col 3: Contact & Location -->
                <div>
                    <h2 class="text-white font-bold text-base mb-4 font-heading">Kontak & Lokasi</h2>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-start gap-2.5">
                            <svg class="w-5 h-5 text-blue-400 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span>Abiansemal, Badung, Bali</span>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-5 h-5 text-emerald-400 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <a href="https://wa.me/6281529434240" target="_blank" rel="noopener noreferrer" class="hover:text-emerald-300 font-medium text-white transition-colors">
                                WhatsApp: 0815-2943-4240
                            </a>
                        </li>
                    </ul>
                    <div class="mt-4 pt-4 border-t border-slate-800">
                        <p class="text-xs text-slate-500">
                            PlayStation, PS3, PS4, dan PS5 adalah merek dagang terdaftar milik Sony Interactive Entertainment Inc. aldigamestation merupakan layanan rental independen.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-10 pt-6 border-t border-slate-800 text-center text-xs text-slate-500 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p>&copy; {{ date('Y') }} aldigamestation. Seluruh hak cipta dilindungi.</p>
                <p class="text-slate-400">Tempat rental PlayStation santai dan ramah gamer.</p>
            </div>
        </div>
    </footer>

    <!-- Interactive script for mobile menu and keyboard accessibility -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const hamburgerIcon = document.getElementById('hamburger-icon');
            const closeIcon = document.getElementById('close-icon');

            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function () {
                    const isExpanded = menuBtn.getAttribute('aria-expanded') === 'true';
                    menuBtn.setAttribute('aria-expanded', !isExpanded);
                    mobileMenu.classList.toggle('hidden');
                    hamburgerIcon.classList.toggle('hidden');
                    closeIcon.classList.toggle('hidden');
                });

                // Close mobile menu when clicking any link inside it
                const mobileLinks = mobileMenu.querySelectorAll('.mobile-link');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileMenu.classList.add('hidden');
                        hamburgerIcon.classList.remove('hidden');
                        closeIcon.classList.add('hidden');
                        menuBtn.setAttribute('aria-expanded', 'false');
                    });
                });

                // Close mobile menu on Escape key
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        hamburgerIcon.classList.remove('hidden');
                        closeIcon.classList.add('hidden');
                        menuBtn.setAttribute('aria-expanded', 'false');
                        menuBtn.focus();
                    }
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
