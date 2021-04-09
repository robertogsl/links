<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Aplication;
use Faker\Generator as Faker;

$factory->define(Aplication::class, function (Faker $faker) {
    return [
        'name' => substr($faker->sentence(2), 0, -1)
    ];
});
