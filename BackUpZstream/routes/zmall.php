<?php

/*new api for zmall*/
Route::post('/zmall_get_connection_id','Api\Zmall\ZMallAuthController@get_connection_id');
Route::post('/zmall_get_diary_connection_id','DiaryApi\Zmall\ZMallAuthController@get_connection_id');
Route::post('/zmall_request_otp','Api\Zmall\ZMallAuthController@otp_request');
Route::post('/zmall_verify_otp','Api\Zmall\ZMallAuthController@verify_otp');
Route::post('/zmall_verify_otp/{type}','Api\Zmall\ZMallAuthController@verify_otp_new');
Route::post('/zmall_customer_register','Api\Zmall\ZMallAuthController@customer_register');
Route::post('/zmall_customer_login','Api\Zmall\ZMallAuthController@customer_login');
Route::post('/zmall_profile/{type}','Api\Zmall\ZMallAuthController@profile');
Route::post('/zmall_logout','Api\Zmall\ZMallAuthController@logout');
Route::post('/zmall_celebrity_login','Api\Zmall\ZMallAuthController@celebrity_login');
Route::post('/zmall_manager_login','Api\Zmall\ZMallAuthController@manager_login');
Route::post('/zmall_forgot_pass','Api\Zmall\ZMallAuthController@forgortPassword');
Route::post('/zmall_forgot_pass_otp_verify','Api\Zmall\ZMallAuthController@forgotpass_otp_verify');

//webinar request
Route::post('/zmall_webinar_dashbord','Api\WebinarController@webinar_dashbord');
Route::post('/zmall_show_all_booked_appointment','Api\WebinarController@show_all_booked_appointment');
Route::post('/zmall_book_an_appointment','Api\WebinarController@book_an_appointment');
Route::post('/zmall_schedule_my_webinar','Api\WebinarController@schedule_my_webinar');

//home page routes
Route::post('/zmall_getall_HomePageDetails','Api\Zmall\ZmallHomePage@get_all_homepage_data');
Route::post('/zmall_get_all_nearby_shops','Api\CartController@get_all_nearby_shops');
Route::post('/zmall_get_all_category_data','Api\Zmall\ZmallCategory@get_all_category_data');

//zmall shop details
Route::post('/zmall_showshopDetailsZmall','Api\ShopController@showshopDetailsZmall');

//channels
Route::post('/zmall_showmychannels','Api\ChannelController@showmychannels');

//zmall inventory 
Route::post('/zmall_show_all_inventory_list','Api\Zmall\ZmallInventory@get_all_inventory_list');
Route::post('/zmall_show_inventory_detail','Api\Zmall\ZmallInventory@get_inventory_details');

//zmall cart routes
Route::post('/zmall_add_to_cart','Api\Zmall\ZmallCart@zmall_add_to_cart');
Route::post('/zmall_delete_cart','Api\Zmall\ZmallCart@zmall_delete_cart');
Route::post('/zmall_show_cart','Api\Zmall\ZmallCart@zmall_show_cart');
Route::post('/zmall_update_cart','Api\Zmall\ZmallCart@zmall_update_cart');

//zmall check out
Route::post('/zmall_checkout','Api\Zmall\ZmallOrder@zmall_checkout');
Route::post('/zmall_orders','Api\Zmall\ZmallOrder@zmall_orders');
Route::post('/zmall_order_details','Api\Zmall\ZmallOrder@zmall_order_details');
Route::post('/zmall_cancel_order','Api\Zmall\ZmallOrder@zmall_cancel_order');

