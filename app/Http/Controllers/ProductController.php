<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Menampilkan semua produk
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view('products.index', compact('products'));
    }

    /**
     * Menampilkan form tambah produk
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Menyimpan produk baru
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'slug' => 'required|unique:products,slug',
        'price' => 'required|numeric',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'description' => 'nullable',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    Product::create($data);

    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan.');
}

    /**
     * Menampilkan detail produk
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Menampilkan form edit produk
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Mengupdate produk
     */
    public function update(Request $request, Product $product)
{
    $request->validate([
        'name' => 'required|max:255',
        'slug' => 'required|unique:products,slug,' . $product->id,
        'price' => 'required|numeric',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'description' => 'nullable',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {

        // Hapus foto lama
        if ($product->image) {
            \Storage::disk('public')->delete($product->image);
        }

        // Simpan foto baru
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);

    return redirect()
        ->route('products.show', $product)
        ->with('success', 'Produk berhasil diperbarui.');
}

    /**
     * Menghapus produk
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}