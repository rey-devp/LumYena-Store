@extends('admin.layout')

@section('content')
<div style="margin-bottom: 20px;">
    <h1 style="color: #FF69B4;">{{ isset($variation) ? 'Edit' : 'Tambah' }} Variasi: {{ $product->name }}</h1>
    <a href="{{ route('admin.products.variations.index', $product->id) }}" style="color: #FF69B4; text-decoration: none;">&larr; Kembali</a>
</div>

<div class="admin-card">
    <form action="{{ isset($variation) ? route('admin.products.variations.update', [$product->id, $variation->id]) : route('admin.products.variations.store', $product->id) }}" method="POST">
        @csrf
        @if(isset($variation)) @method('PUT') @endif
        
        <label>Nama Variasi (contoh: 50 Diamonds)</label>
        <input type="text" name="name" class="form-control" value="{{ old('name', $variation->name ?? '') }}" required>
        
        <label>Harga (contoh: 15000)</label>
        <input type="number" name="price" class="form-control" value="{{ old('price', (isset($variation) ? intval($variation->price) : '')) }}" required>
        
        <label>Grup (Opsional - Contoh: "Membership", "Top Up")</label>
        <input type="text" name="group" class="form-control" value="{{ old('group', $variation->group ?? '') }}">
        
        <label>Urutan Penampilan (Tipe Angka: 0, 1, 2...)</label>
        <input type="number" name="order" class="form-control" value="{{ old('order', $variation->order ?? 0) }}">
        
        <button type="submit" class="btn-admin mt-3">Simpan Variasi</button>
    </form>
</div>
@endsection
