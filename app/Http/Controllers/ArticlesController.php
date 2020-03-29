<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\User;

use App\Category;

class ArticlesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $articles = Article::orderBy('created_at', 'desc')->get();
        return view('index', compact('articles', 'categories'));
    }

    public function create()
    {
        return view('articles.create', [
            'articles' => auth()->user()->articles
        ]);
    }

    public function store(User $user)
    {
        $user->addArticle(request('category'), request('title'), request('body'));
        return back();
    }

    public function show($category, $id)
    {
        $article = Article::findOrfail($id);
        return view('articles.show', compact('article'));
    }
}
