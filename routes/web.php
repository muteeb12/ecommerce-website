<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Session;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

Route::view('/register','register');
Route::post('/login',[UserController::class,'login']);
Route::post('/register',[UserController::class,'register']);
Route::get('/',[ProductController::class,'index']);
Route::get('/detail/{id}',[ProductController::class,'details']);
Route::post('add_to_cart',[ProductController::class,'addToCart']);
Route::get('cartlist',[ProductController::class,'cartlist']);
Route::get('/removecart/{id}',[ProductController::class,'removecart']);
Route::get('ordernow',[ProductController::class,'ordernow']);
Route::post('orderplace',[ProductController::class,'orderplace']);
Route::get('myorders',[ProductController::class,'myorders']);
Route::get('all_products',[ProductController::class,'all_details']);



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
