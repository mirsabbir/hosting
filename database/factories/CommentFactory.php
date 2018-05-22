<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'body' => $faker->paragraph,
        'post_id' => rand(101,150),
    ];
});
