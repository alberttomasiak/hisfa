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
Route::post('/silos', 				'SilosController@store');

Route::get('/email', 'EmailController@checkVolume');

/**
* PROFILE ROUTES
**/
Route::get('/profiel', function(){
	return view('profile');
});

Route::get('/profiel/instellingen', function(){
	return view('profile_settings');
});

Route::post('/profiel/instellingen/persoonlijk', 'ProfileController@PersonalData');
Route::post('/profiel/instellingen/avatar', 'ProfileController@UserAvatar');
Route::post('/profiel/instellingen/wachtwoord', 'ProfileController@UserPassword');

Auth::routes();

Route::get('/home', 'HomeController@index');
//Route::get('/home/notifications', 'NotificationController@dashboardNotification');
