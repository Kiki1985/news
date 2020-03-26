<?php

namespace App\Jobs;

use App\Jobs\SendEmailArticleCreatedJob;
use App\Mail\SubscriberRegistrated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendSubscriberRegistratedEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscriber;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Mail::to($this->subscriber->email)->send(
            new SubscriberRegistrated($this->subscriber)
        );
    }
}
