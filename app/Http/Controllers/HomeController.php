<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewCategory(){
     
        $categories = Category::all();
        $products = Product::latest()->take(12)->get();

        return view('home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        if(!$request->search == null){
            $products = Product::inRandomOrder()->where('name','LIKE', "%$request->search%")->get();
        }else{
            $products = Product::inRandomOrder()->get();
        }

        return view('products', [
            'products' => $products
        ]);
    }

}
