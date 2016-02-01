<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>超恒科技淘宝客系统</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/matrix-login.css" />
    <link href="/Application/Admin/View/Pulbic//font-awesome/css/font-awesome.css" rel="stylesheet" />
</head>
<body>
<div id="loginbox">
    <form id="loginform" method="post" class="form-vertical" action="/index.php/Admin/Index/check_login">
        <div class="control-group normal_text"> <h3><img src="/Application/Admin/View/Pulbic//img/logo.png" alt="Logo" /></h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" placeholder="用户名" name="username" />
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="密码" name="userpwd" />
                </div>
            </div>
        </div>
        <div class="form-actions">
            <span class="pull-right"><input type="submit"  class="btn btn-success" value="登录"></span>
        </div>
    </form>
</div>
</body>

</html>