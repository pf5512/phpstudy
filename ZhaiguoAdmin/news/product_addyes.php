<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
 session_start();
//$name=$_SESSION["user"];
//$code=$_SESSION["code"];

$fenlei1 = $_GET['type'];

$fenlei2 = 0;
$fenlei3 = 0;
$fenlei4 = 0;
$named = $_POST["named"];
$content = $_POST["content"];
//echo $content;
$keyd = date("Y-m-d-H-i-s");
$time = date("Y-m-d");

/*
$signup=false;

  if($name=='baoni'&&$code=='188188'){
  	$signup=true;
  }*/


$temp_pro = new news(); 
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
      <a href="../news/product-edit.php?type=1" style="background-color:#992824;color:white;">&nbsp;&nbsp;���Ź���&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��Ʒ����&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;���Ź���&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;�������&nbsp;&nbsp;</a>
      <br><br>
  </span>
<?php 
  if($temp_pro->add_pro($keyd,$fenlei1,$fenlei2,$fenlei3,$fenlei4,$time,$named,$content))
{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   ������ӳɹ�"; ?> </span>
	<a id="fenlei-a-r" href="fenlei1.php" class="navi-all" id="navi0">����&nbsp;</a> 
	</div>

	<form class="sform-img" enctype = "multipart/form-data" action="product_addyes_img.php?type=<?php echo $keyd;?>"  method="post">
	  <span>&nbsp;������ͼ�ϴ�:</span>
	  <input  style="color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	  <input style="display:block;width:70px;height:25px;font-size:13px;font-family:Microsoft Yahei;margin-left:5px;margin-top:5px;" type="submit" value=" �ϴ� " />
    </form>
	<?php 
}

else{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   <--�������ʧ��"; ?> </span> 
	<a id="fenlei-a-r" href="fenlei1.php" class="navi-all" id="navi0">����&nbsp;</a>
	</div><?php
}
?>





</body>
<style>
* { margin:0; padding:0; word-break:break-all;} 
</style>
</html>
  	<?php 
  

?>

