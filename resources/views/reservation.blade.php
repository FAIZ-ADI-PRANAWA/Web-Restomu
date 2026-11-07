@extends('layouts.app')

@section('content')
<section id="reservation" class="py-20 bg-emerald-50 relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 left-0 w-64 h-64 bg-emerald-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 bg-yellow-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 translate-x-1/2 translate-y-1/2"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col md:flex-row">
            
            <!-- Image Side -->
            <div class="md:w-5/12 bg-cover bg-center hidden md:block" style="background-image: url('https://images.unsplash.com/photo-1550966871-3ed3c47e2ce2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');">
                <div class="h-full w-full bg-slate-900/40 flex items-center justify-center">
                    <div class="text-white text-center p-8">
                        <h3 class="font-serif text-3xl font-bold mb-2">Reservasi Meja</h3>
                        <p class="text-emerald-100 opacity-90">Nikmati momen spesial bersama kami.</p>
                    </div>
                </div>
            </div>

            <!-- Form Side -->
            <div class="md:w-7/12 p-8 md:p-12">
                <div class="text-center md:text-left mb-8">
                    <h2 class="font-serif text-3xl font-bold text-slate-800 mb-2">Buat Reservasi</h2>
                    <p class="text-slate-500">Silakan isi formulir di bawah ini untuk memesan tempat.</p>
                </div>

                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                        <p class="font-bold">Ada kesalahan!</p>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('reservation.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Group 1 -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                            <input type="text" name="name" id="name" required class="w-full rounded-lg border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition duration-200" placeholder="John Doe" value="{{ old('name') }}">
                        </div>
                        <div>
                            <label for="phone" class="block text-sm font-medium text-slate-700 mb-1">Nomor Telepon</label>
                            <input type="tel" name="phone" id="phone" required class="w-full rounded-lg border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition duration-200" placeholder="0812..." value="{{ old('phone') }}">
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-slate-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" required class="w-full rounded-lg border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition duration-200" placeholder="john@example.com" value="{{ old('email') }}">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="date" class="block text-sm font-medium text-slate-700 mb-1">Tanggal</label>
                            <input type="date" name="date" id="date" required min="{{ date('Y-m-d') }}" class="w-full rounded-lg border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition duration-200" value="{{ old('date') }}">
                        </div>
                        <div>
                            <label for="time" class="block text-sm font-medium text-slate-700 mb-1">Jam</label>
                            <select name="time" id="time" required class="w-full rounded-lg border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition duration-200">
                                <option value="">Pilih Jam</option>
                                @foreach(['11:00', '12:00', '13:00', '14:00', '17:00', '18:00', '19:00', '20:00'] as $t)
                                    <option value="{{ $t }}" {{ old('time') == $t ? 'selected' : '' }}>{{ $t }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="guests" class="block text-sm font-medium text-slate-700 mb-1">Jumlah Orang</label>
                            <input type="number" name="guests" id="guests" min="1" max="20" required class="w-full rounded-lg border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition duration-200" value="{{ old('guests', 2) }}">
                        </div>
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-slate-700 mb-1">Pesan Tambahan (Opsional)</label>
                        <textarea name="message" id="message" rows="3" class="w-full rounded-lg border-slate-200 focus:border-emerald-500 focus:ring focus:ring-emerald-200 transition duration-200" placeholder="Ada alergi makanan atau permintaan khusus?">{{ old('message') }}</textarea>
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-3 px-6 rounded-lg transition duration-300 transform hover:scale-[1.02] shadow-md hover:shadow-lg flex justify-center items-center gap-2">
                            <span>Konfirmasi Reservasi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
@endsection
