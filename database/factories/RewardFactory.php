<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reward;
use Faker\Generator as Faker;

$factory->define(Reward::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'reward_points' => '1000',
        'expiration_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'image' => $faker->url,
        'venue_id' => 1
    ];
});
