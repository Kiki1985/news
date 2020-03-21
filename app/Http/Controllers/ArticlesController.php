<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('index', compact('articles'));
    }

    public function create()
    {
        $articles = Article::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('article.create', compact('articles'));
    }

    public function store()
    {
        Article::create([
            'category' => request('category'),
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->user()->id
        ]);
        return back();
    }

    public function show($category, $id)
    {
        $article = Article::findOrfail($id);
        return view('articles.show', compact('article'));
    }
}
