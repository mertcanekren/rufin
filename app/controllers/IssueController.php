<?php

class IssueController extends BaseController {

	public function newIssue(){

        $data["projects"] = ProjectsModel::get()->toArray();

        $data["components"] = ComponentsModel::all()->toArray();



		return View::make('issue.new',compact('data'));
	}

    public function addIssue(){

        $post_data = Input::all();

        $validator = Validator::make(
            $post_data,
            array(
                'project' => 'required',
                'title' => 'required',
                'content' => 'required'
            ),
            array(
                'project.required' =>  Lang::get('project.project')." ".Lang::get('general.required'),
                'title.required' =>  Lang::get('issue.title')." ".Lang::get('general.required'),
                'content.required' =>  Lang::get('general.content')." ".Lang::get('general.required')
            )
        );

        if ($validator->fails()){
            return Redirect::route('new-issue')->withInput()->withErrors($validator->messages());
        }


        $components = "";
        foreach($post_data["components"] as $comp){
            $components .= $comp.",";
        }

        $insert = IssueModel::create(array(
            'title' => $post_data['title'],
            'content' => $post_data['content'],
            'project_id' => $post_data['project'],
            'users' => $post_data['users'],
            'components' => $components
        ));

        if (!$insert){
            return Redirect::route('new-issue')->withInput()->withErrors(array('Kayıt eklenirken teknik bir sorun oluştu...'));
        }

        return Redirect::route('new-issue');



    }

}
