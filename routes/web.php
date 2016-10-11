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
	if (!Auth::check()){
		return view('/auth/login');
	}
});

Route::get('/profiel', function(){
	return view('profile');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
