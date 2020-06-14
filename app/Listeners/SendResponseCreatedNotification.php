<?php

namespace App\Listeners;

use App\Jobs\SendResponseCreatedJob;

use App\Events\ResponseCreated;

class SendResponseCreatedNotification
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
    public function handle(ResponseCreated $event)
    {
        SendResponseCreatedJob::dispatch($event->response);
    }
}
