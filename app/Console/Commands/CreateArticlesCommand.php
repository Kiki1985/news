<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateArticlesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create_article{article}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new article';

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
        $article = $this->argument('article');
        for ($i=0; $i < $article; $i++) { 
            $articleNew = factory(\App\Article::class)->create();
            $darticle_id = $articleNew->id;
            \DB::table('article_category')->insert(
                [
                'article_id' => $darticle_id,
                'category_id' => rand(1,4)
                ]
            );
        }

    }
}
