<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'body' => $faker->text,
        'user_id' => $faker->randomDigit,
        'cover_image' => 'https://source.unsplash.com/random',
    ];
});
