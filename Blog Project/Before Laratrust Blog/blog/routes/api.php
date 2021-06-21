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
Route::get('/categories','API\CategoryController@index');
Route::post('/category/create','API\CategoryController@create');
Route::post('/category/edit','API\CategoryController@edit');
Route::post('/category/delete','API\CategoryController@delete');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
