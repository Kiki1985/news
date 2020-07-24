<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateCommentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_comment{comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new comment';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $comment = $this->argument('comment');
        for ($i=0; $i < $comment; $i++) { 
            factory(\App\Comment::class)->create();
        }
    }
}
