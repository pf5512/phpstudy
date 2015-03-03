<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/typelist.php';
$type_list = new typelist();
$typekey = $_GET['type'];
$content = $_POST['content'];
?>



<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta   http-equiv=refresh   content= '1; url=type_edit_single.php?type=<?php echo $typekey;?> '>
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>贝拓仪器官网后台管理平台</title>
</head>

<body>
<span style="display:block; margin-top:10px;
clear:left; width:750px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1_1_1_1" style="border:1px solid #992824;color:#992824;">&nbsp;&nbsp;首页图片管理&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;MATERIALS&nbsp;&nbsp;</a>
      <a href="../filss/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;EQUIPMENTS&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;INSTRUMENTS&nbsp;&nbsp;</a>
      <a href="../mess/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;留言中心&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;产品管理&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;产品添加&nbsp;&nbsp;</a>
      <a href="brand-edit.php" style="background-color:black;color:white;">&nbsp;&nbsp;品牌管理&nbsp;&nbsp;</a>
      <a href="type-edit.php" style="background-color:black;color:white;">&nbsp;&nbsp;类别管理&nbsp;&nbsp;</a>
      <br><br>
  </span>

<?php 
  if( $type_list->edit_pro($typekey,$content) )
{
	?>
	<br> 
	<div class="hint-word"> 
	<span > &nbsp; <?php echo "   类别描述修改成功"; ?> </span>
	<a id="fenlei-a-r" href="typeedit_single.php?type=<?php echo $typekey;?>" class="navi-all" id="navi0">返回&nbsp;</a> 
	</div>

	
	<?php 
}

else{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   <--类别描述修改失败"; ?> </span> 
	<a id="fenlei-a-r" href="type_edit_single.php?type=<?php echo $typekey;?>" class="navi-all" id="navi0">返回&nbsp;</a>
	</div><?php
}



?>





</body>
<style>

* { margin:0; padding:0; word-break:break-all;} 

</style>
</html>

