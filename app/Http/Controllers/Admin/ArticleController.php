<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        $blogSection = Section::where('name', 'blog')->first();
        return view('admin.articles.index', compact('articles', 'blogSection'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
            'type' => 'required|in:standard,activity',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'link' => $request->link,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.articles.index')
                        ->with('success','Article created successfully.');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit',compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'nullable|url',
            'type' => 'required|in:standard,activity',
        ]);

        $imageName = $article->image;
        if ($request->hasFile('image')) {
            if ($imageName) {
                Storage::delete('public/images/' . $imageName);
            }
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName,
            'link' => $request->link,
            'type' => $request->type,
        ]);

        return redirect()->route('admin.articles.index')
                        ->with('success','Article updated successfully');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::delete('public/images/' . $article->image);
        }
        $article->delete();

        return redirect()->route('admin.articles.index')
                        ->with('success','Article deleted successfully');
    }
}
