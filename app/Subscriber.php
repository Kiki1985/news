<?php

namespace App;

use App\Events\SubscriberRegistrated;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
    	parent::boot();
        static::created(function($subscriber){
            event(new SubscriberRegistrated($subscriber));
    	});
    }
}

	
