<section>
    <header>
        <h2 class="text-xl font-extrabold text-lumyena-text">
            {{ __('Informasi Profil') }}
        </h2>

        <p class="mt-1 text-sm text-lumyena-muted font-bold">
            {{ __("Perbarui akun nama kamu atau alamat email yang digunakan.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="name" class="block font-bold text-lumyena-muted mb-2 text-sm">{{ __('Nama') }}</label>
            <input id="name" name="name" type="text" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="block font-bold text-lumyena-muted mb-2 text-sm">{{ __('Alamat Email') }}</label>
            <input id="email" name="email" type="email" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <p class="text-sm text-red-500 mt-2">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 font-bold text-lumyena-text">
                        {{ __('Alamat email kamu belum diverifikasi.') }}

                        <button form="send-verification" class="underline text-sm text-lumyena-primary hover:text-lumyena-hover rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lumyena-primary">
                            {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-bold text-sm text-green-600">
                            {{ __('Link verifikasi baru telah dikirim ke alamat emailmu.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="text-sm font-extrabold text-white bg-lumyena-primary border-4 border-lumyena-hover py-2 px-6 rounded-xl shadow-[0_4px_0_#FF1493] active:translate-y-1 active:shadow-none transition-all">
                {{ __('Simpan Perubahan') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm font-bold text-green-500"
                >{{ __('Berhasil disimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
