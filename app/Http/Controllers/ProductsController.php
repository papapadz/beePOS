<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\ProductsModel as PRODUCT;
use App\ProductCategoryModel as CATEGORY;

class ProductsController extends Controller
{
    public function all($shop) {
        return CATEGORY::orderBy('category')->where()->get()->with('products');
    }

    public function getCategoryByShop($shop) {

        $shop = Shop::where('shop_code',$shop)->first();
        
        $categories = [];

        foreach($shop->products->groupBy('product_category') as $category) {
            array_push($categories,$category);
        }
        return json_encode($categories);
        //return $categories;
    }
}
