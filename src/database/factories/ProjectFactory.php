<?php

use Faker\Generator as Faker;

$factory->define(App\project::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'link' => $faker->link,
        'deleted' => $faker->deleted
    ];
});
