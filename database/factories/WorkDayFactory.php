<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\WorkDay;
use Faker\Generator as Faker;

$factory->define(WorkDay::class, function (Faker $faker) {
    return [
        WorkDay::DATE => $faker->dateTimeBetween('+1 hour', '+1 month'),
        WorkDay::START => '09:00',
        WorkDay::END => '18:00',
    ];
});
