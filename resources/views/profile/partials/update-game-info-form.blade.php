<section>
    <header>
        <h2 class="text-xl font-black text-lumyena-primary">Informasi Game & Transaksi</h2>
        <p class="mt-1 text-sm font-bold text-lumyena-muted">
            Lengkapi data ini untuk memudahkan proses pre-fill saat membeli produk top-up game maupun langganan streaming.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <label for="game_id" class="block font-bold text-lumyena-muted mb-2 text-sm">Target ID / Player ID Default</label>
            <input id="game_id" name="game_id" type="text" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" value="{{ old('game_id', $user->game_id) }}" placeholder="Contoh: 12345678 (1234)">
            @error('game_id')
                <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="streaming_username" class="block font-bold text-lumyena-muted mb-2 text-sm">Email Akun Streaming</label>
            <input id="streaming_username" name="streaming_username" type="email" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" value="{{ old('streaming_username', $user->streaming_username) }}" placeholder="Contoh: email@gmail.com">
            @error('streaming_username')
                <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="whatsapp" class="block font-bold text-lumyena-muted mb-2 text-sm">Nomor WhatsApp</label>
            <input id="whatsapp" name="whatsapp" type="tel" pattern="^62[0-9]{8,}$" class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition" value="{{ old('whatsapp', $user->whatsapp) }}" placeholder="628xxxxxxxxxx">
            <p class="text-[11px] text-lumyena-muted mt-1 font-bold">Harus diawali 62, hanya angka.</p>
            @error('whatsapp')
                <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block font-bold text-lumyena-muted mb-2 text-sm">Metode Pembayaran Favorit</label>
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3">
                @php $payments = ['BCA', 'OVO', 'GOPAY', 'DANA', 'SHOPEEPAY']; @endphp
                @foreach($payments as $pay)
                    <label class="relative cursor-pointer group">
                        <input type="radio" name="preferred_payment" value="{{ $pay }}" {{ old('preferred_payment', $user->preferred_payment) == $pay ? 'checked' : '' }} class="peer sr-only">
                        <div class="h-16 bg-lumyena-light border-2 border-lumyena-border rounded-2xl flex items-center justify-center transition-all duration-300 peer-checked:border-4 peer-checked:border-[#00d2d3] peer-checked:bg-white peer-checked:shadow-[0_4px_0_#48dbfb] hover:-translate-y-1 hover:border-lumyena-primary/50 relative overflow-hidden">
                            <span class="font-bold text-sm tracking-wide text-lumyena-text">{{ $pay }}</span>
                            <div class="absolute top-0 right-0 w-6 h-6 rounded-bl-xl bg-[#00d2d3] text-white flex justify-center items-center opacity-0 peer-checked:opacity-100 transition-opacity">
                                <svg class="w-3 h-3 -mt-1 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                        </div>
                    </label>
                @endforeach
            </div>
            @error('preferred_payment')
                <span class="text-sm font-bold text-red-500 mt-1 block">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <button type="submit" class="text-lg font-extrabold text-white bg-lumyena-primary border-4 border-lumyena-hover py-2 px-6 rounded-2xl shadow-[0_4px_0_#FF1493] active:translate-y-1 active:shadow-[0_0px_0_#FF1493] transition-all">
                Simpan Profil Transaksi
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >Berhasil Tersimpan.</p>
            @endif
        </div>
    </form>
</section>
