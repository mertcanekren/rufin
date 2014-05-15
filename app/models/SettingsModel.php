<?php
class SettingsModel extends Eloquent {

    protected $table = 'settings';
	protected $fillable = array('module','content');

}
?>