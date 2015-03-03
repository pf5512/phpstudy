<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<?php
header("Content-Type: text/html; charset=gb2312");
include 'product/prolist.php';


$keyd = $_GET['type'];;

/*
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
<title>凤朝凰官网后台管理平台</title>
</head>

<body>

<span style="display:block; width:700px;  margin:0 auto;font-size:16px;font-weight:bold;font-family:Microsoft Yahei;text-align:center;margin-top:150px;"> 
      <a href="product-edit.php?type=1_1_1_1 " style="background-color:black;color:white;">&nbsp;&nbsp;产品管理&nbsp;&nbsp;</a>
      <a href="fenlei1.php?fenlei1='水盆'" style="background-color:black;color:white;">&nbsp;&nbsp;产品添加&nbsp;&nbsp;</a>
      <br><br>
</span>
<?php 
  //echo $_FILES['MyFile']['tmp_name'];
  //echo '222'.'pro-img/xiangqing/'.$keyd.'.jpg';
  //echo $keyd.'2';
  $pathname = 'pro-img/xiangqing/'.$keyd.'.jpg';
   /*if (!is_uploaded_file($_FILES["MyFile"]['tmp_name']))  
    //是否存在文件  
    {  
         echo "图片不存在!";  
         exit;  
    }
  if(!file_exists($pathname)) 
  { 
   //检查是否有该文件夹，如果没有就创建，并给予最高权限 
   echo "路径不存在"; 
  }  */
  if (move_uploaded_file($_FILES['MyFile']['tmp_name'], 'pro-img/xiangqing/'.$keyd.'.jpg')) { 
  	?> <div class="hint-word"> 
	<span > &nbsp;图片添加成功</span>
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $keyd.'_1';?>" class="navi-all" id="navi0">返回&nbsp;</a> 
	</div>
	<?php 
  }
  else { 
	?> <div class="hint-word"> 
	<span > &nbsp;图片添加失败</span>
	<a id="fenlei-a-r" href="product_edit_single_small.php?type=<?php echo $keyd.'_1';?>" class="navi-all" id="navi0">返回&nbsp;</a> 
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

