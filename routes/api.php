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

    Route::prefix('client')->group(function(){
        Route::get('', 'ClientController@getAll');
        Route::get('{id}', 'ClientController@getById');
        Route::put('{id}', 'ClientController@update');
    });

    Route::prefix('brand')->group(function (){
        Route::get('', 'BrandController@getAll');
        Route::get('{id}', 'BrandController@getById');
        Route::put('{id}', 'BrandController@update');
        Route::post('', 'BrandController@create');
        Route::delete('{id}', 'BrandController@delete');
    });

    Route::prefix('owner')->group(function (){
        Route::get('', 'OwnerController@getAll');
        Route::get('{id}', 'OwnerController@getById');
        Route::put('{id}', 'OwnerController@update');
        Route::get('{id}/marketplace', 'OwnerController@getAllMarketplace');
    });

    Route::prefix('checklist')->group(function (){
        Route::get('', 'ChecklistController@getAll');
        Route::get('{id}', 'ChecklistController@getById');
        Route::put('{id}', 'ChecklistController@update');
        Route::post('', 'ChecklistController@create');
        Route::delete('{id}', 'ChecklistController@delete');
    });
});
