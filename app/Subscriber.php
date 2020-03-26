<?php

namespace App;

use App\Events\SubscriberRegistrated;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    protected $guarded = [];

    protected $dispatchesEvents = [
    	'created' =>SubscriberRegistrated::class
    ];
}

	
