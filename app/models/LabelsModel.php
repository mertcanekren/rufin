<?php
class LabelsModel extends Eloquent {

    protected $table = 'labels';
    public $timestamps = false;
    protected $fillable = array('content','createtime','update_time','creator','project_id');


}
?>