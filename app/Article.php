<?php

namespace App;

use Illuminate\Support\Str;

use App\Subscriber;

use App\Events\ArticleCreated;

class Article extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
    	parent::boot();
        static::created(function($article){
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
        if(Category::all()->isEmpty())
        {
            foreach($categories as $category)
            {
                Category::create([ 
                    "name" => $category
                ]);
            }
        }
    }
}
