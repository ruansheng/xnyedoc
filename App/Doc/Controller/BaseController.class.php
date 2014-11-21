<?php
namespace Doc\Controller;
use Think\Controller;

/**
 * 基类
 * @author ruansheng
 */
class BaseController extends Controller {
	
	/**
	 * 构造函数
	 */
	public function __construct(){
		parent::__construct();
		$userId=session('user_id');
		if($userId!=null){
			
		}else{
			$this->redirect('Login/index');
		}
	}
	
}