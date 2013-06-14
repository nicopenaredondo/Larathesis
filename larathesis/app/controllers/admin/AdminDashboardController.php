<?php

class AdminDashboardController extends AdminController
{
	public function getIndex(){
		return View::make('users.admin.dashboard');
	}
}
