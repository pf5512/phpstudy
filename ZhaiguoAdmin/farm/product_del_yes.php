<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';


$urldata = $_GET['type'];


$type_list = explode('_',$urldata);
$type1 = $type_list[0]; //echo $type1;
$keyd = $type_list[1];


  /*
  if($signup==false){
  	?>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta   http-equiv=refresh   content= '1;url=login.html '>
<title>凤朝凰官网后台管理平台</title>
</head>
<body>
<p>密码错误.......<br>请重新输入......</p>
</body>
</html>
  	<?php 
  	
  }*/
  

$temp_pro = new farm(); 
//<meta   http-equiv=refresh   content= '1;url="fenlei1.php?fenlei1=0"'>
  	?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta   http-equiv=refresh   content= '1; url=product-edit.php?type=<?php echo $type1;?> '>
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>凤朝凰官网后台管理平台</title>
</head>

<body>
<span style="display:block; margin-top:10px;
clear:left; width:700px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;首页产品图片管理&nbsp;&nbsp;</a>
      <a href="../farm/product-edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;农场管理&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;产品管理&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;农场管理&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;农场添加&nbsp;&nbsp;</a>
      <br><br>
  </span>


<?php 
  if($temp_pro->delete_pro($keyd ) )
{
	?>
	<br> 
	<div class="hint-word"> 
	<span > &nbsp; <?php echo "   产品删除成功"; ?> </span>
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $keyd;?>" class="navi-all" id="navi0">返回&nbsp;</a> 
	</div>

	
	<?php 
}

else{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   <--产品删除失败"; ?> </span> 
	<a id="fenlei-a-r" href="product_edit_yes_small.php?type=<?php echo $keyd;?>" class="navi-all" id="navi0">返回&nbsp;</a>
	</div><?php
}
?>





</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>

