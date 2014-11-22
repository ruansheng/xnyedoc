<?php
namespace Doc\Model;
use Think\Model;

class UserModel extends Model{
	
	public function getUserInfoRow($userName,$password){
		$map=array(
			'user_name'=>$userName,
			'password'=>$password
		);
		return M('User')->where($map)->find();
	}
	
}