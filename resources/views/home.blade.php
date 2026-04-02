@extends('layouts.store')

@section('title', '🌸 LumYena Store')

@section('content')
<!-- Wrapper for Alpine Data -->
<div x-data="{ loading: true, scrollY: 0 }" x-init="setTimeout(() => loading = false, 800)" @scroll.window="scrollY = window.scrollY">
    
    <!-- Hero Banner -->
    <div class="animate-on-scroll relative w-full rounded-2xl md:rounded-3xl overflow-hidden shadow-[0_8px_0_#FFC0CB] border-4 border-lumyena-secondary bg-white mb-10 h-48 md:h-72 flex items-center justify-center bg-cover bg-center" style="background-image: linear-gradient(to right, rgba(255, 105, 180, 0.8), rgba(255, 192, 203, 0.9)), url('https://placehold.co/1200x400/FF69B4/FFFFFF?text=Promo+Spesial+LumYena');">
        <div class="text-center px-4 relative z-10">
            <h1 class="text-3xl md:text-5xl font-extrabold text-white drop-shadow-md mb-2 tracking-tight">Top-Up Game & Aplikasi</h1>
            <p class="text-white font-semibold text-lg md:text-xl drop-shadow">Aman, Terpercaya, dan Super Cepat! ✨</p>
        </div>
    </div>

    <!-- Category Filters (Pills) -->
    <div class="animate-on-scroll delay-100 flex flex-wrap gap-3 justify-center mb-10">
        <a href="{{ route('home') }}" class="px-5 py-2 rounded-full font-extrabold border-2 transition-transform duration-200 active:translate-y-1 {{ !request('category') || request('category') == 'all' ? 'bg-lumyena-primary text-white border-lumyena-hover shadow-[0_4px_0_#FF1493] translate-y-[-2px]' : 'bg-white text-lumyena-primary border-lumyena-border hover:bg-lumyena-light hover:-translate-y-1' }}">
            🔥 Rekomendasi
        </a>
        @foreach($categories as $category)
            <a href="{{ route('home', ['category' => $category->slug]) }}" class="px-5 py-2 rounded-full font-extrabold border-2 transition-transform duration-200 active:translate-y-1 {{ request('category') == $category->slug ? 'bg-lumyena-primary text-white border-lumyena-hover shadow-[0_4px_0_#FF1493] translate-y-[-2px]' : 'bg-white text-lumyena-primary border-lumyena-border hover:bg-lumyena-light hover:-translate-y-1' }}">
                {{ $category->icon }} {{ $category->name }}
            </a>
        @endforeach
    </div>

