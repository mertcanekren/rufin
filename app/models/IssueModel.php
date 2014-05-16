<?php
class IssueModel extends Eloquent {

    protected $table = 'issue';
	protected $fillable = array('project_id','title','content', 'users', 'components');

}
?>