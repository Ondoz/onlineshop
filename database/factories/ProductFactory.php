<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    $slug = ucfirst($name);

    return [
        'sku' => $faker->unique()->randomNumber($nbDigits = NULL, $strict = false),
        'name' => $name,
        'slug' => $slug,
        'details' => $faker->paragraph,
        'price' => $faker->numberBetween(100, 1000),
        'qty' => $faker->randomDigit(),
        'discount' => $faker->numberBetween(2, 30),
        'description' => $faker->paragraph,
        'status' => $faker->randomElement([
            'draft',
            'active',
            'inactive'
        ])
    ];
});
