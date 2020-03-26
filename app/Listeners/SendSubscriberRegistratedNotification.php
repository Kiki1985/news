<?php

namespace App\Listeners;

use App\Events\SubscriberRegistrated;

use App\Jobs\SendSubscriberRegistratedEmailJob;

class SendSubscriberRegistratedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SubscriberRegistrated $event)
    {
        SendSubscriberRegistratedEmailJob::dispatch($event->subscriber);
    }
}
