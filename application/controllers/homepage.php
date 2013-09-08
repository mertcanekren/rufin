<?php
class Homepage extends CI_Controller{
	
    function __construct(){
        parent::__construct();
    }

    /**
     * @since 29.07.2013
     * @author Mertcan EKREN <mertcanekren at windowslive.com>
     * @template /views/rufin/homepage/homepage.php
     * Anasayfa
     */
    public function index(){
        $this->rf_template->set_language_file('homepage');
        $data = $this->rf_template->set_language_data(array('homepage_title','homepage_description','login'));
        echo $this->rf_template->View('rufin',$data,array("header"=>"header","footer"=>"footer"),"homepage/homepage.php");
    }

}
?>