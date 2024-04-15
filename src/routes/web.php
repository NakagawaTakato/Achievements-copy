<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\Shop_allController;

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

Route::get('/', [ShopController::class, 'index']);
Route::get('/search', [Shop_allController::class, 'search']);
Route::post('/register/thanks', [ShopController::class, 'thanks']);
Route::post('/login/menu_two', [ShopController::class, 'menu_two']);
Route::get('/shop_all', [Shop_allController::class, 'shop_all']);
Route::delete('/shop_all', [Shop_allController::class, 'shop_all']);
Route::post('/shop_all/shop_detail', [Shop_allController::class, 'shop_detail']);
Route::post('/shop_all/shop_detail/shop_detail_two', [Shop_allController::class, 'shop_detail_two']);
Route::post('/my_page', [Shop_allController::class, 'my_page']);
Route::delete('/my_page', [Shop_allController::class, 'my_page']);
