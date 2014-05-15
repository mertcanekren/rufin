<?php

class IssueController extends BaseController {

	public function newIssue(){

        $data["projects"] = ProjectsModel::get()->toArray();

        $components = ComponentsModel::all()->toArray();

        $data["components"] = "";
        foreach($components as $comp){
            $data["components"] .= $comp["content"].",";
        }


		return View::make('issue.new',compact('data'));
	}

    public function addIssue(){


        $post_data = Input::all();

        print_r($post_data);

    }

}
