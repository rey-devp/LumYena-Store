<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariation;
use Illuminate\Http\Request;

class VariationController extends Controller
{
    public function index(Product $product)
    {
        $variations = $product->variations;
        return view('admin.variations.index', compact('product', 'variations'));
    }

    public function create(Product $product)
    {
        return view('admin.variations.form', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'group' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
        ]);

        $product->variations()->create($request->all());

        return redirect()->route('admin.products.variations.index', $product->id)->with('success', 'Variasi berhasil ditambahkan!');
    }

    public function edit(Product $product, ProductVariation $variation)
    {
        return view('admin.variations.form', compact('product', 'variation'));
    }

    public function update(Request $request, Product $product, ProductVariation $variation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'group' => 'nullable|string|max:255',
            'order' => 'integer|min:0',
        ]);

        $variation->update($request->all());

        return redirect()->route('admin.products.variations.index', $product->id)->with('success', 'Variasi berhasil diupdate!');
    }

    public function destroy(Product $product, ProductVariation $variation)
    {
        $variation->delete();
        return redirect()->route('admin.products.variations.index', $product->id)->with('success', 'Variasi dihapus.');
    }
}
