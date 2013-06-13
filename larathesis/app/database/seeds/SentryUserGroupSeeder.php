<?php

class SentryUserGroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users_groups')->delete();

		$adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');
		$adminGroup = Sentry::getGroupProvider()->findByName('Administrator');

		$doctorUser = Sentry::getUserProvider()->findByLogin('doctor@doctor.com');
		$doctorGroup = Sentry::getGroupProvider()->findByName('Doctor');

		$patientUser = Sentry::getUserProvider()->findByLogin('patient@patient.com');
		$patientGroup = Sentry::getGroupProvider()->findByName('Patient');
	    // Assign the groups to the users
	   
	    $adminUser->addGroup($adminGroup);
	    $doctorUser->addGroup($doctorGroup);
	    $patientUser->addGroup($patientGroup);
	    
	}

}