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
        return view(
            'public.articles.show',
            compact('article')
        );
    }
}