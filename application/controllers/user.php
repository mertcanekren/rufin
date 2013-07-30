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
        echo $this->rf_template->View('rufin',$data,array("header"=>"header","footer"=>"footer"),"user/login/login.php");
    }

}
?>