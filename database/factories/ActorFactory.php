<?php

use Faker\Generator as Faker;

$factory->define(App\Actor::class, function (Faker $faker) {
    return [
        'nombres' => $faker->name,
        'apellidos' => $faker->name,
    ];
});
