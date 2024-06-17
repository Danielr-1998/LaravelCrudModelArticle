<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
    $articles = Article::with('user')->paginate(10); // Incluye el usuario asociado con el artículo
  
        return view('articles.index', compact('articles'));
    }

    public function create()
    {

        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

           Article::create($validated + ['user_id' => 1]);

        return redirect()->route('articles.index');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
    	$user = $article->user; // Obtener el usuario relacionado

        return view('articles.edit', compact('article', 'user'));
    }

    public function update(Request $request, Article $article)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $article->update($validated);
        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }
}

