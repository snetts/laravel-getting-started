<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tasks::class, function (Faker $faker) {
    return [
        'desc' => $faker->name,
        'project_id' => $faker->numberBetween(1),
    ];
});
