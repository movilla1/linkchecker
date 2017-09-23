<?php

use Faker\Generator as Faker;

$factory->define(App\ItemCheckers::class, function (Faker $faker) {
    return [
        "site"=>$faker->site,
        "backlink"=>$faker->backlink,
        "status"=>$faker->status,
        "user_id"=>$faker->user_id,
        "project_id"=>$faker->project_id
    ];
});
