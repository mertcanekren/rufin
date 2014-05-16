<?php

class IssueController extends BaseController {

	public function newIssue(){

        $data["projects"] = ProjectsModel::get()->toArray();

        $data["components"] = ComponentsModel::all()->toArray();



		return View::make('issue.new',compact('data'));
	}

    public function addIssue(){

        $post_data = Input::all();

        print_r($post_data);

    }

}
