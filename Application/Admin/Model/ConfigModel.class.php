<?php
namespace Admin\Model;
use Think\Model;
class ConfigModel extends Model {

	/**
	 * 返回查询到的配置信息
	 * @return [type] [description]
	 */
	public function findconfig(){
		$Config = M("Config");
		$data = $Config->where("id = 1")->find();
		return $data;
	}

	/**
	 * 更新用户信息
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function updateConfig($data){
		$Config = M("Config");
		$i = $Config->where("id = 1")->save($data);
		return $i;
	}
}