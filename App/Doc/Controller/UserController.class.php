<?php
namespace Doc\Controller;
use Doc\Controller;

/**
 * 用户
 * @author ruansheng
 */
class UserController extends Controller\BaseController {
	
	/**
	 *  添加用户
	 * /index.php/Doc/User/addUser
	 */
	public function addUser(){
		$this->display();
	}
	
	/**
	 * 添加保存用户
	 */
	public function doAddUser(){
		$data=I('post.');
		if(isset($data['user_name'])&&isset($data['password'])){
			$User=D('User','Logic');
			if($User->create($data)){
				$userId=$User->doAddUser($data);
				if($userId){
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
	 *  用户列表
	 * /index.php/Doc/User/userList
	 */
	public function userList(){
		$User=D('User','Logic');
		$userList=$User->getUserList();
	
		$this->assign('list',$userList);
		$this->display();
	}
	
}