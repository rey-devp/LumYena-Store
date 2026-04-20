@extends('admin.layout')

@section('content')
    <div style="margin-bottom: 20px;">
        <h1 style="color: #FF69B4;">{{ isset($product) ? 'Edit' : 'Tambah' }} Produk</h1>
        <a href="{{ route('admin.products.index') }}" style="color: #FF69B4; text-decoration: none;">&larr; Kembali</a>
    </div>

    <div class="admin-card">
        <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($product)) @method('PUT') @endif
            
            <label>Kategori</label>
            <select name="category_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ (old('category_id', $product->category_id ?? '') == $cat->id) ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>

            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
            
            <label>Harga (contoh: 50000)</label>
            <input type="number" name="price" class="form-control" value="{{ old('price', (isset($product) ? intval($product->price) : '')) }}" required>
            
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description ?? '') }}</textarea>

            <div style="margin-top: 10px; margin-bottom: 15px;">
                <label>
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
                    Produk Aktif (Tampilkan di Katalog)
                </label>
            </div>
            
            <label>Gambar Produk (Opsional)</label>
            <input type="file" name="image" class="form-control" accept="image/*">
            @if(isset($product) && $product->image)
                <div style="margin-top: 10px; margin-bottom: 15px;">
                    <img src="{{ asset('images/products/' . $product->image) }}" alt="Preview" style="max-height: 100px;">
                </div>
            @endif

            <button type="submit" class="btn-admin mt-3">Simpan Produk</button>
        </form>
    </div>
@endsection
