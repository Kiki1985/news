<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\Category;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index() 
    {
        $articles = Article::latest()->get();
        return view('index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create', [
            'articles' => auth()->user()->articles,
            'categories' =>['sport', 'politic', 'economy']
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => ['required', 'min:3', 'max:25'],
            'body' => ['required', 'min:3', 'max:255']
        ]);

        auth()->user()->publish(
            new Article(request(['title', 'body', 'category']))
        );
        
        return back();
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}