<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>商品添加</title>
<link rel="stylesheet" href="/Application/Admin/View/Pulbic//css/select2.css" />
<style>
.top {
	margin: 0 auto;	
	width: 50%;
	margin-top: 20%;
	height: 300px
}
</style>
</head>
<body>
	<form action="/index.php/Api/Index/fenlei" method="post">
	<div class="top">
		<input type="text" name="url"> <select name="col"
			class="span6">
			<?php $temp=D("shopcolumn")->where(["sid"=>0])->select();?>
			<?php if(is_array($temp)): $i = 0; $__LIST__ = $temp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select> <input type="submit" value="提交">
	</div>
</form>

</body>
<script type="text/javascript">
	$('select').select2();
</script>
<script src="/Application/Admin/View/Pulbic//js/jquery.min.js"></script>
<script src="/Application/Admin/View/Pulbic//js/select2.min.js"></script>
</html>