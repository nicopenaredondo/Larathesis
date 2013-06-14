<?php

class UserAuthController extends BaseController
{
	/**
	* User Model
	* @var User
	**/
	protected $UserAuth;

	/**
	* Inject The Model
	*
	*/
	public function __construct(){
		//check csrf token on POST
		$this->beforeFilter('csrf',array('on' => 'post'));
		//Get the Throttle Provider
		$throttleProvider = Sentry::getThrottleProvider();
		// enable the throttling feature
		$throttleProvider->enable();
	}

	public function getIndex(){
		return Redirect::to('user/login');
	}

	public function getLogin(){
		return View::make('auth/login');
	}

	public function postLogin(){
		
		// Gather Sanitized Input
		$input = array(
			'username' 		=> Binput::get('username'),
			'password' 		=> Binput::get('password'),
			'rememberMe' 	=> Binput::get('rememberMe')
			);

		//Setting Validation Rules
		$rules = array(
			'username'		=> 'required|email',
			'password'	=> 'required|min:6'
			);

		//run the input validation
		$validator = Validator::make($input, $rules);

		if( $validator->fails() ){
			return Redirect::route('login')->withErrors($validator)
										->withInput();
		} else{
			try{
				//check for suspesion or banned status
				$user 		= Sentry::getUserProvider()->findByLogin($input['username']);
				$throttle	= Sentry::getThrottleProvider()->findByUserId($user->id);
				$throttle->check();

				//Set Login credentials
				$credentials = array(
					'username'		=> $input['username'],
					'password'	=> $input['password']
				);

				//try to authenticate the user
				$user = Sentry::authenticate($credentials,false);
			} catch (Cartalyst\Sentry\Users\UserNotFoundException $e){
				//catch if user not found
				Session::flash('error','Invalid username or password');
				return Redirect::route('login')->withInput();
			} catch ( Cartalyst\Sentry\Users\UserNotActivatedException $e ){
				//catch if user not activated
				Session::flash('error', 'You have not yet activated this account.');
				return Redirect::route('login')->withInput();
			}

			 	//get its corresponding group
				$user_info 	= Sentry::getUserProvider()->findById(Sentry::getUser()->id)->getGroups();
				Log::info($user_info);

				if (Sentry::getUser()->hasAccess('administrator'))
				{
					return Redirect::to('admin');
				}elseif (Sentry::getUser()->hasAccess('doctor'))
				{
					return Redirect::to('doctor');
				}elseif (Sentry::getUser()->hasAccess('patient'))
				{
					return Redirect::to('patient');
				}
		}		
	}

	public function getLogout(){
		Sentry::logout();
		return Redirect::to('/');
	}

}
