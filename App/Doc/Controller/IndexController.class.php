<?php
namespace Doc\Controller;
use Doc\Controller;

/**
 * 主页面
 * @author ruansheng
 */
class IndexController extends Controller\BaseController {
	
	/**
	 *  头部
	 * /index.php/Doc/Index/header
	 */
	public function header(){
		$this->display();
	}
	
	/**
	 *  主面板
	 * /index.php/Doc/Index/index
	 */
	public function index(){
		$this->display();
	}
	
	/**
	 *  左侧
	 * /index.php/Doc/Index/left
	 */
	public function left(){
		$this->display();
	}
	
	/**
	 *  底部
	 * /index.php/Doc/Index/footer
	 */
	public function footer(){
		$this->display();
	}
	
}