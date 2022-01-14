<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('admin.add-product',[
        //     'categories' => Category::all(),
        //     'shops' => Shop::all()
        // ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:shops|min:5',
            'description' => 'required|min:20|max:255',
            'location' => 'required',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images/Shop/', $file, $imageName);

        $shop = new Shop();
        $shop->name = $request->name;
        $shop->description = $request->description;
        $shop->location = $request->location;
        $shop->image = $imageName;

        $shop->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $shop = Shop::firstWhere('name','=',$name);
        $products = Product::where('shop_id','=',$shop->id)->get();
        // dd($products);
        return view('shop-detail',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
