<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ArticleCreated
{
    use Dispatchable, SerializesModels;

    public $article;
    public $subscribers;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($article, $subscribers)
    {
        $this->article = $article;
        $this->subscribers = $subscribers;
    }
}
