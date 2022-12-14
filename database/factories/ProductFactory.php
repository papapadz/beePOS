<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductsModel;
use App\ProductCategoryModel;
use App\Shop;
use Faker\Generator as Faker;

$factory->define(ProductsModel::class, function (Faker $faker) {
    
    return [
        'product_name' => $faker->word,
        'product_category' => ProductCategoryModel::select('product_category_id')->orderBy(DB::raw('RAND()'))->first()->product_category_id,
        'quantity' => rand(1,100),
        'description' => $faker->text($maxNbChars = 50),
        'img_file' => $faker->imageUrl($width = 640, $height = 480),
        'company_id' => Shop::select('id')->orderBy(DB::raw('RAND()'))->first()->id
    ];
});
