<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

use App\User;

use App\Category;

use App\Tag;

use App\DB;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index() 
    {
        $tags = Tag::all();
        $categories = Category::all();
        $articles = Article::latest()->get();
        return view('index', compact('articles', 'categories', 'tags'));
    }

    public function create()
    {
        return view('articles.create', [
            'articles' => auth()->user()->articles,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->input("tag_id");
        $this->validate(request(),[
            'title' => ['required', 'min:3', 'max:25'],
            'body' => ['required', 'min:3', 'max:255']
        ]);
        /*auth()->user()->publish(
            new Article(request(['title', 'body']))
        );*/

        $article = new Article;
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->user_id = auth()->user()->id;
        $article->save();

        \DB::table('article_tag')->insert(
                ['article_id' => $article->id, 
                'tag_id' => $input]
            );

        return back();
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }
}
