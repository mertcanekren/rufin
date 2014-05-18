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
            return Redirect::route('new-project')->withInput()->withErrors(array('Kayıt eklenirken teknik bir sorun oluştu...'));
        }
        return Redirect::route('get-project', array('id' => $insert->id));
	}

	public function getProject($id){
		$data["project"] = ProjectsModel::where('id', '=', $id)->first()->toArray();
		$data["issue"] = IssueModel::where('project_id', '=', $id)->get()->toArray();
        $data["issue_count"] = count($data["issue"]);
        if($data["issue"]){
            $isue_count = 0;
            foreach($data["issue"] as $issue){
                if($issue["components"]){
                    foreach(explode(',',$issue["components"]) as $comp){
                        if($comp != ""){
                            $comp_db = ComponentsModel::where('id', '=', $comp)->first(array("content"))->toArray();
                            $data["issue"][$isue_count]["components_view"][] = $comp_db;
                        }
                    }
                }
                $isue_count++;
            }
        }
        return View::make('project.project',compact('data'));
	}
}