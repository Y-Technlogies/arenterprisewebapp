<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_serial' => $faker->randomNumber(5),
        'name' => $faker->name(),
        'type' => $faker->randomElement(['automotive','industrial']),
        'quantity' => $faker->randomNumber(),
        'price' => $faker->randomFloat(1),
        'stock' => $faker->randomNumber(),
    ];
});
