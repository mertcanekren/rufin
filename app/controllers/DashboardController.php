<?php

class DashboardController extends BaseController {

	public function dashboard(){
        $data["issue"] = IssueModel::where('users', '=', 2)->orderBy('id', 'DESC')->get()->take(10)->toArray();
		return View::make('dashboard.dashboard',compact('data'));
	}

}
