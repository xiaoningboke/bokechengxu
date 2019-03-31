<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model {

	/**
	 * 查询所有的用户(暂无使用)
	 * @return [type] [description]
	 */
	public function userlist(){
		$User = M("User");
		$data = $User->order('id DESC')->select();
		return $data;
	}

	/**
	 * 查找某一个用户
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function findUser($id){
		$User = M("User");
		$data = $User->where("id = $id")->find();
		return $data;
	}

	/**
	 * 修改用户信息
	 * @param  [type] $data [description]
	 * @return [type]       [description]
	 */
	public function exitUser($data){
		$id = $data["id"];
		$User = M("User");
		$i = $User->where("id = $id")->save($data);
		return $i;
	}

	/**
	 * 删除用户
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delUser($id){
		$User = M("User");
		$i = $User->where("id=$id")->delete();
		return $i;
	}
}