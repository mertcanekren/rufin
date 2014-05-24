<?php

class AjaxController extends BaseController {

    public function getProjectsList(){
        $data = ProjectsModel::orderBy('id', 'DESC')->get(array('name','content', 'id'))->take(5);
        return Response::json($data);
    }

}
