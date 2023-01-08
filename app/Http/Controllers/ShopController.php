<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
class ShopController extends Controller
{
    public function index($shop) {
        return view('pages.shop.index')->with('shop',$this->getShopObj($shop));
    }

    public function getShopObj($shop) {
        return Shop::where('shop_code',$shop)->first();
    }
}
