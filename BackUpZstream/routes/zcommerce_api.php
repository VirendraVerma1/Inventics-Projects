<?php

//authentication
Route::post('/zstream_get_connection_id/1','Api\ZShop\ZShopController@get_connection_id_ZShop');
Route::post('/zstream_verify_otp/1','Api\ZShop\ZShopController@verify_otp_ZShop');
Route::post('/zstream_request_otp/1','Api\ZShop\ZShopController@request_otp_ZShop');

//product
// Route::post('/zstream_product_lists/1','Api\ZShop\ZShopProductController@product_lists');

//inventory
Route::post('/zstream_inventory_lists/1','Api\ZShop\ZShopInventoryController@inventory_lists');
Route::post('/zstream_inventory_details/1','Api\ZShop\ZShopInventoryController@inventory_details');

//category
Route::post('/zstream_master_category_list/1','Api\ZShop\ZShopCategoryController@master_category_list');
Route::post('/zstream_category_group_list/1','Api\ZShop\ZShopCategoryController@category_group_list');
Route::post('/zstream_sub_category_list/1','Api\ZShop\ZShopCategoryController@sub_category_list');
Route::post('/zstream_category_list/1','Api\ZShop\ZShopCategoryController@category_list');

//orders
Route::post('/zstream_orders/1','Api\ZShop\ZShopOrderController@zshop_orders');
Route::post('/zstream_order_details/1','Api\ZShop\ZShopOrderController@zshop_order_details');
Route::post('/zstream_order_status_update/1','Api\ZShop\ZShopOrderController@zshop_order_status_update');
Route::post('/zstream_order_status_list/1','Api\ZShop\ZShopOrderController@zshop_order_status_list');
Route::post('/zstream_pdf_save/1','Api\ZShop\ZShopOrderController@zshop_pdf_save');
