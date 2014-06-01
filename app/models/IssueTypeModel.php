<?php
class IssueTypeModel extends Eloquent {

    protected $table = 'issue_type';
    public $timestamps = false;
    protected $fillable = array('content','createtime','update_time','creator','project_id');

}
?>