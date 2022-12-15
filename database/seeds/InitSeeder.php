<?php

use Illuminate\Database\Seeder;
use App\Shop;
use App\ProductCategoryModel;
use App\ProductsModel;
use App\ProductPricesModel;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Shop::class, 5)->create();
        factory(ProductCategoryModel::class, 10)->create();
        factory(ProductsModel::class, 50)->create();
    }
}
