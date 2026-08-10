<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:articles,slug',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'content' => 'required',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')
            ->store('articles', 'public');
    }

    Article::create($data);

    return redirect()
        ->route('articles.index')
        ->with('success', 'Artikel berhasil ditambahkan.');
}

    public function show(Article $article)
{
    return view('articles.show', compact('article'));
}
    public function edit(Article $article)
{
    return view('articles.edit', compact('article'));
}

    public function update(Request $request, Article $article)
{
    $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:articles,slug,' . $article->id,
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'content' => 'required',
    ]);

    $data = $request->except('image');

    if ($request->hasFile('image')) {

        $data['image'] = $request->file('image')
            ->store('articles', 'public');
    }

    $article->update($data);

    return redirect()
        ->route('articles.show', $article)
        ->with('success', 'Artikel berhasil diperbarui.');
}

    public function destroy(Article $article)
{
    $article->delete();

    return redirect()
        ->route('articles.index')
        ->with('success', 'Artikel berhasil dihapus.');
}
}