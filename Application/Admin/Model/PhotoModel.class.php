<?php
namespace Admin\Model;
use Think\Model;
class PhotoModel extends Model {

	/**
	 * 添加图片
	 * @param [type] $data [description]
	 */
	public function addPhoto($data){
		$photo = M("Photo");
		$i = $photo->add($data);
		return $i;
	}

	/**
	 * 删除图片
	 * @return [type] [description]
	 */
	public function delphoto($id){
		$photo = M("Photo");
		$i = $photo->where("id=$id")->delete();
		return $i;
	}
}