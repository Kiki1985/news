<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Subscriber;

use App\Mail\ArticleCreated;

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
        $articles = Article::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('article.create', compact('articles'));
    }

    public function store()
    {
        $subscribers = Subscriber::all();
        request()->validate([
            'title' => ['required', 'min:3'],
            'body' => ['required', 'min:3']
        ]);
        $article =Article::create([
            'category' => request('category'),
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->user()->id
        ]);

        foreach($subscribers as $subscriber)
        {
        \Mail::to($subscriber->email)->send(
            new ArticleCreated($article)
        );
        }
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
