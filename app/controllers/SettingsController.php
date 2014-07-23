<?php

class SettingsController extends BaseController {

	public function index(){
		return View::make('settings.index');
	}

	public function ListUser(){
	    $data = UserModel::get()->toArray();
		return View::make('settings.users.list',compact('data'));
	}
	
	public function EditUser(){
	    $data = UserModel::get()->toArray();
		return View::make('settings.users.list',compact('data'));
	}
	
	public function DeleteUser(){
	    $data = UserModel::get()->toArray();
		return View::make('settings.users.list',compact('data'));
	}
}