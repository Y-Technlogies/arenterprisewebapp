<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Client::class, function (Faker $faker) {
    return [
        'clientsn' => $faker->randomNumber(9),
        'propname' => $faker->name(),
        'companyname' => $faker->name,
        'destination' => $faker->city,
        'propphone1' => $faker->numerify(),
        'propphone2' => $faker->numerify(),
        'assistant' => $faker->name,
        'asstphone1' => $faker->numerify(),
    ];
});
