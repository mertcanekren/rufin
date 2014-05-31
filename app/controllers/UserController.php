<?php

class UserController extends BaseController {

	public function login(){
		return View::make('user.login');
	}

    public function logout(){
        Auth::logout();
        return Redirect::route('dashboard');
    }

    public function signIn(){
        $postData = Input::all();
        $validator = Validator::make(
            $postData,
            array(
                'username' => 'required',
                'password' => 'required'
            ),
            array(
                'username.required' =>  Lang::get('user.username')." ".Lang::get('general.required'),
                'password.required' =>  Lang::get('user.password')." ".Lang::get('general.required')
            )
        );

        if ($validator->fails()) {
            return Redirect::route('login')->withInput()->withErrors($validator->messages());
        }

        if ( ! Auth::attempt(array('username' => $postData['username'], 'password' => $postData['password'])) ) {
            return Redirect::route('login')->withInput()->withErrors(array('Girdiğiniz kullanıcı bilgileri geçerli değil'));
        }
        return Redirect::route('home');
    }

    public function profile($id){
        echo $id;
    }
}
