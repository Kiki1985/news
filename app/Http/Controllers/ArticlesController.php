<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticlesController extends Controller
{
    public function index()
    {
        $categories = [
            'sport',
            'economy',
            'politic'
        ];
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('index', compact('articles', 'categories'));
    }

    public function create()
    {
        return view('articles.create', [
            'articles' => auth()->user()->articles
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:3']
        ]);

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
        $categories = [
            'sport',
            'economy',
            'politic'
        ];
        $article = Article::findOrfail($id);
        return view('articles.show', compact('article', 'categories'));
    }
}
