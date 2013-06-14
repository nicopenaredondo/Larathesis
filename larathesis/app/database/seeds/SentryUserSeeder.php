<?php

class SentryUserSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users')->delete();

		Sentry::getUserProvider()->create(array(
	        'username'    => 'admin@admin.com',
	        'password' => 'thesisadmin',
	        'activated' => 1,
	    ));

	    Sentry::getUserProvider()->create(array(
	        'username'    => 'doctor@doctor.com',
	        'password' => 'thesisdoctor',
	        'activated' => 1,
	    ));

	     Sentry::getUserProvider()->create(array(
	        'username'    => 'patient@patient.com',
	        'password' => 'thesispatient',
	        'activated' => 1,
	    ));
	}

}