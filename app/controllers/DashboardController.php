<?php

class DashboardController extends BaseController {

	public function dashboard(){
        $data["issue"] = IssueModel::where('users', '=', Auth::user()->id)->orderBy('id', 'DESC')->get()->take(10)->toArray();
		return View::make('dashboard.dashboard',compact('data'));
	}

}
