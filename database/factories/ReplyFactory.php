<?php

use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'body' => $faker->paragraph,
        'comment_id' => rand(1,60),
    ];
});
