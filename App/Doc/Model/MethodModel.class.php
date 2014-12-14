<?php
namespace Doc\Model;
use Think\Model;

class MethodModel extends Model{
	
	public function addMethod($methodName){
		$data=array(
			'method_name'=>$methodName,
			'create_time'=>time(),
			'update_time'=>time(),
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
		return array('count'=>$count,'pages'=>$show,'list'=>$list);
	}
	
	/**
	 * 获取接口方法
	 * @param array $data
	 * @return boolean
	 */
	public function getMethod($methodId){
		$method=M('Method')->where(array('method_id'=>$methodId))->find();
		return $method;
	}
	
	/**
	 * 修改接口方法
	 * @param array $data
	 * @return boolean
	 */
	public function updateMethod($methodId,$data){
		$data=array(
				'method_name'=>$data['method_name'],
				'update_time'=>time(),
		);
		$flag=M('Method')->where(array('method_id'=>$methodId))->save($data);
		return $flag;
	}
	
	/**
	 * 解封禁接口方法信息
	 * @param int $moduleId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delMethod($methodId,$isDel){
		$Method=M('Method');
		$da=array(
				'is_del'=>$isDel,
				'update_time'=>time()
		);
		$flag=$Method->where(array('method_id'=>$methodId))->save($da);
		return $flag;
	}
	
	/**
	 * 删除接口方法信息
	 * @param int $methodId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeMethod($methodId){
		$Method=M('Method');
		$flag=$Method->where(array('method_id'=>$methodId))->delete();
		return $flag;
	}
	
}