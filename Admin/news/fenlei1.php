<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
$temp_pro = new news(); 
/*
if(!$_GET['fenlei1'] ) {
	$fenlei1 = 'ˮ��';
}
else {
	$fenlei1 = $_GET['fenlei1'];
}*/
//$temp_pro ->add_pro( '001','��˾����',0,0,0,'1920',"���ű���1","saffefgweg��҅����ifa������ȫ��� �������ֻ�");
//$temp_pro ->add_pro( '002','��ҵ����',0,0,0,'1919',"���ű���1","saffefgweg��҅����ifa������ȫ��� �������ֻ�");
$type1_list = $temp_pro->type1_list();
//echo count( $type1_list );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="description" content="����">
<link rel="stylesheet" type="text/css" href="houtai.css" />
</head>
<body>
<span style="display:block; margin-top:10px;
clear:left; width:700px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��ҳ��ƷͼƬ����&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;���Ź���&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��Ʒ����&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;���Ź���&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;�������&nbsp;&nbsp;</a>
      <br><br>
  </span>

<div class="fenlei"><!-- logo+����ģ�飬���ﶨ��logo+�����ľ��� -->
    <span class="title">&nbsp;һ������ѡ��&nbsp;&nbsp; </span>
    <a class="fenlei-a" href="fenlei2.php?fenlei1=��˾����" class="navi-all" id="navi0">��˾����&nbsp;&nbsp;&nbsp;&nbsp;</a> 
    <a class="fenlei-a" href="fenlei2.php?fenlei1=��ҵ����" class="navi-all" id="navi0">��ҵ����&nbsp;&nbsp;&nbsp;&nbsp;</a> 
    <a id="fenlei-a-r" href="fenlei1.php" class="navi-all" id="navi0">����ѡ��&nbsp;</a>
</div>
</body>
</html>