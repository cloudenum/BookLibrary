<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => Str::title($faker->sentence(random_int(3, 5))),
        'description' => $faker->paragraph(),
        'image_path' => env('APP_URL') . '/public/no_image.png',
        'total_pages' => random_int(20, 1000),
        'published_date' => $faker->date('Y-m-d')
    ];
});
