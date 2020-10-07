<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    $slug = ucfirst($name);

    return [
        'name' => $name,
        'slug' => $slug,
        'details' => $faker->paragraph,
        'price' => $faker->numberBetween(100, 1000),
        'stock' => $faker->randomDigit(),
        'discount' => $faker->numberBetween(2, 30),
        'descrption' => $faker->paragraph
    ];
});
