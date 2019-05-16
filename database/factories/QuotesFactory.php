<?php

use Faker\Generator as Faker;

$factory->define(App\Quote::class, function (Faker $faker) {
    return [
        'author' => $faker->name(),
        'quote' => $faker->sentence(),
        'user_id' => factory(App\User::class)->create()->id,
    ];
});
