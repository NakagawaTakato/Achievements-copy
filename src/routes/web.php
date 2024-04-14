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

Route::get('/', [ShopController::class, 'index'])->name('root');;
Route::get('/search', [Shop_allController::class, 'search']);
Route::post('/register/thanks', [ShopController::class, 'thanks']);
Route::post('/login/menu_two', [ShopController::class, 'menu_two']);
Route::get('/shop_all', [Shop_allController::class, 'shop_all']);
Route::delete('/shop_all', [Shop_allController::class, 'shop_all']);
Route::post('/shop_all/shop_detail', [Shop_allController::class, 'shop_detail']);
Route::post('/done', [Shop_allController::class, 'done']);


Route::middleware('auth')->group(function () {
    Route::get('/thanks', function () {
        return view('thanks');
    });

    Route::get('/mypage', [UsersController::class, 'mypage'])->name('mypage');

    Route::post('/like/{shop_id}', [FavoriteController::class, 'create'])->name('like');
    Route::post('/unlike/{shop_id}', [FavoriteController::class, 'delete'])->name('unlike');

    Route::post('/reservation', [ReservationsController::class, 'create'])->name('reserve.create');
    Route::post('/reserve/{reservation_id}', [ReservationsController::class, 'delete'])->name('reserve.delete');
});
