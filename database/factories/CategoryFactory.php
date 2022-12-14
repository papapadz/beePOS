<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductCategoryModel;
use Faker\Generator as Faker;

$factory->define(ProductCategoryModel::class, function (Faker $faker) {
    return [
        'category' => $faker->colorName,
        'description' => $faker->text($maxNbChars = 50)
    ];
});
