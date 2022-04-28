<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getProducts', 'App\Http\Controllers\ProductController@getAllProduct');
Route::delete('deleteProduct/{id}', 'App\Http\Controllers\ProductController@deleteProduct');
Route::post('addProduct', 'App\Http\Controllers\ProductController@addProduct')->middleware('auth:api');
Route::post('checkout', 'App\Http\Controllers\ProductController@checkout');
Route::post('register', 'App\Http\Controllers\AuthController@register');

Route::group([
    'prefix' => 'auth'
], function(){
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::group([
        'middleware' => 'auth:api'
    ], function(){
        Route::post('logout', 'App\Http\Controllers\AuthController@logout');
        Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
        Route::get('data', 'App\Http\Controllers\AuthController@data');
    });
});
