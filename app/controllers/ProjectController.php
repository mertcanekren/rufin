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
			'status' => 1,
            'createtime' => time(),
            'creator' => Auth::user()->id
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
        $data["completed_issue_count"] = 0;
        if($data["issue"]){
            $isue_count = 0;
            foreach($data["issue"] as $issue){
                $data["issue"][$isue_count]["users"] = UserModel::where('id' , '=' , $issue["users"])->first(array("username","id"))->toArray();
                if($issue["status"] == 1){
                    $data["completed_issue_count"] += 1;
                }
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
	
	public function editProjectPage($id){
	    $data["project"] = ProjectsModel::where('id', '=', $id)->first()->toArray();
        if(Auth::user()->id == $data["project"]["creator"]){
	        return View::make('project.edit',compact('data'));
        }else{
            return Redirect::route('dashboard',array('no_view' => "1"));
        }
	}
	
	public function editProject(){
	    $post_data = Input::all();
        $data["project"] = ProjectsModel::where('id', '=', $post_data["rowid"])->first()->toArray();
        if(Auth::user()->id == $data["project"]["creator"]){
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
                return Redirect::route('edit-project')->withInput()->withErrors($validator->messages());
            }
    
            $projects = ProjectsModel::find($post_data["rowid"]);
            $projects->name = $post_data["name"];
            $projects->content = $post_data["content"];
            $projects->save();
            return Redirect::route('edit-project',array('id' =>$post_data["rowid"],'succes' => "1"));
        }else{
            return Redirect::route('dashboard',array('no_view' => "1"));
        }
	}
}