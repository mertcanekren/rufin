<?php

class ProjectController extends BaseController {

	public function newProject(){
		return View::make('project.new');
	}

	public function addProject(){
		$post_data = Input::all();
        $validator = Validator::make(
			$post_data,
			array(
				'name' => 'required',
				'content' => 'required'
			),
			array(
				'name.required' =>  Lang::get('project.name')." ".Lang::get('general.required'),
				'content.required' =>  Lang::get('general.content')." ".Lang::get('general.required')
			)
		);

        if ($validator->fails()){            
            return Redirect::route('new-project')->withInput()->withErrors($validator->messages());
        }

        $insert = ProjectsModel::create(array(
			'name' => $post_data['name'],
			'content' => $post_data['content'],
			'user' => 1,
			'status' => 1
        ));

        if (!$insert){
            return Redirect::route('new-project')->withInput()->withErrors(array('Tutar eklenirken teknik bir sorun oluştu...'));
        }
        return Redirect::route('get-project', array('id' => $insert->id));

	}

	public function getProject($id){
		$project = ProjectsModel::where('id', '=', $id)->first();
		return View::make('project.project',compact('project'));
	}
}