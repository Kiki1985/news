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
        foreach($categories as $category)
        {
            //$categ = Category::where('name', $category)->first();
            if(!(Category::where('name', $category)->exists()))
            {
                Category::create([ 
                    "name" => $category
                ]);
            }
        }
    }
}
