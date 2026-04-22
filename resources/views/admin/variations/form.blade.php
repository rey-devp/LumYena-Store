@extends('admin.layout')

@section('content')
    <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-3 mb-1">
                <a href="{{ route('admin.products.variations.index', $product->id) }}" class="p-2 bg-white rounded-xl border-2 border-lumyena-border hover:bg-lumyena-light text-lumyena-primary transition-all shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </a>
                <h1 class="text-3xl font-black text-lumyena-primary drop-shadow-sm">{{ isset($variation) ? 'Edit Variasi' : 'Variasi Baru' }} ✨</h1>
            </div>
            <p class="text-sm font-bold text-lumyena-muted ml-12">Mengelola variasi harga/item untuk produk <span class="text-lumyena-primary">{{ $product->name }}</span>.</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] overflow-hidden max-w-3xl">
        <div class="p-6 sm:p-8">
            <form action="{{ isset($variation) ? route('admin.products.variations.update', [$product->id, $variation->id]) : route('admin.products.variations.store', $product->id) }}" method="POST" class="space-y-6">
                @csrf
                @if(isset($variation)) @method('PUT') @endif
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nama Variasi -->
                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Nama Variasi <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                            </div>
                            <input type="text" name="name" value="{{ old('name', $variation->name ?? '') }}" 
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm"
                                placeholder="Contoh: 50 Diamonds" required>
                        </div>
                    </div>

                    <!-- Harga -->
                    <div class="space-y-2">
                        <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Harga (Rp) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-gray-400 font-bold">Rp</span>
                            </div>
                            <input type="number" name="price" value="{{ old('price', (isset($variation) ? intval($variation->price) : '')) }}" 
                                class="block w-full pl-12 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm"
                                placeholder="15000" required>
                        </div>
                    </div>

                    <!-- Grup -->
                    <div class="space-y-2">
                        <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Grup Variasi</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <input type="text" name="group" value="{{ old('group', $variation->group ?? '') }}" 
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm"
                                placeholder="Contoh: Membership">
                        </div>
                        <p class="text-xs font-bold text-gray-400 mt-1">Opsional: Biarkan kosong jika tidak ada grup.</p>
                    </div>
                    
                    <!-- Urutan -->
                    <div class="space-y-2 md:col-span-2">
                        <label class="block text-sm font-black text-lumyena-primary uppercase tracking-wider">Urutan Penampilan</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4h13M3 8h9m-9 4h6m4 0l4-4m0 0l4 4m-4-4v12"></path></svg>
                            </div>
                            <input type="number" name="order" value="{{ old('order', $variation->order ?? 0) }}" 
                                class="block w-full pl-11 pr-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-gray-800 font-bold focus:bg-white focus:outline-none focus:border-lumyena-primary focus:ring-4 focus:ring-lumyena-primary/20 transition-all shadow-sm">
                        </div>
                        <p class="text-xs font-bold text-gray-400 mt-1">Angka terkecil (0) akan tampil paling awal/atas.</p>
                    </div>
                </div>
                
                <hr class="border-gray-100 border-2 rounded-full my-6">

                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.products.variations.index', $product->id) }}" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-600 font-extrabold rounded-xl transition-all border-2 border-transparent">
                        Batal
                    </a>
                    <button type="submit" class="px-8 py-3 bg-lumyena-primary hover:bg-lumyena-hover text-white font-black rounded-xl shadow-[0_4px_0_#FF1493] active:translate-y-1 active:shadow-none transition-all flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        Simpan Variasi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
