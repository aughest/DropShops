<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $category = Category::firstWhere('name','like',$name);
        
        $products = Product::where('category_id','=',$category->id)->get();
        // dd($products);

        return view('products',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add-product',[
            'categories' => Category::all()
        ]);
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
            'category' => 'required',
            'name' => 'required|unique:products|min:5',
            'price' => 'required|min:0',
            'description' => 'required|min:20',
            'image' => 'required'
        ]);

        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();
        Storage::putFileAs('public/images', $file, $imageName);

        $product = new Product();
        $product->category_id = $request->category;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $imageName;

        $product->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($categoryName, $productName)
    {
        $product = Product::where('name','=',$productName)->get();
        return view('product-detail',[
            'product' => $product
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
        $product = Product::where('id','=',$id)->get();

        return view('admin.update-product', [
            'product' => $product,
            'categories' => Category::all()
        ]);
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
        $check = [
            'category_id' => 'required',
            'name' => 'required|min:5',
            'price' => 'required|min:0',
            'description' => 'required|min:20',
        ];

        $validatedData = $request->validate($check);

        if($request->file('newImage')){
            Storage::delete('public/images/'.$request->oldImage);
            
            $file = $request->file('newImage');

            $imageName = time().'_'.$file->getClientOriginalName();
            $validatedData['image'] = $imageName;
            Storage::putFileAs('public/images', $file, $imageName);
        }

        Product::where('id', '=', $id)->update($validatedData);

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $product = Product::find($id);

        Storage::delete('public/images/'.$product->image);
        $product->delete();

        return redirect()->back();
    }
}
