<?php
class ProjectsModel extends Eloquent {

    protected $table = 'projects';
	protected $fillable = array('name','content','status','user');


}
?>