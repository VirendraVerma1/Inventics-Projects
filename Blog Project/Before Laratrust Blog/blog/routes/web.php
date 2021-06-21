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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/blog/delete_image_only/{id}', 'BlogController@delete_image_only')->name('blog.deleteonlyimage');
Route::get('/blog/deletedindex', 'BlogController@deletedindex')->name('blog.deletedindex');
Route::get('/blog/restore/{id}', 'BlogController@restore')->name('blog.restore');
Route::get('/blog/destroy/{id}', 'BlogController@destroy')->name('blog.delete');

Route::get('/tag/deletedindex', 'TagController@deletedindex')->name('tag.deletedindex');
Route::get('/tag/restore/{id}', 'TagController@restore')->name('tag.restore');
Route::get('/tag/destroy/{id}', 'TagController@destroy')->name('tag.delete');


Route::get('/blog/backtopage', 'BlogController@backtopage')->name('blog.back')->middleware('auth');
Route::get('/category/index', 'CategoryController@index')->name('category.index'); 

Route::middleware(['auth'])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::get('/category/deletedindex', 'CategoryController@deletedindex')->name('category.deletedindex');
    Route::get('/category/restore/{slug}', 'CategoryController@restore')->name('category.restore');
    Route::post('/category/store', 'CategoryController@store');
    Route::get('/category/edit/{slug}', 'CategoryController@edit')->name('category.edit');
    Route::put('/category/update/{slug}', 'CategoryController@update')->name('category.update');
    Route::delete('/category/destroy/{slug}', 'CategoryController@destroy')->name('category.delete');
});


Route::resource('tag','TagController');
Route::resource('blog','BlogController');