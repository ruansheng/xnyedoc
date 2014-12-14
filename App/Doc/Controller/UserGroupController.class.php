<?php
namespace Doc\Controller;
use Doc\Controller;

/**
 * 用户组
 * @author ruansheng
 */
class UserGroupController extends Controller\BaseController {
	
	/**
	 *  添加用户组
	 * /index.php/Doc/UserGroup/addUserGroup
	 */
	public function addUserGroup(){
		$this->display();
	}
	
	/**
	 * 添加保存用户组
	 */
	public function doAddUserGroup(){
		$data=I('post.');
		if(isset($data['group_name'])){
			$UserGroup=D('UserGroup','Logic');
			if($UserGroup->create($data)){
				$groupId=$UserGroup->doAddUserGroup($data);
				if($groupId){
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
	 *  用户组列表
	 * /index.php/Doc/UserGroup/userGroupList
	 */
	public function userGroupList(){
		$UserGroup=D('UserGroup','Logic');
		$list=$UserGroup->getUserGroupList();
	
		$this->assign('count',$list['count']);
		$this->assign('pages',$list['pages']);
		$this->assign('list',$list['list']);
		$this->display();
	}
	
	/**
	 *  修改用户组
	 * /index.php/Doc/UserGroup/updateUserGroup
	 */
	public function updateUserGroup(){
		$userGroupId=I('get.group_id');
		$UserGroup=D('UserGroup','Logic');
		$userGroup=$UserGroup->getUserGroup($userGroupId);
		$this->assign('item',$userGroup);
		$this->display();
	}
	
	/**
	 * 修改保存用户组
	 */
	public function doUpdateUserGroup(){
		$data=I('post.');
		if(!isset($data['group_name'])){
			$this->error('必须填写用户组名称');
		}
	
		$UserGroup=D('UserGroup','Logic');
		if($UserGroup->create($data)){
			$userGroupId=$UserGroup->doUpdateUserGroup($data);
			if($userGroupId){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->error('错误');
		}
	}
	
	/**
	 *  解封禁用户组
	 * /index.php/Doc/UserGroup/delUserGroup
	 * @author ruansheng
	 */
	public function delUserGroup(){
		$data=I('post.');
	
		if(($data['group_id']==0)||($data['type']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$UserGroup=D('UserGroup','Logic');
		$flag=$UserGroup->delUserGroup($data['group_id'],$data['type']);
	
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
	 *  删除用户组
	 * /index.php/Doc/UserGroup/removeUserGroup
	 * @author ruansheng
	 */
	public function removeUserGroup(){
		$data=I('post.');
	
		if(($data['group_id']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$UserGroup=D('UserGroup','Logic');
		$flag=$UserGroup->removeUserGroup($data['group_id']);
	
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