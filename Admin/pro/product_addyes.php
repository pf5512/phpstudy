<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';
include 'product/brandlist.php';
include 'product/typelist.php';
 
if( !strstr($_POST["fenlei1"], '=') ){
	 $fenlei1 = $_POST["fenlei1"];
}
else{
	$ttt = explode('=',$_POST["fenlei1"]);
	$fenlei1 = $ttt[1];
}
$brand_list = new brandlist();
$type_list =  new typelist();
//echo $fenlei1;
$fenlei4 = 0;
$brand = $_POST["brand"];
$keyd = $_POST["keyd"];
$named = $_POST["named"];
$content = $_POST["content"];
$xxzz = "";
$ccdd = "";
 $brand_list->add_pro($brand,'');
 $type_list->add_pro($fenlei1,'');
//echo $content;

/*
$signup=false;

  if($name=='baoni'&&$code=='188188'){
  	$signup=true;
  }*/

/*
$signup=false;

  if($name=='baoni'&&$code=='188188'){
  	$signup=true;
  }*/


$temp_pro = new prolist(); 
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
clear:left; width:750px; margin:0 auto;font-weight:bold;
font-size:16px;font-family:Microsoft Yahei;
 text-align:center;margin-top:10px;"> 
      <a href="../pro/ad_edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��ҳͼƬ����&nbsp;&nbsp;</a>
      <a href="../news/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;MATERIALS&nbsp;&nbsp;</a>
      <a href="../filss/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;EQUIPMENTS&nbsp;&nbsp;</a>
      <a href="../pro/product-edit.php?type=1_1_1_1" style="border:1px solid #992824;color:#992824;">&nbsp;&nbsp;INSTRUMENTS&nbsp;&nbsp;</a>
      <a href="../mess/product-edit.php?type=1_1_1_1" style="background-color:#992824;color:white;">&nbsp;&nbsp;��������&nbsp;&nbsp;</a>
</span>

  <span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;INSTRUMENTS����&nbsp;&nbsp;</a>
      <a href="fenlei1.php?type=0" style="background-color:black;color:white;">&nbsp;&nbsp;INSTRUMENTS���&nbsp;&nbsp;</a>
      <br><br>
  </span>
<?php 
  if($temp_pro->add_pro($keyd,$fenlei1,"",$brand,$named,$content,$xxzz,$ccdd) && $keyd!='')
{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   INSTRUMENTS��ӳɹ�"; ?> </span>
	<a id="fenlei-a-r" href="fenlei1.php" class="navi-all" id="navi0">����&nbsp;</a> 
	</div>

    <form class="sform-img" enctype = "multipart/form-data" action="product_addyes_img2.php?type=<?php echo $keyd;?>"  method="post">
	  <span>&nbsp;�ļ��ϴ�:</span>
	  <input  style="color:white;border:1px solid black;background-color:white;" type="file"   name="MyFile"  value="2000000000"/>
	  <input style="display:block;width:70px;height:25px;font-size:13px;font-family:Microsoft Yahei;margin-left:5px;margin-top:5px;" type="submit" value=" �ϴ� " />
    </form>


	<form class="sform-img" enctype = "multipart/form-data" action="product_addyes_img.php?type=<?php echo $keyd;?>"  method="post">
	  <span>&nbsp;INSTRUMENTSͼƬ�ϴ�:</span>
	  <input  style="color:white;border:1px solid black;background-color:white;" type="file" name="MyFile"/>
	  <input style="display:block;width:70px;height:25px;font-size:13px;font-family:Microsoft Yahei;margin-left:5px;margin-top:5px;" type="submit" value=" �ϴ� " />
    </form>
	<?php 
}

else{
	?> <div class="hint-word"> 
	<span > &nbsp; <?php echo "   <--INSTRUMENTS���ʧ��"; ?> </span> 
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

