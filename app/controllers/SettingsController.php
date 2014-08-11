<?php

class SettingsController extends BaseController {

	public function index(){
		return View::make('settings.index');
	}

    public function NewUser(){
	    $data = UserModel::get()->toArray();
		return View::make('settings.users.list',compact('data'));
	}
	public function ListUser(){
	    $data = UserModel::get()->toArray();
		return View::make('settings.users.list',compact('data'));
	}
	
	public function EditUser($id){
	    $data = UserModel::where('id','=',$id)->get()->toArray();
		return View::make('settings.users.edit',compact('data'));
	}
	
	public function DeleteUser(){
	    $data = UserModel::get()->toArray();
		return View::make('settings.users.list',compact('data'));
	}
}