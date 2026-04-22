@extends('admin.layout')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <a href="{{ route('admin.products.index') }}" class="p-2 bg-white rounded-xl border-2 border-lumyena-border hover:bg-lumyena-light text-lumyena-primary transition-all shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <h1 class="text-3xl font-black text-lumyena-primary drop-shadow-sm">{{ isset($product) ? 'Edit Produk' : 'Tulis Produk Baru' }} ✨</h1>
            </div>
            <p class="text-sm font-bold text-lumyena-muted ml-12">Lengkapi formulir di bawah ini untuk {{ isset($product) ? 'mengubah data' : 'menambahkan' }} produk jualan Anda.</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] overflow-hidden max-w-4xl">
        <div class="p-6 sm:p-8">
            <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @if(isset($product)) @method('PUT') @endif
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Produk -->
                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Nama Produk <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            </div>
                            <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" 
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm"
                                placeholder="Contoh: 100 Diamonds Mobile Legends" required>
                        </div>
                    </div>

                    <!-- Kategori -->
                    <div class="space-y-2">
                        <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Kategori Game <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            </div>
                            <select name="category_id" class="block w-full pl-11 pr-10 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm appearance-none" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ (old('category_id', $product->category_id ?? '') == $cat->id) ? 'selected' : '' }}>
                                        {{ $cat->name }}
                                    </option>
                                @endforeach
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </div>
                        </div>
                    </div>

                    <!-- Harga -->
                    <div class="space-y-2">
                        <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Harga (Rp) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-400 font-bold">Rp</span>
                            </div>
                            <input type="number" name="price" value="{{ old('price', (isset($product) ? intval($product->price) : '')) }}" 
                                class="block w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm"
                                placeholder="50000" required>
                        </div>
                    </div>
                    
                    <!-- Deskripsi -->
                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Deskripsi Singkat <span class="text-red-500">*</span></label>
                        <textarea name="description" rows="4" 
                            class="block w-full p-4 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm"
                            placeholder="Detail produk, cara pengisian, jam operasional, dll..." required>{{ old('description', $product->description ?? '') }}</textarea>
                    </div>
                    
                    <!-- Gambar -->
                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Gambar Produk</label>
                        <div class="flex items-center gap-4">
                            @if(isset($product) && $product->image)
                                <div class="w-16 h-16 rounded-xl border-4 border-lumyena-light overflow-hidden shadow-sm shrink-0">
                                    <img src="{{ asset('images/products/' . $product->image) }}" class="w-full h-full object-cover" alt="Preview">
                                </div>
                            @else
                                <div class="w-16 h-16 rounded-xl border-4 border-dashed border-gray-200 bg-gray-50 flex items-center justify-center text-gray-400 shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="flex-grow">
                                <input type="file" name="image" accept="image/*"
                                    class="block w-full text-sm text-gray-500 font-bold file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-black file:bg-lumyena-light file:text-lumyena-primary hover:file:bg-pink-100 transition-all cursor-pointer">
                                <p class="text-xs font-bold text-gray-400 mt-1">Opsional: Format JPG/PNG, ukuran ideal 1:1, max 2MB.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Status Switcher -->
                    <div class="md:col-span-2 pt-2">
                        <label class="flex items-center gap-3 cursor-pointer p-4 rounded-xl border-2 border-gray-200 hover:border-lumyena-primary hover:bg-lumyena-light/50 transition-all">
                            <div class="relative">
                                <input type="checkbox" name="is_active" value="1" class="peer sr-only" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                                <div class="block w-14 h-8 bg-gray-300 rounded-full peer-checked:bg-green-500 transition-colors"></div>
                                <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition-transform peer-checked:translate-x-6 shadow-sm"></div>
                            </div>
                            <div>
                                <div class="font-extrabold text-gray-800">Status Aktif</div>
                                <div class="text-xs font-bold text-gray-500">Aktifkan agar produk ini ditampilkan pada katalog publik.</div>
                            </div>
                        </label>
                    </div>
                </div>

                <hr class="border-gray-100 border-2 rounded-full my-6">

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.products.index') }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-extrabold rounded-xl transition-all border-2 border-transparent">
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-3 bg-lumyena-primary hover:bg-lumyena-hover text-white font-black rounded-xl shadow-[0_4px_0_#FF1493] active:translate-y-1 active:shadow-none transition-all flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
