<?php

class AdminDashboardController extends AdminController
{
	public function getIndex(){
		$group = Sentry::getGroupProvider()->findByName('Doctor');
		$users = Sentry::getUserProvider()->findAll();
		Log::info(json_encode($group));
		return View::make('users.admin.dashboard');
	}
}
