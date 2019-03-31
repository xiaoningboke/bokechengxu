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
}