<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Jobs\SendSubscriberRegistratedEmailJob;

class Subscriber extends Model
{
    protected $guarded = [];

    protected static function boot()
    {
    	parent::boot();
        static::created(function($subscriber){
            SendSubscriberRegistratedEmailJob::dispatch($subscriber);
    	});
    }
}

	
