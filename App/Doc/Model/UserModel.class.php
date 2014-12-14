<?php
namespace Doc\Model;
use Think\Model;

class UserModel extends Model{
	
	public function getUserInfoRow($userName,$password){
		$map=array(
			'user_name'=>$userName,
			'password'=>$password,
		);
		$row=M('User')->where($map)->find();
		return $row;
	}
	
	public function addUser($userName,$password){
		$data=array(
				'user_name'=>$userName,
				'password'=>$password,
				'create_time'=>time(),
				'update_time'=>time(),
				'is_del'=>0
		);
		$flag=M('User')->add($data);
	
		return $flag;
	}
	
	public function getUserList(){
		$User=M('User');
		$count = $User->count();
		$Page = new \Think\Page($count,25);
		$show = $Page->show();
		// 进行分页数据查询
		$list = $User->order('user_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		return array('count'=>$count,'pages'=>$show,'list'=>$list);
	}
	
	/**
	 * 获取用户
	 * @param array $data
	 * @return boolean
	 */
	public function getUser($userId){
		$userInfo=M('User')->where(array('user_id'=>$userId))->find();
		return $userInfo;
	}
	
	/**
	 * 修改用户
	 * @param array $data
	 * @return boolean
	 */
	public function updateUser($userId,$data){
		if($data['password']){
			$data=array(
					'user_name'=>$data['user_name'],
					'password'=>sha1($data['password'].'xnyedoc'),
					'update_time'=>time(),
			);
		}else{
			$data=array(
					'user_name'=>$data['user_name'],
					'update_time'=>time(),
			);
		}
		$flag=M('User')->where(array('user_id'=>$userId))->save($data);
		return $flag;
	}
	
	/**
	 * 解封禁用户信息
	 * @param int $userId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delUser($userId,$isDel){
		$User=M('User');
		$da=array(
				'is_del'=>$isDel,
				'update_time'=>time()
		);
		$flag=$User->where(array('user_id'=>$userId))->save($da);
		return $flag;
	}
	
	/**
	 * 删除用户信息
	 * @param int $userId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeUser($userId){
		$User=M('User');
		$flag=$User->where(array('user_id'=>$userId))->delete();
		return $flag;
	}
	
}