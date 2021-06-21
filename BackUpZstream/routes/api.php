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

Route::get('/test','Api\AuthController@test');
/*new api*/
Route::post('/get_connection_id','Api\AuthController@get_connection_id');
Route::post('/get_diary_connection_id','DiaryApi\AuthController@get_connection_id');
Route::post('/request_otp','Api\AuthController@otp_request');
Route::post('/verify_otp','Api\AuthController@verify_otp');
Route::post('/verify_otp/{type}','Api\AuthController@verify_otp_new');
Route::post('/customer_register','Api\AuthController@customer_register');
Route::post('/customer_login','Api\AuthController@customer_login');
Route::post('/profile/{type}','Api\AuthController@profile');
Route::post('/logout','Api\AuthController@logout');
Route::post('/celebrity_login','Api\AuthController@celebrity_login');
Route::post('/manager_login','Api\AuthController@manager_login');
Route::post('/forgot_pass','Api\AuthController@forgortPassword');
Route::post('/forgot_pass_otp_verify','Api\AuthController@forgotpass_otp_verify');

//channels
Route::post('/channels','Api\ChannelController@index');
Route::post('/createmyChannel','Api\ChannelController@createmyChannel');
Route::post('/showmychannels','Api\ChannelController@showmychannels');

//test
Route::post('/test','Api\WebinarController@test');

//webinar
Route::post('/webinar','Api\WebinarController@showmywebinar');
Route::post('/webinar_create','Api\WebinarController@createnewWebinar');
Route::post('/webinar_update','Api\WebinarController@updateWebinar');
Route::post('/webinar_delete','Api\WebinarController@deleteWebinar');

//webinar comment
Route::post('/addWebinarComment','Api\WebinarController@addComment');
Route::post('/getAllWebinarComments','Api\WebinarController@getAllWebinarComments');

//webinar like dislike
Route::post('/addlike_dislike','Api\WebinarController@addlike_dislike');
Route::post('/removelike_dislike','Api\WebinarController@removelike_dislike');