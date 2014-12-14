<?php
namespace Doc\Controller;
use Doc\Controller;

/**
 * 接口
 * @author ruansheng
 */
class InterfaceController extends Controller\BaseController {
	
	/**
	 *  添加接口
	 * /index.php/Doc/Interface/addInterface
	 */
	public function addInterface(){
		//获取项目列表
		$projectList=D('Project','Logic')->getProjectList();
		//获取模块列表
		$moduleList=D('Module','Logic')->getModuleList();
		//获取方法列表
		$methodList=D('Method','Logic')->getMethodList();
		//获取版本列表
		$versionList=D('Version','Logic')->getVersionList();
		
		$this->assign('projectList',$projectList['list']);
		$this->assign('moduleList',$moduleList['list']);
		$this->assign('methodList',$methodList['list']);
		$this->assign('versionList',$versionList['list']);
		$this->display();
	}
	
	/**
	 * 添加保存接口
	 */
	public function doAddInterface(){
		$data=I('post.');
		if(!isset($data['interface_name'])){
			$this->error('必须填写接口名称');
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
	 *  接口列表
	 * /index.php/Doc/Interface/interfaceList
	 */
	public function interfaceList(){
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
}