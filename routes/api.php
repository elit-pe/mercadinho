<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::prefix('marketplace')->group(function(){
        Route::get('', 'MarketplaceController@allMarketplace');
        Route::get('{id}', 'MarketplaceController@getMarketplace');
        Route::post('', 'MarketplaceController@addMarketplace');
        Route::put('{id}', 'MarketplaceController@updateMarketplace');
        Route::delete('{id}', 'MarketplaceController@removeMarketplace');
    });

    Route::prefix('product')->group(function(){
        Route::get('', 'ProductController@allProduct');
        Route::get('{id}', 'ProductController@getProduct');
        Route::post('', 'ProductController@addProduct');
        Route::put('{id}', 'ProductController@updateProduct');
        Route::delete('{id}', 'ProductController@removeProduct');
    });
});
