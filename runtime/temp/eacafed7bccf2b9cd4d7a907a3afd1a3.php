<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"E:\phpstudy_pro\WWW\tpframe/admin/user\view\\login.html";i:1577347121;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>登录</title>  
    <link rel="stylesheet" href="/../public/static/admin/css/pintuer.css">
    <link rel="stylesheet" href="/../public/static/admin/css/admin.css">
    <script src="/../public/static/admin/js/jquery.js"></script>
    <script src="/../public/static/admin/js/pintuer.js"></script>
    <script src="/../public/static/admin/layer/layer.js"></script>
</head>
<body>
<div class="bg"></div>
<div class="container">
    <div class="line bouncein">
        <div class="xs6 xm4 xs3-move xm4-move">
            <div style="height:150px;"></div>
            <div class="media media-y margin-big-bottom">           
            </div>         
            <form action="<?php echo url('user/login/doLogin'); ?>" method="post" onSubmit="return submitForm();" >
            <div class="panel loginbox">
                <div class="text-center margin-big padding-big-top"><h1>后台管理中心</h1></div>
                <div class="panel-body" style="padding:30px; padding-bottom:10px; padding-top:10px;">
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="text" class="input input-big" name="user_login" placeholder="登录账号" data-validate="required:请填写账号" />
                            <span class="icon icon-user margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field field-icon-right">
                            <input type="password" class="input input-big" name="user_pass" placeholder="登录密码" data-validate="required:请填写密码" />
                            <span class="icon icon-key margin-small"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="field">
                            <input type="text" class="input input-big" name="code" placeholder="填写右侧的验证码" data-validate="required:请填写右侧的验证码" />
                           <img src="<?php echo url('user/Login/captchaImg'); ?>" alt="" width="100" height="32" class="passcode" style="height:43px;cursor:pointer;" onclick="this.src=this.src+'?'">
                                                   
                        </div>
                    </div>
                </div>
                <div style="padding:30px;"><input type="submit"  class="button button-block bg-main text-big input-big" value="登录"></div>
            </div>
            </form>          
        </div>
    </div>
</div>
</body>
<script>


    function submitForm(){
        if($("input[name='user_login']").val().length == 0 || $("input[name='user_pass']").val().length == 0 || $("input[name='code']").val().length == 0){
            return false;
        }
        $.ajax({
            url:"<?php echo url('login/doLogin'); ?>",
            type:"POST",
            data:$("form").serialize(),
            success:function(res){
                layer.alert(res.msg, {title: "提示",btn:'确定'});
                if(res.code){
                    location.href="<?php echo url('/index/Index/index'); ?>";
                }else {
                    layer.alert(res.msg, {title: "提示",btn:'确定'});
                }
            }
        });
       return false;
    }

</script>
</html>