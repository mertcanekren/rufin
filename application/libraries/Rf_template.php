<?php
/**
 * Created by IntelliJ IDEA.
 * User: fuatpoyraz
 * Date: 5/10/12
 * Time: 10:37 AM
 * To change this template use File | Settings | File Templates.
 *
 * Viewleri layout ve template mantigina yerlestirip.Controller icinde daha kolay kullanmak icin dizay edilmistir.
 * Birdan fazla tema arasında geçiş yapılabilir.
 * Sayfa birden fazla alana bölünüp render ediliebilir.
 * Layout belirlenip.Layouttaki yerlesime gore sayfa render edilebilir.
 */
class Rf_Template{

    private $theme_dir="../";
    private $theme_url="/themes/";
    private $theme_name;
    private $exdata=array();
    private $layout_name;
    private $language="turkish";

    function Rf_Template(){
       $this->template = &get_instance();       
       $this->template->load->library('parser');
    }

    public function set_themedir($theme_dir){
        $this->theme_dir=$theme_dir;
    }

    public function set_language_file($language_file,$language_data=null){
    	$this->template->lang->load($language_file,$this->language);
    }

    /**
     * @since 27.08.2013
     * @author Mertcan EKREN <mertcanekren at panoroman.com>
     * @param array: lang key
     * @return array
     * Gönderilen lang değerlerini sayfada görünecek şekilde data ya eşitler
     */
        public function set_language_data($language_data){
        $lang_data = array();
        foreach($language_data as $key=>$value){
            $lang_data[$value] = $this->template->lang->line($value);
            if($key){
                $lang_data[$key] = $this->template->lang->line($value);
            }
        }
        return $lang_data;
    }

    public function get_themedir(){
        return $this->theme_dir;
    }

    public function get_themename(){
        /**
         * @access	public
         * Kullanilan temayi geri dondurur
         */
        return $this->theme_name;
    }

    public function set_theme($theme_name){
        /**
         * @access	public
         * @param	theme_name:string
         *
         * Hangi temanin kullanilaca
         */
        $this->theme_name=$theme_name;
        $this->theme_url=$this->theme_url.$theme_name."/";
    }
    private function create_data(){
        /*
         * @access private
         * @param none
         * @return none
         *
         * Viewler icinde  kullanilabilecek degiskenkeleri olusturur.
         * +Session
         * */
        if(isset($this->template->session)){
            $this->exdata["session"]=$this->template->session;
        }
        $this->exdata["theme"]=array("theme_url"=>$this->theme_url);

    }
    public function set_create_data($extdatas=array()){
        /*
         * @access public
         * @param none
         * @return none
         *
         * Layoutta belirtilen alanlarda veriyi kullanmak icin kullanilir
         *
         * */
        $this->exdata=array_merge($this->exdata,$extdatas);
    }
    public function set_layout($layout_name,$layout_section=False){
       /*
       * @access public
       * @param $layout_name:kullanilacak sablon dosyasinin ismi,sablonda kullanicica degiskken ve dosyalar
       * @return none
       *
       * Belirtilen sablon ismini degiskene atar.
       * sablonda kullanilmak uzere belirtilmis alanlari exdata dan aldıgı bilgi ile render edip
       * $this->data degiskenine yazar.
       *
       * */
       $this->create_data();
       if($layout_section){
           foreach ($layout_section as $key => $val){
               $this->data[$key]=$this->template->load->view($this->theme_name."/".$val.".php",$this->exdata,TRUE);
           }
       }

       //print_r($layout_section);
       $this->layout_name=$layout_name;
    }
    public function RenderView($view,$data=array()){
       /*
       * @access public
       * @param $view:kullanilacak view dosyasinin ismi.data view de kullanilacak datalar
       * @return void
       *
       *  fonksiyonda verilen datayi ve create_data deki veriyi birlestirip.
       *  $view degiskeni ile verilen dosyayi render eder.
       *
       *
       *
       * */
       $newdata=array_merge($this->exdata,$data);
       //print_r($newdata);
       $this->data["main"]=$this->template->load->view($this->theme_name."/".$view,$newdata,TRUE);
       return $this->template->load->view($this->theme_name."/".$this->layout_name,$this->data,TRUE);
    }

    /* @render_html
     * @tarih: 04/07/2012
     * @olusturan: Fuat Poyraz <fuat at dorabilisim.com>
     * @aciklama: html değişkeni ile gönderilen veri data arrayının içindeki veri ile harmanlanıp döndürülür
     * codeigniterin parser classı kullanılmıştır.
     * @param $html render edilecek html,render edilirken kullanılacak degiskenler
     * @donus void
     */
    public function render_html($html,$data=array()){
        return $this->template->parser->parse_string($html,$data,TRUE);
    }

    /*
     *
     * Viewleri basmak için hazırlandı. Controller kısmında daha kısa kod için.
     *
    */
    public function View($theme,$data=null,$layout,$view){
    	if($data != null){
    		$this->set_create_data($data);
    	}
    	$this->set_theme($theme);
		$this->set_layout("layout",$layout);
		return $this->RenderView($view,$data);
    }
}