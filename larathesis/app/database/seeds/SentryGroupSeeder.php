<?php

class SentryGroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('groups')->delete();

		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Administrator',
	        'permissions' => array(
	            'administrator' => 1,
	            'doctor' 		=> 1,
	            'patient'		=> 1
	        )));

		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Doctor',
	        'permissions' => array(
	            'admin' 	=> 0,
	            'doctor' 	=> 1,
	            'patient'	=> 0
	        )));

		Sentry::getGroupProvider()->create(array(
	        'name'        => 'Patient',
	        'permissions' => array(
	            'admin' 	=> 0,
	            'doctor' 	=> 0,
	            'patient'	=> 1
	        )));
	}

}