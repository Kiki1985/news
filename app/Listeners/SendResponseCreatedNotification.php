<?php

namespace App\Listeners;

use App\Mail\ResponseCreated as ResponseCreatedMail;

use App\Events\ResponseCreated;

use Illuminate\Support\Facades\Mail;

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
        Mail::to($event->response->comment->user->email)->send(
            new ResponseCreatedMail($event->response)
        );

        Mail::to($event->response->comment->article->user->email)->send(
            new ResponseCreatedMail($event->response)
        );
    }
}
