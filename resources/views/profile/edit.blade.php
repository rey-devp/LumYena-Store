@extends('layouts.store')

@section('title', 'Profil Saya - LumYena Store')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    
    <div class="mb-6">
        <a href="{{ route('dashboard') }}" class="inline-flex items-center text-lumyena-primary font-extrabold hover:text-lumyena-hover transition-transform hover:-translate-x-1 bg-white px-4 py-2 rounded-full border-2 border-lumyena-border shadow-sm">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Dasbor
        </a>
    </div>

    <!-- Header Profil -->
    <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] overflow-hidden mb-8">
        <div class="p-6 md:p-8 bg-lumyena-primary text-white">
            <h1 class="text-3xl font-black mb-2 drop-shadow-md">Pengaturan Profil</h1>
            <p class="text-lg font-bold opacity-90">Perbarui informasi akun dan keamanan LumYena Anda di sini.</p>
        </div>
    </div>

    <div class="space-y-8">
        <!-- Update Profile Information -->
        <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] p-6 md:p-8">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Game & Streaming Information -->
        <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] p-6 md:p-8">
            <div class="max-w-xl">
                @include('profile.partials.update-game-info-form')
            </div>
        </div>

        <!-- Update Password -->
        <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] p-6 md:p-8">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete User -->
        <div class="bg-white rounded-3xl border-4 border-red-300 shadow-[0_8px_0_#fca5a5] p-6 md:p-8">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
    
</div>
@endsection
