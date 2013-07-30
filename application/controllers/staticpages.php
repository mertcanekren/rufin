<?php
/**
 * @since 29.07.2013
 * @author Mertcan EKREN <mertcanekren at windowslive.com>
 * Staticpages controller
 */
class Staticpages extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->rf_template->set_language_file('staticpage');
    }

    /**
     * @since 29.07.2013
     * @author Mertcan EKREN <mertcanekren at windowslive.com>
     * @template views/rufin/staticpages/about/about.php
     * About page
     */
    public function about(){
        $data["page_title"] = $this->lang->line('static_about_title');
        $data["static_about_title"] = $this->lang->line('static_about_title');
        echo $this->rf_template->View('rufin',$data,array("header"=>"header","footer"=>"footer"),"staticpages/about/about.php");
    }

}
?>