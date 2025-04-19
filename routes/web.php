<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::view('/', 'welcome');
Route::view('/add' , 'addproduct');

Route::controller(ProductController::class)->group(function (){

    Route::get('/products' ,  'index');

    Route::post('/add/store' , 'create');

    Route::get('/products/{product}' ,  'show')->name('products.pro');

    Route::get('/products/{product}/edit' ,  'edit')->name('edit');

    Route::post('/products/{product}' ,  'update')->name('edit.stroe');

    Route::delete('/products/{product}' ,  'destroy')->name('delete');

});

// Route::resource('products', ProductController::class);

