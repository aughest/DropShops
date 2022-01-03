<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function viewCategory(){
     
        $categories = Category::all();
        $products = Product::latest()->get();
        // dd($products);

        return view('home', [
            'categories' => $categories,
            'products' => $products
        ]);
    }

    public function search(Request $request)
    {
        // $category = Category::firstWhere('name', $request->name);
        // dd($request->search);

        if(!$request->search == null){
            $products = Product::where('name','LIKE', "%$request->search%")->get();
            // dd($products);
        }else{
            $products = Product::all();
        }

        return view('products', [
            // 'categories' => Category::all(),
            // 'category' => $category,
            'products' => $products
        ]);
    }

}
