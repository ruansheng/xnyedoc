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
}