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
<script src="../ckeditor/ckeditor/ckeditor.js"></script>
<link href="../ckeditor/ckeditor/sample/sample.css" rel="stylesheet">

</head>
<body>
<span style="display:block; margin-top:10px;
clear:left; width:700px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��ҳ��ƷͼƬ����&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1" style="background-color:#992824;color:white;  ">&nbsp;&nbsp;���Ź���&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="border:1px solid #992824;color:#992824;">&nbsp;&nbsp;��Ʒ����&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;��Ʒ����&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;��Ʒ���&nbsp;&nbsp;</a>
      <br><br>
  </span>


<div class="bform">
   <form  class="sform" method="post" action="product_addyes.php" target="_self">
      
      <br>
      <span  >&nbsp;&nbsp;һ������ѡ��:</span>
      <select name="fenlei1"  onchange="self.location.href=options[selectedIndex].value" >
      <?php 
      for($i = 0; $i< count( $type1_list ); $i++ ){?> 
         <OPTION value="fenlei1.php?type=<?php echo $type1_list[$i]?>" <?php if( $type1_list[$i] == $fenlei1 ) {?>selected="selected" <?php }?>>
         <?php echo $type1_list[$i]?>
         </OPTION><?php  
      }?>
      </select> <br>
      <a id="fenlei-a-r" href="fenlei1a.php?type=0" class="navi-all" id="navi0">����·���&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ʒ����:&nbsp;</span><input  name="keyd" type="text" /><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ʒ����:&nbsp;</span><input  name="named" type="text"/><br>
      <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�۸�:&nbsp;</span><input  name="brand" type="text"/><br>
      
      <span >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��Ʒ����:&nbsp;</span><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
      
      <textarea cols="80" style="height:500px;" id="editor1" name="content" rows="100">
			
      </textarea>
      <script>

			// This call can be placed at any point after the
			// <textarea>, or inside a <head><script> in a
			// window.onload event handler.

			// Replace the <textarea id="editor"> with an CKEditor
			// instance, using default configurations.

			CKEDITOR.replace( 'editor1' );

		</script>
      
      <button class="add-button">���</button>
      <br>
      
      
   </form>

</div>





</body>





</html>