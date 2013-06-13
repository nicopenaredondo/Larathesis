<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('test');
});

// ## ::User Account Routes::  ##
Route::get('user/login',array('before'=>'sentry_auth','uses'=>'UserAuthController@getLogin'));
Route::post('user/login',array('as' => 'login','uses' => 'UserAuthController@postLogin'));
Route::controller('user','UserAuthController');

// ## ::Administrator Routes::  ##
Route::group(array('prefix' => 'admin','before' => 'admin_auth'),function(){
	Route::get('/',function(){
		return var_dump('this is the admin index');
	});
});



// ## ::Doctor Routes::  ##
Route::group(array('prefix' => 'doctor','before' => 'doctor_auth'),function(){
	Route::get('/',function(){
		return var_dump('this is the doctor index');
	});
});

// ## ::Patient Routes::  ##
Route::group(array('prefix' => 'patient','before' => 'patient_auth'),function(){
	Route::get('/',function(){
		return var_dump('this is the patient index');
	});
});
