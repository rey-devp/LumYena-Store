<section>
    <header>
        <h2 class="text-xl font-extrabold text-lumyena-text">
            {{ __('Ubah Kata Sandi') }}
        </h2>

        <p class="mt-1 text-sm font-bold text-lumyena-muted">
            {{ __('Pastikan akunmu memakai kata sandi yang panjang dan acak agar tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <label for="update_password_current_password" class="block font-bold text-lumyena-muted mb-2 text-sm">{{ __('Kata Sandi Saat Ini') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" autocomplete="current-password" />
            @error('current_password', 'updatePassword')
                <p class="text-sm font-bold text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password" class="block font-bold text-lumyena-muted mb-2 text-sm">{{ __('Kata Sandi Baru') }}</label>
            <input id="update_password_password" name="password" type="password" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" autocomplete="new-password" />
            @error('password', 'updatePassword')
                <p class="text-sm font-bold text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="update_password_password_confirmation" class="block font-bold text-lumyena-muted mb-2 text-sm">{{ __('Konfirmasi Kata Sandi') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" autocomplete="new-password" />
            @error('password_confirmation', 'updatePassword')
                <p class="text-sm font-bold text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="text-sm font-extrabold text-white bg-lumyena-primary border-4 border-lumyena-hover py-2 px-6 rounded-xl shadow-[0_4px_0_#FF1493] active:translate-y-1 active:shadow-none transition-all">
                {{ __('Ubah Sandi') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-bold text-green-500"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
