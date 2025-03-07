<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/products' , function(){
    $products = Product::all();
    return view('products' , ["products" => $products]);
});


Route::get('/add' , function(){

    return view ('addproduct');

});
Route::post('/add/store' , function( Request $request){

    $request->validate([
        'name' => 'required|string|max:50',
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

    Product::create($data);

    return redirect('products');

});


Route::get('/products/{id}/pro' , function($id){
    $product = Product::findOrFail($id);
    return view('oneProduct' , ["product" => $product]);
})->name('products.pro');;

Route::get('/products/{id}/edit' , function($id){
    $product = Product::findOrFail($id);
    return view('edit' , ["product" => $product] );
})->name('edit');


Route::post('/products/{id}/edit/update' , function( $id , Request $request){

    $product = Product::findOrFail($id);
    $request->validate([
        'name' => 'required|string|max:50',
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

    $product->update($data);

    return redirect('products');

})->name('edit.stroe');


Route::delete('/products/{id}/del' , function($id){
    $product = Product::findOrFail($id);

    $product->delete();

    return redirect('products');

})->name('delete');
