
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/brandlist.php';
$brand_list = new brandlist();
$t1_list = $brand_list->get_list();
?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<link rel="stylesheet" type="text/css" href="pro.css" />
<link rel="stylesheet" type="text/css" href="brand_type.css" />
<title>凤朝凰官网后台管理平台</title>
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
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;INSTRUMENTS管理&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;INSTRUMENTS添加&nbsp;&nbsp;</a>
      <a href="brand-edit.php" style="background-color:black;color:white;">&nbsp;&nbsp;品牌管理&nbsp;&nbsp;</a>
      <a href="type-edit.php" style="background-color:black;color:white;">&nbsp;&nbsp;类别管理&nbsp;&nbsp;</a>
      <br><br>
  </span>
  
  <div class="brand_all">
   <?php 
   for( $i = 0 ; $i<  count($t1_list); $i++){
   	  ?>
   	  <div class="band_list_all">
   	  <a style="float:left;" class="band_list"  href="brand_edit_single.php?type=<?php echo $t1_list[$i];?>" >
   	  &nbsp;&nbsp;<?php echo $t1_list[$i];?> 品牌管理
   	   </a>
   	  </div>
   	    
   	  <?php 
   }
   ?>
  </div>

       
    

   
 
  
</body>

</html>




















