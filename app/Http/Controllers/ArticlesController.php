<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

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
        $categories = ['sport', 'politic', 'economy'];
        if(Category::all()->isEmpty())
        {
            foreach($categories as $categ)
            {
                Category::create([ 
                    "name" => $categ
                ]);
            }
        }
    
        $category = (object)array("name"=>"news");
        $articles = Article::latest()->get();
        return view('index', compact('articles', 'category'));
    }

    public function create()
    {
        return view('articles.create', [
            'articles' => Article::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get(), 
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        request()->validate([
            'title' => 'required|min:3|max:25',
            'body' => 'required|min:3|max:25'
        ]);

        auth()->user()->publish(
            new Article(request(['title', 'body', 'category']))
        );
        
        return back();
    }
    
    public function show($category, Article $article)
    {
        return view('articles.show', compact('article', 'category'));
    }

    public function destroy($category, Article $article)
    {
        $article->categories()->detach();
        $article->delete();
        return redirect('/');
    }

    public function edit($category, Article $article)
    {
        $categories = Category::all();
        return view('articles.edit', compact('article', 'category', 'categories'));
    }

    public function update($category, Article $article, Request $request)
    {
        request()->validate([
            'title' => 'required|min:3|max:25',
            'body' => 'required|min:3|max:25'
        ]);

        $article->categories()->detach();

        $article->update([
            'title' => Str::slug($request->title), 
            'body' => $request->body
        ]);

        $article->categories()->attach($request->category);

        return redirect('/');
    }
}