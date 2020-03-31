<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\User;

use App\Category;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $categories = Category::all();
        $articles = Article::latest()->get();
        return view('index', compact('articles', 'categories'));
    }

    public function create()
    {
        return view('articles.create', [
            'articles' => auth()->user()->articles,
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $this->validate(request(),[
            'title' => ['required', 'min:3', 'max:25'],
            'body' => ['required', 'min:3', 'max:255']
        ]);
        auth()->user()->publish(
            new Article(request(['category_id', 'title', 'body']))
        );
        return back();
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
