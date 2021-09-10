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
    //return view('welcome');
    return redirect()->route('Book');
});

Route::get('ajax',function() {
    return view('message');
 });

Route::get('account/{name}','AccountController@index')->name('Account');
Route::get('loginn','AccountController@loginindex')->name('Login');
Route::get('signupp','AccountController@signupindex')->name('SignUp');

include('cartroute.php');
include('authroute.php');
include('checkoutroute.php');
include('searchroute.php');

Route::get('gallery','OtherController@galleryindex')->name('Gallery');
Route::post('gallery_categories','OtherController@gallerycategoies')->name('gallerycategoies');

Route::get('faq','OtherController@faqindex')->name('FAQ');
Route::get('aboutus','OtherController@aboutusindex')->name('AboutUs');
Route::get('contactus','OtherController@contactusindex')->name('ContactUs');
Route::post('save_msg_from_contactUs','OtherController@save_msg_from_contactUs')->name('save_msg_from_contactUs');
Route::get('error','OtherController@errorindex')->name('Error');
Route::get('commingsoon','OtherController@commingsoonindex')->name('CommingSoon');

Route::get('emptycategory','CategoryController@ecategoryindex')->name('EmptyCategory');
Route::get('category/{slug}','SearchController@search_by_category')->name('Category');

Route::get('blogcategory','BlogController@blogcategoryindex')->name('BlogCategory');
Route::get('bloglist','BlogController@bloglistindex')->name('BlogList');
Route::get('blogpost/{slug}','BlogController@blogpostindex')->name('BlogPost');

Route::get('product/{catgroup}/{catname}/{slug}','ProductController@productindex')->name('Product');
Route::get('product_this/{slug}','ProductController@productindexwithSlug')->name('ProductCurrent');
Route::get('shop/{slug}/{id?}','CosmeticsController@index')->name('homepage');
Route::get('/','CosmeticsController@index')->name('Books');
// Route::get('/','CosmeticsController@index')->name('Cosmetics');
Route::get('books/product/{name}/{cat}/{sub}','BooksController@product_cat_Index')->name('BookProduct');
Route::resource('books','BooksController');


// Route::get('orders','AccountController@accountorderhistoryindex')->name('orders');
// Route::get('wishlist','AccountController@accountwishlistindex')->name('wishlist');
// Route::get('address','AccountController@accountaddressindex')->name('address');
// Route::get('details','AccountController@accountdetailsindex')->name('details');
Auth::routes();

Route::get('/home', 'BooksController@index')->name('home');
//otp login
Route::post('request_login_otp','Auth\LoginController@request_login_otp')->name('request_login_otp');
Route::post('verify_login_otp','Auth\LoginController@verify_login_otp')->name('verify_login_otp');

//otp register
Route::post('customer_signup','Auth\RegisterController@customer_signup')->name('customer_signup');
Route::get('account_create','AccountController@account_create')->name('account_create');

Route::post('electronics_product_feedback','ProductController@product_feedback')->name('electronic.product_feedback');