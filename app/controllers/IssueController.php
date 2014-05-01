<?php

class IssueController extends BaseController {

	public function newIssue(){
		return View::make('issue.new');
	}

}
