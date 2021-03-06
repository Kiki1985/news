<?php

namespace App\Providers;
use App\Events\CommentCreated;
use App\Listeners\SendCommentCreatedNotification;
use App\Events\ResponseCreated;
use App\Listeners\SendResponseCreatedNotification;
use App\Events\SubscriberRegistrated;
use App\Listeners\SendSubscriberRegistratedNotification;
use App\Events\ArticleCreated;
use App\Listeners\SendArticleCreatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ArticleCreated::class => [
            SendArticleCreatedNotification::class
        ],
        SubscriberRegistrated::class => [
            SendSubscriberRegistratedNotification::class
        ],
        CommentCreated::class => [
            SendCommentCreatedNotification::class
        ],
        ResponseCreated::class => [
            SendResponseCreatedNotification::class
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
