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
        $category = (object)array("name"=>"news");
        $articles = Article::latest()->get();
        return view('index', compact('articles', 'category'));
    }

    public function create()
    {
        return view('articles.create', [
            'articles' => Article::where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->get(), 
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
    
    public function show($category, Article $article)
    {
        return view('articles.show', compact('article', 'category'));
    }

    public function destroy($category, Article $article)
    {
        $article->categories()->detach();
        $article->delete();
        return back();
    }

    public function edit($category, Article $article)
    {
        $categories = ['sport', 'politic', 'economy'];
        return view('articles.edit', compact('article', 'category', 'categories'));
    }



    public function update($category, Article $article, Request $request)
    {
        $this->validate(request(),[
            'title' => ['required', 'min:3', 'max:25'],
            'body' => ['required', 'min:3', 'max:255']
        ]);
        
        if(request('category') == $article->categories)
        {
            $article->title = Str::slug(request('title'));
            $article->body = request('body');
            $article->save();

        }else{

        $article->categories()->detach();
        $name = Category::where('name', request('category'))->value('id');
        
            if(is_null($name))
            {
                $category = Category::create([ 
                    "name" => request('category')
                ]);
                $name = $category->id;
            }

        $article->title = Str::slug(request('title'));
        $article->body = request('body');
        $article->save();

        $article->categories()->attach($name);

        }
        return redirect('articles/create');
    }
}