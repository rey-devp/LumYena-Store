<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - 🌸 LumYena Store</title>
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

        <!-- Login Card -->
        <div class="bg-white border-4 border-lumyena-secondary rounded-3xl p-6 sm:p-8 shadow-[0_8px_0_#FFC0CB] page-enter delay-100">
            <h2 class="text-2xl font-black text-center text-lumyena-text mb-6">Selamat Datang! 👋</h2>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <label for="email" class="block font-bold text-lumyena-muted mb-2 text-sm">Alamat Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition">
                    @error('email')
                        <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <div class="flex justify-between items-center mb-2">
                        <label for="password" class="block font-bold text-lumyena-muted text-sm">Kata Sandi</label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs font-bold text-lumyena-primary hover:text-lumyena-hover">Lupa sandi?</a>
                        @endif
                    </div>
                    <input id="password" type="password" name="password" required class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition">
                    @error('password')
                        <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="block mb-6">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-2 border-lumyena-border text-lumyena-primary shadow-sm focus:ring-lumyena-primary focus:ring-offset-0">
                        <span class="ml-2 text-sm font-bold text-lumyena-muted">Ingat Saya</span>
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full text-lg font-extrabold text-white bg-lumyena-primary border-4 border-lumyena-hover py-3 rounded-2xl shadow-[0_4px_0_#FF1493] active:translate-y-1 active:shadow-[0_0px_0_#FF1493] transition-all flex justify-center items-center gap-2">
                    Masuk <span class="text-xl">👉</span>
                </button>
            </form>

            <div class="mt-8 text-center border-t-2 border-lumyena-border pt-6">
                <p class="text-sm font-bold text-lumyena-muted">Belum punya akun?</p>
                <a href="{{ route('register') }}" class="inline-block mt-2 text-base font-extrabold text-white bg-[#00d2d3] border-4 border-[#0abde3] py-2 px-6 rounded-full shadow-[0_4px_0_#0abde3] active:translate-y-1 active:shadow-[0_0px_0_#0abde3] transition-all hover:bg-[#0abde3]">
                    Buat Akun Sekarang
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
