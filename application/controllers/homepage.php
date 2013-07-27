<?php
class Homepage extends CI_Controller{
	
    function __construct(){
        parent::__construct();
		$this->rf_template->set_language_file('site');       
    }
    
    /*
	 * @tarih: 25/12/2012
	 * @olusturan: Mertcan Ekren <mertcanekren@windowslive.com>
	 * @aciklama: Sitenin anasayfasını oluşturur.
	 */
    public function index(){
    	$data["asd"] = "ad";
		echo $this->rf_template->View('rufin',$data,array("header"=>"header","footer"=>"footer"),"homepage/homepage.php");
    }

    public function asd(){
    	echo "sad";
    }
}
?>