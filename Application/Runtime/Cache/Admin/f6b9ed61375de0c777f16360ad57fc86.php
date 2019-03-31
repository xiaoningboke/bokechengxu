<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>文章分类列表</title>
    <link rel="stylesheet" href="/bokechengxu/Public/plugins/layui/css/layui.css" media="all">
</head>

<body>

    <table class="layui-table"lay-filter="test" id="test">
        <thead>
            <tr>
                <th lay-data="{field:'id', width:80, sort: true}">分类名称</th>
                <th lay-data="{field:'id', width:80, sort: true}">创建时间</th>
                <th lay-data="{field:'id', width:80, sort: true}">修改时间</th>
                <th lay-data="{field:'username', width:80}">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($data)): foreach($data as $key=>$vo): ?><tr>
                    <td><?php echo ($vo["name"]); ?></td>
                    <td><?php echo ($vo["create_time"]); ?></td>
                    <td><?php echo ($vo["exit_time"]); ?></td>
                    <td>
                         <a href="<?php echo U('Admin/Index/exitfenlei',array('id'=>$vo[id]));?>" class="layui-btn layui-btn-primary">修改</a>
                         <a href="<?php echo U('Admin/Index/delfenlei',array('id'=>$vo[id]));?>" class="layui-btn layui-btn-primary">删除</a>
                    </td>
                </tr><?php endforeach; endif; ?>
           
        </tbody>
    </table>

    <script src="/bokechengxu/Public/plugins/layui/layui.js"></script>
    <script>
        layui.use('table', function() {
            var table = layui.table;
        });
    </script>
</body>

</html>