<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
$temp_pro = new prolist(); 


$type1_list = $temp_pro->type1_list();

if(!$_GET['type'] ) {
	$fenlei1 = $type1_list[0];
}
else {
	$fenlei1 = $_GET['type'];
}
//echo count( $type1_list );
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="description" content="����">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<script src="http://www.betopins.com/ckeditor/ckeditor/ckeditor.js"></script>
<link href="http://www.betopins.com/ckeditor/ckeditor/sample/sample.css" rel="stylesheet">

</head>
<body>
<?php include('../menu.php'); ?>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;��Ʒ����&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;��Ʒ���&nbsp;&nbsp;</a>
      <br><br>
  </span>


<div class="bform">
   <form  class="sform" method="post" action="product_addyes.php" target="_self">
      
      <br>
      
      <a id="fenlei-a-r" href="fenlei1.php?type=0" class="navi-all" id="navi0">ѡ�����&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;һ������:&nbsp;</span><input  name="fenlei1" type="text" /><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTRUMENTS����:&nbsp;</span><input  name="keyd" type="text" /><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTRUMENTS����:&nbsp;</span><input  name="named" type="text"/><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�۸�:&nbsp;</span><input  name="brand" type="text"/><br>
      <span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INSTRUMENTS����:&nbsp;</span><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea style="width:600px; height:400px;verticalAlign:text-top;"  name="content" type="text" > </textarea>
      
      <button class="add-button">���</button>
      <br>
      
      
   </form>

</div>





</body>





</html>