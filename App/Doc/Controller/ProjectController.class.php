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
		$list=$Project->getProjectList();
		
		$this->assign('count',$list['count']);
		$this->assign('pages',$list['pages']);
		$this->assign('list',$list['list']);
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
	
	/**
	 *  解封禁项目
	 * /index.php/Doc/Project/delProject
	 * @author ruansheng
	 */
	public function delProject(){
		$data=I('post.');
	
		if(($data['project_id']==0)||($data['type']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$Project=D('Project','Logic');
		$flag=$Project->delProject($data['project_id'],$data['type']);
	
		if($flag){
			$result=array(
					'status'=>0,
					'msg'=>'成功'
			);
			exit(json_encode($result));
		}else{
			$result=array(
					'status'=>-1,
					'msg'=>'封禁失败'
			);
			exit(json_encode($result));
		}
	}
	
	/**
	 *  删除项目
	 * /index.php/Doc/Project/removeProject
	 * @author ruansheng
	 */
	public function removeProject(){
		$data=I('post.');
	
		if(($data['project_id']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$Project=D('Project','Logic');
		$flag=$Project->removeProject($data['project_id']);
	
		if($flag){
			$result=array(
					'status'=>0,
					'msg'=>'删除成功'
			);
			exit(json_encode($result));
		}else{
			$result=array(
					'status'=>-1,
					'msg'=>'删除失败'
			);
			exit(json_encode($result));
		}
	}
	
}