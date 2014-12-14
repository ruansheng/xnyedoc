<?php
namespace Doc\Logic;
use Think\Model;

/**
 * 项目
 * @author ruansheng
 */
class ProjectLogic extends Model{
	
	/**
	 * 添加项目
	 * @param array $data
	 * @return boolean
	 */
	public function doAddProject($data){
		$Project=D('Project','Model');
		$projectId=$Project->addProject($data);
		if($projectId){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * 获取项目列表
	 * @return array
	 */
	public function getProjectList(){
		$Project=D('Project','Model');
		$projectList=$Project->getProjectList();
		return $projectList;
	}
	
	/**
	 * 获取项目
	 * @param int $projectId
	 * @return array
	 */
	public function getProject($projectId){
		$Project=D('Project','Model');
		$project=$Project->getProject($projectId);
		return $project;
	}
	
	/**
	 * 修改项目
	 * @param array $data
	 * @return boolean
	 */
	public function doUpdateProject($data){
		$Project=D('Project','Model');
		$flag=$Project->updateProject($data['project_id'],$data);
		if($flag){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * 解封禁项目
	 * @param int $projectId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delProject($projectId,$type){
		$Project=D('Project','Model');
		if($type==1){  //封禁
			$flag=$Project->delProject($projectId,1);
		}else if($type==2){//解封
			$flag=$Project->delProject($projectId,0);
		}
	
		return $flag;
	}
	
	/**
	 * 删除项目
	 * @param int $projectId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeProject($projectId){
		$Project=D('Project','Model');
		$flag=$Project->removeProject($projectId);
	
		return $flag;
	}
	
}