<?php

namespace App;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

use App\Subscriber;

use App\Events\ArticleCreated;

use Carbon\Carbon;

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
            'body' => $article->body,
            'image' => $article->image->getClientOriginalName()
        ]);
        
        $filename = $article->image->getClientOriginalName();
        $article->image->storeAs('images', $filename, 'public');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id');
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

    public function scopeFilter($query, $filters)
    {
        if (isset($filters["month"])) {
            $query->whereMonth('created_at', Carbon::parse($filters['month'])->month);
        }

        if (isset($filters["year"])) {
            $query->whereYear('created_at', $filters['year']);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
