<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Book;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    $title = rtrim(Str::title($faker->sentence(random_int(3, 5))), '.');

    return [
        'title' => $title,
        'description' => $faker->paragraph(random_int(2, 4)),
        'image_url' => 'https://via.placeholder.com/600x800?text=' . urlencode($title),
        'total_pages' => random_int(20, 1000),
        'published_date' => $faker->date('Y-m-d')
    ];
});
