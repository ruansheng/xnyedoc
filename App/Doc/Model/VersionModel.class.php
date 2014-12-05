<?php
namespace Doc\Model;
use Think\Model;

class VersionModel extends Model{
	
	public function addVersion($versionName){
		$data=array(
			'version_name'=>$versionName,
			'create_time'=>time(),
			'update_time'=>time()
		);
		$flag=M('Version')->add($data);
		
		return $flag;
	}
	
	public function getVersionList(){
		$Version=M('Version');
		$count = $Version->count();
		$Page = new \Think\Page($count,25);
		$show = $Page->show();
		// 进行分页数据查询
		$list = $Version->order('version_id')->limit($Page->firstRow.','.$Page->listRows)->select();
		return array('count'=>$count,'pages'=>$show,'list'=>$list);
	}
	
}