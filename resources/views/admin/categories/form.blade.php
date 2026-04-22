@extends('admin.layout')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <a href="{{ route('admin.categories.index') }}" class="p-2 bg-white rounded-xl border-2 border-lumyena-border hover:bg-lumyena-light text-lumyena-primary transition-all shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <h1 class="text-3xl font-black text-lumyena-primary drop-shadow-sm">{{ isset($category) ? 'Edit Kategori' : 'Kategori Baru' }} ✨</h1>
            </div>
            <p class="text-sm font-bold text-lumyena-muted ml-12">Isi formulir di bawah ini untuk {{ isset($category) ? 'mengubah data' : 'menambahkan' }} kategori lapak game Anda.</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] overflow-hidden max-w-3xl">
        <div class="p-6 sm:p-8">
            <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST" class="space-y-6">
                @csrf
                @if(isset($category)) @method('PUT') @endif
                
                <!-- Nama Kategori -->
                <div class="space-y-2">
                    <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Nama Kategori <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                        </div>
                        <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" 
                            class="block w-full pl-11 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm"
                            placeholder="Contoh: Mobile Legends" required>
                    </div>
                </div>
                
                <!-- Icon -->
                <div class="space-y-2">
                    <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Icon Kategori</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <input type="text" name="icon" value="{{ old('icon', $category->icon ?? '') }}" 
                            class="block w-full pl-11 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm"
                            placeholder="Contoh Emoji: 💎, 🎮, dll">
                    </div>
                    <p class="text-xs font-bold text-gray-400">Opsional: Emoji akan mempercantik label tampilan kategori.</p>
                </div>
                
                <hr class="border-gray-100 border-2 rounded-full my-6">

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-extrabold rounded-xl transition-all border-2 border-transparent">
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-3 bg-lumyena-primary hover:bg-lumyena-hover text-white font-black rounded-xl shadow-[0_4px_0_#FF1493] active:translate-y-1 active:shadow-none transition-all flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Kategori
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
