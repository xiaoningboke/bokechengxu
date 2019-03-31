<?php
namespace Admin\Controller;

use Think\Controller;

use Admin\Model\ClassifyModel;
use Admin\Model\ArticleModel;
use Admin\Model\NoticeModel;
use Admin\Model\UserModel;

class IndexController extends Controller {
	/**
	 * 显示首页
	 * @return [type] [description]
	 */
    public function index(){
        $this->display();
    }
    /**
     * 显示文章分类
     * @return [type] [description]
     */
    public function fenleiList(){
    	$classify = new ClassifyModel();
    	$data = $classify->classifylist();
    	$this->assign('data',$data);
    	$this->display();
    }

    /**
     * 添加文章分类
     */
    public function addFenlei(){
    	$this->display();
    }

    /**
     * 处理分类的添加数据
     * @return [type] [description]
     */
    public function doAddFenlei(){
    	$data['name'] = $_POST['name'];
    	$data['create_time'] = date('Y-m-d h:i:s', time());
    	$data['exit_time'] = date('Y-m-d h:i:s', time());
    	$classify = new ClassifyModel();
    	$i = $classify->addClassify($data);
    	if($i>0){
    		$this->success("添加成功");
    	}else{
    		$this->error("添加失败");
    	}
    }

    /**
     * 显示修改分类
     * @return [type] [description]
     */
    public function exitfenlei(){
    	$id = $_GET["id"];
    	$classify = new ClassifyModel();
    	$data = $classify->findClassify($id);
    	$this->assign('data',$data);
    	$this->display();
    }

    /**
     * 处理修改分类信息
     */
    public function doExitFenlei(){
    	$data = $_POST;
    	$data["exit_time"] = date('Y-m-d h:i:s', time());
    	$classify = new ClassifyModel();
    	$i = $classify->exitClassify($data);
    	if($i>0){
    		$this->success("修改成功",U('Admin/Index/fenleiList'));
    	}else{
    		$this->error("修改失败",U('Admin/Index/fenleiList'));
    	}
    }

    /**
     * 删除分类
     * @return [type] [description]
     */
	public function delfenlei(){
		$id = $_GET["id"];
		$classify = new ClassifyModel();
		$i = $classify->delClassify($id);
		if($i>0){
    		$this->success("删除成功",U('Admin/Index/fenleiList'));
    	}else{
    		$this->error("删除失败",U('Admin/Index/fenleiList'));
    	}
	}

	/**
	 * 显示添加文章的列表
	 */
	public function addArticle(){
		$classify = new ClassifyModel();
		$fenlei = $classify->classifylist();
		$this->assign('fenlei',$fenlei);
		$this->display();
	}

	/**
	 * 处理添加文章的数据
	 * @return [type] [description]
	 */
	public function doAddArticle(){
		$data['title'] = $_POST['title'];
		$data['classify'] = $_POST['classify'];
		$data['user'] = session('user')["username"];
		$data['create_time'] = date('Y-m-d h:i:s', time());
		$data['exit_time'] = date('Y-m-d h:i:s', time());
		$data['content'] = $_POST['content'];

		$article = new ArticleModel();
		$i = $article->addArticle($data);
		if($i>0){
			$this->success("发表成功");
		}else{
			$this->error("发表失败");
		}
	}

	/**
	 * 显示文章列表
	 * @return [type] [description]
	 */
	public function articlelist(){
		$Article = M('Article');//实例化Goods数据对象  Goods是你的表名
	  //p是前台传值过来的参数，也就是页码
	    if($_GET['p']==NULL){
	        $p=1;
	    }else{
	        $p=$_GET['p'];
	    }
	    $list = $Article->order('id DESC')->page($p.',10')->select();// 查询满足要求的总记录数
	    $this->assign('list',$list);// 赋值数据集
	    $count = $Article->count();
	    $Page = new \Think\Page($count,10);
	    $show = $Page->show();
	    $this->assign('page',$show);
	    $this->display();
	}

