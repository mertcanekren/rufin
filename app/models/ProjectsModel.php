<?php
class ProjectsModel extends Eloquent {

    protected $table = 'projects';
    public $timestamps = false;
	protected $fillable = array('name','content','status','user','creator','createtime','update_time');


}
?>