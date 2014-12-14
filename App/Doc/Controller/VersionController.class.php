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
		$list=$Version->getVersionList();
	
		$this->assign('count',$list['count']);
		$this->assign('pages',$list['pages']);
		$this->assign('list',$list['list']);
		$this->display();
	}
	
	/**
	 *  修改版本
	 * /index.php/Doc/Version/updateVersion
	 */
	public function updateVersion(){
		$versionId=I('get.version_id');
		$Version=D('Version','Logic');
		$version=$Version->getVersion($versionId);
		$this->assign('item',$version);
		$this->display();
	}
	
	/**
	 * 修改保存版本
	 */
	public function doUpdateVersion(){
		$data=I('post.');
		if(!isset($data['version_name'])){
			$this->error('必须填写版本名称');
		}
	
		$Version=D('Version','Logic');
		if($Version->create($data)){
			$versionId=$Version->doUpdateVersion($data);
			if($versionId){
				$this->success('修改成功');
			}else{
				$this->error('修改失败');
			}
		}else{
			$this->error('错误');
		}
	}
	
	/**
	 *  解封禁版本
	 * /index.php/Doc/Version/delVersion
	 * @author ruansheng
	 */
	public function delVersion(){
		$data=I('post.');
	
		if(($data['version_id']==0)||($data['type']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$Version=D('Version','Logic');
		$flag=$Version->delVersion($data['version_id'],$data['type']);
	
		if($flag){
			$result=array(
					'status'=>0,
					'msg'=>'成功'
			);
			exit(json_encode($result));
		}else{
			$result=array(
					'status'=>-1,
					'msg'=>'失败'
			);
			exit(json_encode($result));
		}
	}
	
	/**
	 *  删除版本
	 * /index.php/Doc/Version/removeVersion
	 * @author ruansheng
	 */
	public function removeVersion(){
		$data=I('post.');
	
		if(($data['version_id']==0)){
			$result=array(
					'status'=>-1,
					'msg'=>'不能为空'
			);
			exit(json_encode($result));
		}
	
		$Version=D('Version','Logic');
		$flag=$Version->removeVersion($data['version_id']);
	
		if($flag){
			$result=array(
					'status'=>0,
					'msg'=>'删除成功'
			);
			exit(json_encode($result));
		}else{
			$result=array(
					'status'=>-1,
					'msg'=>'删除失败'
			);
			exit(json_encode($result));
		}
	}
	
}