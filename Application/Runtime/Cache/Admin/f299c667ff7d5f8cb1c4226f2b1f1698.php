<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>文章分类列表</title>
    <link rel="stylesheet" href="/bokechengxu/Public/plugins/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/bokechengxu/Public/css/fenye.css">
</head>

<body>

    <table class="layui-table"lay-filter="test" id="test">
        <thead>
            <tr>
                <th lay-data="{field:'id', width:180, sort: true}">公告标题</th>
                <th lay-data="{field:'id', width:180, sort: true}">状态</th>
                <th lay-data="{field:'id', width:180, sort: true}">发布者</th>
                <th lay-data="{field:'id', width:80, sort: true}">创建时间</th>
                <th lay-data="{field:'id', width:80, sort: true}">修改时间</th>
                <th lay-data="{field:'username', width:80}">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                    <td><?php echo ($vo["title"]); ?></td>
                    <?php if(($vo["state"] == 0)): ?><td>显示</td>
                    <?php else: ?>  <td>隐藏</td><?php endif; ?>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["create_time"]); ?></td>
                    <td><?php echo ($vo["exit_time"]); ?></td>
                    <td>
                        <a href="<?php echo U('Admin/Index/exitnotice',array('id'=>$vo[id]));?>" class="layui-btn layui-btn-primary">修改</a>
                        <a href="<?php echo U('Admin/Index/delnotice',array('id'=>$vo[id]));?>" class="layui-btn layui-btn-primary">删除</a>
                        <a href="#" class="layui-btn layui-btn-primary">预览</a>
                        <?php if(($vo["state"] == 0)): ?><a href="<?php echo U('Admin/Index/noticestate',array('id'=>$vo[id],'state'=>1));?>" class="layui-btn layui-btn-primary">隐藏</a>
                        <?php else: ?>
                            <a href="<?php echo U('Admin/Index/noticestate',array('id'=>$vo[id],'state'=>0));?>" class="layui-btn layui-btn-primary">显示</a><?php endif; ?>
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