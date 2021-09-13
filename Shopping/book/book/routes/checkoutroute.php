<?php

Route::get('check_out/{cart_no}','CheckOutController@index')->name('CheckOut');
Route::post('saveShippingIdForCheckOut','CheckOutController@saveShippingIdForCheckOut')->name('saveShippingIdForCheckOut');
Route::post('saveBillingIdForCheckOut','CheckOutController@saveBillingIdForCheckOut')->name('saveBillingIdForCheckOut');
Route::post('placeOrder','CheckOutController@placeOrder')->name('placeOrder');

//cancel order
Route::post('cancelMyOrder','CheckOutController@cancelMyOrder')->name('cancelMyOrder');

//reorder
Route::get('reorderMyOrder/{order_id}','CheckOutController@reorderMyOrder')->name('reorderMyOrder');

//clear order history
Route::get('clearorderhistory','CheckOutController@clearorderhistory')->name('clearorderhistory');

//apply coupoun
Route::post('apply_coupoun','CheckOutController@check_and_applyCoupoun')->name('apply_coupoun');
