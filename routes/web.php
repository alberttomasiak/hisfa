<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/blokken', function() {
	return view('blokken');
});

Route::get('/silos', function(){
	return view('silos');
});

Route::get('/*', function(){
	if (Auth::check()){
		// Do nothing, the user is logged in.
	}else{
		return view('home');
	}
});

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
