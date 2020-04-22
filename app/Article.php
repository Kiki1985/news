<?php

namespace App;

use Illuminate\Support\Str;

use App\Subscriber;

use App\Events\ArticleCreated;

class Article extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    protected static function boot()
    {
        parent::boot();
        static::created(function ($article) {
            $subscribers = Subscriber::all();
            event(new ArticleCreated($article, $subscribers));
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function addCategory($categories)
    {
        foreach ($categories as $category) {
            if (!(Category::where('name', $category)->exists())) {
                Category::create([
                    "name" => $category
                ]);
            }
        }
    }

    public function edit(Article $article)
    {
        Article::update([
            'title' => Str::slug($article->title),
            'body' => $article->body
        ]);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
        //$this->comments()->create(compact('body'));
        Comment::create([
            'body'=>request('body'),
            'author_id' => auth()->user()->id,
            'article_id' => $this->id
        ]);
    }
}
