<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/template', function () {
    return view('layouts.master');
});


Route::middleware([ 'auth:sanctum'])->group(function(){

//category routes

    Route::resource('categories',\App\Http\Controllers\CategoriesController::class );

    Route::resource('brands',\App\Http\Controllers\BrandController::class );
    Route::resource('sizes',\App\Http\Controllers\SizeController::class );
    Route::resource('products',\App\Http\Controllers\ProductsController::class );


    Route::get('/generate-barcode', [\App\Http\Controllers\CategoriesController::class, 'createBarcode'])->name('generate.barcode');

});





