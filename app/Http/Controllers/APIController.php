<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class APIController extends Controller
{
    public function mobileLogin(Request $request) {
		$credentials = $request->only('username','password');
        if(Auth::once($credentials)) {
            return User::with('person','affiliation')->find(Auth::id());
        }
    }

    public function mobileSalesSave(Request $request) {
        
    }
}
