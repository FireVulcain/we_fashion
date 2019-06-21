<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    /**
     * Generate a random number and store a string depending of the value of this number
     */
    $randNumber = rand(1, 100);
    $status = $randNumber >= 90 ? 'unpublished' : 'published';

    /**
     * used to fake the datas
     */
    return [
        'name' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'price' => $faker->randomNumber(3),
        'reference' => $faker->regexify('[a-z0-9]{16}'),
        'status' => $status,
        'sales' => $faker->randomElement(['sale', 'standard'])
    ];
});