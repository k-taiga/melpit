<?php

use Illuminate\Support\Facades\Route;

Route::get('', 'ItemsController@showItems')->name('top');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/items/{item}', 'ItemsController@showItemDetail')->name('item');

Route::middleware('auth')
    ->group(function() {
        Route::get('items/{item}/buy', function () { return "商品購入画面";})->name('item.buy');
        Route::get('sell','SellController@showSellForm')->name('sell');
        Route::post('sell','SellController@sellItem')->name('sell');
});

Route::prefix('mypage')
    // ディレクトリのnamespace
    ->namespace('MyPage')
    // authの処理を挟む
    ->middleware('auth')
    ->group(function () {
        Route::get('edit-profile', 'ProfileController@showProfileEditForm')->name('mypage.edit-profile');
        Route::post('edit-profile', 'ProfileController@editProfile')->name('mypage.edit-profile');
        Route::get('sold-items', 'SoldItemsController@showSoldItems')->name('mypage.sold-items');
});