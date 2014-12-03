<?php
namespace Doc\Model;
use Think\Model;

class UserModel extends Model{
	
	public function getUserInfoRow($userName,$password){
		$map=array(
			'user_name'=>$userName,
			'password'=>$password
		);
		$row=M('User')->where($map)->find();
		return $row;
	}
	
	public function addUser($userName){
		$data=array(
				'user_name'=>$userName
		);
		$flag=M('User')->add($data);
	
		return $flag;
	}
	
	public function getUserList(){
		$User=M('User');
		$count = $User->count();
		$Page = new \Think\Page($count,10);
		$show = $Page->show();
		// 进行分页数据查询
		$list = $User->order('user_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		return $list;
	}
	
}