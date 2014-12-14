<?php
namespace Doc\Logic;
use Think\Model;

class MethodLogic extends Model{
	
	public function doAddMethod($data){
		$methodName=$data['method_name'];
		
		$Method=D('Method','Model');
		$methodId=$Method->addMethod($methodName);
		if($methodId){
			return true;
		}else{
			return false;
		}
	}
	
	public function getMethodList(){
		$Method=D('Method','Model');
		$methodList=$Method->getMethodList();
		return $methodList;
	}
	
	/**
	 * 获取接口方法
	 * @param int $methodId
	 * @return array
	 */
	public function getMethod($methodId){
		$Method=D('Method','Model');
		$method=$Method->getMethod($methodId);
		return $method;
	}
	
	/**
	 * 修改接口方法
	 * @param array $data
	 * @return boolean
	 */
	public function doUpdateMethod($data){
		$Method=D('Method','Model');
		$flag=$Method->updateMethod($data['method_id'],$data);
		if($flag){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * 解封禁接口方法
	 * @param int $methodId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delMethod($methodId,$type){
		$Method=D('Method','Model');
		if($type==1){  //封禁
			$flag=$Method->delMethod($methodId,1);
		}else if($type==2){//解封
			$flag=$Method->delMethod($methodId,0);
		}
	
		return $flag;
	}
	
	/**
	 * 删除接口方法
	 * @param int $methodId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeMethod($methodId){
		$Method=D('Method','Model');
		$flag=$Method->removeMethod($methodId);
	
		return $flag;
	}
}