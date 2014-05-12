<?php

class IssueController extends BaseController {

	public function newIssue(){

		
		return View::make('issue.new');
	}

    public function addIssue(){
        $post_data = Input::all();

        print_r($post_data);
    }

}
