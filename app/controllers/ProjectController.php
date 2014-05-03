<?php

class ProjectController extends BaseController {

	public function newProject(){
		return View::make('project.new');
	}

}
