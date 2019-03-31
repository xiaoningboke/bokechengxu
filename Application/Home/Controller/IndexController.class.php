<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	/**
	 * 显示首页
	 * @return [type] [description]
	 */
    public function index(){
        $this->display();
    }
}