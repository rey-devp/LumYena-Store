<section class="space-y-6">
    <header>
        <h2 class="text-xl font-extrabold text-red-600">
            {{ __('Hapus Akun Anda') }}
        </h2>

        <p class="mt-1 text-sm font-bold text-lumyena-muted">
            {{ __('Sekali akun Anda dihapus, semua sumber daya dan data di dalamnya akan terhapus permanen. Silakan unduh data apapun yang ingin Anda simpan terlebih dahulu.') }}
        </p>
    </header>

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="text-sm font-extrabold text-white bg-red-500 border-4 border-red-700 py-2 px-6 rounded-xl shadow-[0_4px_0_#b91c1c] active:translate-y-1 active:shadow-none transition-all"
    >
        {{ __('Hapus Akun') }}
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white border-4 border-lumyena-secondary rounded-3xl m-4">
            @csrf
            @method('delete')

            <h2 class="text-lg font-extrabold text-lumyena-text">
                {{ __('Apakah Anda yakin ingin menghapus akun ini?') }}
            </h2>

            <p class="mt-1 text-sm font-bold text-lumyena-muted mb-6">
                {{ __('Sekali akun Anda dihapus, semua sumber daya dan data di dalamnya akan terhapus permanen. Masukkan sandi Anda untuk mengkonfirmasi.') }}
            </p>

            <div class="mt-6">
                <label for="password" class="sr-only">{{ __('Kata Sandi') }}</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full bg-lumyena-light border-2 border-lumyena-border rounded-xl px-4 py-3 text-lumyena-text font-semibold focus:ring-4 focus:ring-lumyena-primary/20 focus:border-lumyena-primary outline-none transition"
                    placeholder="{{ __('Kata Sandi') }}"
                />
                @error('password', 'userDeletion')
                    <p class="text-sm font-bold text-red-500 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-end gap-3">
                <button type="button" x-on:click="$dispatch('close')" class="text-sm font-extrabold text-lumyena-text bg-lumyena-light border-4 border-lumyena-border py-2 px-6 rounded-xl shadow-[0_4px_0_#FFB6C1] active:translate-y-1 active:shadow-none transition-all">
                    {{ __('Batal') }}
                </button>

                <button type="submit" class="text-sm font-extrabold text-white bg-red-500 border-4 border-red-700 py-2 px-6 rounded-xl shadow-[0_4px_0_#b91c1c] active:translate-y-1 active:shadow-none transition-all">
                    {{ __('Hapus Permanen') }}
                </button>
            </div>
        </form>
    </x-modal>
</section>
