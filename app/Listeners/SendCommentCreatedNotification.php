<?php

namespace App\Listeners;

use App\Jobs\SendCommentCreatedJob;

use App\Events\CommentCreated;

use Carbon\Carbon;

class SendCommentCreatedNotification
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
    public function handle(CommentCreated $event)
    {
        SendCommentCreatedJob::dispatch($event->comment)
            ->delay(Carbon::now()->addSeconds(10));
    }
}
