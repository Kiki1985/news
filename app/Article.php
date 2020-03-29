<?php

namespace App;

use App\Subscriber;

use App\Events\ArticleCreated;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $guarded = [];
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

    public static function category($category)
    {
        return static::where('category', $category)->get();
    }
}
