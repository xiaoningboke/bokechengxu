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
                <th lay-data="{field:'id', width:180, sort: true}">图片</th>
                <th lay-data="{field:'id', width:180, sort: true}">发布者</th>
                <th lay-data="{field:'id', width:80, sort: true}">发布时间</th>
                <th lay-data="{field:'username', width:80}">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                    <td><img src="/bokechengxu/Public/Uploads/<?php echo ($vo["name"]); ?>" width="300px" alt=""></td>
                    <td><?php echo ($vo["user"]); ?></td>
                    <td><?php echo ($vo["create_time"]); ?></td>
                    <td>
                        <a href="<?php echo U('Admin/Index/delphoto',array('id'=>$vo[id]));?>" class="layui-btn layui-btn-primary">删除</a>
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