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
	
}