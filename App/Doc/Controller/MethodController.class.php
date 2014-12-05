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
	
}