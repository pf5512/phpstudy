<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
include 'product/prolist.php';
include 'product/brandlist.php';
include 'product/typelist.php';

$urldata = $_GET['type'];


$type_list = explode('_',$urldata);
$type1 = $type_list[0]; //echo $type1;
$type2 = $type_list[1];//echo $type2;
$type3 = $type_list[2];//echo $type3;
$type4 = $type_list[3];//echo $type4;
$new_ar = $type1.'_'.$type2.'_'.$type3.'_'.$type4;
$keyd = $type_list[4];

$temp_pro = new prolist(); 
$arr = $temp_pro->get_product_data($keyd);
$brand_list = new brandlist();
$type_list =  new typelist();
$old_brand = $arr[4];
$old_type = $arr[1];
  /*
  if($signup==false){
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
  	
  }*/
  

//<meta   http-equiv=refresh   content= '1;url="fenlei1.php?fenlei1=0"'>
  	?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta   http-equiv=refresh   content= '1; url=product-edit.php?type=<?php echo $new_ar;?> '>
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>凤朝凰官网后台管理平台</title>
</head>

<body>
<span style="display:block; margin-top:10px;
clear:left; width:750px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;首页图片管理&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;MATERIALS&nbsp;&nbsp;</a>
      <a href="../filss/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;EQUIPMENTS&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="border:1px solid #992824;color:#992824;">&nbsp;&nbsp;INSTRUMENTS&nbsp;&nbsp;</a>
      <a href="../mess/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;留言中心&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;INSTRUMENTS管理&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;INSTRUMENTS添加&nbsp;&nbsp;</a>
      <br><br>
  </span>



<?php 
  if($temp_pro->delete_pro($keyd ) )
{
	?>
	<br> 
	<div class="hint-word"> 
	<span > &nbsp; <?php echo "   INSTRUMENTS删除成功"; ?> </span>
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $hkeyd.'_1';?>" class="navi-all" id="navi0">返回&nbsp;</a> 
	</div>

	
	<?php 
}

else{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   <--INSTRUMENTS删除失败"; ?> </span> 
	<a id="fenlei-a-r" href="product_edit_yes_small.php?type=<?php echo $hkeyd.'_1';?>" class="navi-all" id="navi0">返回&nbsp;</a>
	</div><?php
}


 if ( !$temp_pro->check_brand($old_brand) ){
 	$brand_list->del_pro($old_brand);
 }
 if ( !$temp_pro->check_type($old_type) ){
 	$type_list->del_pro($old_type);
 }

?>





</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>

