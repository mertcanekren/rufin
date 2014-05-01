<?php

class DashboardController extends BaseController {

	public function dashboard(){
		return View::make('dashboard.dashboard');
	}

}
