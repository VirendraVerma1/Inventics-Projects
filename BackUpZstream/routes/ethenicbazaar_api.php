<?php

//authentication
Route::post('/zstream_get_connection_id/2','Api\EthenicBazaar\EthenicBazaarController@get_connection_id_ethenicbazaar');
Route::post('/zstream_verify_otp/2','Api\EthenicBazaar\EthenicBazaarController@verify_otp_ethenicbazaar');
Route::post('/zstream_request_otp/2','Api\EthenicBazaar\EthenicBazaarController@request_otp_ethenicbazaar');

//product
// Route::post('/zstream_product_lists/2','Api\EthenicBazaar\EthenicBazaarProductController@product_lists');

//inventory
Route::post('/zstream_inventory_lists/2','Api\EthenicBazaar\EthenicBazaarInventoryController@inventory_lists');
Route::post('/zstream_inventory_details/2','Api\EthenicBazaar\EthenicBazaarInventoryController@inventory_details');

//category
// Route::post('/zstream_master_category_list/2','Api\EthenicBazaar\EthenicBazaarCategoryController@master_category_list');
// Route::post('/zstream_category_group_list/2','Api\EthenicBazaar\EthenicBazaarCategoryController@category_group_list');
Route::post('/zstream_sub_category_list/2','Api\EthenicBazaar\EthenicBazaarCategoryController@sub_category_list');
Route::post('/zstream_category_list/2','Api\EthenicBazaar\EthenicBazaarCategoryController@category_list');

//orders
Route::post('/zstream_orders/2','Api\EthenicBazaar\EthenicBazaarOrderController@ethenicbazaar_orders');
Route::post('/zstream_order_details/2','Api\EthenicBazaar\EthenicBazaarOrderController@ethenicbazaar_order_details');
Route::post('/zstream_order_status_update/2','Api\EthenicBazaar\EthenicBazaarOrderController@ethenicbazaar_order_status_update');
Route::post('/zstream_order_status_list/2','Api\EthenicBazaar\EthenicBazaarOrderController@ethenicbazaar_order_status_list');
Route::post('/zstream_pdf_save/2','Api\EthenicBazaar\EthenicBazaarOrderController@ethenicbazaar_pdf_save');
