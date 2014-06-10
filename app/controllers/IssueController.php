<?php

class IssueController extends BaseController {

	public function newIssue(){
        $data["projects"] = ProjectsModel::get()->toArray();
        $data["components"] = ComponentsModel::all()->toArray();
        $data["labels"] = LabelsModel::all()->toArray();
        $data["type"] = IssueTypeModel::all()->toArray();
        $data["users"] = UserModel::where('username', '!=', "admin")->where('id', '!=', Auth::user()->id)->get()->toArray();
		return View::make('issue.new',compact('data'));
	}

    public function addIssue(){
        $post_data = Input::all();
        $validator = Validator::make(
            $post_data,
            array(
                'project' => 'required',
                'title' => 'required',
                'content' => 'required',
                'users' => 'required',
                'type' => 'required',
                'components' => 'required',
                
            ),
            array(
                'project.required' =>  Lang::get('project.project')." ".Lang::get('general.required'),
                'title.required' =>  Lang::get('issue.title')." ".Lang::get('general.required'),
                'content.required' =>  Lang::get('general.content')." ".Lang::get('general.required'),
                'users.required' =>  Lang::get('project.assigned_user')." ".Lang::get('general.required'),
                'type.required' =>  Lang::get('issue.type')." ".Lang::get('general.required'),
                'components.required' =>  Lang::get('project.components')." ".Lang::get('general.required')
            )
        );

        if ($validator->fails()){
            return Redirect::route('new-issue')->withInput()->withErrors($validator->messages());
        }

        if(isset($post_data["labels"])){
            $labels = "";
            foreach($post_data["labels"] as $lab){
                $db_labels = LabelsModel::where('content', '=', $lab)->get()->toArray();
                if($db_labels){
                    $labels .= $db_labels[0]["id"].",";
                }else{
                    $insert_labels = LabelsModel::create(array(
                        'content' => $lab,
                        'createtime' => time(),
                        'creator' => Auth::user()->id
                    ));
                    $labels .= $insert_labels->id.",";
                }
            }
        }else{
            $labels = "";
        }

        $insert = IssueModel::create(array(
            'title' => $post_data['title'],
            'content' => $post_data['content'],
            'project_id' => $post_data['project'],
            'users' => $post_data['users'],
            'type' => $post_data['type'],
            'labels' => substr($labels,0,-1),
            'components' => $post_data['components'],
            'createtime' => time(),
            'creator' => Auth::user()->id
        ));

        if (!$insert){
            return Redirect::route('new-issue')->withInput()->withErrors(array('Kayıt eklenirken teknik bir sorun oluştu...'));
        }

        return Redirect::route('issue', array('id' => $insert->id));

    }

    public function getIssue($id){
        $data["issue"] = IssueModel::where('id', '=', $id)->first()->toArray();
        $data["users"] = UserModel::where('id' , '=' , $data["issue"]["users"])->first()->toArray();
        $data["reporter"] = UserModel::where('id' , '=' , $data["issue"]["creator"])->first()->toArray();
        if($data["issue"]["labels"]){
            foreach(explode(',',$data["issue"]["labels"]) as $comp){
                if($comp != ""){
                    $comp_db = LabelsModel::where('id', '=', $comp)->first(array("content"))->toArray();
                    $data["issue"]["labels_view"][] = $comp_db;
                }
            }    
        }
        $data["issue"]["component_view"] = ComponentsModel::where('id', '=', $data["issue"]["components"])->first(array("content"))->toArray();
        $data["issue"]["type_view"] = IssueTypeModel::where('id', '=', $data["issue"]["type"])->first(array("content"))->toArray();
        if($data["issue"]["status"] == "0"){
            $data["issue"]["status_v"] = Lang::get('issue.open');
        }elseif($data["issue"]["status"] == "1"){
            $data["issue"]["status_v"] = Lang::get('issue.close');
        }else{
            $data["issue"]["status_v"] = Lang::get('issue.work');
        }
        return View::make('issue.issue',compact('data'));
    }

    public function editIssuePage($id){
        $data["projects"] = ProjectsModel::get()->toArray();
        $data["components"] = ComponentsModel::all()->toArray();
        $data["labels"] = LabelsModel::all()->toArray();
        $data["type"] = IssueTypeModel::all()->toArray();
        $data["users"] = UserModel::where('username', '!=', "admin")->where('id', '!=', Auth::user()->id)->get()->toArray();
        $data["issue"] = IssueModel::where('id', '=', $id)->first()->toArray();
        foreach(explode(',',$data["issue"]["labels"]) as $comp){
            if($comp != ""){
                $comp_db = LabelsModel::where('id', '=', $comp)->first(array("content"))->toArray();
                $data["issue"]["labels_view"][] = $comp_db;
            }
        }
        $data["issue"]["component_view"] = ComponentsModel::where('id', '=', $data["issue"]["components"])->first(array("content"))->toArray();
        $data["issue"]["type_view"] = IssueTypeModel::where('id', '=', $data["issue"]["type"])->first(array("content"))->toArray();
        return View::make('issue.edit',compact('data'));
    }
    
    public function editIssue(){
        $post_data = Input::all();
        $validator = Validator::make(
            $post_data,
            array(
                'project' => 'required',
                'title' => 'required',
                'content' => 'required',
                'users' => 'required',
                'type' => 'required',
                'components' => 'required',
                
            ),
            array(
                'project.required' =>  Lang::get('project.project')." ".Lang::get('general.required'),
                'title.required' =>  Lang::get('issue.title')." ".Lang::get('general.required'),
                'content.required' =>  Lang::get('general.content')." ".Lang::get('general.required'),
                'users.required' =>  Lang::get('project.assigned_user')." ".Lang::get('general.required'),
                'type.required' =>  Lang::get('issue.type')." ".Lang::get('general.required'),
                'components.required' =>  Lang::get('project.components')." ".Lang::get('general.required')
            )
        );

        if ($validator->fails()){
            return Redirect::route('edit-issue',$post_data["rowid"])->withInput()->withErrors($validator->messages());
        }

        if(isset($post_data["labels"])){
            $labels = "";
            foreach($post_data["labels"] as $lab){
                $db_labels = LabelsModel::where('content', '=', $lab)->get()->toArray();
                if($db_labels){
                    $labels .= $db_labels[0]["id"].",";
                }else{
                    $insert_labels = LabelsModel::create(array(
                        'content' => $lab,
                        'createtime' => time(),
                        'creator' => Auth::user()->id
                    ));
                    $labels .= $insert_labels->id.",";
                }
            }
        }else{
            $labels = "";
        }

        $issue = IssueModel::find($post_data["rowid"]);
        $issue->title = $post_data["title"];
        $issue->content = $post_data["content"];
        $issue->project_id = $post_data["project"];
        $issue->users = $post_data["users"];
        $issue->type = $post_data["type"];
        $issue->labels =  substr($labels,0,-1);
        $issue->components = $post_data["components"];
        $issue->save();

        return Redirect::route('edit-issue',array('id' =>$post_data["rowid"],'succes' => "1"));

    }


}
