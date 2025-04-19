<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
   public function index(){
        $products = Product::with('brand')->latest()->simplePaginate(4);
        return view('products' , ["products" => $products]);
   }
   public function show(Product $product){
    return view('oneProduct' , ["product" => $product]);

   }
   public function create(Request $request){
    $request->validate([
        'name' => 'required|string|max:50|min:3',
        'price' => 'numeric|required',
        'description' => 'nullable|string|max:250',
        'photo' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048'
    ]);
    $data = $request->all();
    if($request->hasFile('photo')){
        $img = $request->file('photo');
        $imgName = time() . '.'.$img->getClientOriginalExtension();
        $img->move(public_path('upload') , $imgName );
        $data['photo']=$imgName;
    }
    Product::create(array_merge($data, ['brand_id' => 2]));
    return redirect('products');


   }
   public function edit( Product $product){
    return view ('edit' , ["product" => $product]);
   }
   public function update( Product $product  , Request $request){
    $request->validate([
        'name' => 'required|string|min:3|max:50',
        'price' => 'numeric|required',
        'description' => 'nullable|string|max:250',
        'photo' => 'nullable|image|mimes:png,jpg,jpeg,gif|max:2048'
    ]);
    $data = $request->all();

    if($request->hasFile('photo')){
        $img = $request->file('photo');
        $imgName = time() . '.'.$img->getClientOriginalExtension();
        $img->move(public_path('upload') , $imgName );
        $data['photo']=$imgName;
    }

    $product->update(array_merge($data, ['brand_id' => 3]));

    return redirect('products');

   }
   public function destroy( Product $product){
    $product->delete();
    return redirect("products");
   }
}
