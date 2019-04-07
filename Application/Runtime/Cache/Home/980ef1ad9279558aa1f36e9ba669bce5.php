<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title><?php echo ($configdata["name"]); ?></title>
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/csh.css">
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/public.css">
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/index.css">
    <link rel="stylesheet" type="text/css" href="/bokechengxu/Public/css/imageLisr.css">
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
    <div class="main w">
        <?php if(is_array($list)): foreach($list as $key=>$vo): ?><div class="box">
                <div class="box-top">
                    <img src="/bokechengxu/Public/Uploads/<?php echo ($vo["name"]); ?>" alt="">
                </div>
                <div class="userName">
                    <span><?php echo ($vo["user"]); ?></span>
                </div>
            </div><?php endforeach; endif; ?>
        <div class="result page"><?php echo ($page); ?></div>
    </div>
</div>
<footer>
    <div class="foot">
   
    <span class="foot-bottom"><?php echo ($configdata["bottom"]); ?></span>
    </div>
</footer>
</body>
</html>