@extends('admin.layout')

@section('content')
    <div style="margin-bottom: 20px;">
        <h1 style="color: #FF69B4;">{{ isset($category) ? 'Edit' : 'Tambah' }} Kategori</h1>
        <a href="{{ route('admin.categories.index') }}" style="color: #FF69B4; text-decoration: none;">&larr; Kembali</a>
    </div>

    <div class="admin-card">
        <form action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}" method="POST">
            @csrf
            @if(isset($category)) @method('PUT') @endif
            
            <label>Nama Kategori</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $category->name ?? '') }}" required>
            
            <label>Icon (Emoji / Text)</label>
            <input type="text" name="icon" class="form-control" value="{{ old('icon', $category->icon ?? '') }}">
            
            <button type="submit" class="btn-admin mt-3">Simpan Data</button>
        </form>
    </div>
@endsection
