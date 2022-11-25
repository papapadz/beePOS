<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bb = GettersController::getBeginningBalance(0);
         $b_isActive = 0;

         $countUnpaid = GettersController::getUnpaidSales(0);
          $countCredit = GettersController::getUnpaidSales(2);

          if($bb!=null) {

            return redirect()->route('view.menu');
            //AdminController::viewMenu();
            /*
            $prodPasta = PRODUCTS::ORDERBY('product_name')->WHERE('product_category',1)->GET();
            $prodDrink = PRODUCTS::ORDERBY('product_name')->WHERE('product_category',2)->GET();
            $prodSandwich = PRODUCTS::ORDERBY('product_name')->WHERE('product_category',3)->GET();
            $prodDessert = PRODUCTS::ORDERBY('product_name')->WHERE('product_category',4)->GET();
            $prodMercato = PRODUCTS::ORDERBY('product_name')->WHERE('product_category',5)->GET();
            $promoList = DISCOUNTS::WHERE('is_active',1)->ORDERBY('promo_name')->GET();

            return view('menu/home', compact('prod','prodPasta','prodDrink','prodSandwich','prodDessert','prodMercato','promoList'));
            */

          } else {

            return view('welcome', compact('countUnpaid','countCredit'));
          }
    }
}
