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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('manufacturers','ManufacturersController@index');
Route::get('inventory','InventoryController@index');
Route::post('inventory/sold','InventoryController@sold');
Route::post('model','ModelsController@create');
Route::post('manufacturer','ManufacturersController@create');

