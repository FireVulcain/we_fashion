<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'price' => $faker->randomNumber(3),
        'reference' => $faker->regexify('[a-z0-9]{16}')
    ];
});
