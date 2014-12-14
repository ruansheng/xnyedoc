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
	
	/**
	 * 获取版本
	 * @param array $data
	 * @return boolean
	 */
	public function getVersion($versionId){
		$version=M('Version')->where(array('version_id'=>$versionId))->find();
		return $version;
	}
	
	/**
	 * 修改版本
	 * @param array $data
	 * @return boolean
	 */
	public function updateVersion($versionId,$data){
		$data=array(
				'version_name'=>$data['version_name'],
				'update_time'=>time(),
		);
		$flag=M('Version')->where(array('version_id'=>$versionId))->save($data);
	
		return $flag;
	}
	
	/**
	 * 解封禁版本信息
	 * @param int $versionId
	 * @return boolean
	 * @author ruansheng
	 */
	public function delVersion($versionId,$isDel){
		$Version=M('Version');
		$da=array(
				'is_del'=>$isDel,
				'update_time'=>time()
		);
		$flag=$Version->where(array('version_id'=>$versionId))->save($da);
		return $flag;
	}
	
	/**
	 * 删除版本信息
	 * @param int $versionId
	 * @return boolean
	 * @author ruansheng
	 */
	public function removeVersion($versionId){
		$Version=M('Version');
		$flag=$Version->where(array('version_id'=>$versionId))->delete();
		return $flag;
	}
	
}