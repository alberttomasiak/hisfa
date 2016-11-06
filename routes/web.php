<?php

/*
|--------------------------------------------------------------------------
| Web R!outes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Notifications\SilosVolume;

Route::get('/*', function(){
	if (!Auth::check()){
		return view('/auth/login');
	}
});

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/blokken', function() {
	return view('blokken');
});

/**
* SILO ROUTES
**/
Route::get('/silos', 				'SilosController@index');
Route::get('/silos/{type}/add', 	'SilosController@create');
Route::get('/silos/{id}/delete', 	'SilosController@destroy');
Route::get('/silos/{id}/edit',		'SilosController@edit');
Route::post('/silos', 				'SilosController@store');
Route::post('/silos/{id}/edit', 	'SilosController@update');
Route::post('/silos/{id}/editjson', 'SilosController@update_json');

/**
* STOCK ROUTES
**/
Route::get('/stock', 				'StockController@index');
Route::get('/stock/{id}/edit',		'StockController@edit');
Route::post('/stock/{id}/edit',		'StockController@update');
Route::get('/stock/add',			'StockController@create');
Route::post('/stock/add',			'StockController@store');
Route::get('/stock/{id}/delete',	'StockController@destroy');
Route::get('/stock/{id}/increase', 	'StockController@increase');
Route::get('/stock/{id}/decrease',	'StockController@decrease');

// TEST ROUTE | NO LONGER NECESSARY
//Route::get('/email', 'EmailController@checkVolume');

/**
* PROFILE ROUTES
**/
Route::get('/profiel', function(){
	return view('profile')->with('title', 'Profiel');
});
Route::get('/profiel/updateNotiPrime', 'ProfileController@ClickUpdateNotification_prime');
Route::get('/profiel/updateNotiWaste', 'ProfileController@ClickUpdateNotification_waste');

Route::get('/profiel/instellingen', function(){
	return view('profile_settings')->with('title', 'Profiel instellingen');
});

// profiel instellingen wijzigen
Route::post('/profiel/instellingen/persoonlijk', 'ProfileController@PersonalData');
Route::post('/profiel/instellingen/avatar', 'ProfileController@UserAvatar');
Route::post('/profiel/instellingen/wachtwoord', 'ProfileController@UserPassword');
// user toevoegen
Route::post('/profiel/addUser', 'ProfileController@AddUser');

Auth::routes();

Route::get('/home', 'HomeController@index');
//Route::get('/home/notifications', 'NotificationController@dashboardNotification');

/**
 * RAPPORTEN ROUTES
 **/
Route::get('/rapporten', 'RapportenController@index');

Route::get('/rapporten', function(){
	return view('rapporten')->with('title', 'Rapporten');
});
