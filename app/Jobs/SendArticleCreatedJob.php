<?php

namespace App\Jobs;

use App\Mail\ArticleCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendArticleCreatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $article;
    public $subscribers;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($article, $subscribers)
    {
        $this->article = $article;
        $this->subscribers = $subscribers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->subscribers as $subscriber){
            \Mail::to($subscriber->email)->send(
                new ArticleCreated($this->article)
            );
        }
    }
}
