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
	
}