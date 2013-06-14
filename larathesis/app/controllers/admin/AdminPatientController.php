<?php

class AdminPatientController extends AdminController
{
	public function getCreate(){
		return View::make('users.admin.patient.create');
	}
	public function postCreate(){
		Log::info('Patient Form Submitted');
	}
}
