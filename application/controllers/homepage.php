<?php
class Homepage extends CI_Controller{
	
    function __construct(){
        parent::__construct();
        $this->rf_template->set_language_file('homepage');
    }

    /**
     * @since 29.07.2013
     * @author Mertcan EKREN <mertcanekren at windowslive.com>
     * @template /views/rufin/homepage/homepage.php
     * Anasayfa
     */
    public function index(){
    	$data["homepage_title"] = $this->lang->line('homepage_title');
    	$data["homepage_description"] = $this->lang->line('homepage_description');
        $data["login"] = $this->lang->line('login');
        $data["page_title"] = "Rufin";
		echo $this->rf_template->View('rufin',$data,array("header"=>"header","footer"=>"footer"),"homepage/homepage.php");
    }

}
?>