<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PublicProductController extends Controller
{
    /**
     * Menampilkan katalog produk untuk pengunjung.
     */
    public function index()
    {
        $products = Product::latest()->get();

        return view(
            'public.products.index',
            compact('products')
        );
    }

    /**
     * Menampilkan detail produk untuk pengunjung.
     */
    public function show(Product $product)
    {
        return view(
            'public.products.show',
            compact('product')
        );
    }
}