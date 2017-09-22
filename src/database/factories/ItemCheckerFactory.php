<?php

use Faker\Generator as Faker;

$factory->define(App\ItemCheckers::class, function (Faker $faker) {
    return [
        "site"=>$faker->site,
        "backlink"=>$faker->backlink,
        "status"=>$faker->status
    ];
});
