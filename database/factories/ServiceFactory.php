<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        Service::TITLE => $faker->sentence(2),
        Service::PRICE => $faker->numberBetween(100, 100000),
        Service::DURATION => $faker->randomElement(range(30, 240, 30)),
    ];
});
