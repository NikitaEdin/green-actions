<?php

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'price' => $faker->randomFloat(2, 1, 100), // Random price between 1 and 100
        'img' => $faker->imageUrl(), // Random image URL
        'is_visible' => $faker->boolean(),
        'is_available' => $faker->boolean(),
    ];
});
