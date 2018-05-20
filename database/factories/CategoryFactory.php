<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => str_random(10),
        'url' => str_random(10)
    ];
});

