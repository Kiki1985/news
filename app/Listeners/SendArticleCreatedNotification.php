<?php

namespace App\Listeners;

use App\Events\ArticleCreated;

use App\Jobs\SendArticleCreatedJob;

class SendArticleCreatedNotification
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
    public function handle(ArticleCreated $event)
    {
        SendArticleCreatedJob::dispatch($event->article, $event->subscribers);
    }
}
