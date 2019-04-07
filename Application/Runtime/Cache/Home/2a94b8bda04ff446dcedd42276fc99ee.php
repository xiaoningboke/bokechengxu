<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo ($configdata["name"]); ?></title>
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/csh.css">
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/index.css">
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/fenye.css">
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
                    <a href="<?php echo U('Home/Index/photo');?>"><li>相册</li></a>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="mainleft">
                <!-- <div class="item">
                    <h3>YOUTUBE推荐频道订阅</h3>
                    <div class="other">
                        2019年2月26日 | 作者: 月光 | 分类: 软件应用 | 评论: 2 | 浏览: 2159 | 阅读全文​...
                    </div>
                    <div class="con">
                        <div class="conleft">　YouTube上有很多不错的频道，内容也非常多，但对于初次访问的用户来说，不太容易快速找到自己喜欢的频道，这里介绍一个网站，给YouTube的频道都进行了分类，并针对各个分类进行了排序，订阅量最多的虽然不一定适合你，但却往往能满足不少人的需求。</div>
                        <div class="conright"></div>
                    </div>
                </div> -->
                <?php if(is_array($articlelist)): foreach($articlelist as $key=>$vo): ?><a class="item" href="<?php echo U('Home/Index/findArticle',array('id'=>$vo[id]));?>">
                        <h3><?php echo ($vo["title"]); ?></h3>

                        <div class="other">
                            <?php if($vo["stick"] == 1 ): ?><span style="color:red">置顶</span><?php endif; ?> | <?php echo ($vo["create_time"]); ?> | 作者: <?php echo ($vo["user"]); ?> | 分类: <?php echo ($vo["classify"]); ?> | 评论: 2 |  |阅读全文​...
                        </div>
                        <div class="con">
                            <div class="conleft">　<?php echo ($vo["content"]); ?></div>
                            <div class="conright"></div>
                        </div>
                    </a><?php endforeach; endif; ?>
                <div class="result page"><?php echo ($page); ?></div>

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
                            <?php if(is_array($tencomment)): foreach($tencomment as $key=>$vo): ?><li><a href="<?php echo U('Home/Index/findArticle',array('id'=>$vo[article_id]));?>"><?php echo ($vo["content"]); ?></a></li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<footer>
    <div class="foot">
   
    <span class="foot-bottom"><?php echo ($configdata["bottom"]); ?></span>
    </div>
</footer>
</body>
</html>