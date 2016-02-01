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
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="<?php echo U('Index/index');?>" title="返回首页" class="tip-bottom"><i class="icon-home"></i>首页</a>
            <a href="/index.php/Admin/Shop/index" class="current">商品管理</a>
            <a href="#" class="current"><?php if(empty($one["id"])): ?>添加<?php else: ?>修改<?php echo ($one["title"]); endif; ?>商品</a>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"><span class="icon"> <i class="icon-info-sign"></i> </span>
                    <h5>
                        <?php if(empty($one["id"])): ?>添加<?php else: ?>修改<?php echo ($one["title"]); endif; ?>商品
                    </h5>
                </div>
                <div class="widget-content">
                    <form class="form-horizontal" method="post" action="/index.php/Admin/Shop/update" name="basic_validate" id="basic_validate"
                          novalidate="novalidate">
                        <input type="hidden" name="id" value="<?php echo ($one["id"]); ?>">
                        <div class="control-group">
                            <label class="control-label">原网址</label>
                            <div class="controls">
                                <input type="text" name="url" value="<?php echo ($one["url"]); ?>" class="span6"><a href="">下载采集工具</a>
                            </div>
                            
                        </div>
                        <div class="control-group">
                            <label class="control-label">排序</label>
                            <div class="controls">
                                <input type="text" name="sort" value="<?php echo ((isset($one["sort"]) && ($one["sort"] !== ""))?($one["sort"]):0); ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">对应分类</label>
                            <div class="controls">
                                <select name="col" class="span6">
                                    <?php $temp=D("shopcolumn")->where(["sid"=>0])->select();?>
                                    <?php if(is_array($temp)): $i = 0; $__LIST__ = $temp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if(($one["col"]) == $vo['id']): ?>selected=selected<?php endif; ?>  ><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">是否显示</label>
                            <div class="controls">
                                <select  name="is_show" class="span6">
                                    <option value="1">是</option>
                                    <option value="0" <?php if(($one["is_show"]) == "0"): ?>selected=selected<?php endif; ?> >否</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">标题</label>
                            <div class="controls">
                                <input type="text" name="title" class="span6" value="<?php echo ($one["title"]); ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">描述</label>
                            <div class="controls">
                                <input type="text" name="des" class="span6" value="<?php echo ($one["des"]); ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">商品封面</label>
                            <div class="controls">
                                <input type="text" name="img" value="<?php echo ($one["img"]); ?>" placeholder="请输入网络图片地址">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">类型</label>
                            <div class="controls">
                                 <select  name="type" class="span6">
                                 <?php $temp=C("tb_type");?>
                                 <?php if(is_array($temp)): $i = 0; $__LIST__ = $temp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>" <?php if(($one["type"]) == $key): ?>selected=selected<?php endif; ?>  ><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">推广地址</label>
                            <div class="controls">
                                <input type="text" name="turl" class="span6" value="<?php echo ($one["turl"]); ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">金额</label>
                            <div class="controls">
                                <input type="text" name="money" value="<?php echo ($one["money"]); ?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">详情</label>
                            <div class="controls">
                                <script id="container" name="body" class="span6" style="height:400px;" type="text/plain">
        							<?php echo ($one["body"]); ?>
    							</script>
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

<!-- 配置文件 -->
    <script type="text/javascript" src="/Public/Cj/ueditor/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/Public/Cj/ueditor/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
        $('select').select2();
    </script>