<?php

class AdminDoctorController extends AdminController
{
	public function getCreate(){
		return View::make('users.admin.doctor.create');
	}
	public function postCreate(){
		Log::info('Doctor Form Submitted');
	}
}
