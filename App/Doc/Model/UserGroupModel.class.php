<?php
namespace Doc\Model;
use Think\Model;

class UserGroupModel extends Model{
	
	public function addUserGroup($groupName){
		$data=array(
			'group_name'=>$groupName
		);
		$flag=M('UserGroup')->add($data);
		
		return $flag;
	}
	
	public function getUserGroupList(){
		$UserGroup=M('UserGroup');
		$count = $UserGroup->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		// 进行分页数据查询
		$list = $UserGroup->order('group_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		return $list;
	}
	
}