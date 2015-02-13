<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/adlist.php';
$keyd = $_GET['type'];
$content = $_POST["contentt"];
$link = $_POST["linkk"];
$temp_ad = new adlist();
/*if($signup==false){
  	?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta   http-equiv=refresh   content= '1;url=login.html '>
<title>宝尼官网后台管理平台</title>
</head>
<body>
<p>密码错误.......<br>请重新输入......</p>
</body>
</html>
  	<?php 
  	
  }
  */
//<meta   http-equiv=refresh   content= '1;url="fenlei1.php?fenlei1=0"'>
  	?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta   http-equiv=refresh   content= '1; url=ad_edit.php'>
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>凤朝凰官网后台管理平台</title>
</head>
<body>
<?php 
  if($temp_ad->edit_pro($keyd,$content,$link) )
{
	?> 
	<div style="margin-top:200px;" class="hint-word"> 
	<span > &nbsp; <?php echo "首页推荐信息修改成功"; ?> </span>
	<a id="fenlei-a-r" href="ad_edit.php" class="navi-all" id="navi0">返回&nbsp;</a> 
	</div>
	<?php 
}
else{
	?> <div style="margin-top:200px;" class="hint-word"> 
	<span > &nbsp; <?php echo "   <--首页推荐信息修改失败"; ?> </span> 
	</div>
	<?php
}
?>
</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>