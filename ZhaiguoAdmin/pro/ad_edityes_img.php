<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
include 'product/adlist.php';
$keyd = $_GET['type'];
$etc = $_GET['file'];
$pathname = 'pro-img/adimg/'.$keyd.'.'.$etc;
?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta   http-equiv=refresh   content= '1; url=ad_edit.php '>
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>贝拓仪器官网后台管理平台</title>
</head>
<body>
<?php 
  if (move_uploaded_file($_FILES['MyFile']['tmp_name'], $pathname)) { 
  	?> <div class="hint-word"> 
	<span > &nbsp;图片添加成功</span>
	</div>
	<?php 
  }
  else {
	?> <div class="hint-word"> 
	<span > &nbsp;图片添加失败</span>
	</div>
	<?php 
}
?>
</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>