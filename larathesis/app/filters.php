<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});


/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/*
|--------------------------------------------------------------------------
| Sentry Authentication Filter
|--------------------------------------------------------------------------
|
| The following filters are used to verify the user groups. 
| There are 3 user groups in this application
|  1. Administrator
|  2. Doctor
|  3. Patient
*/

Route::filter('sentry_auth', function(){
	if (Sentry::check()) 
	{
		if(Sentry::getUser()->hasAccess('administrator')){
			Log::info('this is admin');
			return Redirect::to('admin');
		}

		if(Sentry::getUser()->hasAccess('doctor')){
			Log::info('this is doctor');
			return Redirect::to('doctor');
		}

		if(Sentry::getUser()->hasAccess('patient')){
			Log::info('this is patient');
			return Redirect::to('patient');
		}
	}
});

Route::filter('admin_auth',function(){
	if (!Sentry::check()) 
	{
		return Response::make('Page Not Found','404');
	}

	if (!Sentry::getUser()->hasAccess('administrator'))
	{
		// has no access
		return Response::make('Page Not Found', '404');
	}
});

Route::filter('doctor_auth',function(){
	if (!Sentry::check()) 
	{
		return Response::make('Page Not Found','404');
	}

	if (!Sentry::getUser()->hasAccess('doctor'))
	{
		// has no access
		return Response::make('Page Not Found', '404');
	}
});

Route::filter('patient_auth',function(){
	if (!Sentry::check()) 
	{
		return Response::make('Page Not Found','404');
	}

	if (!Sentry::getUser()->hasAccess('patient'))
	{
		// has no access
		return Response::make('Page Not Found', '404');
	}
});
