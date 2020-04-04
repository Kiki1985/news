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

        /*$article = Article::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        $category = $request->input("category");
        
        if(Category::where('name', $category)->exists())
        {
            $categoryId = Category::where('name', $category)->value('id');
        }else{
            $category = Category::create([ "name" => $category]);
            $categoryId = $category->id;
        }

        $article->categories()->attach($categoryId);*/
       
        return back();
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}