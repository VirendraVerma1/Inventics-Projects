<?php

Route::get('search','SearchController@index')->name('SearchName');
Route::post('get_filtered_product','SearchController@get_filtered_product')->name('get_filtered_product');