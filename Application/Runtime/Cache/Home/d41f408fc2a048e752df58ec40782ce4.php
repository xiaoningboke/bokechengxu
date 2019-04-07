<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo ($configdata["name"]); ?></title>
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/csh.css">
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/index.css">
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/article.css">
</head>
<body>
    <div class="content">
        <div class="header w">
            <div class="title">
                <?php echo ($configdata["name"]); ?>
            </div>
            <div class="nav">
                <ul>
                    <a href="<?php echo U('Home/Index/index');?>"><li>首页</li></a>
                    <?php if(is_array($classifyData)): foreach($classifyData as $key=>$vo): ?><a href="<?php echo U('Home/Index/index',array(fenlei=>$vo[name]));?>"><li><?php echo ($vo["name"]); ?></li></a><?php endforeach; endif; ?>
                    <a href="#"><li>相册</li></a>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="mainleft">

            <div class="item">
                <h3><?php echo ($data["title"]); ?></h3>
                <div class="other">
                    <?php echo ($data["create_time"]); ?> | 作者: <?php echo ($data["user"]); ?>  | 分类: <?php echo ($data["classify"]); ?> | 评论: 2 
                </div>
                <div class="cons">
                    <div class="conleft">
                        <?php echo ($data["content"]); ?>
                    </div>
                    <div class="conright">
                        <div class="f">最后修改时间 <span><?php echo ($data["exit_time"]); ?></span></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            </div>
                       <div class="mainright">
                <div class="sidebar-box clearfix">
                    <h4>博客公告</h4>
                    <div class="divSubscribe">
                        <ul>
                             <?php if(is_array($noticeData)): foreach($noticeData as $key=>$vo): ?><li><a href="<?php echo U('Home/Index/findNotice',array('id'=>$vo[id]));?>"><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>

                <div class="sidebar-box clearfix">
                    <h4>搜索</h4>
                    <div class="divSubscribe">
                        <div style="position: relative; margin-top: 10px">
                            <form action="<?php echo U('Home/Index/index');?>" method="post" accept-charset="utf-8">
                                <input type="text" name="title" size="12" id="edtSearch">
                                <input type="submit" value="提交" name="btnG" id="btnPost">
                            </form>
                            
                        </div>
                    </div>
                    <div style="height: 20px"></div>
                    <h4>登陆/注册</h4>
                    <div class="divSubscribe">
                        <div style="position: relative; margin-top: 10px">
                            <a href="<?php echo U('Login/Index/index');?>">立即登录》》</a><br/>
                            <a href="<?php echo U('Login/Index/register');?>">立即注册》》</a>
                        </div>
                    </div>
                </div>

                <div class="sidebar-box clearfix">
                    <h4>最新留言</h4>
                    <div class="divSubscribe">
                        <ul>
                            <?php if(is_array($commentData)): foreach($commentData as $key=>$vo): ?><li><a href="<?php echo U('Home/Index/findArticle',array('id'=>$vo[article_id]));?>"><?php echo ($vo["content"]); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<footer>
    <div class="foot">
    <span class="foot-bottom"><?php echo ($configdata["bottom"]); ?>/span>
    </div>
</footer>
</body>
</html>