<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Venue;
use Faker\Generator as Faker;

$factory->define(Venue::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'adress' => $faker->streetAddress,
        'email' => $faker->email,
        'telephone' => $faker->phoneNumber

    ];
});
