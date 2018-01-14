<?php

use Faker\Generator as Faker;

$factory->define(App\Marketplace::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});