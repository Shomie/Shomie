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

Route::get('/', function(){
	return view('welcome');
});


// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

Route::get('auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'SocialAuthController@handleProviderCallback');

Auth::routes();

Route::get('welcome', function(){
	return view('welcome');
})->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');


Route::get('/landlord', 'LordController@index')->name('landlord');


Route::get('/landlord_profile', 'LordController@profile')->name('landlord_profile');
Route::post('/landlord_profile', 'LordController@update')->name('landlord_update');

Route::get('/landlord_availability_rooms', 'LordController@availability_rooms')->name('landlord_availability_rooms');
Route::post('/landlord_availability_rooms', 'LordController@available')->name('landlord_available');

Route::get('/landlord_notifications', 'LordController@notification')->name('landlord_notifications');
Route::post('/landlord_notification_answer', 'LordController@notification_reply')->name('landlord_notification_answer');

Route::get('/erasmus_main_menu', 'ErasmusController@index')->name('erasmus_main_menu');

Route::get('/erasmus_profile', 'ErasmusController@profile')->name('erasmus_profile');
Route::post('/erasmus_profile', 'ErasmusController@update')->name('erasmus_update');



Route::get('/property/{id}', 'PropertyController@index')->name('property');
Route::post('/property/{id}', 'PropertyController@RequestVisitToProperty')->name('request_visit');


Route::group(['prefix' => 'admin'], function () {
	Voyager::routes();
});
