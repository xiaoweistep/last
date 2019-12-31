<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:61:"E:\phpstudy_pro\WWW\tpframe/admin/user\view\\action_edit.html";i:1577698560;s:57:"E:\phpstudy_pro\WWW\tpframe\admin\common\view\header.html";i:1577691051;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>
    <meta name="keywords" content="简单,实用,网站后台" />
    <meta name="description" content="简单实用网站后台管" />
    <link rel="stylesheet" href="/../public/static/admin/css/pintuer.css">
    <link rel="stylesheet" href="/../public/static/admin/css/admin.css">
    <script src="/../public/static/admin/js/jquery.js"></script>
    <script src="/../public/static/admin/layer/layer.js"></script>
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
    <div class="logo margin-big-left fadein-top">
        <h1><img src="/../public/static/admin/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
    </div>
    <div class="head-l"><a class="button button-little bg-green" href="" target="_blank"><span class="icon-home"></span> 前台首页</a> &nbsp;&nbsp;<a href="##" class="button button-little bg-blue"><span class="icon-wrench"></span> 清除缓存</a> &nbsp;&nbsp;<a class="button button-little bg-red" href="<?php echo url('user/Admin/loginOut'); ?>"><span class="icon-power-off"></span> 退出登录</a> </div>
</div>
<div class="leftnav">
    <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
    <h2><span class="icon-user"></span>基本设置</h2>
    <ul style="display:block">
        <li><a href="<?php echo url('Index/index'); ?>" target="right"><span class="icon-caret-right"></span>网站设置</a></li>

        <li><a href="adv.html" target="right"><span class="icon-caret-right"></span>首页轮播</a></li>
        <li><a href="book.html" target="right"><span class="icon-caret-right"></span>留言管理</a></li>
        <li><a href="column.html" target="right"><span class="icon-caret-right"></span>栏目管理</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>管理员模块</h2>
    <ul>
        <li><a href="<?php echo url('user/Admin/index'); ?>" target="right"><span class="icon-caret-right"></span>管理员列表</a></li>
        <li><a href="<?php echo url('user/Admin/editPass'); ?>" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
        <li><a href="<?php echo url('user/Admin/adminLog'); ?>" target="right"><span class="icon-caret-right"></span>管理员登录日志</a></li>
        <li><a href="<?php echo url('user/Role/index'); ?>" target="right"><span class="icon-caret-right"></span>管理员角色列表</a></li>
        <li><a href="<?php echo url('user/Role/actionIndex'); ?>" target="right"><span class="icon-caret-right"></span>角色操作列表</a></li>
    </ul>
    <h2><span class="icon-pencil-square-o"></span>栏目管理</h2>
    <ul>
        <li><a href="list.html" target="right"><span class="icon-caret-right"></span>内容管理</a></li>
        <li><a href="add.html" target="right"><span class="icon-caret-right"></span>添加内容</a></li>
        <li><a href="cate.html" target="right"><span class="icon-caret-right"></span>分类管理</a></li>
    </ul>
</div>
<script type="text/javascript">
    $(function(){
        $(".leftnav h2").click(function(){
            $(this).next().slideToggle(200);
            $(this).toggleClass("on");
        })
        $(".leftnav ul li a").click(function(){
            $("#a_leader_txt").text($(this).text());
            $(".leftnav ul li a").removeClass("on");
            $(this).addClass("on");
        })
    });
</script>

<ul class="bread">
    <li><a href="<?php echo url('Index/index'); ?>" target="right" class="icon-home"> 首页</a></li>
    <li><a href="##" id="a_leader_txt">网站信息</a></li>
    <li><b>当前语言：</b><span style="color:red;">中文</php></span>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
    <!DOCTYPE html>
    <html lang="zh-cn">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="renderer" content="webkit">
        <title></title>
        <link rel="stylesheet" href="/../public/static/admin/css/pintuer.css">
        <link rel="stylesheet" href="/../public/static/admin/css/admin.css">
        <script src="/../public/static/admin/js/jquery.js"></script>
        <script src="/../public/static/admin/js/pintuer.js"></script>
    </head>
    <body>
    <div class="panel admin-panel">
        <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>菜单增加</strong></div>
        <div class="body-content">
            <form method="post" class="form-x" action="<?php echo url('user/Admin/save'); ?>" onsubmit="return submitForm();">
                <div class="form-group">
                    <div class="label">
                        <label>菜单名称：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" value="<?php echo $action_detail['name']; ?>" name="name" data-validate="required:请输入操作名称" />
                        <div class="tips"></div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $action_detail['id']; ?>">
                <div class="form-group">
                    <div class="label">
                        <label>链接：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" value="<?php echo $action_detail['action_url']; ?>" name="action_url" data-validate="required:请输入链接" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>所属模块：</label>
                    </div>
                    <div class="field">
                        <input type="text" class="input w50" value="<?php echo $action_detail['action_type']; ?>" name="action_type" data-validate="required:请输入所属模块" />
                        <div class="tips"></div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label>上级菜单：</label>
                    </div>
                    <select name="parent_id" class="input w50">
                        <option  value="0" <?php if($action_detail['parent_id'] == 0): ?> selected="selected" <?php endif; ?>  >顶级菜单</option>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$first): $mod = ($i % 2 );++$i;?>
                            <option value="<?php echo $first['id']; ?>" <?php if($action_detail['parent_id'] == $first['id']): ?> selected="selected" <?php endif; ?>><?php echo $first['name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <div class="tips"></div>
                </div>
                <div class="clear"></div>
                <div class="form-group">
                    <div class="label">
                        <label></label>
                    </div>
                    <div class="field">
                        <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </body></html>
    <script>

        function submitForm(){
            $.ajax({
                url:"<?php echo url('Role/saveAction');?>",
                type:"POST",
                data:$("form").serialize(),
                success:function(res){

                    if(res.code == 1){
                        layer.alert(res.msg, {title: "提示",btn:'确定'},function () {
                            location.href="<?php echo url('/user/Role/actionIndex'); ?>";
                        });
                    }
                    console.log(res);
                }
            });
            return false;
        }
    </script>
</div>
</body>
</html>