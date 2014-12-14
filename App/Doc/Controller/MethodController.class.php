<?php
namespace Doc\Controller;
use Doc\Controller;

/**
 * 接口方法
 * @author ruansheng
 */
class MethodController extends Controller\BaseController {
	
	/**
	 *  添加接口方法
	 * /index.php/Doc/Method/addMethod
	 */
	public function addMethod(){
		$this->display();
	}
	
	/**
	 * 添加保存接口方法
	 */
	public function doAddMethod(){
		$data=I('post.');
		if(isset($data['method_name'])){
			$Method=D('Method','Logic');
			if($Method->create($data)){
				$methodId=$Method->doAddMethod($data);
				if($methodId){
					$this->success('添加成功');
				}else{
					$this->error('添加失败');
				}
			}else{
				$this->error('错误');
			}
		}else{
			$this->error('必须填写');
		}
	}
	
	/**
	 *  接口方法列表
	 * /index.php/Doc/Method/methodList
	 */
	public function methodList(){
		$Method=D('Method','Logic');
		$list=$Method->getMethodList();
	
		$this->assign('count',$list['count']);
		$this->assign('pages',$list['pages']);
		$this->assign('list',$list['list']);
		$this->display();
	}
	
	/**
	 *  修改接口方法
	 * /index.php/Doc/Method/updateMethod
	 */
	public function updateMethod(){
		$methodId=I('get.method_id');
		$Method=D('Method','Logic');
		$method=$Method->getMethod($methodId);
		$this->assign('item',$method);
		$this->display();
	}
	
	/**
	 * 修改保存接口方法
	 */
	public function doUpdateMethod(){
		$data=I('post.');
		if(!isset($data['method_name'])){
			$this->error('必须填写模块名称');
		}
	
		$Method=D('Method','Logic');
		if($Method->create($data)){
			$methodId=$Method->doUpdateMethod($data);
			if($methodId){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->error('错误');
		}
	}
	
	/**
	 *  解封禁接口方法
	 * /index.php/Doc/Method/delMethod
	 * @author ruansheng
	 */
	public function delMethod(){
		$data=I('post.');
	
		if(($data['method_id']==0)||($data['type']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$Method=D('Method','Logic');
		$flag=$Method->delMethod($data['method_id'],$data['type']);
	
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
	 *  删除方法接口
	 * /index.php/Doc/Method/removeMethod
	 * @author ruansheng
	 */
	public function removeMethod(){
		$data=I('post.');
	
		if(($data['method_id']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$Method=D('Method','Logic');
		$flag=$Method->removeMethod($data['method_id']);
	
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