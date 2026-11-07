@extends('layouts.app')

@section('content')

    <!-- Hero Section -->
    <section class="relative h-[600px] flex items-center justify-center text-center text-white overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 z-0">
            <!-- PENTING: Ganti src gambar ini dengan aset restoran Anda. -->
            <!-- <img src="URL_ASLI_ANDA" alt="Restomu Interior" class="w-full h-full object-cover"> -->
            <img src="/images/interior-1.jpg" alt="Restaurant Ambiance" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        </div>

        <div class="relative z-10 container mx-auto px-6">
            <h1 class="font-serif text-5xl md:text-7xl font-bold mb-6 animate-fade-in-up">
                Cita Rasa <span class="text-emerald-400">Elegan</span>
            </h1>
            <p class="text-lg md:text-2xl mb-10 text-slate-200 max-w-2xl mx-auto font-light">
                Nikmati perpaduan rasa autentik dan suasana kemewahan di setiap gigitan.
            </p>
            <a href="#reservation" class="inline-block px-8 py-4 bg-primary hover:bg-emerald-700 text-white font-semibold rounded-full transition transform hover:scale-105 shadow-xl">
                Buat Reservasi
            </a>
        </div>
    </section>

    <!-- Featured Menu Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-primary font-bold tracking-widest uppercase text-sm">Pilihan Chef</span>
                <h2 class="font-serif text-4xl font-bold mt-2 text-dark">Menu Favorit</h2>
                <div class="w-24 h-1 bg-primary mx-auto mt-4"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                @foreach($featuredMenus as $menu)
                <div class="bg-white rounded-xl shadow-lg border border-slate-100 overflow-hidden hover:shadow-2xl transition duration-300 group">
                    <div class="h-64 overflow-hidden relative">
                        <!-- PENTING: Ganti gambar menu dengan foto asli. -->
                        <!-- <img src="URL_FOTO_MAKANAN" alt="{{ $menu->name }}" ...> -->
                        <img src="{{ $menu->image ?? 'https://via.placeholder.com/600x400' }}" alt="{{ $menu->name }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                        <div class="absolute top-4 right-4 bg-primary text-white text-sm font-bold px-3 py-1 rounded-full shadow-md">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="p-8">
                        <h3 class="font-serif text-2xl font-bold text-dark mb-3 group-hover:text-primary transition">{{ $menu->name }}</h3>
                        <p class="text-slate-500 leading-relaxed mb-4 line-clamp-2">
                            {{ $menu->description }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('menu') }}" class="inline-flex items-center text-primary font-semibold hover:underline">
                    Lihat Semua Menu
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Reservation Section -->
    <section id="reservation" class="py-20 bg-slate-50 relative">
        <div class="container mx-auto px-6 max-w-4xl">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
                <!-- Decorative Image Side -->
                <div class="md:w-1/3 relative hidden md:block">
                     <!-- PENTING: Gambar dekoratif samping form. -->
                    <!-- <img src="..." ...> -->
                    <img src="/images/interior-2.jpg" alt="Reservation" class="absolute inset-0 w-full h-full object-cover">
                    <div class="absolute inset-0 bg-primary/20"></div>
                </div>

                <!-- Form Side -->
                <div class="md:w-2/3 p-10 md:p-12">
                    <h2 class="font-serif text-3xl font-bold text-dark mb-2">Reservasi Meja</h2>
                    <p class="text-slate-500 mb-8">Silakan isi formulir di bawah untuk mengamankan tempat Anda.</p>

                    <form action="{{ route('reservation.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="name" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-200 focus:border-primary outline-none transition" placeholder="John Doe">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Nomor Telepon</label>
                                <input type="text" name="phone" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-200 focus:border-primary outline-none transition" placeholder="0812...">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Tanggal</label>
                                <input type="date" name="date" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-200 focus:border-primary outline-none transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Jam</label>
                                <input type="time" name="time" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-200 focus:border-primary outline-none transition">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-2">Jumlah Orang</label>
                                <input type="number" name="people_count" min="1" max="20" required class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-200 focus:border-primary outline-none transition" placeholder="2">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-2">Catatan Khusus (Opsional)</label>
                            <textarea name="notes" rows="3" class="w-full px-4 py-3 rounded-lg border border-slate-300 focus:ring-2 focus:ring-emerald-200 focus:border-primary outline-none transition" placeholder="Ulang tahun, alergi, dll."></textarea>
                        </div>

                        <button type="submit" class="w-full bg-primary text-white font-bold py-4 rounded-lg hover:bg-emerald-700 transition duration-300 shadow-lg transform hover:-translate-y-1">
                            Konfirmasi Reservasi
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
