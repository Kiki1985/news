<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Subscriber;

use App\Jobs\SendArticleCreatedJob;

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
            SendArticleCreatedJob::dispatch($article, $subscribers);
        });
    }
}
