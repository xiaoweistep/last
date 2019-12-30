<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:55:"E:\phpstudy_pro\WWW\tpframe\admin/user\view\\admin.html";i:1577669032;s:57:"E:\phpstudy_pro\WWW\tpframe\admin\common\view\header.html";i:1577678049;}*/ ?>
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
    <form method="post" action="">
        <div class="panel admin-panel">
            <div class="panel-head"><strong class="icon-reorder"> 管理员列表</strong></div>
            <div class="padding border-bottom">
                <ul class="search">
                    <li>
                        <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
                        <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
                        <button onclick="window.location.href='<?php echo url('user/Admin/add'); ?>'" type="button"  class="button border-green"><span class="icon-plus-square-o" ></span> 添加管理员</button>
                    </li>
                </ul>

            </div>


            <table class="table table-hover text-center">
                <tr>
                    <th width="120">管理员ID</th>
                    <th>管理员名称</th>
                    <th>手机</th>
                    <th>邮件</th>
                    <th>身份类型</th>
                    <th>状态</th>
                    <th width="120">创建时间</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($admin) || $admin instanceof \think\Collection || $admin instanceof \think\Paginator): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$admins): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td><input type="checkbox" name="id[]" value="1" />
                        <?php echo $admins['id']; ?></td>
                    <td> <?php echo $admins['user_login']; ?></td>

                    <td><?php echo $admins['mobile']; ?></td>
                    <td><?php echo $admins['user_email']; ?></td>
                    <td><?php echo $admins['user_type']; ?></td>
                    <td><?php echo $admins['user_status']; ?></td>
                    <td><?php echo $admins['create_time']; ?></td>

                    <td><div class="button-group"> <a class="button border-red" href="javascript:void(0)" onclick="return del(1)"><span class="icon-trash-o"></span> 删除</a> </div></td>
                </tr>

                <?php endforeach; endif; else: echo "" ;endif; ?>
                <style>

                    .pagination .active span{
                        background:#09F; color:#FFF; border-color:#09F;
                        border-radius: 3px;
                        display: inline-block;
                        padding: 9px 12px;
                    }

                    .pagination li{ margin: 0 3px}
                </style>
                <tr>
                    <td colspan="8">
<!--                        <div class="pagelist">-->
<!--                            <a href="">上一页</a> <span class="current">1</span>-->
<!--                            <a href="">2</a><a href="">3</a><a href="">下一页</a>-->
<!--                            <a href="">尾页</a>-->
<!--                        </div>-->
                        <?php echo $admin->render(); ?>
                    </td>
                </tr>
            </table>
        </div>
    </form>
    <script type="text/javascript">

        function del(id){
            if(confirm("您确定要删除吗?")){

            }
        }

        $("#checkall").click(function(){
            $("input[name='id[]']").each(function(){
                if (this.checked) {
                    this.checked = false;
                }
                else {
                    this.checked = true;
                }
            });
        })

        function DelSelect(){
            var Checkbox=false;
            $("input[name='id[]']").each(function(){
                if (this.checked==true) {
                    Checkbox=true;
                }
            });
            if (Checkbox){
                var t=confirm("您确认要删除选中的内容吗？");
                if (t==false) return false;
            }
            else{
                alert("请选择您要删除的内容!");
                return false;
            }
        }

    </script>
    </body></html>
</div>
</body>
</html>