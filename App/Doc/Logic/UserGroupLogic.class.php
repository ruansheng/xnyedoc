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
	
}