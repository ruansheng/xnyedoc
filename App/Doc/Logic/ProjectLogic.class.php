<?php
namespace Doc\Logic;
use Think\Model;

class ProjectLogic extends Model{
	
	public function doAddProject($data){
		$Project=D('Project','Model');
		$projectId=$Project->addProject($data);
		if($projectId){
			return true;
		}else{
			return false;
		}
	}
	
	public function getProjectList(){
		$Project=D('Project','Model');
		$projectList=$Project->getProjectList();
		return $projectList;
	}
	
	public function getProject($projectId){
		$Project=D('Project','Model');
		$project=$Project->getProject($projectId);
		return $project;
	}
	
	public function doUpdateProject($data){
		$Project=D('Project','Model');
		$flag=$Project->updateProject($data['project_id'],$data);
		if($flag){
			return true;
		}else{
			return false;
		}
	}
}