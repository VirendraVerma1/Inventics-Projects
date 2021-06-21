<?php
//old routes
Route::get('cart','CartController@index')->name('Cart');
Route::get('emptycart','CartController@index')->name('EmptyCart');
Route::get('checkout','CartController@index')->name('Checkout');


Route::post('add_to_cart','CartController@addToCart')->name('addtocart');
Route::get('clear_all_from_cart','CartController@clearAllCart')->name('clear_all_from_cart');
Route::post('update_to_cart','CartController@update_to_cart')->name('update_to_cart');
Route::post('delete_product_from_cart','CartController@delete_product_from_cart')->name('delete_product_from_cart');

//test routes
Route::post('update_to_cart_test','CartController@update_to_cart_test')->name('update_to_cart_test');
Route::post('add_to_cart_post_try','CartController@addToPostTest')->name('addtocartposttry');
Route::get('add_to_cart1/{id}','CartController@addToGetTest')->name('addtocart1');

//minicart routes
Route::post('getMiniCartItemdata','CartController@getMiniCartItemdata')->name('getMiniCartItemdata');
Route::post('getTotalCartItems','CartController@getTotalCartItems')->name('getTotalCartItems');
Route::post('deleteMinicartItemData','CartController@deleteMinicartItemData')->name('deleteMinicartItemData');

Route::post('testFunction','CartController@testFunction')->name('testFunction');