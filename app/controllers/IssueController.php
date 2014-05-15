<?php

class IssueController extends BaseController {

	public function newIssue(){

        $data["projects"] = DB::table('projects')->get();

		return View::make('issue.new',compact('data'));
	}

    public function addIssue(){


        $post_data = Input::all();

        print_r($post_data);

    }

}
