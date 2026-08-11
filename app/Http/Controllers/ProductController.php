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
        $products =Product::latest()->paginate(10);

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
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    // Buat slug dasar dari nama produk
    $baseSlug = \Illuminate\Support\Str::slug($request->name);
    $slug = $baseSlug;

    // Cek apakah slug sudah digunakan
    $counter = 1;

    while (\App\Models\Product::where('slug', $slug)->exists()) {
        $slug = $baseSlug . '-' . $counter;
        $counter++;
    }

    // Upload gambar
    $imagePath = null;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    // Simpan produk
    \App\Models\Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
        'slug' => $slug,
        'image' => $imagePath,
    ]);

    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil ditambahkan!');
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
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $data = [
        'name' => $request->name,
        'price' => $request->price,
        'stock' => $request->stock,
        'description' => $request->description,
    ];

    /*
    |--------------------------------------------------------------------------
    | Jika nama produk berubah, buat slug baru yang unik
    |--------------------------------------------------------------------------
    */

    $baseSlug = \Illuminate\Support\Str::slug($request->name);
    $slug = $baseSlug;
    $counter = 1;

    while (
        \App\Models\Product::where('slug', $slug)
            ->where('id', '!=', $product->id)
            ->exists()
    ) {
        $slug = $baseSlug . '-' . $counter;
        $counter++;
    }

    $data['slug'] = $slug;


    /*
    |--------------------------------------------------------------------------
    | Upload gambar baru
    |--------------------------------------------------------------------------
    */

    if ($request->hasFile('image')) {

        // Hapus gambar lama
        if (
            $product->image &&
            \Illuminate\Support\Facades\Storage::disk('public')->exists($product->image)
        ) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($product->image);
        }

        // Simpan gambar baru
        $data['image'] = $request->file('image')->store(
            'products',
            'public'
        );
    }


    $product->update($data);


    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil diperbarui!');
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