	/**
	 * 显示修改的文章内容
	 */
	public function exitarticle(){
		$id = $_GET["id"];
		$article = new ArticleModel();
		$data = $article->findArticle($id);
		$classify = new ClassifyModel();
		$fenlei = $classify->classifylist();
		$this->assign('fenlei',$fenlei);
		$this->assign('data',$data);
		$this->display();
	}

	/**
	 * 处理文章的修改数据
	 * @return [type] [description]
	 */
	public function doExitArticle(){
		$data["id"] = $_POST["id"];
		$data["title"] = $_POST["title"];
		$data["classify"] = $_POST["classify"];
		$data["exit_time"] = date('Y-m-d h:i:s', time());
		$data["content"] = $_POST["content"];
		$article = new ArticleModel();
		$i = $article->exitArticle($data);
		if($i>0){
			$this->success("修改成功",U("Admin/Index/articlelist"));
		}else{
			$this->error("修改失败");
		}
	}

	/**
	 * 置顶
	 * @return [type] [description]
	 */
	public function stick(){
		$data = $_GET;
		$article = new ArticleModel();
		$i = $article->exitArticle($data);
		if($i>0){
			$this->success("操作成功",U("Admin/Index/articlelist"));
		}else{
			$this->error("操作失败");
		}
	}

