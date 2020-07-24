<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;

use App\User;

use Faker\Generator as Faker;



$factory->define(Article::class, function (Faker $faker) {
    return [
        'author_id' => User::all()->random()->id,
        'title' => $faker->text(80),
        'body' => $faker->text(1000),
        'image' => $faker->image('public/storage/images',600,400, null, false),
        'created_at' => now()
    ];
});
