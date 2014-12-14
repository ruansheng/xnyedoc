<?php
namespace Doc\Logic;
use Think\Model;

class UserLogic extends Model{
	
	public function doLogin($data){
		$userName=$data['username'];
		$password=sha1($data['password'].'xnyedoc');
		
		$User=D('User','Model');
		$userInfo=$User->getUserInfoRow($userName,$password);
		if($userInfo){
			if($userInfo['is_del']==0){
				return $userInfo['user_id'];				
			}else if($userInfo['is_del']==-1){
				return false;
			}
		}else{
			return false;
		}
	}
	
	public function doAddUser($data){
		$userName=$data['user_name'];
		$password=sha1($data['password'].'xnyedoc');
	
		$User=D('User','Model');
		$userId=$User->addUser($userName,$password);
		if($userId){
			return true;
		}else{
			return false;
		}
	}
	
	public function getUserList(){
		$User=D('User','Model');
		$userList=$User->getUserList();
		return $userList;
	}
	
	/**
	 * 获取用户
	 * @param int $userId
	 * @return array
	 */
	public function getUser($userId){
		$User=D('User','Model');
		$userInfo=$User->getUser($userId);
		return $userInfo;
	}
	
	/**
	 * 修改用户
	 * @param array $data
	 * @return boolean
	 */
	public function doUpdateUser($data){
		$User=D('User','Model');
		$flag=$User->updateUser($data['user_id'],$data);
		if($flag){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * 解封禁用户
	 * @param int $userId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delUser($userId,$type){
		$User=D('User','Model');
		if($type==1){  //封禁
			$flag=$User->delUser($userId,1);
		}else if($type==2){//解封
			$flag=$User->delUser($userId,0);
		}
	
		return $flag;
	}
	
	/**
	 * 删除用户
	 * @param int $userId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeUser($userId){
		$User=D('User','Model');
		$flag=$User->removeUser($userId);
	
		return $flag;
	}
	
}