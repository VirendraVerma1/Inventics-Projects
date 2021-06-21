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



//laratrust
Route::get('/role/index', 'AutharizationController@role_index')->name('role.index'); 
Route::get('/role/create', 'AutharizationController@role_create')->name('role.create');
Route::delete('/role/delete/{id}', 'AutharizationController@role_delete')->name('role.delete');
Route::put('/role/update/{id}', 'AutharizationController@role_update')->name('role.update');
Route::get('/role/edit/{id}', 'AutharizationController@role_edit')->name('role.edit');
Route::post('/role/store', 'AutharizationController@role_store')->name('role.store');

Route::get('/permission/index', 'AutharizationController@permission_index')->name('permission.index'); 
Route::get('/permission/create', 'AutharizationController@permission_create')->name('permission.create');
Route::delete('/permission/delete/{id}', 'AutharizationController@permission_delete')->name('permission.delete');
Route::put('/permission/update/{id}', 'AutharizationController@permission_update')->name('permission.update');
Route::get('/permission/edit/{id}', 'AutharizationController@permission_edit')->name('permission.edit');
Route::post('/permission/store', 'AutharizationController@permission_store')->name('permission.store');

Route::get('/role_user/index', 'AutharizationController@role_user_index')->name('role_user.index'); 
Route::get('/role_user/create', 'AutharizationController@role_user_create')->name('role_user.create');
Route::delete('/role_user/delete/{id}', 'AutharizationController@role_user_delete')->name('role_user.delete');
Route::put('/role_user/update/{id}', 'AutharizationController@role_user_update')->name('role_user.update');
Route::get('/role_user/edit/{id}', 'AutharizationController@role_user_edit')->name('role_user.edit');
Route::post('/role_user/store', 'AutharizationController@role_user_store')->name('role_user.store');




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

Route::get('/blog/create', 'BlogController@create')->name('blog.create');
Route::resource('tag','TagController');
Route::resource('blog','BlogController');


// Route::get('/role/deletedindex', 'AuthorizationController@deletedindex')->name('role.deletedindex');
// Route::get('/role/restore/{id}', 'AuthorizationController@restore')->name('role.restore');



