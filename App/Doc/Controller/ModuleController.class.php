<?php
namespace Doc\Controller;
use Doc\Controller;

/**
 * 模块
 * @author ruansheng
 */
class ModuleController extends Controller\BaseController {
	
	/**
	 *  添加模块
	 * /index.php/Doc/Module/addModule
	 */
	public function addModule(){
		//获取项目列表
		$projectList=D('Project','Logic')->getProjectList();
		
		$this->assign('projectList',$projectList['list']);
		$this->display();
	}
	
	/**
	 * 添加保存模块
	 */
	public function doAddModule(){
		$data=I('post.');
		if(!isset($data['module_name'])||!isset($data['project_id'])){
			$this->error('必须填写模块名称');
		}
		
		$Module=D('Module','Logic');
		if($Module->create($data)){
			$moduleId=$Module->doAddModule($data);
			if($moduleId){
				$this->success('添加成功');
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->error('错误');
		}
	}
	
	/**
	 *  模块列表
	 * /index.php/Doc/Module/moduleList
	 */
	public function moduleList(){
		$Module=D('Module','Logic');
		$list=$Module->getModuleList();
		
		//获取项目列表
		$Project=D('Project','Logic');
		$projectList=$Project->getProjectList();
		
		foreach($list['list'] as &$v){
			foreach($projectList['list'] as $vi){
				if($v['project_id']==$vi['project_id']){
					$v['project_name']=$vi['project_name'];
				}
			}
		}
		
		$this->assign('count',$list['count']);
		$this->assign('pages',$list['pages']);
		$this->assign('list',$list['list']);
		$this->display();
	}
	
	/**
	 *  修改模块
	 * /index.php/Doc/Module/updateModule
	 */
	public function updateModule(){
		$moduleId=I('get.module_id');
		$Module=D('Module','Logic');
		$module=$Module->getModule($moduleId);
		
		//获取项目列表
		$Project=D('Project','Logic');
		$projectList=$Project->getProjectList();
		
		$this->assign('projectList',$projectList['list']);
		$this->assign('item',$module);
		$this->display();
	}
	
	/**
	 * 修改保存模块
	 */
	public function doUpdateModule(){
		$data=I('post.');
		if(!isset($data['module_name'])){
			$this->error('必须填写模块名称');
		}
	
		$Module=D('Module','Logic');
		if($Module->create($data)){
			$moduleId=$Module->doUpdateModule($data);
			if($moduleId){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->error('错误');
		}
	}
	
	/**
	 *  解封禁模块
	 * /index.php/Doc/Module/delModule
	 * @author ruansheng
	 */
	public function delModule(){
		$data=I('post.');
	
		if(($data['module_id']==0)||($data['type']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$Module=D('Module','Logic');
		$flag=$Module->delModule($data['module_id'],$data['type']);
	
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
	 *  删除模块
	 * /index.php/Doc/Module/removeModule
	 * @author ruansheng
	 */
	public function removeModule(){
		$data=I('post.');
	
		if(($data['module_id']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$Module=D('Module','Logic');
		$flag=$Module->removeModule($data['module_id']);
	
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