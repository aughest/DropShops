<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $carts =  Cart::where('user_id','=', Auth::id())->get();
        // dd($carts);

        $total = 0;
        foreach($carts as $cart){
            $total += $cart->subtotal;
        }

        return view('user.checkout', [
            'carts' => $carts,
            'total' => $total
        ]);
    }
}
