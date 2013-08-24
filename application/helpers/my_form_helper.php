<?php

if (!function_exists('input_post_val')) {
	function input_post_val($data){
		if($data){
			echo 'value="'.$data.'"';
		}
	}
}
