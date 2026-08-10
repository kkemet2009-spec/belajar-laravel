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

        return view('home', compact('products', 'articles'));
    }
}