<?php

namespace App\Http\Controllers;

use App\Models\Article;

class PublicArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view(
            'public.articles.index',
            compact('articles')
        );
    }

    public function show(Article $article)
    {
        // Artikel lain untuk sidebar "Artikel Terbaru" dan
        // section "Artikel Terkait" di bagian bawah halaman.
        // Diambil dari data asli di database, artikel yang sedang
        // dibuka tidak diikutsertakan.
        $relatedArticles = Article::where('id', '!=', $article->id)
            ->latest()
            ->take(6)
            ->get();

        return view(
            'public.articles.show',
            compact('article', 'relatedArticles')
        );
    }
}