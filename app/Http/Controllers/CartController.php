<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::where('user_id','=', Auth::user()->id)->get();

        return view('user.cart', [
            'carts' => $carts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->id);

        $request->validate([
            'quantity' => 'integer|min:1'
        ]);

        $user = Auth::id();
        $cart = Cart::where('user_id','=', $user)->where('product_id','=',$request->id)->get();
        $product = Product::where('id','=',$request->id)->get();

        if(count($cart) == 1){
            $cart[0]->subtotal += $cart[0]->products[0]->price;
            $cart[0]->quantity += 1;
            $cart[0]->update();
        }else{
            $cart = new Cart();
            $cart->user_id = $user;
            $cart->product_id = $request->id;
            $cart->subtotal = $product[0]->price;
            $cart->quantity = 1;
            $cart->save();
        }
        
        return redirect()->back()->with('success', 'success adding to cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $validatedData = $request->validate([
            'quantity' => 'required'
        ]);

        $cart = Cart::find($request->cart_id);

        // dd($cart->subtotal / $cart->quantity * $request->quantity);
        if($request->quantity <= 0){
            $cart->delete();

        }else{
            $cart->subtotal = $cart->subtotal / $cart->quantity * $request->quantity;
            $cart->quantity = $request->quantity;
            $cart->update();
        }
        
        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        return redirect()->back();
    }
}
