<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Mail\SubscriberRegistrated;

class Subscriber extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
    	parent::boot();

    	static::created(function($subscriber){
        	\Mail::to($subscriber->email)->send(
        		new SubscriberRegistrated($subscriber)
        	);
    	});
    }
}

	
