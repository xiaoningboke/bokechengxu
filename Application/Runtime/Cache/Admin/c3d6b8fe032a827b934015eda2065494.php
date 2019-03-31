<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>文章分类列表</title>
    <link rel="stylesheet" href="/bokechengxu/Public/plugins/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/bokechengxu/Public/css/fenye.css">
</head>

<body>   
    <blockquote class="layui-elem-quote layui-text">
        重置密码为：123456
    </blockquote>
    <table class="layui-table"lay-filter="test" id="test">
        <thead>
            <tr>
                <th lay-data="{field:'id', width:180, sort: true}">用户名</th>
                <th lay-data="{field:'id', width:180, sort: true}">性别</th>
                <th lay-data="{field:'id', width:180, sort: true}">手机号</th>
                <th lay-data="{field:'id', width:80, sort: true}">邮箱</th>
                <th lay-data="{field:'id', width:80, sort: true}">状态</th>
                <th lay-data="{field:'id', width:80, sort: true}">身份</th>
                <th lay-data="{field:'id', width:80, sort: true}">创建时间</th>
                <th lay-data="{field:'username', width:80}">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                    <td><?php echo ($vo["username"]); ?></td>
                    <td><?php echo ($vo["sex"]); ?></td>
                    <td><?php echo ($vo["phone"]); ?></td>
                    <td><?php echo ($vo["email"]); ?></td>
                    <?php if(($vo["state"] == 0)): ?><td>正常</td>
                    <?php else: ?>  <td>冻结</td><?php endif; ?>
                    <?php if(($vo["identity"] == 0)): ?><td>普通用户</td>
                    <?php else: ?>  <td>管理员</td><?php endif; ?>
                    <td><?php echo ($vo["create_time"]); ?></td>
                    <td>
                        <a href="<?php echo U('Admin/Index/exituser',array('id'=>$vo[id]));?>" class="layui-btn layui-btn-primary">修改</a>
                        <a href="<?php echo U('Admin/Index/deluser',array('id'=>$vo[id]));?>" class="layui-btn layui-btn-primary">删除</a>
                        <?php if(($vo["state"] == 0)): ?><a href="<?php echo U('Admin/Index/userstate',array('id'=>$vo[id],'state'=>1));?>" class="layui-btn layui-btn-primary">冻结</a>
                        <?php else: ?>  <a href="<?php echo U('Admin/Index/userstate',array('id'=>$vo[id],'state'=>0));?>" class="layui-btn layui-btn-primary">解封</a><?php endif; ?>
                        <a href="<?php echo U('Admin/Index/resetpassword',array('id'=>$vo[id]));?>" class="layui-btn layui-btn-primary">重置密码</a>
                        <?php if(($vo["identity"] == 0)): ?><a href="<?php echo U('Admin/Index/userstate',array('id'=>$vo[id],'identity'=>1));?>" class="layui-btn layui-btn-primary">设置为管理员</a>
                        <?php else: ?>
                            <a href="<?php echo U('Admin/Index/userstate',array('id'=>$vo[id],'identity'=>0));?>" class="layui-btn layui-btn-primary">取消管理员</a><?php endif; ?>
                    </td>
                </tr><?php endforeach; endif; ?>
        </tbody>
    </table>
        <div class="result page"><?php echo ($page); ?></div>

    <script src="/bokechengxu/Public/plugins/layui/layui.js"></script>
    <script>
        layui.use('table', function() {
            var table = layui.table;
        });
    </script>
</body>

</html>