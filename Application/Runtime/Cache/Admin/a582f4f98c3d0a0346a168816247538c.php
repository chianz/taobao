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
        <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
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
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo U('Index/index');?>" title="返回首页" class="tip-bottom"><i class="icon-home"></i>首页</a>
            <a href="/index.php/Admin/Column/index" class="current">分类管理</a>
            <a href="#" class="current"><?php if(empty($one["id"])): ?>添加<?php else: ?>修改<?php echo ($one["title"]); endif; ?>分类</a>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>
                        <?php if(empty($one["id"])): ?>添加<?php else: ?>修改<?php echo ($one["title"]); endif; ?>分类
                    </h5>
                </div>
                <div class="widget-content">
                    <form class="form-horizontal" method="post" action="/index.php/Admin/Column/update" name="basic_validate" id="basic_validate"
                          novalidate="novalidate">
                        <input type="hidden" name="id" value="<?php echo ($one["id"]); ?>">
                        <div class="control-group">
                            <label class="control-label">分类标题</label>
                            <div class="controls">
                                <input type="text" name="title" value="<?php echo ($one["title"]); ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">描述</label>
                            <div class="controls">
                                <input type="text" name="des" value="<?php echo ($one["des"]); ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">是否显示</label>
                            <div class="controls">
                                <select class="selector" name="is_show">
                                    <option value="1">是</option>
                                    <option value="0" <?php if(($one["is_show"]) == "0"): ?>selected=selected<?php endif; ?> >否</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">上级分类</label>
                            <div class="controls">
                                <select class="selector" name="sid">
                                    <option value="0">顶级分类</option>
                                    <?php $temp=D("Column")->where(["sid"=>0])->select();?>
                                    <?php if(is_array($temp)): $i = 0; $__LIST__ = $temp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if(($one["sid"]) == $vo['id']): ?>selected=selected<?php endif; ?>  ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <input type="submit" value="提交" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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