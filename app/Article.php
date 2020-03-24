<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Subscriber;

use App\Mail\ArticleCreated;

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
    		foreach($subscribers as $subscriber){
        		\Mail::to($subscriber->email)->send(
            		new ArticleCreated($article)
        		);
        	}
    	});
    }
}
