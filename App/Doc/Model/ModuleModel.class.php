<?php
namespace Doc\Model;
use Think\Model;

/**
 * 模块
 * @author ruansheng
 */
class ModuleModel extends Model{
	
	/**
	 * 添加模块
	 * @param array $data
	 * @return boolean
	 */
	public function addModule($data){
		$data=array(
			'module_name'=>$data['module_name'],
			'create_time'=>time(),
			'update_time'=>time(),
			'is_del'=>0
		);
		$flag=M('Module')->add($data);
		
		return $flag;
	}
	
	/**
	 * 获取模块列表
	 * @return array
	 */
	public function getModuleList(){
		$Module=M('Module');
		$count = $Module->count();
		$Page = new \Think\Page($count,25);
		$show = $Page->show();
		// 进行分页数据查询
		$list = $Module->order('module_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		return array('count'=>$count,'pages'=>$show,'list'=>$list);
	}
	
	/**
	 * 获取模块
	 * @param array $data
	 * @return boolean
	 */
	public function getModule($moduleId){
		$module=M('Module')->where(array('module_id'=>$moduleId))->find();
		return $module;
	}
	
	/**
	 * 修改模块
	 * @param array $data
	 * @return boolean
	 */
	public function updateModule($moduleId,$data){
		$data=array(
			'module_name'=>$data['module_name'],
			'update_time'=>time(),
		);
		$flag=M('Module')->where(array('module_id'=>$moduleId))->save($data);
		return $flag;
	}
	
	/**
	 * 解封禁模块信息
	 * @param int $moduleId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delModule($moduleId,$isDel){
		$Module=M('Module');
		$da=array(
				'is_del'=>$isDel,
				'update_time'=>time()
		);
		$flag=$Module->where(array('module_id'=>$moduleId))->save($da);
		return $flag;
	}
	
	/**
	 * 删除模块信息
	 * @param int $moduleId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeModule($moduleId){
		$Module=M('Module');
		$flag=$Module->where(array('module_id'=>$moduleId))->delete();
		return $flag;
	}
	
}