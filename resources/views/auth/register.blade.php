<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - 🌸 LumYena Store</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('images/mascot.jpg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-lumyena-light font-nunito flex items-center justify-center min-h-screen p-4" style="background-image: radial-gradient(#FFB6C1 1px, transparent 1px); background-size: 20px 20px;">

    <!-- Wrapper -->
    <div class="w-full max-w-md">
        
        <!-- Back to Home -->
        <div class="text-center mb-6">
            <a href="{{ route('home') }}" class="inline-flex items-center text-lumyena-primary font-extrabold hover:text-lumyena-hover transition-transform hover:-translate-x-1">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Beranda
            </a>
            <div class="mt-4 flex flex-col items-center justify-center gap-3">
                <img src="{{ asset('images/mascot.jpg') }}" alt="Mascot Logo" class="w-20 h-20 rounded-full border-4 border-white object-cover shadow-[0_4px_0_#FFC0CB]">
                <span class="text-3xl font-black text-lumyena-primary drop-shadow-sm">LumYena Store</span>
            </div>
        </div>

        <!-- Register Card -->
        <div class="bg-white border-4 border-lumyena-secondary rounded-3xl p-6 sm:p-8 shadow-[0_8px_0_#FFC0CB] page-enter delay-100">
            <h2 class="text-2xl font-black text-center text-lumyena-text mb-6">Daftar Akun Baru 🌟</h2>
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <label for="name" class="block font-bold text-lumyena-muted mb-2 text-sm">Nama Lengkap</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" placeholder="Panggilan Kerenmu">
                    @error('name')
                        <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block font-bold text-lumyena-muted mb-2 text-sm">Alamat Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" placeholder="email@kamu.com">
                    @error('email')
                        <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label for="password" class="block font-bold text-lumyena-muted mb-2 text-sm">Kata Sandi</label>
                    <input id="password" type="password" name="password" required class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition">
                    @error('password')
                        <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-6">
                    <label for="password_confirmation" class="block font-bold text-lumyena-muted mb-2 text-sm">Ulangi Kata Sandi</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition">
                </div>

                <div class="my-6 border-t-2 border-dashed border-lumyena-border"></div>

                <h3 class="text-lg font-black text-lumyena-primary mb-4">Info Game & Streaming <span class="text-sm font-bold text-lumyena-muted ml-2">(Opsional) 😎</span></h3>
                <p class="text-xs font-bold text-lumyena-muted mb-4 -mt-2">Bisa dilewati & diisi nanti di halaman profil khusus untuk auto-fill pesanan Anda!</p>

                <!-- WA -->
                <div class="mb-4">
                    <label for="whatsapp" class="block font-bold text-lumyena-muted mb-2 text-sm">Nomor WhatsApp</label>
                    <input id="whatsapp" type="tel" name="whatsapp" value="{{ old('whatsapp') }}" pattern="^62[0-9]{8,}$" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" placeholder="628xxxxxxxxxx">
                    <p class="text-[11px] text-lumyena-muted mt-1 font-bold">Harus diawali 62, hanya angka.</p>
                    @error('whatsapp')
                        <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Game ID -->
                <div class="mb-4">
                    <label for="game_id" class="block font-bold text-lumyena-muted mb-2 text-sm">Target ID / Player ID Default</label>
                    <input id="game_id" type="text" name="game_id" value="{{ old('game_id') }}" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" placeholder="Contoh: 12345678 (1234)">
                    @error('game_id')
                        <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Streaming Email -->
                <div class="mb-6">
                    <label for="streaming_username" class="block font-bold text-lumyena-muted mb-2 text-sm">Email Akun Streaming</label>
                    <input id="streaming_username" type="email" name="streaming_username" value="{{ old('streaming_username') }}" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" placeholder="Contoh: email@gmail.com">
                    @error('streaming_username')
                        <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full text-lg font-extrabold text-white bg-lumyena-primary border-4 border-lumyena-hover py-3 rounded-2xl shadow-[0_4px_0_#FF1493] active:translate-y-1 active:shadow-[0_0px_0_#FF1493] transition-all">
                    Daftar Sekarang ✨
                </button>
            </form>

            <div class="mt-6 text-center text-sm font-bold text-lumyena-muted">
                Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-lumyena-primary hover:text-lumyena-hover underline decoration-2 underline-offset-4">
                    Masuk di sini
                </a>
            </div>
        </div>
    </div>
    
    <!-- Error data bridge (PHP → HTML → JS) -->
    @if($errors->any())
        <div id="error-data" class="hidden">
            <ul style="text-align:left;padding-left:1.25rem;list-style:disc;font-weight:600;font-size:0.875rem;">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Flash SweetAlert (pure JS, no Blade inside) -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var errorEl = document.getElementById('error-data');
            if (errorEl && window.Swal) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: errorEl.innerHTML,
                    confirmButtonColor: '#FF69B4',
                });
            }
        });
    </script>
</body>
</html>
