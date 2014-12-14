<?php
namespace Doc\Logic;
use Think\Model;

class UserGroupLogic extends Model{
	
	public function doAddUserGroup($data){
		$groupName=$data['group_name'];
		
		$UserGroup=D('UserGroup','Model');
		$groupId=$UserGroup->addUserGroup($groupName);
		if($groupId){
			return true;
		}else{
			return false;
		}
	}
	
	public function getUserGroupList(){
		$UserGroup=D('UserGroup','Model');
		$userGroupList=$UserGroup->getUserGroupList();
		return $userGroupList;
	}
	
	/**
	 * 获取用户组
	 * @param int $userGroupId
	 * @return array
	 */
	public function getUserGroup($userGroupId){
		$UserGroup=D('UserGroup','Model');
		$userGroup=$UserGroup->getUserGroup($userGroupId);
		return $userGroup;
	}
	
	/**
	 * 修改用户组
	 * @param array $data
	 * @return boolean
	 */
	public function doUpdateUserGroup($data){
		$UserGroup=D('UserGroup','Model');
		$flag=$UserGroup->updateUserGroup($data['group_id'],$data);
		if($flag){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * 解封禁用户组
	 * @param int $userGroupId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delUserGroup($userGroupId,$type){
		$UserGroup=D('UserGroup','Model');
		if($type==1){  //封禁
			$flag=$UserGroup->delUserGroup($userGroupId,1);
		}else if($type==2){//解封
			$flag=$UserGroup->delUserGroup($userGroupId,0);
		}
	
		return $flag;
	}
	
	/**
	 * 删除用户组
	 * @param int $userGroupId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeUserGroup($userGroupId){
		$UserGroup=D('UserGroup','Model');
		$flag=$UserGroup->removeUserGroup($userGroupId);
	
		return $flag;
	}
}