<?php

namespace App\Listeners;

use App\Mail\CommentCreated as CommentCreatedMail;

use App\Events\CommentCreated;

use Illuminate\Support\Facades\Mail;

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
        Mail::to($event->comment->article->user->email)->send(
            new CommentCreatedMail($event->comment)
        );
    }
}
