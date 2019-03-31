<?php
namespace Admin\Model;
use Think\Model;
class ClassifyModel extends Model {
			
	/**
	 * 添加文章的分类
	 * @param [type] $data [description]
	 */
	public function addClassify($data){
		$classify = M("Classify");
		$i = $classify->add($data);
		return $i;
	}

	/**
	 * 查询所有的分类
	 * @return [type] [description]
	 */
	public function classifylist(){
		$classify = M("Classify");
		$data = $classify->select();
		return $data;
	}

	/**
	 * 查询单个分类
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findClassify($id){
		$classify = M("Classify");
		$data = $classify->where("id=$id")->find();
		return $data;
	}

	/**
	 * 修改分类信息
	 */
	public function exitClassify($data){
		$id = $data["id"];
		$classify = M("Classify");
		$i = $classify->where("id = $id")->save($data);
		return $data;
	}

	/**
	 * 删除分类
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delClassify($id){
		$classify = M("Classify");
		$i = $classify->where("id = $id")->delete();
		return $i;
	}

}
