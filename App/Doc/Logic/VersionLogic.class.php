<?php
namespace Doc\Logic;
use Think\Model;

class VersionLogic extends Model{
	
	public function doAddVersion($data){
		$versionName=$data['version_name'];
		
		$Version=D('Version','Model');
		$versionId=$Version->addVersion($versionName);
		if($versionId){
			return true;
		}else{
			return false;
		}
	}
	
	public function getVersionList(){
		$Version=D('Version','Model');
		$versionList=$Version->getVersionList();
		return $versionList;
	}
	
	/**
	 * 获取版本
	 * @param int $versionId
	 * @return array
	 */
	public function getVersion($versionId){
		$Version=D('Version','Model');
		$version=$Version->getVersion($versionId);
		return $version;
	}
	
	/**
	 * 修改版本
	 * @param array $data
	 * @return boolean
	 */
	public function doUpdateVersion($data){
		$Version=D('Version','Model');
		$flag=$Version->updateVersion($data['version_id'],$data);
		if($flag){
			return true;
		}else{
			return false;
		}
	}
	
	/**
	 * 解封禁版本
	 * @param int $versionId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delVersion($versionId,$type){
		$Version=D('Version','Model');
		if($type==1){  //封禁
			$flag=$Version->delVersion($versionId,1);
		}else if($type==2){//解封
			$flag=$Version->delVersion($versionId,0);
		}
	
		return $flag;
	}
	
	/**
	 * 删除版本
	 * @param int $versionId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeVersion($versionId){
		$Version=D('Version','Model');
		$flag=$Version->removeVersion($versionId);
	
		return $flag;
	}
	
}