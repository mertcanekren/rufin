<?php
class IssueModel extends Eloquent {

    protected $table = 'issue';
    public $timestamps = false;
	protected $fillable = array('project_id','title','content', 'users', 'components','creator','labels','type','createtime','update_time');

}
?>