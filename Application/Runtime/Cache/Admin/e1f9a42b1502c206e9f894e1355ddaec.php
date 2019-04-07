<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>网站配置</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/bokechengxu/Public/plugins/layui/css/layui.css" media="all">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   
</head>

<body>


    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>网站配置</legend>
    </fieldset>

    <form class="layui-form" id="form" action="<?php echo U('Admin/Index/updateConfig');?>" method="post">
        <div class="layui-form-item">
            <label class="layui-form-label">网站标题</label>
            <div class="layui-input-block">
                <input type="text" name="name" value="<?php echo ($data["name"]); ?>" lay-verify="title" autocomplete="off" placeholder="请输入网站标题" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">底部版权</label>
            <div class="layui-input-block">
                <input type="text" name="bottom" value="<?php echo ($data["bottom"]); ?>" lay-verify="title" autocomplete="off" placeholder="请输入底部版权" class="layui-input">
            </div>
        </div>
        
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" onclick="submit()">立即提交</button>
            </div>
        </div>
    </form>
   

    <script src="/bokechengxu/Public/plugins/layui/layui.js"></script>
    <!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
    <script>
        layui.use(['form', 'layedit', 'laydate'], function() {
            var form = layui.form,
                layer = layui.layer,
                layedit = layui.layedit,
                laydate = layui.laydate;

            //日期
            laydate.render({
                elem: '#date'
            });
            laydate.render({
                elem: '#date1'
            });

            //创建一个编辑器
            var editIndex = layedit.build('LAY_demo_editor');

            //自定义验证规则
            form.verify({
                title: function(value) {
                    if (value.length < 5) {
                        return '标题至少得5个字符啊';
                    }
                }
            });

        });
         function submit(){
            $("#form").submit()
        }
    </script>

</body>

</html>