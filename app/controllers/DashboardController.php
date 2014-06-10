<?php

class DashboardController extends BaseController {

	public function dashboard(){
        $data["issue"] = IssueModel::where('users', '=', Auth::user()->id)->where('status','=','0')->orderBy('id', 'DESC')->get()->take(10)->toArray();
        if($data["issue"]){
            $isue_count = 0;
            foreach($data["issue"] as $issue){
                $data["issue"][$isue_count]["users"] = UserModel::where('id' , '=' , $issue["users"])->first(array("username","id"))->toArray();
                if($issue["status"] == 2){
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
		return View::make('dashboard.dashboard',compact('data'));
	}
}