<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>修改公告</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/bokechengxu/Public/plugins/layui/css/layui.css" media="all">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/bokechengxu/Public/Ueditor/ueditor.config.js"></script>  
    <script type="text/javascript" src="/bokechengxu/Public/Ueditor/ueditor.all.min.js"></script>  
    <script type="text/javascript" src="/bokechengxu/Public/Ueditor/lang/zh-cn/zh-cn.js"></script>  
    <script type="text/javascript" charset="utf-8">  
       window.UEDITOR_HOME_URL = "/bokechengxu/Public/Ueditor/";  
        $(document).ready(function () {  
          UE.getEditor('info', {  
          initialFrameHeight: 500,  
          initialFrameWidth: 1100,  
          serverUrl: "<?php echo U(MODULE_NAME.'/Index/save_info');?>"  
        });  
      });    
    </script>
</head>

<body>


    <fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
        <legend>添加文章</legend>
    </fieldset>

    <form class="layui-form" id="form" action="<?php echo U('Admin/Index/doExitNotice');?>" method="post">
        <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>">
        <div class="layui-form-item">
            <label class="layui-form-label">公告标题</label>
            <div class="layui-input-block">
                <input type="text" name="title" lay-verify="title" autocomplete="off" placeholder="请输入公告标题" class="layui-input" value="<?php echo ($data["title"]); ?>">
            </div>
        </div>
         <div class="layui-form-item">
            <label class="layui-form-label">公告内容</label>
            <div class="layui-input-block">
                <textarea name="content" id="info" style="width:1024px;height:500px;"><?php echo ($data["content"]); ?></textarea>  
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

        window.onload=function(){
            $("option[value='<?php echo ($data["classify"]); ?>']").attr("selected", true);
           
        }

        layui.use(['form', 'layedit', 'laydate'], function() {
            var form = layui.form,
                layer = layui.layer,
                layedit = layui.layedit,
                laydate = layui.laydate;
           /* $("#selected").find("option[value='<?php echo ($data["classify"]); ?>']").prop("selected",true);
            form.render();*/
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