<!-- Products Grid (Codashop Style) -->
    
    <!-- Skeleton Loaders -->
    <div x-show="loading" class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 max-w-5xl mx-auto">
        @for($i=0; $i<6; $i++)
            <div class="bg-white border-2 lg:border-4 border-lumyena-secondary rounded-2xl overflow-hidden shadow-[0_6px_0_#FFC0CB]">
                <div class="aspect-square bg-lumyena-light w-full p-2 lg:p-3 skeleton"></div>
                <div class="p-2 lg:p-3 text-center bg-white border-t border-lumyena-border">
                    <div class="h-4 skeleton rounded mx-auto mb-1 w-3/4"></div>
                    <div class="h-4 skeleton rounded mx-auto w-1/2"></div>
                </div>
            </div>
        @endfor
    </div>

    <!-- Actual Products -->
    <div x-show="!loading" style="display: none;" class="animate-on-scroll delay-200 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-4 sm:gap-6 lg:gap-8 max-w-5xl mx-auto mb-16">
    @forelse($products as $product)
        <!-- Game/App Tile -->
        <a href="{{ route('product.show', $product->slug) }}" class="group block relative bg-white border-2 lg:border-4 border-lumyena-secondary rounded-2xl overflow-hidden shadow-[0_6px_0_#FFC0CB] hover:shadow-[0_12px_0_#FFC0CB] hover:-translate-y-2 transition-all duration-300">
            <!-- Icon / Cover -->
            <div class="aspect-square bg-lumyena-light w-full p-2 lg:p-3 relative">
                <img src="{{ asset('images/products/' . ($product->image ?? 'placeholder.png')) }}" 
                     alt="{{ $product->name }}" 
                     class="w-full h-full object-cover rounded-xl shadow-inner bg-white group-hover:scale-105 transition-transform duration-300" 
                     onerror="this.src='https://placehold.co/400x400/FFB6C1/FF69B4?text=Top+Up'">
                
                <span class="absolute top-1 left-1 lg:top-2 lg:left-2 bg-yellow-400 text-yellow-900 text-[10px] lg:text-xs font-extrabold px-2 py-0.5 rounded-full shadow-sm z-10 border border-yellow-500">
                    {{ $product->category->name === 'Game Top-Up' ? 'Game' : 'App' }}
                </span>
                
                @if(in_array($product->slug, ['diamond-ff', 'weekly-diamond-ml', 'premium-netflix']))
                    <span class="absolute top-1 right-1 lg:top-2 lg:right-2 bg-red-500 text-white text-[10px] lg:text-xs font-black px-2 py-0.5 rounded-full shadow-sm z-10 animate-pulse border border-red-700">
                        🔥 HOT
                    </span>
                @endif
            </div>
            
            <!-- Details -->
            <div class="p-3 lg:p-4 text-center bg-white border-t border-lumyena-border flex flex-col justify-between h-full">
                <h3 class="text-sm lg:text-base font-black text-lumyena-text leading-tight group-hover:text-lumyena-hover transition-colors line-clamp-2">
                    {{ $product->name }}
                </h3>
                <p class="mt-2 text-sm lg:text-base font-extrabold text-lumyena-primary">
                    {{ $product->variations->count() > 0 ? 'Mulai ' : '' }}{{ $product->formatted_price }}
                </p>
            </div>
        </a>
    @empty
        <div class="col-span-full text-center py-16 bg-white rounded-3xl border-2 border-dashed border-lumyena-border">
            <h3 class="text-xl font-bold text-lumyena-text mb-2">Ops! Pencarian Kosong 🥺</h3>
            <p class="text-lumyena-muted">Kategori yang kamu cari belum tersedia.</p>
        </div>
    @endforelse
    </div>
    <!-- Mengapa LumYena Section -->
    <div class="animate-on-scroll mt-16 mb-20 max-w-5xl mx-auto">
        <h2 class="text-2xl md:text-3xl font-black text-center text-lumyena-primary mb-8 drop-shadow-sm">Mengapa Belanja di LumYena? 🤔</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
            <div class="bg-white p-6 rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] text-center hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl mb-3">⚡</div>
                <h3 class="font-extrabold text-lumyena-text mb-2">Proses Instan</h3>
                <p class="text-sm font-bold text-lumyena-muted">Pesanan langsung masuk detik itu juga tanpa ribet nunggu info admin.</p>
            </div>
            <div class="bg-white p-6 rounded-3xl border-4 border-[#87CEEB] shadow-[0_8px_0_#00BFFF] text-center hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl mb-3">🛡️</div>
                <h3 class="font-extrabold text-lumyena-text mb-2">Pasti Aman</h3>
                <p class="text-sm font-bold text-lumyena-muted">100% Legal & Garansi uang kembali jika pesanan gagal.</p>
            </div>
            <div class="bg-white p-6 rounded-3xl border-4 border-[#FFA07A] shadow-[0_8px_0_#FF7F50] text-center hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl mb-3">💖</div>
                <h3 class="font-extrabold text-lumyena-text mb-2">CS Ramah</h3>
                <p class="text-sm font-bold text-lumyena-muted">Admin standby 24/7 siap bantuin kalau kamu ada kendala.</p>
            </div>
            <div class="bg-white p-6 rounded-3xl border-4 border-[#98FB98] shadow-[0_8px_0_#3CB371] text-center hover:-translate-y-2 transition-transform duration-300">
                <div class="text-4xl mb-3">💸</div>
                <h3 class="font-extrabold text-lumyena-text mb-2">Harga Terbaik</h3>
                <p class="text-sm font-bold text-lumyena-muted">Murah meriah dengan banyak diskon menarik tiap minggunya!</p>
            </div>
        </div>
    </div>
    
    <!-- Cara Order Section -->
    <div class="animate-on-scroll bg-white rounded-3xl border-4 border-lumyena-border p-6 md:p-10 mb-20 max-w-5xl mx-auto shadow-sm">
        <h2 class="text-2xl md:text-3xl font-black text-center text-lumyena-text mb-8">Cara Order Super Gampang 🪄</h2>
        <div class="flex flex-col md:flex-row gap-6 md:gap-4 justify-between relative">
            <div class="hidden md:block absolute top-[28px] left-[10%] right-[10%] h-2 bg-lumyena-light rounded-full z-0"></div>
            
            <div class="flex-1 text-center relative z-10 bg-white">
                <div class="w-16 h-16 bg-lumyena-primary text-white text-2xl font-black rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-[0_4px_0_#FFC0CB]">1</div>
                <h3 class="font-extrabold text-lumyena-text mb-1">Pilih Produk</h3>
                <p class="text-sm font-bold text-lumyena-muted">Cari game atau aplikasi streaming favoritmu di katalog.</p>
            </div>
            
            <div class="flex-1 text-center relative z-10 bg-white md:bg-transparent">
                <div class="w-16 h-16 bg-[#00d2d3] text-white text-2xl font-black rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-[0_4px_0_#48dbfb]">2</div>
                <h3 class="font-extrabold text-lumyena-text mb-1">Isi Data & Checkout</h3>
                <p class="text-sm font-bold text-lumyena-muted">Masukkan ID Game & bayar agar orderan Anda diverifikasi.</p>
            </div>
            
            <div class="flex-1 text-center relative z-10 bg-white md:bg-transparent">
                <div class="w-16 h-16 bg-green-500 text-white text-2xl font-black rounded-full flex items-center justify-center mx-auto mb-4 border-4 border-white shadow-[0_4px_0_#22c55e]">3</div>
                <h3 class="font-extrabold text-lumyena-text mb-1">Pesanan Masuk!</h3>
                <p class="text-sm font-bold text-lumyena-muted">Tunggu beberapa saat, pesanan otomatis nyangkut di akunmu!</p>
            </div>
        </div>
    </div>

    <!-- Rate Our Store / Feedback Section -->
    <div class="animate-on-scroll bg-lumyena-primary text-white rounded-3xl p-8 md:p-12 mb-20 max-w-5xl mx-auto shadow-[0_8px_0_#FF1493] relative overflow-hidden flex flex-col md:flex-row items-center gap-8">
        <!-- Decoration -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-yellow-300 opacity-20 rounded-full blur-2xl translate-y-1/3 -translate-x-1/4"></div>
        
        <div class="flex-1 relative z-10 text-center md:text-left">
            <h2 class="text-2xl md:text-4xl font-black mb-4 drop-shadow-sm">Kasih Rating Untuk Kami! ⭐</h2>
            <p class="font-bold opacity-90 mb-6 text-sm md:text-base leading-relaxed">Punya kritik, saran, atau sekedar ingin ngobrol dan komplain tentang layanan kami? Jangan ragu buat ngasih *feedback* via WhatsApp. Pendapatmu 100% jadi bekal kami untuk terus berkembang!</p>
        </div>
        
        <div class="w-full md:w-2/5 relative z-10">
            <div class="bg-white rounded-2xl p-6 shadow-lg text-lumyena-text" x-data="{ rating: 5, feedback: '' }">
                <h3 class="font-extrabold text-center mb-3">Nilai Toko Kami:</h3>
                
                <!-- Star Rating -->
                <div class="flex justify-center gap-2 mb-4">
                    <template x-for="i in 5">
                        <button @click="rating = i" class="text-4xl focus:outline-none transition-transform duration-200 hover:scale-125 hover:-translate-y-1 drop-shadow-sm" :class="rating >= i ? 'text-yellow-400' : 'text-gray-300'">
                            ★
                        </button>
                    </template>
                </div>
                
                <!-- Feedback Text -->
                <textarea x-model="feedback" rows="3" placeholder="Tulis masukan, saran, atau pujianmu di sini..." class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-sm font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition mb-4 resize-none"></textarea>
                
                <!-- Send via WA -->
                <a :href="`https://wa.me/{{ config('app.wa_admin_phone') }}?text=Halo Admin, ini feedback saya untuk LumYena Store!%0A%0ARating: ${rating} Bintang ⭐%0APesan: ${feedback}`" 
                   target="_blank" 
                   class="block text-center w-full text-sm font-black text-white bg-[#22c55e] border-4 border-[#16a34a] py-3 rounded-xl shadow-[0_4px_0_#16a34a] active:translate-y-1 active:shadow-[0_0px_0_#16a34a] transition-all hover:bg-green-500">
                    Kirim Feedback via WA 💬
                </a>
            </div>
        </div>
    </div>
    <button @click="window.scrollTo({top: 0, behavior: 'smooth'})" 
            x-show="scrollY > 300" 
            x-transition.opacity.duration.300ms
            class="fixed bottom-6 right-6 lg:bottom-10 lg:right-10 w-12 h-12 bg-lumyena-primary text-white rounded-full flex items-center justify-center text-xl font-bold shadow-[0_4px_0_#FF1493] border-2 border-white hover:bg-lumyena-hover hover:-translate-y-1 transition-all z-50">
        ↑
    </button>
    
</div>
@endsection
