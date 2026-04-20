@extends('admin.layout')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h1 class="text-3xl font-black text-lumyena-primary drop-shadow-sm mb-1">Manajemen Produk 🛍️</h1>
        <p class="text-sm font-bold text-lumyena-muted">Kelola seluruh produk, harga, dan ketersediaan jualan Anda di sini.</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-white bg-lumyena-primary border-4 border-lumyena-hover py-2 px-6 rounded-xl shadow-[0_4px_0_#FF1493] active:translate-y-1 active:shadow-none transition-all hover:bg-lumyena-hover">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
        Tambah Baru
    </a>
</div>

<div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-lumyena-light/80 border-b-4 border-lumyena-secondary">
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs whitespace-nowrap">ID</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs whitespace-nowrap">Gambar</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs whitespace-nowrap">Nama Produk</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs whitespace-nowrap">Kategori</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs whitespace-nowrap">Harga</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs whitespace-nowrap text-center">Status</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs whitespace-nowrap text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="border-b-2 border-lumyena-border hover:bg-lumyena-light/30 transition-colors">
                    <td class="p-4 text-sm font-extrabold text-lumyena-muted">#{{ $product->id }}</td>
                    <td class="p-4">
                        @if($product->image)
                            <div class="w-16 h-16 rounded-xl border-2 border-lumyena-border overflow-hidden shadow-sm">
                                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            </div>
                        @else
                            <div class="w-16 h-16 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center text-xs text-gray-400 font-bold bg-gray-50">
                                No Img
                            </div>
                        @endif
                    </td>
                    <td class="p-4 font-extrabold text-lumyena-text">{{ $product->name }}</td>
                    <td class="p-4 text-sm font-bold text-lumyena-muted">
                        <span class="bg-gray-100 text-gray-600 border border-gray-200 px-3 py-1 rounded-full whitespace-nowrap">
                            {{ $product->category->name ?? 'Tanpa Kategori' }}
                        </span>
                    </td>
                    <td class="p-4 font-black text-green-500 whitespace-nowrap">{{ $product->formatted_price }}</td>
                    <td class="p-4 text-center">
                        @if($product->is_active)
                            <span class="inline-block px-3 py-1 bg-green-100 text-green-700 border-2 border-green-300 text-xs font-black rounded-full shadow-sm">AKTIF</span>
                        @else
                            <span class="inline-block px-3 py-1 bg-gray-100 text-gray-500 border-2 border-gray-300 text-xs font-black rounded-full shadow-sm">MATI</span>
                        @endif
                    </td>
                    <td class="p-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.products.variations.index', $product->id) }}" class="p-2 border-2 border-purple-400 bg-white text-purple-500 rounded-lg hover:bg-purple-500 hover:text-white hover:shadow-[0_2px_0_#9333ea] transition-all transform hover:-translate-y-0.5 group" title="Kelola Variasi">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </a>
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="p-2 border-2 border-[#00d2d3] bg-white text-[#00d2d3] rounded-lg hover:bg-[#00d2d3] hover:text-white hover:shadow-[0_2px_0_#0abde3] transition-all transform hover:-translate-y-0.5 group" title="Edit Data">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Anda yakin menghapus produk ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 border-2 border-red-400 bg-white text-red-500 rounded-lg hover:bg-red-500 hover:text-white hover:shadow-[0_2px_0_#b91c1c] transition-all transform hover:-translate-y-0.5" title="Hapus Produk">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-12 text-center text-lumyena-muted">
                        <div class="text-4xl mb-3 opacity-50">📭</div>
                        <p class="font-extrabold text-lg">Belum ada satupun produk yang ditambahkan.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
