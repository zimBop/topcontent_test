<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Artisan;
use Faker\Generator as Faker;

$factory->define(Artisan::class, function (Faker $faker) {
    return [
        Artisan::NAME => $faker->name . $faker->lexify('???'),
    ];
});
