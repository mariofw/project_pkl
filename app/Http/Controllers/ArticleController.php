<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Menampilkan semua artikel
    public function index()
    {
        $articles = Article::all(); // Mengambil semua artikel
        return view('admin.articles.index', compact('articles'));
    }

    // Menampilkan form untuk menambah artikel baru
    public function create()
    {
        return view('admin.articles.create');
    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Article::create($request->all()); // Menyimpan artikel baru ke database

        return redirect()->route('articles.index'); // Mengarahkan kembali ke daftar artikel
    }

    // Menampilkan form untuk mengedit artikel
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    // Mengupdate artikel
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article->update($request->all()); // Mengupdate artikel yang ada

        return redirect()->route('articles.index'); // Mengarahkan kembali ke daftar artikel
    }

    // Menghapus artikel
    public function destroy(Article $article)
    {
        $article->delete(); // Menghapus artikel

        return redirect()->route('articles.index'); // Mengarahkan kembali ke daftar artikel
    }
}
