<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - 🌸 LumYena Store</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mascot.jpg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-lumyena-light font-nunito flex flex-col md:flex-row min-h-screen antialiased text-lumyena-text overflow-x-hidden">

    <!-- Sidebar (Desktop & Mobile Panel) -->
    <aside class="w-64 bg-lumyena-primary text-white shadow-[4px_0_15px_rgba(255,20,147,0.2)] flex flex-col shrink-0 relative z-20">
        <!-- Logo Area -->
        <div class="p-6 border-b-2 border-lumyena-hover/50 bg-lumyena-hover/20 backdrop-blur-sm relative overflow-hidden">
            <img src="{{ asset('images/mascot.jpg') }}" class="absolute -right-4 -top-4 w-24 h-auto opacity-20 mix-blend-multiply transform rotate-12 pointer-events-none" alt="Mascot">
            <h2 class="text-2xl font-black tracking-tight drop-shadow-md relative z-10">LumYena<span class="text-xl opacity-90 block mt-1">Admin Panel</span></h2>
        </div>
        
        <!-- Navigation -->
        <nav class="flex-grow p-4 space-y-2 mt-2 font-bold bg-gradient-to-b from-transparent to-lumyena-hover/10">
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-white text-lumyena-primary shadow-[0_4px_0_#FFB6C1]' : 'text-white hover:bg-white/20 hover:translate-x-1' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                Dasbor
            </a>
            
            <a href="{{ route('admin.categories.index') }}" 
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-white text-lumyena-primary shadow-[0_4px_0_#FFB6C1]' : 'text-white hover:bg-white/20 hover:translate-x-1' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                Kategori Game
            </a>
            
            <a href="{{ route('admin.products.index') }}" 
               class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.products.*') ? 'bg-white text-lumyena-primary shadow-[0_4px_0_#FFB6C1]' : 'text-white hover:bg-white/20 hover:translate-x-1' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                Daftar Produk
            </a>

            <div class="my-4 border-t-2 border-white/20"></div>

            <a href="{{ route('home') }}" target="_blank"
               class="flex items-center gap-3 px-4 py-3 rounded-xl text-white hover:bg-white/20 hover:translate-x-1 transition-all">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                Lihat Toko Utama
            </a>
        </nav>
        
        <!-- Bottom Auth Info -->
        <div class="p-6 bg-lumyena-hover/30 border-t-2 border-lumyena-hover/50">
            <div class="flex flex-col space-y-2">
                <span class="text-sm font-bold opacity-80 uppercase tracking-wider">Mode Administrator</span>
                <span class="text-base font-extrabold truncate">{{ auth()->user()->name ?? 'Admin' }}</span>
                
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 border-4 border-red-700 text-white shadow-[0_4px_0_#991b1b] active:translate-y-1 active:shadow-none py-2 rounded-xl text-sm font-black uppercase tracking-wider transition">
                        Log Out <span class="ml-1 text-lg leading-none">&times;</span>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Content wrapper -->
    <div class="flex-grow flex flex-col min-w-0 bg-[#fff5f8] bg-[url('data:image/svg+xml,%3Csvg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Ccircle cx=\'2\' cy=\'2\' r=\'2\' fill=\'%23FFB6C1\' fill-opacity=\'0.4\'/%3E%3C/svg%3E')] relative z-10 pt-4 px-4 sm:pt-8 sm:px-8 pb-12">
        
        <!-- Flash Messages (Alerts) -->
        <div class="w-full max-w-7xl mx-auto mb-6">
            <!-- SweetAlert will handle success and error flashes -->

            @if($errors->any())
                <div class="bg-orange-100 border-l-8 border-orange-500 text-orange-700 p-4 rounded-r-xl shadow-md mt-4" role="alert">
                    <p class="font-extrabold mb-2">Terdapat masalah pada pengisian form Anda:</p>
                    <ul class="list-disc pl-5 font-semibold text-sm">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Render View Content -->
        <main class="w-full max-w-7xl mx-auto flex-grow">
            @yield('content')
        </main>
        
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
