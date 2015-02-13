<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
$temp_pro = new news(); 
/*
if(!$_GET['fenlei1'] ) {
	$fenlei1 = '水盆';
}
else {
	$fenlei1 = $_GET['fenlei1'];
}*/
//$temp_pro ->add_pro( '001','公司新闻',0,0,0,'1920',"新闻标题1","saffefgweg啊覅请问ifa王府井全五分 王分区分换");
//$temp_pro ->add_pro( '002','行业新闻',0,0,0,'1919',"新闻标题1","saffefgweg啊覅请问ifa王府井全五分 王分区分换");
$type1_list = $temp_pro->type1_list();
//echo count( $type1_list );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="description" content="贝托">
<link rel="stylesheet" type="text/css" href="houtai.css" />
</head>
<body>
<span style="display:block; margin-top:10px;
clear:left; width:700px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;首页产品图片管理&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;新闻管理&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;产品管理&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;新闻管理&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;新闻添加&nbsp;&nbsp;</a>
      <br><br>
  </span>

<div class="fenlei"><!-- logo+导航模块，用语定义logo+导航的居中 -->
    <span class="title">&nbsp;一级分类选择：&nbsp;&nbsp; </span>
    <a class="fenlei-a" href="fenlei2.php?fenlei1=公司新闻" class="navi-all" id="navi0">公司新闻&nbsp;&nbsp;&nbsp;&nbsp;</a> 
    <a class="fenlei-a" href="fenlei2.php?fenlei1=行业新闻" class="navi-all" id="navi0">行业新闻&nbsp;&nbsp;&nbsp;&nbsp;</a> 
    <a id="fenlei-a-r" href="fenlei1.php" class="navi-all" id="navi0">重新选择&nbsp;</a>
</div>
</body>
</html>