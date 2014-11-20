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
		
	}
	
	/**
	 *  验证码
	 * /index.php/Doc/Login/verify
	 */
	public function verify(){
		$Verify =new \Think\Verify();
		$Verify->fontSize = 30;
		$Verify->length   = 4;
		$Verify->useNoise = false;
		$Verify->entry();
	}
	
}