<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Writer;
use Faker\Generator as Faker;

$factory->define(Writer::class, function (Faker $faker) {
    return [
        'first_name'        => $faker->firstName(),
        'last_name'         => $faker->lastName(),
    ];
});
