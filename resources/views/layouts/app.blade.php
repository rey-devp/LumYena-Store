<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                         <header class="navbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="logo">
                🎀 LumYena Store
            </a>
            <div class="auth-links">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
                    @else
                        <a href="{{ route('dashboard') }}">Profil Saya</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none; border:none; font-weight:600; color:#FF69B4; cursor:pointer;" onmouseover="this.style.color='#FF1493'" onmouseout="this.style.color='#FF69B4'">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-outline" style="padding: 0.4rem 1.2rem; width: auto; font-size:0.9rem;">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary" style="padding: 0.4rem 1.2rem; width: auto; font-size:0.9rem;">Daftar</a>
                @endauth
            </div>
        </div>
    </header>
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
