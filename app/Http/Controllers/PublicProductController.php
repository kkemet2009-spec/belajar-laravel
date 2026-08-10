<?php

namespace App\Http\Controllers;

use App\Models\Product;

class PublicProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();

        return view('public.products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('public.products.show', compact('product'));
    }
}