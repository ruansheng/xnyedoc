<?php
namespace Doc\Controller;
use Think\Controller;

/**
 * 登录
 * @author ruansheng
 */
class LoginController extends Controller {
	
	/**
	 *  登录页面
	 * /index.php/Doc/Login/index
	 */
	public function index(){
		$this->display();
	}
	
	/**
	 *  用户登录
	 * /index.php/Doc/Login/doLogin
	 */
	public function doLogin(){
		$data=I('post.');
		if(isset($data['username'])&&isset($data['password'])&&isset($data['code'])){
			$verify = new \Think\Verify();
			if($verify->check($data['code'])){
				$User=D('User','Logic');
				if($User->create($data)){
					$userId=$User->doLogin($data);
					if($userId){
						session(array('name'=>'user_id','expire'=>3600*24*10));  //seession有效期为10天
						session('name',$userId);
						$this->redirect('Index/index');
					}else{
						$this->redirect('Login/index');
					}
				}else{
					$this->redirect('Login/index');
				}
			}else{
				$this->redirect('Login/index');
			}			
		}else{
			$this->redirect('Login/index');
		}
	}
	
	/**
	 *  验证码
	 * /index.php/Doc/Login/verify
	 */
	public function verify(){
		$config = array(
				'fontSize'    =>    30,    // 验证码字体大小
				'length'      =>    4,     // 验证码位数
				'useNoise'    =>    false, // 关闭验证码杂点
		);
		$Verify =     new \Think\Verify($config);
		$Verify->entry();
	}
	
	/**
	 *  退出
	 * /index.php/Doc/Login/logout
	 */
	public function logout(){
		session('name',null);
		$this->redirect('Login/index');
	}
	
	
}