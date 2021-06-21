<?php

//test routes
Route::get('account_login_test','Auth\LoginController@getThings')->name('test1');
Route::get('account_login_test2','Auth\LoginController@readDataTest')->name('test2');


Route::post('get_states','AccountController@get_states')->name('get_states');
Route::post('save_address','AccountController@save_address')->name('save_address');
Route::post('update_address','AccountController@update_address')->name('update_address');
Route::get('delete_address/{id}','AccountController@delete_address')->name('delete_address');

Route::post('update_account_details','AccountController@update_customer_details')->name('UpdateAccountDetails');
Route::get('account/{name}','AccountController@index')->name('Account');
Route::get('account_logout','AccountController@logoutUser')->name('Logout');

Route::get('account_login','Auth\LoginController@loginindex')->name('Login');
Route::post('account_login_change','Auth\LoginController@loginuser')->name('LoginChange');

Route::get('account_signup','Auth\RegisterController@signupindex')->name('SignUp');
Route::post('account_signup_createAccount','Auth\RegisterController@createNewAccount')->name('SignUpStore');


//order list
Route::get('order_list/{order_id}','AccountController@orderList')->name('OrderList');

//wish list
Route::post('addWishList','AccountController@addWishList')->name('AddWishList');
Route::post('removeWishList','AccountController@removeWishList')->name('RemoveWishList');
Route::post('getTotalWishlist','AccountController@getTotalWishlist')->name('getTotalWishlist');
