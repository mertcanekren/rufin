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
                'email' => 'required|email',
                'password' => 'required'
            ),
            array(
                'email.required' =>  Lang::get('user.username')." ".Lang::get('general.required'),
                'email.email' => Lang::get('general.email_validate'),
                'password.required' =>  Lang::get('user.password')." ".Lang::get('general.required')
            )
        );

        if ($validator->fails()) {
            return Redirect::route('login')->withInput()->withErrors($validator->messages());
        }

        if ( ! Auth::attempt(array('email' => $postData['email'], 'password' => $postData['password'])) ) {
            return Redirect::route('login')->withInput()->withErrors(array('Girdiğiniz kullanıcı bilgileri geçerli değil'));
        }
        return Redirect::route('home');
    }

    public function profile($id){
        echo $id;
    }
}
