<?php
namespace Doc\Model;
use Think\Model;

class UserGroupModel extends Model{
	
	public function addUserGroup($groupName){
		$data=array(
			'group_name'=>$groupName,
			'create_time'=>time(),
			'update_time'=>time(),
			'is_del'=>0
		);
		$flag=M('UserGroup')->add($data);
		
		return $flag;
	}
	
	public function getUserGroupList(){
		$UserGroup=M('UserGroup');
		$count = $UserGroup->count();
		$Page = new \Think\Page($count,25);
		$show = $Page->show();
		// 进行分页数据查询
		$list = $UserGroup->order('group_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		return array('count'=>$count,'pages'=>$show,'list'=>$list);
	}
	
	/**
	 * 获取用户组
	 * @param array $data
	 * @return boolean
	 */
	public function getUserGroup($userGroupId){
		$project=M('UserGroup')->where(array('group_id'=>$userGroupId))->find();
		return $project;
	}
	
	/**
	 * 修改用户组
	 * @param array $data
	 * @return boolean
	 */
	public function updateUserGroup($userGroupId,$data){
		$data=array(
				'group_name'=>$data['group_name'],
				'update_time'=>time(),
		);
		$flag=M('UserGroup')->where(array('group_id'=>$userGroupId))->save($data);
	
		return $flag;
	}
	
	/**
	 * 解封禁用户组信息
	 * @param int $projectId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delUserGroup($userGroupId,$isDel){
		$UserGroup=M('UserGroup');
		$da=array(
				'is_del'=>$isDel,
				'update_time'=>time()
		);
		$flag=$UserGroup->where(array('group_id'=>$userGroupId))->save($da);
		return $flag;
	}
	
	/**
	 * 删除用户组信息
	 * @param int $projectId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeUserGroup($userGroupId){
		$UserGroup=M('UserGroup');
		$flag=$UserGroup->where(array('group_id'=>$userGroupId))->delete();
		return $flag;
	}
	
}