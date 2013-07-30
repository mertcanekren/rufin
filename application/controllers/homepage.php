<?php
class Homepage extends CI_Controller{
	
    function __construct(){
        parent::__construct();
    }
    
    public function index(){
    	$data["homepagetitle"] = "Homepage Title";
		echo $this->rf_template->View('rufin',$data,array("header"=>"header","footer"=>"footer"),"homepage/homepage.php");
    }

}
?>