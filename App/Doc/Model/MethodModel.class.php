<?php
namespace Doc\Model;
use Think\Model;

class MethodModel extends Model{
	
	public function addMethod($methodName){
		$data=array(
			'method_name'=>$methodName
		);
		$flag=M('Method')->add($data);
		
		return $flag;
	}
	
	public function getMethodList(){
		$Method=M('Method');
		$count = $Method->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		// 进行分页数据查询
		$list = $Method->order('method_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		return $list;
	}
	
}