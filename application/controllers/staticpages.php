<?php
/**
 * @since 29.07.2013
 * @author Mertcan EKREN <mertcanekren at windowslive.com>
 * Staticpages controller
 */
class Staticpages extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    /**
     * @since 29.07.2013
     * @author Mertcan EKREN <mertcanekren at windowslive.com>
     * @template view/rufin/staticpages/about/about.php
     * About page
     */
    public function about(){
        $data["pagetitle"] = "about";
        echo $this->rf_template->View('rufin',$data,array("header"=>"header","footer"=>"footer"),"staticpages/about/about.php");
    }

}
?>