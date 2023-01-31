<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\SalesModel;

class APIController extends Controller
{
    public function mobileLogin(Request $request) {
		$credentials = $request->only('username','password');
        if(Auth::once($credentials)) {
            return User::with('person','affiliation')->find(Auth::id());
        }
    }

    public function mobileSalesSave(Request $request) {
        dd($request->all());
        foreach($request->input('sales') as $sale) {
            SalesModel::create([
                'product_id' => $sale->product->id, 
                'qty' => $sale->qty, 
                'price_id' => , 'discount_amount', 'user_id'
            ]);
        }
    }
}
