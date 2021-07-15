<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

include('zcommerce_api.php');
include('ethenicbazaar_api.php');
include('zmall.php');

Route::get('/test','Api\AuthController@test');
/*new api*/
Route::post('/zstream_get_connection_id/0','Api\AuthController@get_connection_id');
Route::post('/zstream_get_diary_connection_id','DiaryApi\AuthController@get_connection_id');
Route::post('/zstream_request_otp/0','Api\AuthController@otp_request');
Route::post('/zstream_verify_otp/0','Api\AuthController@verify_otp');
Route::post('/zstream_verify_otp/{type}','Api\AuthController@verify_otp_new');
Route::post('/zstream_customer_register','Api\AuthController@customer_register');
Route::post('/zstream_customer_login','Api\AuthController@customer_login');
Route::post('/zstream_profile/{type}','Api\AuthController@profile');
Route::post('/zstream_logout','Api\AuthController@logout');
Route::post('/zstream_celebrity_login','Api\AuthController@celebrity_login');
Route::post('/zstream_manager_login','Api\AuthController@manager_login');
Route::post('/zstream_forgot_pass','Api\AuthController@forgortPassword');
Route::post('/zstream_forgot_pass_otp_verify','Api\AuthController@forgotpass_otp_verify');

//channels
// Route::post('/channels','Api\ChannelController@index');
Route::post('/zstream_syncmyChannel','Api\ChannelController@syncmyChannel');
Route::post('/zstream_showmychannels','Api\ChannelController@showmychannels');

//test
Route::post('/test','Api\WebinarController@test');

//webinar
Route::post('/zstream_webinar','Api\WebinarController@showmywebinar');
Route::post('/zstream_webinar_create','Api\WebinarController@createnewWebinar');
Route::post('/zstream_webinar_update','Api\WebinarController@updateWebinar');
Route::post('/zstream_webinar_delete','Api\WebinarController@deleteWebinar');

//webinar comment
Route::post('/zstream_addWebinarComment','Api\WebinarController@addComment');
Route::post('/zstream_getAllWebinarComments','Api\WebinarController@getAllWebinarComments');

//webinar like dislike
Route::post('/zstream_addlike_dislike','Api\WebinarController@addlike_dislike');
Route::post('/zstream_get_like_dislike_inventory','Api\WebinarController@get_like_dislike_inventory');
Route::post('/zstream_get_like_dislike_webinar','Api\WebinarController@get_like_dislike_webinar');
// Route::post('/removelike_dislike','Api\WebinarController@removelike_dislike');

//cart routes
// Route::post('/zstream_add_to_cart','Api\CartController@add_to_cart');

//shop routes
Route::post('/zstream_shopUpdate','Api\ShopController@shopUpdate');

//shop gallery
Route::post('/zstream_storeShopGallery','Api\ShopController@storeShopGallery');
Route::post('/zstream_showshopDetails','Api\ShopController@showshopDetails');
// Route::post('/showShopGallery','Api\ShopController@showShopGallery');
// Route::post('/zstream_updateShopGalleryImage','Api\ShopController@updateShopGalleryImage');
Route::post('/zstream_deleteShopGalleryImage','Api\ShopController@deleteShopGalleryImage');


