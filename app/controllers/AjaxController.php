<?php

class AjaxController extends BaseController {

    // Header da bulunan projeler alanı için son 5 projeyi listeler
    public function getProjectsList(){
        $data = ProjectsModel::orderBy('id', 'DESC')->get(array('name','content', 'id'))->take(5);
        return Response::json($data);
    }
    
    public function workIssue(){
        $post_data = Input::all();
        $issue = IssueModel::find($post_data["id"]);
        $issue->status = $post_data["status"];
        $issue->save();
        
        
    }

}
