<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>社团管理系统</title>

<link rel="stylesheet" href="/bokechengxu/Public/css/login.css">

<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
  <div class="box">
     <div class="cnt">
        <p id="huanying"><span id="cnt_one">欢迎登录</span><a href="<?php echo U('Login/Index/register');?>" id="cnt_two">现在注册</a></p>
        <hr />
        <form class="bs-example bs-example-form" role="form" method="post" action="<?php echo U('Login/Index/login');?>" id= "login">
        <div>
		      <div class="input-group">
			      <span class="input-group-addon"><img src="/bokechengxu/Public/images/1_03.png"></span>
			      <input type="text" class="form-control" name="username" placeholder="请输入您的账号">
		      </div><br>
		      <div class="input-group">
			      <span class="input-group-addon"><img src="/bokechengxu/Public/images/suo.png"></span>
			      <input type="password" class="form-control" name="password" placeholder="请输入您的密码">
		      </div><br>
		      <div class="input-group" style="position:absolute;">
			      
			      <input type="text" class="form-control" name="code" placeholder="请输入验证码" style="position:relative;width:191px;height:33px;">
                  <!-- <img src="yanzhengma.png" id="oimg"> -->
                    <img src="<?php echo U('verify');?>" id="oimg" style="cursor: pointer" title="看不清，点击换一张" alt="看不清，点击换一张" onclick="this.src=this.src+'?time='" +="" math.random()="" />
                  
		      </div><br>
	       </form>
        </div>
        <div style="margin-top:40px;">
           <input class="form-control btn btn-info" type="submit" onclick="sub()" value="立即登录"/>
        </div>
     </div> 
  </div>
</body>
</html>
<script type="text/javascript" charset="utf-8" async defer>
	function sub(){
		document.getElementById("login").submit();
	}
</script>