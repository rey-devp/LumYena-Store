@extends('layouts.store')

@section('title', 'Dasbor Pengguna - LumYena Store')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    
    <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] overflow-hidden mb-8">
        
        <!-- Dashboard Header -->
        <div class="bg-lumyena-primary text-white p-8 relative overflow-hidden">
            <div class="absolute -right-4 -top-10 opacity-30 transform rotate-12 pointer-events-none">
                <img src="{{ asset('images/mascot.jpg') }}" alt="Mascot Logo" class="w-48 h-auto mix-blend-multiply">
            </div>
            
            <div class="relative z-10">
                <h1 class="text-3xl font-black mb-2 drop-shadow-md">Dasbor Pengguna</h1>
                <p class="text-lg font-bold opacity-90">Selamat datang kembali, {{ auth()->user()->name }}!</p>
            </div>
        </div>
        
        <!-- Dashboard Content -->
        <div class="p-8">
            <h2 class="text-xl font-extrabold text-lumyena-text mb-6 border-b-2 border-lumyena-border pb-4">Aktivitas & Pengaturan</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Action: Shopping -->
                <div class="bg-lumyena-light border-2 border-lumyena-border rounded-2xl p-6 text-center hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 mx-auto bg-white rounded-full flex items-center justify-center text-3xl shadow-sm mb-4 border-2 border-lumyena-primary">
                        🛒
                    </div>
                    <h3 class="text-lg font-bold text-lumyena-text mb-2">Belanja Top-Up</h3>
                    <p class="text-sm text-lumyena-muted mb-4 font-semibold">Temukan penawaran terbaik untuk Game & Aplikasi favoritmu.</p>
                    <a href="{{ route('home') }}" class="inline-block px-6 py-2 bg-[#00d2d3] text-white font-extrabold rounded-full border-2 border-[#0abde3] shadow-[0_3px_0_#0abde3] active:translate-y-1 active:shadow-none transition-all">
                        Mulai Belanja 👉
                    </a>
                </div>
                
                <!-- Action: Profile -->
                <div class="bg-lumyena-light border-2 border-lumyena-border rounded-2xl p-6 text-center hover:-translate-y-1 hover:shadow-lg transition-all duration-300">
                    <div class="w-16 h-16 mx-auto bg-white rounded-full flex items-center justify-center text-3xl shadow-sm mb-4 border-2 border-lumyena-primary">
                        👤
                    </div>
                    <h3 class="text-lg font-bold text-lumyena-text mb-2">Informasi Profil</h3>
                    <p class="text-sm text-lumyena-muted mb-4 font-semibold">Ubah nama, email, atau kata sandi akun LumYena kamu.</p>
                    <a href="{{ route('profile.edit') }}" class="inline-block px-6 py-2 bg-lumyena-primary text-white font-extrabold rounded-full border-2 border-lumyena-hover shadow-[0_3px_0_#FF1493] active:translate-y-1 active:shadow-none transition-all">
                        Edit Profil ✏️
                    </a>
                </div>
            </div>
            
        </div>
    </div>
    
</div>
@endsection
