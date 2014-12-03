<?php
namespace Doc\Controller;
use Doc\Controller;

/**
 * 版本
 * @author ruansheng
 */
class VersionController extends Controller\BaseController {
	
	/**
	 *  添加版本
	 * /index.php/Doc/Version/addVersion
	 */
	public function addVersion(){
		$this->display();
	}
	
	/**
	 * 添加保存项目
	 */
	public function doAddVersion(){
		$data=I('post.');
		if(isset($data['version_name'])){
			$Version=D('Version','Logic');
			if($Version->create($data)){
				$versionId=$Version->doAddVersion($data);
				if($versionId){
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
	 *  版本列表
	 * /index.php/Doc/Version/versionList
	 */
	public function versionList(){
		$Version=D('Version','Logic');
		$versionList=$Version->getVersionList();
	
		$this->assign('list',$versionList);
		$this->display();
	}
	
}