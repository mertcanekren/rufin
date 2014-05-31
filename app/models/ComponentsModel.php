<?php
class ComponentsModel extends Eloquent {

    protected $table = 'components';
    public $timestamps = false;
    protected $fillable = array('content','createtime','update_time','creator');


}
?>