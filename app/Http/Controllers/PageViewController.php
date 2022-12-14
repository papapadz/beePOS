<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Shop;

class PageViewController extends Controller
{

    public function index($shop) {
        if (Auth::check()) {
            return redirect()->route('shop.index', ['shop'=>$shop]);
        }
        
        return redirect()->route('shop.showlogin', ['shop'=>$shop]);
    }

    public function showLogin($shop) {

        $shop = Shop::where('shop_code',$shop)->first();
        $palette = new \BrianMcdo\ImagePalette\ImagePalette($shop->shop_logo);
        $colors = $palette->colors;

        return view('pages.login')->with([
            'shop' => $shop,
            'color' => $colors[0]->rgbaString
        ]);
    }

    public function login(Request $request, $shop) {

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('shop.index', ['shop'=>$shop]);
        }
    }

}
