<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_users{users}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new users';

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
        $users = $this->argument('users');
        for ($i=0; $i < $users; $i++) { 
            factory(\App\User::class)->create();
        }
    }
}
