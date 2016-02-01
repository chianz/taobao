<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>操作中心</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/bootstrap.min.css" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/fullcalendar.css" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/matrix-style.css" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/matrix-media.css" />
    <link href="/Application/Admin/View/Pulbic//font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/jquery.gritter.css" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/uniform.css" />
    <link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/select2.css" />

</head>
<body>
<!--Header-part-->
<div id="header">
    <h1><a href="<?php echo U('Index/index');?>">操作中心</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class=""><a title="" href="#"><i class="icon icon-cog"></i> <span class="text">Settings</span></a></li>
        <li class=""><a title="" href="<?php echo U('Index/loginout');?>"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
</div>
<!--close-top-Header-menu-->
<!--start-top-serch-->
<div id="search">
    <input type="text" placeholder="Search here..."/>
    <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar">
    <ul>
        <?php if(is_array($allmean)): $i = 0; $__LIST__ = $allmean;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($vo["sid"]) == "0"): ?><li <?php if(($now["id"]) == $vo['id']): ?>class="submenu active open" <?php else: ?>class="submenu"<?php endif; ?>   > <a href="#"><i class="icon icon-home"></i> <span><?php echo ($vo["title"]); ?></span></a>
                    <ul>
                        <?php if(is_array($allmean)): $i = 0; $__LIST__ = $allmean;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i; if(($vo1["sid"]) == $vo['id']): $temp=$vo1["controller"]."/".$vo1["function"];?>
                                <li
                                    <?php if($vo1["controller"]==$controller && $vo1["function"]==$function) { echo 'class="active"'; } ?>
                                >
                                <a href="<?php echo U($temp); echo ($vo1["parm"]); ?>"><?php echo ($vo1["title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<!--sidebar-menu-->
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

</div>

<!--end-main-container-part-->

<!--Footer-part-->

<div class="row-fluid">
    <div id="footer" class="span12"> 2013 &copy; Matrix Admin. More Templates <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a> </div>
</div>

<!--end-Footer-part-->
<script src="/Application/Admin/View/Pulbic//js/jquery.min.js"></script> 
<script src="/Application/Admin/View/Pulbic//js/select2.min.js"></script>
<script src="/Application/Admin/View/Pulbic//js/jquery.ui.custom.js"></script> 
<script src="/Application/Admin/View/Pulbic//js/bootstrap.min.js"></script> 
<script src="/Application/Admin/View/Pulbic//js/matrix.js"></script>
</body>
</html>