<?php
namespace Doc\Logic;
use Think\Model;

/**
 * 模块
 * @author ruansheng
 */
class ModuleLogic extends Model{
	
	/**
	 * 添加模块
	 * @param array $data
	 * @return boolean
	 */
	public function doAddModule($data){
		$Module=D('Module','Model');
		$moduleId=$Module->addModule($data);
		if($moduleId){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * 获取模块列表
	 * @return array
	 */
	public function getModuleList(){
		$Module=D('Module','Model');
		$moduleList=$Module->getModuleList();
		return $moduleList;
	}
	
	/**
	 * 获取模块
	 * @param int $moduleId
	 * @return array
	 */
	public function getModule($moduleId){
		$Module=D('Module','Model');
		$module=$Module->getModule($moduleId);
		return $module;
	}
	
	/**
	 * 更新模块
	 * @param array $data
	 * @return boolean
	 */
	public function doUpdateModule($data){
		$Module=D('Module','Model');
		$flag=$Module->updateModule($data['module_id'],$data);
		if($flag){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * 解封禁模块
	 * @param int $moduleId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delModule($moduleId,$type){
		$Module=D('Module','Model');
		if($type==1){  //封禁
			$flag=$Module->delModule($moduleId,1);
		}else if($type==2){//解封
			$flag=$Module->delModule($moduleId,0);
		}
	
		return $flag;
	}
	
	/**
	 * 删除模块
	 * @param int $moduleId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeModule($moduleId){
		$Module=D('Module','Model');
		$flag=$Module->removeModule($moduleId);
	
		return $flag;
	}	
	
}