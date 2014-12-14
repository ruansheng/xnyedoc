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
		$list=$User->getUserList();
		
		$this->assign('count',$list['count']);
		$this->assign('pages',$list['pages']);
		$this->assign('list',$list['list']);
		$this->display();
	}
	
	/**
	 *  修改用户
	 * /index.php/Doc/User/updateUser
	 */
	public function updateUser(){
		$userId=I('get.user_id');
		$User=D('User','Logic');
		$userInfo=$User->getUser($userId);
		$this->assign('item',$userInfo);
		$this->display();
	}
	
	/**
	 * 修改保存用户
	 */
	public function doUpdateUser(){
		$data=I('post.');
		if(!isset($data['user_name'])){
			$this->error('必须填写用户昵称');
		}
	
		$User=D('User','Logic');
		if($User->create($data)){
			$userId=$User->doUpdateUser($data);
			if($userId){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->error('错误');
		}
	}
	
	/**
	 *  解封禁用户
	 * /index.php/Doc/User/delUser
	 * @author ruansheng
	 */
	public function delUser(){
		$data=I('post.');
	
		if(($data['user_id']==0)||($data['type']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$User=D('User','Logic');
		$flag=$User->delUser($data['user_id'],$data['type']);
	
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
	 *  删除用户
	 * /index.php/Doc/User/removeUser
	 * @author ruansheng
	 */
	public function removeUser(){
		$data=I('post.');
	
		if(($data['user_id']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$User=D('User','Logic');
		$flag=$User->removeUser($data['user_id']);
	
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