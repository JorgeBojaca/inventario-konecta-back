<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('producto/create', 'ProductoController@create');

Route::put('producto/update', 'ProductoController@update');

Route::delete('producto/delete', 'ProductoController@delete');

Route::get('producto/get', 'ProductoController@get');

Route::get('producto/getAll', 'ProductoController@getAll');

Route::post('producto/sale', 'ProductoController@sale');
