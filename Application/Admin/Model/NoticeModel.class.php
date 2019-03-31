<?php
namespace Admin\Model;
use Think\Model;
class NoticeModel extends Model {

	/**
	 * 添加公告
	 * @param [type] $data [description]
	 */
	public function addNotice($data){
		$Notice = M("Notice");
		$i = $Notice->add($data);
		return $i;
	}

	/**
	 * 查找一篇公告
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findNotice($id){
		$Notice = M("Notice");
		$data = $Notice->where("id = $id")->find();
		return $data;
	}

	/**
	 * 修改公告内容
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function exitNotice($data){
		$id = $data["id"];
		$Notice = M("Notice");
		$i = $Notice->where("id = $id")->save($data);
		return $i;
	}

	/**
	 * 删除公告信息
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delNotice($id){
		$Notice = M("Notice");
		$i = $Notice->where("id = $id")->delete();
		return $i;
	}

}