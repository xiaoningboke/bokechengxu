<?php
namespace User\Controller;

use Think\Controller;

use Admin\Model\ClassifyModel;
use Admin\Model\ArticleModel;
use Admin\Model\NoticeModel;
use Admin\Model\UserModel;
use Admin\Model\PhotoModel;

class IndexController extends Controller {

	/**
	 * 前置操作
	 * @return [type] [description]
	 */
	public function _initialize(){
         if (!session('?user')) {
             $this->error('对不起，您还没有登录!请先登录在进行操作',U('Login/Index/index'));
        }
        if(session('user')["identity"]!=0){
            $this->error('对不起 ，您没有权限',U('Login/Index/quit'));
        }
    }

	/**
	 * 显示首页
	 * @return [type] [description]
	 */
    public function index(){
        $this->display();
    }

	/**
	 * 显示添加文章
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
		$username = session('user')["username"];
		$where = array("user" => $username);
		$Article = M('Article');//实例化Goods数据对象  Goods是你的表名
	  //p是前台传值过来的参数，也就是页码
	    if($_GET['p']==NULL){
	        $p=1;
	    }else{
	        $p=$_GET['p'];
	    }
	    $list = $Article->where($where)->order('id DESC')->page($p.',10')->select();// 查询满足要求的总记录数
	    $this->assign('list',$list);// 赋值数据集
	    $count = $Article->where($where)->count();
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
			$this->success("修改成功",U("User/Index/articlelist"));
		}else{
			$this->error("修改失败");
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
	 * 处理用户修改的数据
	 * @return [type] [description]
	 */
	public function doExitUser(){
		$user = new UserModel();
		$i = $user->exitUser($_POST);
		if($i>0){
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}
	}

	/**
	 * 修改个人信息
	 * @return [type] [description]
	 */
	public function message(){
		$id = session('user')["id"];
		$user = new UserModel();
		$data = $user->findUser($id);
		$this->assign('data',$data);
		$this->display();
	}

	/**
	 * 显示修改密码
	 * @return [type] [description]
	 */
	public function exitpassword(){
		$this->display();
	}

	/**
	 * 处理修改密码的数据
	 * @return [type] [description]
	 */
	public function doexitpwd(){
		$password = $_POST["password"];
		$oldpassword = $_POST["oldpassword"];
		$data["id"] = session('user')["id"];
		$user = new UserModel();
		$data = $user->findUser(session('user')["id"]);
		if($data["password"] != md5(md5($oldpassword))){
			$this->error("原密码错误");
			exit();
		}
		$data["password"] = md5(md5($password));
		$i = $user->exitUser($data);
		if($i>0){
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}

	}

	/**
	 * 显示上传图片
	 * @return [type] [description]
	 */
	public function photo(){
		$this->display();
	}

	/**
	 * 处理图片上传
	 * @return [type] [description]
	 */
	public function addphoto(){
		$file = $this->upload();
		$data['name'] = $file['name']['savename'];
		$data['user'] = session('user')['username'];
		$data['create_time'] = date('Y-m-d h:i:s', time());
		$photo = new PhotoModel();
		$i = $photo->addPhoto($data);
		if($i>0){
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}
	}

	/**
	 * 删除图片
	 * @return [type] [description]
	 */
	public function delphoto(){
		$id = $_GET["id"];
		$photo = new PhotoModel();
		$i = $photo->delphoto($id);
		if($i>0){
			$this->success("操作成功");
		}else{
			$this->error("操作失败");
		}
	}

	/**
	 * 图片列表
	 * @return [type] [description]
	 */
	public function photolist(){
		$where = array("user"=>session('user')['username']);
		$Photo = M('Photo');//实例化Goods数据对象  Goods是你的表名
	  	//p是前台传值过来的参数，也就是页码
	    if($_GET['p']==NULL){
	        $p=1;
	    }else{
	        $p=$_GET['p'];
	    }
	    $list = $Photo->where($where)->order('id DESC')->page($p.',10')->select();// 查询满足要求的总记录数
	    $this->assign('list',$list);// 赋值数据集
	    $count = $Photo->where($where)->count();
	    $Page = new \Think\Page($count,10);
	    $show = $Page->show();
	    $this->assign('page',$show);
	    $this->display();
	}

	///////////////////文件上传函数///////////////////
	public function upload(){
	     $upload = new \Think\Upload();// 实例化上传类
	     $oldFN = $_FILES;//获取图片的信息，在后面传给重命名函数
	     $upload->maxSize = 3145728 ;// 设置附件上传大小
	     $upload->exts = array('jpg', 'gif', 'png', 'jpeg');
	                // 设置附件上传类型
	     $upload->rootPath = './Public/Uploads/'; // 设置附件上传根目录
	     $upload->replace = false;//如果存在同名文件就覆盖
	     $upload->autoSub = false;
	                //不使用子目录保存上传文件，即上传到指定的文件夹
	     $info = $upload->upload();
	     if(!$info) {// 上传错误提示错误信息
	         $this->error($upload->getError());exit();
	     }else{// 上传成功
	         return $info;
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