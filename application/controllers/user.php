<?php
/**
 * @since 29.07.2013
 * @author Mertcan EKREN <mertcanekren at windowslive.com>
 * User controller
 */
class User extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    /**
     * @since 29.07.2013
     * @author Mertcan EKREN <mertcanekren at windowslive.com>
     * @template /views/rufin/user/login/login.php
     * User login
     */
    public function login(){
        $data = $this->rf_template->set_language_data(array('login','username','password','page_title' => 'login'));
        if($this->input->post()){
        	$this->form_validation->set_rules('username', $data["username"], 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('password', $data["password"], 'required|xss_clean');
			if($this->form_validation->run() == TRUE){
                if($this->input->post('username') == "test@test.com"){
                    redirect('home');
                }
			}
        }
        echo $this->rf_template->View('rufin',$data,array("header"=>"header","footer"=>"footer"),"user/login/login.php");
    }

    /**
     * @since 26.08.2013
     * @author Mertcan EKREN <mertcanekren at panoroman.com>
     * @template /views/rufin/user/account/edit/edit.php
     * Kullanıcıların hesap bilgilerini düzenlediği sayfa
     */
    public function edit(){
        $this->rf_template->set_language_file('user');
        $data = $this->rf_template->set_language_data(array('name','surname','email','form_title' => 'edit_account','page_title' => 'edit_account','save'));
        if($this->input->post()){
            $this->form_validation->set_rules('name', $data["name"], 'required|xss_clean');
            $this->form_validation->set_rules('surname', $data["surname"], 'required|xss_clean');
            if($this->form_validation->run() == TRUE){

            }
        }
        echo $this->rf_template->View('rufin',$data,array("header"=>"header","sidebar"=>"home/dashboard/sidebar","footer"=>"footer"),"user/account/edit/edit.php");
    }
}
?>