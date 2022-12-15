<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductPricesModel;
use App\ProductsModel;
use Faker\Generator as Faker;

$factory->define(ProductPricesModel::class, function (Faker $faker) {

    $unit_cost = mt_rand (50*10, 200*10) / 10;

    return [
        'product_id' => ProductsModel::select('product_id')->orderBy(DB::raw('RAND()'))->first()->product_id,
        'unit_cost' => $unit_cost,
        'unit_price' => $unit_cost*1.10
    ];
});
