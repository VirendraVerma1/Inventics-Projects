<?php

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

Route::get('/', function () {
   // return view('welcome');
   return redirect()->route('practice.index');
});

Auth::routes();
Route::post('/practice/loadData', 'HomeController@loadData')->name('load');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('practice','PlacementPreprationController');