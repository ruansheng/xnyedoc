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
	
}