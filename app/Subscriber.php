<?php

namespace App;

use App\Events\SubscriberRegistrated;

class Subscriber extends Model
{

    protected $dispatchesEvents = [
        'created' =>SubscriberRegistrated::class
    ];
}
