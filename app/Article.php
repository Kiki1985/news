<?php

namespace App;

use App\Subscriber;

use App\Events\ArticleCreated;

class Article extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function boot()
    {
    	parent::boot();
        static::created(function($article){
        	$subscribers = Subscriber::all();
            event(new ArticleCreated($article, $subscribers));
    	});
    }
}
