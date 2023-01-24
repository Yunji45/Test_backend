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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('getpost', 'App\Http\Controllers\API\DataController@getpost');
Route::post('storedetail', 'App\Http\Controllers\API\DataController@storedetail');
Route::post('storedetail2', 'App\Http\Controllers\API\DataController@storedetail2');
Route::get('hitungindex', 'App\Http\Controllers\API\DataController@hitungindex');
Route::get('tampilsebagian', 'App\Http\Controllers\API\DataController@tampilsebagian');
Route::get('penomoran', 'App\Http\Controllers\API\DataController@penomoran');
