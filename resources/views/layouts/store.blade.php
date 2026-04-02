<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', '🌸 LumYena Store')</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mascot.jpg') }}">
    <meta name="description" content="@yield('meta_description', 'LumYena Store - Platform top-up game dan langganan streaming premium terpercaya.')">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-lumyena-light text-lumyena-text font-nunito bg-fixed" style="background-image: radial-gradient(#FFB6C1 1px, transparent 1px); background-size: 20px 20px;">
    
    <!-- Navbar -->
    <header class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b-2 border-lumyena-border shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-extrabold text-lumyena-primary flex items-center gap-2 drop-shadow-sm transition hover:scale-105">
                        <img src="{{ asset('images/mascot.jpg') }}" alt="Mascot Logo" class="w-8 h-8 rounded-full border-2 border-lumyena-primary object-cover shadow-sm bg-white">
                        LumYena Store
                    </a>
                </div>
                
                <!-- Desktop Auth Links -->
                <div class="hidden sm:flex sm:items-center sm:space-x-4">
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-lumyena-primary bg-white border-2 border-lumyena-primary px-4 py-2 rounded-full hover:bg-lumyena-light transition">Admin Panel</a>
                        @else
                            <a href="{{ route('dashboard') }}" class="text-sm font-bold text-lumyena-primary bg-white border-2 border-lumyena-primary px-4 py-2 rounded-full hover:bg-lumyena-light transition">Profil Saya</a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-sm font-extrabold text-lumyena-primary hover:text-lumyena-hover transition">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold text-lumyena-primary bg-white border-2 border-lumyena-primary shadow-[0_2px_0_#FF69B4] px-5 py-2 rounded-full hover:translate-y-0.5 hover:shadow-none transition">Masuk / Daftar</a>
                    @endauth
                </div>

                <!-- Mobile Menu Button (Hamburger) - simplified for demo, showing auth links on mobile too -->
                <div class="flex items-center sm:hidden space-x-2">
                     @auth
                        <a href="{{ route('dashboard') }}" class="text-xs font-bold text-lumyena-primary bg-white border-2 border-lumyena-primary px-3 py-1 rounded-full shadow-sm">Profil</a>
                    @else
                        <a href="{{ route('login') }}" class="text-xs font-bold text-lumyena-primary bg-white border-2 border-lumyena-primary px-3 py-1 rounded-full shadow-sm">Masuk</a>
                    @endauth
                </div>
                
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full page-enter">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t-4 border-lumyena-secondary mt-auto pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
                <!-- Brand Info -->
                <div class="text-center md:text-left">
                    <a href="{{ route('home') }}" class="text-2xl font-black text-lumyena-primary flex items-center justify-center md:justify-start gap-2 mb-4">
                        <img src="{{ asset('images/mascot.jpg') }}" alt="Mascot Logo" class="w-8 h-8 rounded-full border-2 border-lumyena-primary object-cover shadow-sm bg-white">
                        LumYena Store
                    </a>
                    <p class="text-sm font-bold text-lumyena-muted mb-4">
                        Platform top-up game dan layanan berlangganan aplikasi premium termurah, tercepat, dan 100% legal. Buka 24 Jam!
                    </p>
                    <div class="flex justify-center md:justify-start gap-3">
                        <!-- Instagram -->
                        <a href="https://www.instagram.com/lumyena_store?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-lumyena-light border-2 border-lumyena-border rounded-full flex items-center justify-center text-lumyena-primary hover:-translate-y-1 hover:bg-lumyena-primary hover:text-white transition shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <!-- WhatsApp -->
                        <a href="https://wa.me/{{ config('app.wa_admin_phone') }}" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-lumyena-light border-2 border-lumyena-border rounded-full flex items-center justify-center text-lumyena-primary hover:-translate-y-1 hover:bg-lumyena-primary hover:text-white transition shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.89-4.443 9.893-9.892.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.738-.974zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-black text-lumyena-text mb-4">Navigasi</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-sm font-bold text-lumyena-muted hover:text-lumyena-primary transition">Beranda</a></li>
                        <li><a href="{{ route('login') }}" class="text-sm font-bold text-lumyena-muted hover:text-lumyena-primary transition">Masuk / Daftar</a></li>
                    </ul>
                </div>

                <!-- Payment Methods -->
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-black text-lumyena-text mb-4">Metode Pembayaran</h3>
                    <div class="flex flex-wrap justify-center md:justify-start gap-2">
                        @foreach(['BCA', 'OVO', 'GOPAY', 'DANA', 'SHOPEE'] as $payment)
                            <span class="px-3 py-1 bg-lumyena-light border-2 border-lumyena-border rounded-lg text-xs font-black text-lumyena-text">{{ $payment }}</span>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="border-t-2 border-lumyena-border pt-6 mt-6 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm font-bold text-lumyena-muted text-center md:text-left">
                    &copy; {{ date('Y') }} <span class="text-lumyena-primary font-black">LumYena Store</span>. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Sticky Mascot (Desktop & Mobile) -->
    <div x-data="{ showMascot: true }" 
         x-init="setTimeout(() => showMascot = false, 5000)" 
         x-show="showMascot" 
         x-transition.opacity.duration.1000ms
         class="fixed bottom-0 left-2 lg:left-8 z-40 flex items-end drop-shadow-[0_10px_15px_rgba(255,105,180,0.4)] transition-transform hover:-translate-y-2 pointer-events-none">
        <!-- Speech Bubble -->
        <div class="relative bg-white border-4 border-lumyena-secondary rounded-2xl p-3 shadow-[0_4px_0_#FFC0CB] mb-20 -mr-4 lg:-mr-6 z-10 hidden sm:block animate-[bounce_3s_ease-in-out_infinite]">
            <p class="text-xs font-extrabold text-lumyena-text text-center leading-tight">Meow~ 🐾<br>Silakan pilih-pilih kak!</p>
            <div class="absolute -bottom-2 right-4 w-4 h-4 bg-white border-b-4 border-r-4 border-lumyena-secondary rotate-45 transform"></div>
        </div>
        <!-- Mascot Image -->
        <img src="/images/mascot.jpg" alt="LumYena Mascot" class="w-28 lg:w-44 h-auto object-contain origin-bottom pointer-events-auto cursor-pointer drop-shadow-[0_2px_10px_rgba(0,0,0,0.1)]" onclick="Swal.fire({title: 'Meow! ✨', text: 'Halo kak, selamat berbelanja di webstore kesayangan kita!', imageUrl: '/images/mascot.jpg', imageWidth: 200, imageAlt: 'Mascot', confirmButtonColor: '#FF69B4'})">
    </div>

    <!-- Flash message data bridge (PHP → JS via data attributes) -->
    @if(session('success'))
        <div id="flash-data" data-type="success" data-message="{{ session('success') }}" class="hidden"></div>
    @elseif(session('error'))
        <div id="flash-data" data-type="error" data-message="{{ session('error') }}" class="hidden"></div>
    @endif

    <!-- Flash SweetAlert (pure JS, no Blade inside) -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var flash = document.getElementById('flash-data');
            if (flash && window.Swal) {
                var type = flash.dataset.type;
                var message = flash.dataset.message;
                Swal.fire({
                    icon: type,
                    title: type === 'success' ? 'Berhasil!' : 'Oops...',
                    text: message,
                    confirmButtonColor: '#FF69B4',
                    timer: type === 'success' ? 3000 : undefined,
                    timerProgressBar: type === 'success',
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
