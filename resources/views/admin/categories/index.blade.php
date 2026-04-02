@extends('admin.layout')

@section('content')
<div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
    <div>
        <h1 class="text-3xl font-black text-lumyena-primary drop-shadow-sm mb-1">Kategori Produk 📁</h1>
        <p class="text-sm font-bold text-lumyena-muted">Buat ruang penampung tipe produk agar rapi di Homepage.</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 text-sm font-extrabold text-[#00d2d3] hover:text-white hover:bg-[#00d2d3] border-4 border-[#00d2d3] py-2 px-6 rounded-xl shadow-[0_4px_0_#0abde3] active:translate-y-1 active:shadow-none transition-all cursor-pointer">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4"></path></svg>
        Kategori Baru
    </a>
</div>

<div class="bg-white rounded-3xl border-4 border-lumyena-secondary shadow-[0_8px_0_#FFC0CB] overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-lumyena-light/80 border-b-4 border-lumyena-secondary">
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs">ID</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs">Ikon / Emoji</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs">Nama Kategori</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs">Slug (URL)</th>
                    <th class="p-4 font-black text-lumyena-primary uppercase tracking-wider text-xs text-center">Aksi Manajemen</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                <tr class="border-b-2 border-lumyena-border hover:bg-lumyena-light/30 transition-colors">
                    <td class="p-4 text-sm font-extrabold text-lumyena-muted w-16">#{{ $cat->id }}</td>
                    <td class="p-4 text-2xl drop-shadow-sm">{{ $cat->icon ?? '📦' }}</td>
                    <td class="p-4 font-extrabold text-lumyena-text">{{ $cat->name }}</td>
                    <td class="p-4 text-sm font-bold text-lumyena-muted font-mono bg-gray-50 px-2 rounded">{{ $cat->slug }}</td>
                    <td class="p-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <a href="{{ route('admin.categories.edit', $cat->id) }}" class="px-3 py-1 border-2 border-orange-400 bg-orange-50 text-orange-600 rounded-lg hover:bg-orange-500 hover:text-white font-bold transition-all transform hover:-translate-y-0.5 text-xs shadow-sm shadow-orange-200">
                                Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Awas! Kategori dihapus berarti produk di dalamnya mendadak hilang kategorinya!')" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 border-2 border-red-400 bg-red-50 text-red-600 rounded-lg hover:bg-red-500 hover:text-white font-bold transition-all transform hover:-translate-y-0.5 text-xs shadow-sm shadow-red-200">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-10 text-center text-lumyena-muted">
                        <div class="text-4xl mb-3 opacity-50">📂</div>
                        <p class="font-extrabold text-lg">Anda belum memiliki folder kategori di Admin Panel.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
