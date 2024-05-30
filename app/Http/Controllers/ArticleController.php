<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::where('title', 'LIKE', "%{$query}%")->paginate(10);
        return view('articles.index', compact('articles'));
    }
}

