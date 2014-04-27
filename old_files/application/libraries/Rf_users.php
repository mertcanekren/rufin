<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Rf_users {
    function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->model("users/users_model");
    }

    /**
     * Login
     *
     * Email ve şifre bilgisi gönderilen kullanıcının aktiflik durumuna göre
     * sisteme login eder.
     *
     * @authdor Mertcan Ekren
     * @date 18.12.2013
     * @param $email:string, $password: string
     * @return bool
     */
    public function login($email, $password){
        if($this->CI->users_model->checkLogin($email,$password)){
            $data=$this->CI->users_model->getUserbyEmailandPassword($email,$password);
            if($data["status"] == 't'){
                $this->CI->users_model->updateLastvisitbyId($data["id"]);
                $userdata = array(
                    'user' => array(
                        'email' => $data["email"],
                        'name' => $data["name"],
                        'id' => $data["id"],
                        'usertype' => $data["usertype"],
                        'logged_in' => TRUE
                    ),
                );
                $this->CI->session->set_userdata($userdata);
                return True;
            }else{
                return False;
            }
        }else{
            return False;
        }
    }


}
