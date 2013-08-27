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
        $data["login"]      = $this->lang->line('login');
        $data["username"]   = $this->lang->line('username');
        $data["password"]   = $this->lang->line('password');
        $data["page_title"] = $this->lang->line('login');
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


    public function edit(){
        $this->rf_template->set_language_file('user');
        $data["form_title"] = $this->lang->line('edit_account');
        $data["page_title"] = $this->lang->line('edit_account');
        echo $this->rf_template->View('rufin',$data,array("header"=>"header","sidebar"=>"home/dashboard/sidebar","footer"=>"footer"),"user/account/edit/edit.php");
    }
}
?>