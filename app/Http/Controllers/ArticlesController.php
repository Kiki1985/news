<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\Article;

use App\Category;

class ArticlesController extends Controller
{
    public function index(Article $article)
    {
        $categories = ['sport', 'politic', 'economy', 'world'];
        $article->addCategory($categories);
    
        $category = (object)array("name"=>"news");

        $articles = Article::latest()
            ->filter(request(['month', 'year']))
            ->get();

        return view('index', compact('articles', 'category'));
    }

    public function create()
    {
        abort_unless(auth()->user(), 403);
        
        return view('articles.create', [
            'articles' => auth()->user()->articles,
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $title = Str::slug($request->title);
        
        if (Article::where('title', $title)->exists()) {
            return back()->with('message', 'This title already exists.');
        } else {
            auth()->user()->publish(
                new Article($this->validateArticle())
            );
            return back()->with('message', 'The article is successfully stored.');
        }
    }
    
    public function show($category, Article $article)
    {
        return view('articles.show', compact('article', 'category'));
    }

    public function destroy($category, Article $article)
    {
        $this->authorize('update', $article);
        $article->categories()->detach();
        $article->delete();
        return redirect('/');
    }

    public function edit($category, Article $article)
    {
        $this->authorize('update', $article);

        $categories = Category::all();
        return view('articles.edit', compact('article', 'category', 'categories'));
    }

    public function update($category, Article $article, Request $request)
    {
        $this->authorize('update', $article);

        $article->categories()->detach();
        $article->edit(
            new Article($this->validateArticle())
        );
        $article->categories()->attach($request->category);
        return redirect('/');
    }

    protected function validateArticle()
    {
        return request()->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:3|max:2555',
            'category' => 'required'
            ]);
    }
}
