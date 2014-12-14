<?php
namespace Doc\Model;
use Think\Model;

class ProjectModel extends Model{
	
	/**
	 * 添加项目
	 * @param array $data
	 * @return boolean
	 */
	public function addProject($data){
		$data=array(
			'project_name'=>$data['project_name'],
			'project_desc'=>$data['project_desc'],
			'project_icon'=>$data['project_icon'],
			'create_time'=>time(),
			'update_time'=>time(),
			'is_del'=>0
		);
		$flag=M('Project')->add($data);
		
		return $flag;
	}
	
	/**
	 * 获取项目列表
	 * @return array
	 */
	public function getProjectList(){
		$Project=M('Project');
		$count = $Project->count();
		$Page = new \Think\Page($count,25);
		$show = $Page->show();
		// 进行分页数据查询
		$list = $Project->order('project_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		return array('count'=>$count,'pages'=>$show,'list'=>$list);
	}
	
	/**
	 * 获取项目
	 * @param array $data
	 * @return boolean
	 */
	public function getProject($projectId){
		$project=M('Project')->where(array('project_id'=>$projectId))->find();
		return $project;
	}
	
	/**
	 * 修改项目
	 * @param array $data
	 * @return boolean
	 */
	public function updateProject($projectId,$data){
		$data=array(
			'project_name'=>$data['project_name'],
			'project_desc'=>$data['project_desc'],
			'project_icon'=>$data['project_icon'],
			'update_time'=>time(),
		);
		$flag=M('Project')->where(array('project_id'=>$projectId))->save($data);
	
		return $flag;
	}
	
	/**
	 * 解封禁项目信息
	 * @param int $projectId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delProject($projectId,$isDel){
		$Project=M('Project');
		$da=array(
				'is_del'=>$isDel,
				'update_time'=>time()
		);
		$flag=$Project->where(array('project_id'=>$projectId))->save($da);
		return $flag;
	}
	
	/**
	 * 删除项目信息
	 * @param int $projectId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeProject($projectId){
		$Project=M('Project');
		$flag=$Project->where(array('project_id'=>$projectId))->delete();
		return $flag;
	}
	
}