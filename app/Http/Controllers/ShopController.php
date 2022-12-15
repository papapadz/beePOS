<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
class ShopController extends Controller
{
    public function index($shop) {

        $shopObj = Shop::where('shop_code',$shop)->first();
        
        return view('pages.shop.index')->with('shop',$shopObj);
    }
}
