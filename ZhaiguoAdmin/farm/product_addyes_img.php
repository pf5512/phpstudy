<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
 session_start();


$keyd = $_GET['type'];

/*
 * $name=$_SESSION["user"];
$code=$_SESSION["code"];
$signup=false;
  if($name=="baoni"&&$code=="188188"){
  	$signup=true;
  }*/

  
  
//$temp_pro = new prolist(); 
//<meta   http-equiv=refresh   content= '1;url="fenlei1.php?fenlei1=0"'>
  	?>

<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<link rel="stylesheet" type="text/css" href="houtai.css" />
<title>�ﳯ�˹�����̨����ƽ̨</title>
</head>

<body>
<span style="display:block; margin-top:10px;
clear:left; width:700px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��ҳ��ƷͼƬ����&nbsp;&nbsp;</a>
      <a href="../farm/product-edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;ũ������&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��Ʒ����&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;ũ������&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;ũ�����&nbsp;&nbsp;</a>
      <br><br>
  </span>
<?php 
  //echo $_FILES['MyFile']['tmp_name'];
  //echo '222'.'pro-img/xiangqing/'.$keyd.'.jpg';
  //echo $keyd.'2';
  $pathname = 'pro-img/xiangqing/'.$keyd.'.jpg';
   /*if (!is_uploaded_file($_FILES["MyFile"]['tmp_name']))  
    //�Ƿ�����ļ�  
    {  
         echo "ͼƬ������!";  
         exit;  
    }
  if(!file_exists($pathname)) 
  { 
   //����Ƿ��и��ļ��У����û�оʹ��������������Ȩ�� 
   echo "·��������"; 
  }  */
  /*
  switch ($_FILES['MyFile']['type']) {
			case 'image/gif': $the_type = '.gif';
			case 'image/jpeg': $the_type = '.jpg';
			case 'image/jpg': $the_type = '.jpg';
			case 'image/png': $the_type = '.jpg';
			default: return TYPE_NOT_SUPPORT;
	 }*/
  $tpath = $_FILES['MyFile']['type'];
  //echo end(explode('.', $tpath));
		
  if (move_uploaded_file($_FILES['MyFile']['tmp_name'], 'pro-img/xiangqing/'.$keyd.'.jpg')) { 
  	?> <div class="hint-word"> 
	<span > &nbsp;ͼƬ��ӳɹ�</span>
	<a id="fenlei-a-r" href="fenlei1.php" class="navi-all" id="navi0">����&nbsp;</a> 
	</div>
	<?php 
  }
  else { 
	?> <div class="hint-word"> 
	<span > &nbsp;ͼƬ���ʧ��</span>
	<a id="fenlei-a-r" href="fenlei1.php" class="navi-all" id="navi0">����&nbsp;</a> 
	</div>
	<?php 
}
?>


</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>
  	<?php 
  

?>

