<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Menampilkan semua artikel
     */
    public function index()
    {
        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * Form tambah artikel
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Menyimpan artikel baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content' => 'required|string',
        ]);

        // Upload gambar
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('articles', 'public');
        }

        Article::create($validated);

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail artikel
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Form edit artikel
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update artikel
     */
    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug,' . $article->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content' => 'required|string',
        ]);

        // Kalau upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }

            // Simpan gambar baru
            $validated['image'] = $request->file('image')
                ->store('articles', 'public');
        } else {
            // Jangan mengubah gambar lama
            unset($validated['image']);
        }

        $article->update($validated);

        return redirect()
            ->route('articles.show', $article)
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    /**
     * Hapus artikel
     */
    public function destroy(Article $article)
    {
        // Hapus gambar
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()
            ->route('articles.index')
            ->with('success', 'Artikel berhasil dihapus.');
    }
}