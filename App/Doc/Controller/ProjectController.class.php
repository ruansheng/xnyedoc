<?php
namespace Doc\Controller;
use Doc\Controller;

/**
 * 项目
 * @author ruansheng
 */
class ProjectController extends Controller\BaseController {
	
	/**
	 *  添加项目
	 * /index.php/Doc/Project/addProject
	 */
	public function addProject(){
		$this->display();
	}
	
	/**
	 * 添加保存项目
	 */
	public function doAddProject(){
		$data=I('post.');
		if(!isset($data['project_name'])){
			$this->error('必须填写项目名称');
		}
		
		if(!isset($data['project_desc'])){
			$this->error('必须填写项目描述');
		}
		
		$Project=D('Project','Logic');
		if($Project->create($data)){
			$projectId=$Project->doAddProject($data);
			if($projectId){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->error('错误');
		}
	}
	
	/**
	 *  项目列表
	 * /index.php/Doc/Project/projectList
	 */
	public function projectList(){
		$Project=D('Project','Logic');
		$projectList=$Project->getProjectList();
		
		$this->assign('list',$projectList);
		$this->display();
	}
	
	/**
	 *  修改项目
	 * /index.php/Doc/Project/updateProject
	 */
	public function updateProject(){
		$projectId=I('get.project_id');
		$Project=D('Project','Logic');
		$project=$Project->getProject($projectId);
		$this->assign('item',$project);
		$this->display();
	}
	
	/**
	 * 修改保存项目
	 */
	public function doUpdateProject(){
		$data=I('post.');
		if(!isset($data['project_name'])){
			$this->error('必须填写项目名称');
		}
	
		if(!isset($data['project_desc'])){
			$this->error('必须填写项目描述');
		}
	
		$Project=D('Project','Logic');
		if($Project->create($data)){
			$projectId=$Project->doUpdateProject($data);
			if($projectId){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->error('错误');
		}
	}
}