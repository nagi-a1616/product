<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();
Route::middleware(['auth', 'verified'])->group(function () {
    // ログインのホーム画面のルーティング
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});



Route::get('/', function () {
    // ウェブサイトのホームページ（'/'のURL）にアクセスした場合のルートです
    if (Auth::check()) {
        // ログイン状態ならば
        return redirect()->route('products.index');
        // 商品一覧ページ（ProductControllerのindexメソッドが処理）へリダイレクトします
    } else {
        // ログイン状態でなければ
        return redirect()->route('login');
        //　ログイン画面へリダイレクトします
    }
});



Route::group(['middleware' => 'auth'], function () {
    Route::resource('products', ProductController::class);
});

Route::get('show', 'ProductController@show')->name('show');

Route::get('searchproduct', 'ProductController@search')->name('searchproduct');

