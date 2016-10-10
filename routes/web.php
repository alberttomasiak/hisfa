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
    return view('home');
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
		return view('/auth/login');
	}
});

/*Route::get('/aanmelden', function(){
	return view('login');
});

Route::post('/aanmelden', 'ProfileController@login');*/

Auth::routes();

Route::get('/home', 'HomeController@index');
