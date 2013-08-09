<?php
/**
 * @sinc 30.07.2013
 * @author Mertcan EKREN <mertcanekren at windowslive.com>
 * Home controller
 */
class Home extends CI_Controller{

    function __construct(){
        parent::__construct();
    }

    /**
     * @since 30.07.2013
     * @author Mertcan EKREN <mertcanekren at windowslive.com>
     * @template /views/rufin/home/dashboard/dashboard.php
     * Dashboard
     */
    public function dashboard(){
        $data["page_title"] = $this->config->config['site_name'];
        echo $this->rf_template->View('rufin',$data,array("header"=>"header","sidebar"=>"home/dashboard/sidebar","footer"=>"footer"),"home/dashboard/dashboard.php");
    }
}
?>