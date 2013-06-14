<?php

class AdminDoctorController extends AdminController
{
	public function getCreate(){
		return View::make('users.admin.doctor.create');
	}
	public function postCreate(){
		
		// gather Sanitized Input 

		$input = array(
			'username' 		=> Binput::get('username'),
			'password' 		=> Binput::get('password')
			);

		$rules = array (
			'username' => 'required|min:4|max:32',
			'password' => 'required|min:6',
			);

		$validator = Validator::make($input,$rules);

		if( $validator->fails() ){
			return Redirect::to('admin/doctor/create')->withErrors($validator)->withInput();
		}else{
			try{
				Sentry::getUserProvider()->create(array(
			        'username'    	=> Binput::get('username'),
			        'password' 		=> Binput::get('password'),
			        'activated' 	=> 1,
			    ));
			    $doctorUser 	= Sentry::getUserProvider()->findByLogin(Binput::get('username'));
				$doctorGroup	= Sentry::getGroupProvider()->findByName('Doctor');
				$doctorUser->addGroup($doctorGroup);
				Session::flash('success','Your account has been created');
				return Redirect::to('admin');
			}
			catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
			    Session::flash('error', 'Login field required.');
			    return Redirect::to('admin/doctor/create')->withErrors($validator)->withInput();
			}
			catch (Cartalyst\Sentry\Users\UserExistsException $e)
			{
			    Session::flash('error', 'User already exists.');
			    return Redirect::to('admin/doctor/create')->withErrors($validator)->withInput();
			}
		}

		Log::info(json_encode($input));
	}
}
