<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restomu - Elegan & Lezat</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        primary: '#059669', // emerald-600
                        dark: '#1e293b', // slate-800
                    }
                }
            }
        }
    </script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen">

    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50" x-data="{ open: false }">
        <div class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="font-serif text-3xl font-bold text-primary tracking-wide">
                    Restomu
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8 items-center">
                    <a href="{{ route('home') }}" class="hover:text-primary transition font-medium {{ request()->routeIs('home') ? 'text-primary' : '' }}">Home</a>
                    <a href="{{ route('menu') }}" class="hover:text-primary transition font-medium {{ request()->routeIs('menu') ? 'text-primary' : '' }}">Menu</a>
                    <a href="{{ route('home') }}#reservation" class="px-5 py-2.5 bg-primary text-white rounded-full font-medium hover:bg-emerald-700 transition shadow-lg shadow-emerald-200">
                        Reservasi
                    </a>
                </div>

                <!-- Mobile Button -->
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" class="text-slate-800 hover:text-primary focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="open" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-cloak class="md:hidden bg-white border-t border-slate-100">
            <div class="flex flex-col px-6 py-4 space-y-4">
                <a href="{{ route('home') }}" class="hover:text-primary transition">Home</a>
                <a href="{{ route('menu') }}" class="hover:text-primary transition">Menu</a>
                <a href="{{ route('home') }}#reservation" class="text-primary font-medium">Reservasi</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow">
        @if(session('success'))
            <div 
                x-data="{ show: true }" 
                x-show="show" 
                x-init="setTimeout(() => show = false, 5000)"
                class="fixed top-24 right-6 z-50 bg-emerald-100 border-l-4 border-emerald-500 text-emerald-700 p-4 rounded shadow-lg max-w-sm"
            >
                <div>
                    <p class="font-bold">Sukses!</p>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-12 mt-12">
        <div class="container mx-auto px-6 grid md:grid-cols-3 gap-8">
            <div>
                <h3 class="font-serif text-2xl font-bold text-white mb-4">Restomu</h3>
                <p class="mb-4">Pengalaman kuliner tak terlupakan dengan nuansa elegan dan rasa autentik.</p>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 uppercase tracking-wider text-sm">Navigasi</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="hover:text-emerald-400 transition">Home</a></li>
                    <li><a href="{{ route('menu') }}" class="hover:text-emerald-400 transition">Menu</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-white mb-4 uppercase tracking-wider text-sm">Kontak</h4>
                <p>Jl. Rasa Juara No. 88<br>Jakarta Selatan</p>
                <p class="mt-2">booking@restomu.com<br>+62 812 3456 7890</p>
            </div>
        </div>
        <div class="container mx-auto px-6 mt-12 pt-8 border-t border-slate-800 text-center text-sm">
            &copy; {{ date('Y') }} Restomu. All rights reserved.
        </div>
    </footer>

</body>
</html>
