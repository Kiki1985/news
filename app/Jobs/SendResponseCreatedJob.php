<?php

namespace App\Jobs;

use App\Jobs\SendResponseCreatedJob;
use App\Mail\ResponseCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendResponseCreatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $response;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \Mail::to($this->response->comment->user->email)->send(
            new ResponseCreated($this->response)
        );

        \Mail::to($this->response->comment->article->user->email)->send(
            new ResponseCreated($this->response)
        );
    }
}
