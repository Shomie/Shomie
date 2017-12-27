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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/expenses_included', 'HomeController@expenses_included')->name('expenses_included');
Route::get('/double_bed', 'HomeController@double_bed')->name('double_bed');
Route::get('/single_bed', 'HomeController@single_bed')->name('single_bed');
Route::get('/comfort', 'HomeController@comfort')->name('comfort');
Route::get('/bargain', 'HomeController@bargain')->name('bargain');
Route::post('/search', 'HomeController@search')->name('search');


Route::get('/property/{id}', 'PropertyController@index')->name('property');


Route::get('/userprofile', 'UserProfile@index')->name('userprofile');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
