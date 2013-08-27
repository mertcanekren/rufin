<?php
/**
 * @since 27.08.2013
 * @author Mertcan EKREN <mertcanekren at panoroman.com>
 * Form alanlarında post işleminden sonra form validation geçmez ise post yapılan değerin
 * tekrar input değerine atanması için yazıldı.
 */

if (!function_exists('input_post_val')) {
	function input_post_val($data){
		if($data){
			echo 'value="'.$data.'"';
		}
	}
}
