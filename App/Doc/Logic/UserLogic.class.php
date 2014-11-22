<?php
namespace Doc\Logic;
use Think\Model;

class UserLogic extends Model{
	
	public function doLogin($data){
		$userName=$data['username'];
		$password=sha1($data['password'].'xnyedoc');
		
		$User=D('User','Model');
		$userInfo=$User->getUserInfoRow($userName,$password);
		if($userInfo){
			if($userInfo['is_del']==0){
				return $userInfo['user_id'];				
			}else if($userInfo['is_del']==-1){
				return false;
			}
		}else{
			return false;
		}
	}
	
}