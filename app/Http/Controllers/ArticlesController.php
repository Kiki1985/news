<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\Tag;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index() 
    {
        $tags = Tag::all();
        $articles = Article::latest()->get();
        return view('index', compact('articles', 'tags'));
    }

    public function create()
    {
        return view('articles.create', [
            'articles' => auth()->user()->articles,
            'options' =>['sport', 'politic', 'economy']
        ]);
    }

    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => ['required', 'min:3', 'max:25'],
            'body' => ['required', 'min:3', 'max:255']
        ]);

        $article = Article::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        $tag = $request->input("tag");
        
        if(Tag::where('name', $tag)->exists())
        {
            $tagId = Tag::where('name', $tag)->value('id');
        }else{
            $tag = Tag::create([ "name" => $tag]);
            $tagId = $tag->id;
        }

        $article->tags()->attach($tagId);
       
        return back();
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
