<?php
namespace Home\Controller;

use Think\Controller;
use Admin\Model\ArticleModel;
use Admin\Model\CommentModel;
use Admin\Model\ClassifyModel;
use Admin\Model\NoticeModel;
use Admin\Model\ConfigModel;
use Admin\Model\PhotoModel;

class IndexController extends Controller {
    public function _initialize(){
        $config = new ConfigModel();
        $configdata = $config->findconfig();
        $this->assign('configdata',$configdata);

        $comment = new CommentModel();
        $commentData = $comment->selTen();
        $this->assign('tencomment',$commentData);

        $notice = new NoticeModel();
        $noticeData = $notice->tenNotice();
        $this->assign('noticeData',$noticeData);

        $classify = new ClassifyModel();
        $classifyData = $classify->classifylist();
        $this->assign('classifyData',$classifyData);
    }
	/**
	 * 显示首页
	 * @return [type] [description]
	 */
    public function index(){
        $title = $_POST["title"];
        $where['title'] =array('like','%'.$title.'%');
        $fenlei = $_GET["fenlei"];
        if(!empty($fenlei)){
            $where["classify"] = $fenlei;
        }
    	$Article = M('Article');//实例化Goods数据对象  Goods是你的表名
	  //p是前台传值过来的参数，也就是页码
	    if($_GET['p']==NULL){
	        $p=1;
	    }else{
	        $p=$_GET['p'];
	    }
	    $articlelist = $Article->where($where)->order('stick DESC,id DESC')->page($p.',10')->select();// 查询满足要求的总记录数
	    $this->assign('articlelist',$articlelist);// 赋值数据集
	    $count = $Article->where($where)->count();
	    $Page = new \Think\Page($count,10);
	    $show = $Page->show();

       

        
	    $this->assign('page',$show);
        $this->display();
    }

    /**
     * 查看文章详情
     * @return [type] [description]
     */
    public function findArticle(){
    	$id = $_GET["id"];
    	$article = new ArticleModel();
    	$data = $article->findArticle($id);
        $comment = new CommentModel();
        $commentData = $comment->selArticle($id);

        $classify = new ClassifyModel();
        $classifyData = $classify->classifylist();
        $this->assign('classifyData',$classifyData);

        $this->assign('commentData',$commentData);
    	$this->assign('data',$data);
    	$this->display();
    }

    /**
     * 留言管理
     * @return [type] [description]
     */
    public function comment(){
    	if (!session('?user')) {
             $this->error('对不起，您还没有登录!请先登录在进行操作',U('Login/Index/index'));
             exit();
        }
    	$data = $_POST;
    	$data["date"] = date('Y-m-d h:i:s', time());
    	$data["user"] = session('user')["username"];
    	$comment = M("Comment");
    	$i = $comment->add($data);
    	if($i>0){
    		$this->success("留言成功");
    	}else {
    		$this->error("留言失败");
    	}
    }

    /**
     * 显示公告详情
     * @return [type] [description]
     */
    public function findNotice(){
        $id = $_GET["id"];
        $Notice = new NoticeModel();
        $data = $Notice->findNotice($id);

        $classify = new ClassifyModel();
        $classifyData = $classify->classifylist();
        $this->assign('classifyData',$classifyData);

        $this->assign('data',$data);
        $this->display();
    }

    /**
     * 显示图片
     * @return [type] [description]
     */
    public function photo(){
        $Photo = M('Photo');//实例化Goods数据对象  Goods是你的表名
        //p是前台传值过来的参数，也就是页码
        if($_GET['p']==NULL){
            $p=1;
        }else{
            $p=$_GET['p'];
        }
        $list = $Photo->order('id DESC')->page($p.',10')->select();// 查询满足要求的总记录数
        $this->assign('list',$list);// 赋值数据集
        $count = $Photo->count();
        $Page = new \Think\Page($count,10);
        $show = $Page->show();
        $this->assign('page',$show);
        $this->display();

    }

}