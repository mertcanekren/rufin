<?php
/**
 * @version  2.2
 * @since 27.08.2013
 * @author Mertcan EKREN <mertcanekren at panoroman.com>
 * @template /views/rufin/header.php
 * @param
 * @return
 * Header view dosyasında olan meta etiketlerini oluşturur.
 */

if (!function_exists('create_meta_tags')) {
    function create_meta_tags($title){
        $ci = &get_instance();
        $data =  '<title>'.$title." | ".$ci->config->config["site_name"].'</title>'."\n\t";
        $data .= '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />'."\n\t";
        $data .= '<meta name="viewport" content="width=device-width" />'."\n\t";
        $data .= '<base href="'.$ci->config->config['base_url'].'">'."\n\t";
        $data .= '<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>'."\n\t";
        $data .= '<link rel="icon" href="favicon.ico" type="image/x-icon"/>'."\n\t";
        $data .= '<link rel="stylesheet" type="text/css" href="themes/v1/css/css.css"/>'."\n\t";
        $data .= '<script type="text/javascript" src="themes/v1/js/jquery.js"></script>'."\n\t";
        $data .= '<script type="text/javascript" src="themes/v1/js/javascript.js"></script>'."\n";
        return $data;
    }
}