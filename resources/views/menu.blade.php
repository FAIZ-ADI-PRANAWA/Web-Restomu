@extends('layouts.app')

@section('content')

    <!-- Page Header -->
    <div class="bg-slate-900 py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-6 relative z-10 text-center text-white">
            <h1 class="font-serif text-5xl font-bold mb-4">Daftar Menu</h1>
            <p class="text-slate-300 text-lg max-w-xl mx-auto">Jelajahi ragam hidangan eksklusif kami, dibuat dengan bahan terbaik dan penuh cinta.</p>
        </div>
    </div>

    <!-- Menu List -->
    <div class="container mx-auto px-6 py-16">
        @foreach($categories as $category)
            @if($category->menus->isNotEmpty())
                <div class="mb-16 last:mb-0">
                    <!-- Category Title -->
                    <div class="flex items-center mb-10">
                        <h2 class="font-serif text-3xl font-bold text-dark pr-6 bg-slate-50 relative z-10">{{ $category->name }}</h2>
                        <div class="flex-grow h-px bg-slate-200"></div>
                    </div>

                    <!-- Items Grid -->
                    <div class="grid md:grid-cols-2 gap-x-12 gap-y-10 align-top">
                        @foreach($category->menus as $menu)
                            <div class="flex flex-col md:flex-row bg-white p-4 rounded-xl border border-transparent hover:border-slate-100 hover:shadow-lg transition duration-300">
                                <!-- Image -->
                                <div class="w-full md:w-32 h-32 flex-shrink-0 rounded-lg overflow-hidden bg-slate-100 mb-4 md:mb-0">
                                     <!-- PENTING: Ganti gambar menu. -->
                                    <!-- <img src="..." ...> -->
                                    <img src="{{ $menu->image ?? 'https://via.placeholder.com/600x400' }}" alt="{{ $menu->name }}" class="w-full h-full object-cover">
                                </div>
                                
                                <!-- Content -->
                                <div class="md:ml-6 flex-grow flex flex-col justify-center">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="font-bold text-lg text-slate-800">{{ $menu->name }}</h3>
                                        <span class="font-bold text-primary text-lg">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                                    </div>
                                    <p class="text-slate-500 text-sm leading-relaxed">{{ $menu->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endsection
