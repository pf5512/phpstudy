<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
$temp_pro = new news(); 
if(!$_GET['fenlei1'] ) {
	$fenlei1 = 'ˮ��';
}
else {
	$fenlei1 = $_GET['fenlei1'];
}
$type2_list = $temp_pro->type2_list($fenlei1);

//session_start(); 
//echo $fenlei1;
//$_SESSION['fenlei1']=$fenlei1;
if( count($type2_list)==1 ){
	$fenlei2=0;
	$fenlei3=0;
    $fenlei4=0;
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
<span class="sssd">&nbsp;<?php echo '>'.$fenlei1;?>&nbsp;&nbsp; </span>
<div class="fenlei"><!-- logo+����ģ�飬���ﶨ��logo+�����ľ��� -->

    <span class="title">&nbsp;������Ϣ��д��&nbsp;&nbsp; </span>
 
    <a id="fenlei-a-r" href="fenlei1.php" class="navi-all" id="navi0">����ѡ��&nbsp;</a>
</div>
<div class="bform">
   <form  class="sform" method="post" action="product_addyes.php?type=<?php echo $fenlei1;?>" target="_self">
      <br><span  >&nbsp;���ű���:</span>
      <input  name="named" type="text"/><br>
      <span >&nbsp;��������:</span><br>
      &nbsp;
   
     <textarea cols="80" style="height:500px;" id="editor1" name="content" rows="500">
			
      </textarea>
      <script>

			// This call can be placed at any point after the
			// <textarea>, or inside a <head><script> in a
			// window.onload event handler.

			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.

			CKEDITOR.replace( 'editor1' );

		</script>
     
     
     
      <input class="add-button" type="submit" value="���" />
      <br>&nbsp;
   </form>

</div>


   
</body>

</html>