	/**
	 * 删除文章
	 * @return [type] [description]
	 */
	public function delarticle(){
		$id = $_GET["id"];
		$article = new ArticleModel();
		$i = $article->delarticle($id);
		if($i>0){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}

	/**
	 * 显示发布公告
	 */
	public function addNotice(){
		$this->display();
	}

	/**
	 * 处理发布公告信息
	 * @return [type] [description]
	 */
	public function doAddNotice(){
		$data = $_POST;
		$data["name"] = session('user')["username"];
		$data["create_time"] = date('Y-m-d h:i:s', time());
		$data['exit_time'] = date('Y-m-d h:i:s', time());
		$notice = new NoticeModel();
		$i = $notice->addNotice($data);
		if($i>0){
			$this->success("添加成功");
		}else{
			$this->error("添加失败");
		}
	}

	/**
	 * 显示公告列表
	 * @return [type] [description]
	 */
	public function noticelist(){
		$Notice = M('Notice');//实例化Goods数据对象  Goods是你的表名
	  //p是前台传值过来的参数，也就是页码
	    if($_GET['p']==NULL){
	        $p=1;
	    }else{
	        $p=$_GET['p'];
	    }
	    $list = $Notice->order('id DESC')->page($p.',10')->select();// 查询满足要求的总记录数
	    $this->assign('list',$list);// 赋值数据集
	    $count = $Notice->count();
	    $Page = new \Think\Page($count,10);
	    $show = $Page->show();
	    $this->assign('page',$show);
	    $this->display();
	}

	/**
	 * 显示修改公告的页面
	 * @return [type] [description]
	 */
	public function exitnotice(){
		$id = $_GET["id"];
		$notice = new NoticeModel();
		$data = $notice->findNotice($id);
		$this->assign('data',$data);
		$this->display();
	}

	/**
	 * 处理公告修改信息
	 * @return [type] [description]
	 */
	public function doExitNotice(){
		$data = $_POST;
		$data["exit_time"] = date('Y-m-d h:i:s', time());
		$notice = new NoticeModel();
		$i = $notice->exitNotice($data);
		if($i>0){
			$this->success("修改成功",U('Admin/Index/noticelist'));
		}else{
			$this->error("修改失败");
		}
	}

	/**
	 * 删除公告
	 * @return [type] [description]
	 */
	public function delnotice(){
		$id = $_GET["id"];
		$notice = new NoticeModel();
		$i = $notice->delNotice($id);
		if($i>0){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}

	/**
	 * 改变公告状态
	 * @return [type] [description]
	 */
	public function noticestate(){
		$data = $_GET;
		$Notice = new NoticeModel();
		$i = $Notice->exitNotice($data);
		if($i>0){
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}
	}

	/**
	 * 显示用户列表
	 * @return [type] [description]
	 */
	public function userlist(){
		$User = M('User');//实例化Goods数据对象  Goods是你的表名
	  //p是前台传值过来的参数，也就是页码
	    if($_GET['p']==NULL){
	        $p=1;
	    }else{
	        $p=$_GET['p'];
	    }
	    $list = $User->order('id DESC')->page($p.',10')->select();// 查询满足要求的总记录数
	    $this->assign('list',$list);// 赋值数据集
	    $count = $User->count();
	    $Page = new \Think\Page($count,10);
	    $show = $Page->show();
	    $this->assign('page',$show);
	    $this->display();
	}

	/**
	 * 显示修改用户信息
	 * @return [type] [description]
	 */
	public function exitUser(){
		$id = $_GET["id"];
		$user = new UserModel();
		$data = $user->findUser($id);
		$this->assign('data',$data);
		$this->display();
	}

	/**
	 * 处理用户修改的数据
	 * @return [type] [description]
	 */
	public function doExitUser(){
		$user = new UserModel();
		$i = $user->exitUser($_POST);
		if($i>0){
			$this->success("操作成功",U("Admin/Index/userlist"));
		}else{
			$this->error("操作失败");
		}
	}

	/**
	 * 更新用户各种状态
	 * @return [type] [description]
	 */
	public function userstate(){
		$data = $_GET;
		$user = new UserModel();
		$i = $user->exitUser($data);
		if($i>0){
			$this->success("操作成功",U("Admin/Index/userlist"));
		}else{
			$this->error("操作失败");
		}
	}

	/**
	 * 重置密码
	 * @return [type] [description]
	 */
	public function resetpassword(){
		$data["id"] = $_GET["id"];
		$data["password"] = md5(md5(123456));
		$user = new UserModel();
		$i = $user->exitUser($data);
		if($i>0){
			$this->success("操作成功",U("Admin/Index/userlist"));
		}else{
			$this->error("操作失败");
		}
	}

	/**
	 * 删除用户
	 * @return [type] [description]
	 */
	public function deluser(){
		$id = $_GET["id"];
		$user = new UserModel();
		$i = $user->delUser($id);
		if($i>0){
			$this->success("删除成功");
		}else{
			$this->error("删除失败");
		}
	}
	/////////////////////////////////////富文本编辑器/////////////////////////////////////
	public function save_info(){  
   $ueditor_config = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "",     file_get_contents("./Public/Ueditor/php/config.json")), true);  
        $action = $_GET['action'];  
        switch ($action) {  
            case 'config':  
                $result = json_encode($ueditor_config);  
                break;  
                /* 上传图片 */  
            case 'uploadimage':  
                /* 上传涂鸦 */  
            case 'uploadscrawl':  
                /* 上传视频 */  
            case 'uploadvideo':  
                /* 上传文件 */  
            case 'uploadfile':  
                $upload = new \Think\Upload();  
                $upload->maxSize = 3145728;  
                $upload->rootPath = './Public/Uploads/';  
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');  
                $info = $upload->upload();  
                if (!$info) {  
                    $result = json_encode(array(  
                            'state' => $upload->getError(),  
                    ));  
                } else {  
                    $url = __ROOT__ . "/Public/Uploads/" . $info["upfile"]["savepath"] . $info["upfile"]['savename'];  
                    $result = json_encode(array(  
                            'url' => $url,  
                            'title' => htmlspecialchars($_POST['pictitle'], ENT_QUOTES),  
                            'original' => $info["upfile"]['name'],  
                            'state' => 'SUCCESS'  
                    ));  
                }  
                break;  
            default:  
                $result = json_encode(array(  
                'state' => '请求地址出错'  
                        ));  
                        break;  
        }  
        /* 输出结果 */  
        if (isset($_GET["callback"])) {  
            if (preg_match("/^[\w_]+$/", $_GET["callback"])) {  
                echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';  
            } else {  
                echo json_encode(array(  
                        'state' => 'callback参数不合法'  
                ));  
            }  
        } else {  
            echo $result;  
        }  
    }  
}