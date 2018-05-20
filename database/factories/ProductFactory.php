<?php

use Faker\Generator as Faker;

$factory->define(CodeShopping\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->colorName,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5000)
    ];
});
