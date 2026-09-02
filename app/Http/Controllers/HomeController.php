<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(4)->get();

        $articles = Article::latest()->take(3)->get();

        // ================================================================
        // DATA UNTUK HERO SLIDER (BARU)
        // ------------------------------------------------------------------
        // Diambil terpisah dari $products di atas supaya query & jumlah
        // produk yang tampil di section "Featured Collection" tidak berubah
        // sedikit pun. Prioritaskan produk yang punya gambar, maksimal 6
        // (sesuai kebutuhan slider: minimal 4-6 gambar).
        // ================================================================

        $heroProducts = Product::whereNotNull('image')
            ->where('image', '!=', '')
            ->latest()
            ->take(6)
            ->get();

        // Fallback: kalau belum ada produk yang punya gambar sama sekali,
        // pakai $products yang sudah diambil di atas (tidak query ulang).
        if ($heroProducts->isEmpty()) {
            $heroProducts = $products;
        }

        return view('home', compact('products', 'articles', 'heroProducts'));
    }
}